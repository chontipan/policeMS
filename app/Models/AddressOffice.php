<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class AddressOffice extends Model {
    //use SoftDeletes;

    public $timestamps = true;
    protected $table = 'addressoffice';
    protected $fillable = array('office','office_address','office_tel'
    ,'created_at','updated_at');

    public function criminalhistory()
    {
        return $this->belongsTo('App\Models\CriminalHistory');
    }

    public function guesthistory()
    {
        return $this->belongsTo('App\Models\GuestHistory');
    }


}