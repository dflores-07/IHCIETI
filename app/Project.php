<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable =['name','description','sector','budget','budgetfile','code',
        'has_received_help','who_has_received_help','whohelp','helpcount','observation'];

    public function members()
    {
        return $this->hasMany('App\Member','project_id','id');
    }
}
