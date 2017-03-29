<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DataMother extends Model {
    use SoftDeletes;

    public $timestamps = true;
    protected $table = 'datamother';
    protected $fillable = array('nametitle','mother_name','mother_surname','mother_age'
    ,'mother_live_died','mother_address','mother_nameoffice_tel',
        'created_at','updated_at','mother_career','mother_nameoffice','mother_tel');
    public function criminalhistory()
    {
        return $this->hasOne('App\Models\CriminalHistory');
    }

    public function guesthistory()
    {
        return $this->hasOne('App\Models\GuestHistory');
    }

}