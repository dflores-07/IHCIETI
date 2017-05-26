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
    protected $fillable = ['type', 'lidnumber',
        'fname', 'sname',
        'birthdate','genre',
        'province', 'city', 'school',
        'Email', 'phone', 'cellphone',
        'address'];


    
    protected $hidden = [
        'password', 'remember_token',
    ];
}