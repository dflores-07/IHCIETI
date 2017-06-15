<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable =['code','name','budget','description','budgetfile','sector',
        'has_received_help','who_helpOther','who_has_received_help','helpcount','whohelp','type_project'];

    public function members()
    {
        return $this->hasMany('App\Member','project_id','id');
    }

    public function membersLeader()
    {
        return $this->hasMany('App\Member','project_id','id')->where('type','leader');
    }
}
