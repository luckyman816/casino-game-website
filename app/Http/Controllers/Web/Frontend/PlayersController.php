<?php

namespace VanguardLTE\Http\Controllers\Web\Frontend {

    use Illuminate\Support\Facades\Http;
    use Illuminate\Support\Str;

    class PlayersController extends \VanguardLTE\Http\Controllers\Controller
    {

        public function __construct()
        {
            $this->encrypt_method = "AES-256-CBC";
            $this->secret_key = '$6Za+?k}^`5q:f^@TSxy69gf7JcKuF!,';
            $this->secret_iv = '$6Za+?k}^`5q:f^@TSxy69gf7JcKuF!,';
            $this->key = hash('sha256', $this->secret_key);
            $this->iv = substr(hash('sha256', $this->secret_iv), 0, 16);
        }
        public function getGameLaunch(\Illuminate\Http\Request $request)
        {
            $data = $request->all();
            $api = $request->header("api");

            $isMobile = $data['isMobile'] ? true : false;
            if(!$data['id'] || !$data['game'] || !$data['currency']){
                echo '{"responseEvent":"error","responseType":"start","serverResponse":"Invalid Parameter"}';
                exit();
            }

            // Saving User Information
            $apiData = \VanguardLTE\API::where(['keygen' => $api])->first();

            $user = \VanguardLTE\User::where(['player' => $data['id']])->where(['api' => $apiData->id])->first();

            if (isset($user)) {
                $update = ['currency' => $data['currency']];
                if(isset($data['balance'])) {
                    $update['balance'] = $data['balance'];
                }

                \VanguardLTE\User::where(['player' => $data['id'], 'api' => $apiData->id])->update($update);
            } else {
                $newUser = new \VanguardLTE\User;
                $newUser->api = $apiData->id;
                $newUser->player = $data['id'];
                $newUser->username = $data['name'];
                $newUser->email = $data['email'];
                $newUser->parent_id = 0;
                $newUser->role_id = 1;
                $newUser->shop_id = $apiData->shop_id;
                if(isset($data['balance'])) {
                    $newUser->balance = $data['balance'];
                }
                $newUser->currency = $data['currency'];
                $newUser->auth_token = Str::random(64);
                $newUser->save();

                \VanguardLTE\ShopUser::create([
                    'shop_id' => 1,
                    'user_id' => $newUser->id
                ]);

                $role = \jeremykenedy\LaravelRoles\Models\Role::where('name', '=', 'User')->first();
                $newUser->attachRole($role);
            }

            // Game
            $game = \VanguardLTE\Game::where(['name' => $data['game'], 'shop_id'=>$apiData->shop_id])->first();
            $user = \VanguardLTE\User::where(['player' => $data['id'], 'api' => $apiData->id])->first();
            if(!$game) {
                echo '{"responseEvent":"error","responseType":"start","serverResponse":"Game does not exist in this shop"}';
                exit();
            }
            $returnURL = array(
                $user->id, // userID
                $game->id,  //gameID
                date('d-m-y h:i:s')
            ); // current Time

            $returnURL = implode(', ', $returnURL);
            $output = openssl_encrypt($returnURL, $this->encrypt_method, $this->key, 0, $this->iv);
            $output = base64_encode($output);
	    $output = str_replace('=', '___', $output);
            $gamePath = \VanguardLTE\GamePath::where(['game' => $game->name])->first();
            if (isset($gamePath)) {
                $gamePath = $gamePath->path;
            } else {
                $gamePath = '';
            }
            $extra = "";
            if($game->name=="JokerPokerAM") {
                $extra = "&config=1372";
            }
            if(substr($game->name, -2) == 'KA') {
                $extra .= '&g='.($game->name == 'TheKingOfDinosaursKA' ? 'TRex' : substr($game->name, 0, strlen($game->name)-2)).'&p=real&u=537851603&t=123&ak=accessKey&cr=USD&loc=en';
//                $extra .= '&g='.substr($game->name, 0, strlen($game->name)-2).'&p=real&u=537851603&t=123&ak=accessKey&cr=USD&loc=en';
            }

            if(substr($game->name, -2) == 'PT') {
                $extra .= '&preferedmode=real&session=';
            }

            if(substr($game->name, -3) == 'PTM') {
                $extra .= '&real=1&language=en&lang=en&hub=1&username=PLAYER&temptoken=_';
            }

            if ($isMobile)
                return array(
                    'game_url'=> config('app.url') . '/api/' . $game->name . '?token=' . $output . '&game=' . $gamePath . '&preferedmode=real&hub=1&quality=high&curr=' . $data['currency'] . '&cur=' . $data['currency'] . '&lang=en'.$extra,
                    'game'=> $game
                );
            else
                return array(
                    'game_url'=> config('app.url') . '/api/' . $game->name . '?token=' . $output . '&game=' . $gamePath . '&preferedmode=real&quality=high&curr=' . $data['currency'] . '&cur=' . $data['currency'] . '&lang=en'.$extra,
                    'game'=> $game
                );
        }

        public function runGame(\Illuminate\Http\Request $request)
        {
            $token = $request->query('token');

	    $output = str_replace('___', '=', $token);
            $output = explode(',', openssl_decrypt(base64_decode($token), $this->encrypt_method, $this->key, 0, $this->iv));
            $userId = $output[0];
            $gameID = $output[1];
            $time = $output[2];

            if (!$userId || !$gameID || !$time) {
                echo '{"responseEvent":"error","responseType":"start","serverResponse":"Invalid token"}';
                exit();
            }

            if (strtotime(date('d-m-y h:i:s')) - strtotime($time) > 3600) {
                echo '{"responseEvent":"error","responseType":"start","serverResponse":"This URL is expired"}';
                exit();
            }

            $user = \VanguardLTE\User::where(['id' => $userId])->first();

            \Illuminate\Support\Facades\Auth::login($user, true);
            $gameModel = new \VanguardLTE\Game;
            $gameInfo = $gameModel->getGameByID($gameID);

            if (!count($gameInfo->toArray())) {
                echo '{"responseEvent":"error","responseType":"start","serverResponse":"Game not exsits"}';
                exit();
            };

            $game = $gameInfo['name'];
            $game = \VanguardLTE\Game::where([
                'name' => $game,
            ]);

            $game = $game->first();
            if (!$game) {
                return redirect()->route('frontend.game.list');
            }
            if (!$game->view) {
                return redirect()->route('frontend.game.list');
            }
            $is_api = true;
            $device = "desktop";
            $object = '\VanguardLTE\Games\\' . $game->name . '\SlotSettings';
            // var_dump(class_exists($object));
            if (!class_exists($object)) {
                if(substr($game->name,-2) === "GT") {
                    return view('frontend.games.list.' . $game->name, compact('game', 'is_api', 'userId', 'device'));
                }
                abort(404);
            } else {
                $slot = new $object($game->name, $userId);
                return view('frontend.games.list.' . $game->name, compact('slot', 'game', 'is_api', 'userId', 'device'));
            }
        }

        public function runServer(\Illuminate\Http\Request $request, $game)
        {
            $userId = $request->query('sessionId');
            $user = \VanguardLTE\User::where(['id' => $userId])->first();
            \Illuminate\Support\Facades\Auth::login($user, true);

            if (\Illuminate\Support\Facades\Auth::check() && !auth()->user()->hasRole('user')) {
                echo '{"responseEvent":"error","responseType":"start","serverResponse":"Wrong User"}';
                exit();
            }

            if (!\Illuminate\Support\Facades\Auth::check()) {
                echo '{"responseEvent":"error","responseType":"start","serverResponse":"User not Authorized"}';
                exit();
            }
            
            // getBalance
            $user = \VanguardLTE\User::where('id', auth()->user()->id)->first();
            $apiData = \VanguardLTE\API::where('id', $user->api)->first();
            $stat_data = \VanguardLTE\StatGame::where('user_id', auth()->user()->id)->where('status', '<>', 1)->orderBy('id', 'desc')->first();
            $headers = [
                'authorization' => $apiData->keygen . "_" . $user->player,
                'Accept' => 'application/json'
            ];
            $res = null;
            try {
                $res = Http::withHeaders($headers)->get($apiData->get_endpoint);
            } catch (\Throwable $th) {
                file_put_contents(storage_path('logs/error.log'), $apiData->get_endpoint."====>Error to get balance!\n", FILE_APPEND);
            }
            if($res->successful()) {
                $balanceData = $res->json();
                if(isset($balanceData) && $balanceData['status'] == "OK") {
                    $user->balance = $balanceData['balance'];
                    $user->save();
                } else {
                    file_put_contents(storage_path('logs/error.log'), $apiData->get_endpoint."====>database eror get balance!".json_encode($res->json())."\n", FILE_APPEND);
                }
            } else {
                file_put_contents(storage_path('logs/error.log'), $apiData->get_endpoint."====>get balance  response Error!\n", FILE_APPEND);
            }
	        file_put_contents(storage_path('logs/prevrun.log'), auth()->user()->id."===".$game."====start====>".date('Y-m-d H:i:s')."\n", FILE_APPEND);
            if (isset($stat_data) && !$stat_data->status) {
                $stat_data->user_id = $user->player;
                $sendData = $stat_data->toArray();
                $response = null;
                try {
                    $response = Http::withHeaders($headers)->post($apiData->update_endpoint, array(
                        'data' => $sendData,
                    ));
                } catch (\Exception $e) {
                    file_put_contents(storage_path('logs/error.log'), $apiData->update_endpoint."====> Error to update balance!\n", FILE_APPEND);
                }
		        file_put_contents(storage_path('logs/prevrun.log'), auth()->user()->id."===".$game."====response====>".json_encode($response->json())."\n", FILE_APPEND);
                if ($response->successful()) {
                    $resData = $response->json();
                    if (!isset($resData)) {
                        file_put_contents(storage_path('logs/error.log'), $apiData->update_endpoint."====> update balance response error!\n", FILE_APPEND);
                    } else {
                        if ($resData['status'] == "OK") {
                            \VanguardLTE\User::where('id', auth()->user()->id)->update(['balance' => $resData['balance']]);
                        } else {
                            file_put_contents(storage_path('logs/error.log'), $apiData->update_endpoint."====> Database error to update balance!\n", FILE_APPEND);
                        }
                    }
                } else {
                    file_put_contents(storage_path('logs/error.log'), $apiData->update_endpoint."====> Update balance response is not json format!\n", FILE_APPEND);
                }
                \VanguardLTE\StatGame::where('id', $stat_data->id)->update(['status' => 1]);
                file_put_contents(storage_path('logs/prevrun.log'), auth()->user()->id."===".$game."====end====>".date('Y-m-d H:i:s')."\n", FILE_APPEND);
            }

            $subssession = \VanguardLTE\Subsession::where([
                'subsession' => $request->sessionId,
                'user_id' => auth()->user()->id
            ])->orderBy('created_at', 'desc')->first();
            if (settings('check_active_tab')) {
                if (!$request->sessionId) {
                    echo '{"responseEvent":"error","responseType":"start","serverResponse":"Wrong sessionId"}';
                    exit();
                }
                if ($subssession && !$subssession->active) {
                    echo '{"responseEvent":"error","responseType":"error","serverResponse":"Wrong sessionId"}';
                    exit();
                }
            }
            if (!$subssession) {
                $subssession = \VanguardLTE\Subsession::create([
                    'subsession' => $request->sessionId,
                    'user_id' => auth()->user()->id
                ]);
            }
            // file_put_contents(storage_path('logs/run.log'), auth()->user()->id."===".$game."====start====>".date('Y-m-d H:i:s')."\n", FILE_APPEND);
            \VanguardLTE\Subsession::where('id', '!=', $subssession->id)->where('user_id', auth()->user()->id)->update(['active' => 0]);
            $object = '\VanguardLTE\Games\\' . $game . '\Server';
            $server = new $object();
// file_put_contents(storage_path('logs/call.log'), $apiData->update_endpoint." print\n", FILE_APPEND);
            print_r($server->get($request, $game, auth()->user()->id));

            // file_put_contents(storage_path('logs/run.log'), auth()->user()->id."===".$game."====server pass====>".date('Y-m-d H:i:s')."\n", FILE_APPEND);

// file_put_contents(storage_path('logs/call.log'), $apiData->update_endpoint." is called\n", FILE_APPEND);

///////////// 2024.10.07 commented by william //////////////////
            // $stat_data = \VanguardLTE\StatGame::where('user_id', auth()->user()->id)->where('status', '<>', 1)->orderBy('id', 'desc')->first();
            // if (isset($stat_data) && !$stat_data->status) {
            //     $stat_data->user_id = $user->player;
            //     $sendData = $stat_data->toArray();
            //     $response = null;
            //     file_put_contents(storage_path('logs/run.log'), auth()->user()->id."===".$game."====pass====>".date('Y-m-d H:i:s')."\n", FILE_APPEND);
            //     try {
            //         $response = Http::withHeaders($headers)->post($apiData->update_endpoint, array(
            //             'data' => $sendData,
            //         ));
            //     } catch (\Exception $e) {
            //         file_put_contents(storage_path('logs/error.log'), $apiData->update_endpoint."====> Error to update balance!\n", FILE_APPEND);
            //     }

            //     if ($response->successful()) {
            //         $resData = $response->json();
            //         if (!isset($resData)) {
            //             file_put_contents(storage_path('logs/error.log'), $apiData->update_endpoint."====> update balance response error!\n", FILE_APPEND);
            //         } else {
            //             if ($resData['status'] == "OK") {
            //                 \VanguardLTE\User::where('id', auth()->user()->id)->update(['balance' => $resData['balance']]);
            //             } else {
            //                 file_put_contents(storage_path('logs/error.log'), $apiData->update_endpoint."====> Database error to update balance!\n", FILE_APPEND);
            //             }
            //         }
            //     } else {
            //         file_put_contents(storage_path('logs/error.log'), $apiData->update_endpoint."====> Update balance response is not json format!\n", FILE_APPEND);
            //     }
            //     \VanguardLTE\StatGame::where('id', $stat_data->id)->update(['status' => 1]);
            //     file_put_contents(storage_path('logs/run.log'), auth()->user()->id."===".$game."====end====>".date('Y-m-d H:i:s')."\n", FILE_APPEND);
            // }
////////////////////////////////////////////////////////////////
        }
    }
}
