<?php
namespace App\Models;
use App\Events\AddDataPersonEvent;
use \Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;



class Policeimmigration extends Model implements AuthenticatableContract {
    use Authenticatable;
    use SoftDeletes;

    public $timestamps = true;
    protected $table = 'policeimmigration';
    protected $fillable = array('name_police','surname_police','tel_police','username','photo');

    protected $hidden = ['password'];



    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }


    public function criminalhistory()
    {
        return $this->hasMany('App\Models\CriminalHistory','criminalhistory_id');
    }
    public function guesthistory()
    {
        return $this->hasMany('App\Models\GuestHistory','guesthistory_id');
    }

    public function rank()
    {
        return $this->belongsTo('App\Models\Rank');
    }
    public function position()
    {
        return $this->belongsTo('App\Models\Position');
    }
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

}