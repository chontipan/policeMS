<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class AddressPresent extends Model {
    use SoftDeletes;

    public $timestamps = true;
    protected $table = 'addresspresent';
    protected $fillable = array('present_address','present_tel'
    ,'created_at','updated_at');
    public function criminalhistory()
    {
        return $this->hasOne('App\Models\CriminalHistory');
    }
    public function guesthistory()
    {
        return $this->hasOne('App\Models\GuestHistory');
    }

}