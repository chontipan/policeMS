<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class InsertPoliceRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST':
            {
                return [
                    "name_police" => "max:255|required",
                    "surname_police" => "max:255|required",
                    "password" => "max:255|required",
                    "rank" => "max:255|required",
                    "position" => "max:255|required",
                    "username" => "max:255|unique:policeimmigration,username,NULL,id,deleted_at,NULL|required",
                    "vpassword"=> "max:255|same:password|required",
                    "role"=> "max:255|required"
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                  //  "username" => "max:255|unique:policeimmigration,username,NULL,id,deleted_at,NULL|required",
                    "name_police" => "max:255|required",
                    "surname_police" => "max:255|required",
                    "password" => "max:255",
                   // "rank" => "max:255|required",
                   // "position" => "max:255|required",
                    "vpassword"=> "max:255|same:password",
                    "role"=> "max:255|required"
                ];
            }
            default:break;
        }
    }


    public function messages()
    {
        return [
            'role.required' => "กรุณาเลือกสิทธิการเข้าใช้งาน",
            'username.required' => "กรุณากรอก ชื่อผู้ใช้",
            'username.unique' => "ชื่อผู้ใช้ นี้มีในระบบแล้ว",
            'password.required' => "กรุณากรอก รหัสผ่าน",
            'vpassword.required' => "กรุณากรอก ยืนยันรหัสผ่าน",
            'rank.required' => "กรุณากรอกระบุคำนำหน้าชื่อ",
            'position.required' => "กรุณากรอกระบุตำแหน่ง",
            'name_police.required' => "กรุณากรอกชื่อเจ้าหน้าที่",
            'surname_police.required' => "กรุณากรอกนามสกุลเจ้าหน้าที่",
            'vpassword.same' => "Password ทั้งสองช่องไม่ตรงกัน",

        ];
    }


}
