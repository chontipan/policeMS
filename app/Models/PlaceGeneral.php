<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PlaceGeneral extends Model {
    //use SoftDeletes;

    public $timestamps = true;
    protected $table = 'place_general';
    protected $fillable = array('place_name','place_address','place_tel','owner_name','owner_age'
    ,'personfamily_address','created_at','updated_at','child_career','personfamily_nameoffice','personfamily_tel'
    ,'personfamily_nameoffice_tel','personfamily_career');

    public function place_general()
    {
        return $this->belongsTo('App\Models\GuestHistory');
    }

}