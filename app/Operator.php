<?php

namespace VanguardLTE {
    class Operator extends \Illuminate\Database\Eloquent\Model
    {
        protected $table = 'operators';
        protected $fillable = [
            'opid',
            'ucurl',
            'cburl',
        ];
        public $timestamps = false;
        public static function boot()
        {
            parent::boot();
        }
    }
}
