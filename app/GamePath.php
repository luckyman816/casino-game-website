<?php
namespace VanguardLTE
{
    class GamePath extends \Illuminate\Database\Eloquent\Model
    {
        protected $table = 'game_path';
        protected $fillable = [
            'game',
            'path',
        ];
        public $timestamps = false;
        public static function boot()
        {
            parent::boot();
        }
    }

}
