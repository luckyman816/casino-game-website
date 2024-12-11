<?php
namespace VanguardLTE
{
    class API extends \Illuminate\Database\Eloquent\Model
    {
        protected $table = 'apis';
        protected $fillable = [
            'keygen',
            'ip',
            'update_endpoint',
            'get_endpoint',
            'shop_id',
            'status'
        ];
        public $timestamps = false;
        public static function boot()
        {
            parent::boot();
        }
        public function shop()
        {
            return $this->belongsTo('VanguardLTE\Shop', 'shop_id');
        }
    }

}
