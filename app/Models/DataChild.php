<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DataChild extends Model {
    //use SoftDeletes;

    public $timestamps = true;
    protected $table = 'datachild';
    protected $fillable = array('nametitle','child_name','child_surname','child_age','child_address'
    ,'child_live_died','created_at','updated_at','child_career','child_nameoffice','child_tel','criminalhistory_id'
    ,'guesthistory_id');

    public function criminalhistory()
    {
        return $this->belongsTo('App\Models\CriminalHistory','criminalhistory_id');
    }

    public function guesthistory()
    {
        return $this->belongsTo('App\Models\GuestHistory','guesthistory_id');
    }

}