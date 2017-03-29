<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DataSpouse extends Model {
    use SoftDeletes;

    public $timestamps = true;
    protected $table = 'dataspouse';
    protected $fillable = array('nametitle','spouse_name','spouse_surname','spouse_age'
    ,'spouse_live_died','spouse_address','spouse_nameoffice_tel','spouse_nameoffice_tel','created_at','updated_at',
        'spouse_career','spouse_nameoffice','spouse_tel');
    public function criminalhistory()
    {
        return $this->hasOne('App\Models\CriminalHistory');
    }

    public function guesthistory()
    {
        return $this->hasOne('App\Models\GuestHistory');
    }


}