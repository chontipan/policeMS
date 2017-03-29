<?php namespace App\Http\Controllers\API;

use App\Events\MyLog;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\InsertPoliceRequest;

use App\Models\Position;
use App\Models\Rank;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\PoliceImmigration;
use \Hash;
use Illuminate\Support\Facades\View;
use \Input;
use Rhumsaa\Uuid\Uuid;

class PoliceApiController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return PoliceImmigration::with('rank','position','role')->get();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(InsertPoliceRequest $request)
	{
        $model_police = new PoliceImmigration();
        $model_police->fill(Input::except(['_token']));
        $model_police->password = Hash::make(Input::get('password'));
        if(Input::has('position.id')){
            $position = Position::find(Input::get('position.id'));
            $model_police->position()->associate($position);
        }
        if(Input::has('rank.id')){
            $rank = Rank::find(Input::get('rank.id'));
            $model_police->rank()->associate($rank);
        }
        if(Input::has('role.id')){
            $role = Role::find(Input::get('role.id'));
            $model_police->role()->associate($role);
        }
        $model_police->save();





        return $model_police;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

       return PoliceImmigration::with('rank','position','role')->find($id);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return PoliceImmigration::with('rank','position','role')->find($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(InsertPoliceRequest $request,$id)
	{

        $user = PoliceImmigration::find($id);;
        $user->fill(Input::except(['password']));
        if(Input::get('password')){
           // return Input::get('password');
            $user->password = Hash::make(Input::get('password'));
        }

        if(Input::has('position.id')){
            $position = Position::find(Input::get('position.id'));
            $user->position()->associate($position);
        }
        if(Input::has('rank.id')){
            $rank = Rank::find(Input::get('rank.id'));
            $user->rank()->associate($rank);
        }
        if(Input::has('role.id')){
            $role = Role::find(Input::get('role.id'));
            $user->role()->associate($role);
        }

        $user->save();

        return $user;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

        $police = PoliceImmigration::find($id);

        if($police){
            PoliceImmigration::find($id)->delete();

            return $police;
        }
        return $police ;

    }

    public function savePhotoPolice($id)
    {
        $photo = PoliceImmigration::find($id);
        $uuid = Uuid::uuid4();
        $public_path= "photo/police/$id/";
        $destination_path = public_path($public_path);
        $ext = Input::file('file')->getClientOriginalExtension();

        Input::file('file')->move($destination_path,"$uuid.$ext");


        $photo->photo = "/photo/police/$id/$uuid.$ext";
        $photo->save();
        return $photo;

//s
    }

}
