<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DataCase extends Model {
    use SoftDeletes;

    public $timestamps = true;
    protected $table = 'datacase';

    protected $fillable = array('file_case','number_case','circumstances_case'
    ,'date_case','houseno_case','villageno_case','road_case','lane_alley_case','subdistrict_case','disreict_case'
    ,'province_case','contry_case','name_case','station_number_case','year_number_case','status'
    ,'name_police','surname_police','rank_police','tel_police');



    public function criminalhistory()
    {
        return $this->belongsToMany('App\Models\CriminalHistory','criminalhistory_datacase','datacase_id','criminalhistory_id');
    }

    public function vehicle()
    {
        return $this->hasMany('App\Models\Vehicle','datacase_id');
    }

    public function weapon()
    {
        return $this->hasMany('App\Models\Weapon','datacase_id');
    }
}