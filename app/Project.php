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
        return $this->hasMany('App\Member','project_id','id')->orderBy('type','DESC');
    }

    public function membersLeader()
    {
        return $this->hasMany('App\Member','project_id','id')->where('type','members');
    }

    public function getWhoHasReceivedHelpAttribute($data)
    {
        if($data == 'on'):
            $ayuda ='si';
        else:
            $ayuda = 'no';
        endif;

        return $ayuda;
    }

    public function getTypeProjectAttribute($data)
    {
        if($data == 'on'):
            $ayuda ='si';
        else:
            $ayuda = 'no';
        endif;

        return $ayuda;
    }
}
