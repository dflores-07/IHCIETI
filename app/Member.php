<?php
/**
 * Created by PhpStorm.
 * User: anwarsarmiento
 * Email: asarmiento@sistemasamigables.com
 * Date: 24/5/17
 * Time: 21:56
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'type',
        'idnumber',
        'fname',
        'flname',
        'slname',
        'birthdate',
        'gender',
        'province',
        'city',
        'school',
        'email',
        'phone',
        'cellphone',
        'address',
        'project_id',
        'user_id',
        'token'
    ];

    public function getRules()
    {
        return [
            'type'=>'required',
            'idnumber'=>'required',
            'fname'=>'required',
            'flname'=>'required',
            'slname'=>'required',
            'birthdate'=>'required',
            'gender'=>'required',
            'province'=>'required',
            'city'=>'required',
            'school'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'cellphone'=>'required',
            'token'=>'required',
            'address'=>'required'
        ];
    }

    public function isValid($data) {

        $rules  = $this->getRules();

        if ($this->exists) {
            $rules  =  $this->getUnique($rules,$data);
        }

        $validator = \Validator::make($data, $rules);

        if ($validator->passes()) {
            return true;
        }

        $this->errors = $validator->errors();

        return false;
    }
   

    public function nameComplete()
    {
        return $this->fname.' '. $this->flname.' '. $this->slname;
    }
   
}