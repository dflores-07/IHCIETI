<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable =['name','description','sector','budget','budgetfile',
        'has_received_help','who_has_received_help','whohelp','helpcount','observation'];
}
