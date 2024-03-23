<?php

namespace App\Laratables;

class UserLaratable
{    
       
    public static function laratablesAdditionalColumns()
    {
        return ['id', 'name', 'middle_name', 'surname', 'status'];
    } 
    public static function laratablesCustomAction($user)
    {
        return view('admin.users.index_action',['user'=>$user])->render();
    }
    public static function laratablesCustomRole($user)
    {
        return view('admin.users.index_role',['user'=>$user])->render();
    }
    public static function laratablesCustomStatus($user)
    {
        return view('admin.users.index_status',['user'=>$user])->render();
    }
    public static function laratablesCustomLog($user)
    {
        return view('admin.users.index_log',['user'=>$user])->render();
    }
    public static function laratablesCustomFullName($user)
    {
        return view('admin.users.index_full_name',['user'=>$user])->render();
    }

    public static function laratablesQueryConditions($query)
    {
        return $query->select('users.*')
        ->leftJoin('user_roles','user_roles.user_id','users.id')
        //->where('user_roles.role_id', '!=', 1)
        ->orderBy('users.surname', 'ASC');
    }
}