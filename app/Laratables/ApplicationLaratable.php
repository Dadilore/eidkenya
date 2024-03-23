<?php

namespace App\Laratables;

class ApplicationLaratable
{    
    public static function laratablesCustomAction($application)
    {
        return view('admin.applications.index_action',['application'=>$application])->render();
    }
}