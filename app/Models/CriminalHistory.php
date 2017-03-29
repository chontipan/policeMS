<?php
namespace App\Models;
use App\Events\AddDataPersonEvent;
use App\Events\DataPerson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Event;

class CriminalHistory extends Model {
    use SoftDeletes;

    public $timestamps = true;
    protected $table = 'criminalhistory';
    protected $fillable = array('date','name','surname','age','birth','alias','idcard','education','height','weight','shape'
    ,'teeth','skin','hairstyles','head','face','eyebrow','eye','ear','nose','mouth','chin','mirror','scar','accent','nature'
    ,'personality','location_gallivent','other','typepeople','career','status','typeidcard','nametitle');


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

    public function addressoffice()
    {
        return $this->hasMany('App\Models\AddressOffice','criminalhistory_id');
    }
    public function datachild()
    {
        return $this->hasMany('App\Models\DataChild','criminalhistory_id');
    }
    public function datacase()
    {
        return $this->belongsToMany('App\Models\DataCase','criminalhistory_datacase','criminalhistory_id','datacase_id');
    }

    public function policeimmigration()
    {
        return $this->belongsTo('App\Models\Policeimmigration');
    }




}