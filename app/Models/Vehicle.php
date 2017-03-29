<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Vehicle extends Model {
    //use SoftDeletes;

    public $timestamps = true;
    protected $table = 'vehicle';
    protected $fillable = array('vehicle_brand','vehicle_generation','vehicle_number','vehicl_color','vehicle_group','vehicle_province','datacase_id');
    public function guesthistory()
    {
        return $this->belongsTo('App\Models\GuestHistory');
    }

    public function datacase()
    {
        return $this->belongsTo('App\Models\DataCase');
    }


}