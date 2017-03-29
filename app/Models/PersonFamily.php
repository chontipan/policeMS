<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PersonFamily extends Model {
    //use SoftDeletes;

    public $timestamps = true;
    protected $table = 'personfamily';
    protected $fillable = array('nametitle','personfamily_idnumber','personfamily_name','personfamily_surname','personfamily_age'
    ,'personfamily_address','created_at','updated_at','child_career','personfamily_nameoffice','personfamily_tel'
    ,'personfamily_nameoffice_tel','personfamily_career');

    public function guesthistory()
    {
        return $this->belongsTo('App\Models\GuestHistory');
    }

}