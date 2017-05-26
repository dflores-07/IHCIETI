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
    protected $fillable = ['type', 'idnumber', ['members','leader']
        'fname', 'flname', 'slname'
        'birthdate','genre',
        'province', 'city', 'school',
        'email', 'phone', 'cellphone',
        'address', 'project_id', 'user_id', 'id', 'leader'];


   

    
   
}