<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class GuestHistory extends Model {
    use SoftDeletes;

    public $timestamps = true;
    protected $table = 'guesthistory';
    protected $fillable = array('nametitle','date','name','surname','age','birth','idcard','typepeople'
    ,'career' ,'created_at','updated_at','other','status','typeidcard');

    public function dataspouse()
    {
        return $this->belongsTo('App\Models\DataSpouse');
    }
    public function datamother()
    {
        return $this->belongsTo('App\Models\DataMother');
    }
    public function datafather()
    {
        return $this->belongsTo('App\Models\DataFather');
    }

    public function addressoriginal()
    {
        return $this->belongsTo('App\Models\AddressOriginal');
    }
    public function addresspresent()
    {
        return $this->belongsTo('App\Models\AddressPresent');
    }

    public function policeimmigration()
    {
        return $this->belongsTo('App\Models\Policeimmigration');
    }


    public function addressoffice()
    {
        return $this->hasMany('App\Models\AddressOffice','guesthistory_id');
    }



    public function vehicle()
    {
        return $this->hasMany('App\Models\Vehicle','guesthistory_id');
    }
    public function personfamily()
    {
        return $this->hasMany('App\Models\PersonFamily','guesthistory_id');
    }
    public function employee()
    {
        return $this->hasMany('App\Models\Employee','guesthistory_id');
    }
    public function datachild()
    {
        return $this->hasMany('App\Models\DataChild','guesthistory_id');
    }


}