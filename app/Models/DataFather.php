<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DataFather extends Model {
    use SoftDeletes;

    public $timestamps = true;
    protected $table = 'datafather';
    protected $fillable = array('nametitle','father_name','father_surname','father_age'
    ,'father_live_died','father_address','created_at','updated_at','father_career'
    ,'father_nameoffice','father_tel','father_nameoffice_tel');
    public function criminalhistory()
    {
        return $this->hasOne('App\Models\CriminalHistory');
    }

    public function guesthistory()
    {
        return $this->hasOne('App\Models\GuestHistory');
    }
}