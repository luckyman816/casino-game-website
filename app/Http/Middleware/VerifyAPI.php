<?php

namespace VanguardLTE\Http\Middleware {
    class VerifyAPI
    {
        protected $auth = null;

        protected $except = [
            '/login'
        ];
        public function __construct(\Illuminate\Contracts\Auth\Factory $auth)
        {
            $this->auth = $auth;
        }
        public function handle($request, \Closure $next)
        {
            if ($request->is('backend*') || $request->is('refresh-csrf') || $request->routeIs('player.game.server') || $request->routeIs('player.game.run')) {
                return $next($request);
            }
            $requestAPI = $request->header('api');
            $apis = \VanguardLTE\API::get();
            $state = false;
            if (count($apis) > 0) {
                foreach ($apis as $api) {
                    if ($requestAPI == $api->keygen) {
                        $state = true;
                    }
                }
                if ($state)
                    return $next($request);
                else {
                    return response()->json([trans('Your api is not registered!!!')], 500);
                }
            } else {
                return response()->json([trans('Your api is not registered!!!')], 500);
            }
        }
    }
}
