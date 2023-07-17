<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Http\Resources\v1\GenericResourceCollection;
use Illuminate\Support\Facades\Auth;

class GenericController
{
    function list(Request $request) {

        $query = DB::table($request->table);

        if($where = $request->where){
            foreach ($where as $key => $value) {
                if ($key === 'role_id' && !\is_numeric($value)) {
                    $value = User::getRole($value);
                }
                if(\is_array($value))
                 $query->where($key, $value['operator'], $value['value']);
                else
                 $query->where($key,$value);
            }
            
        }
        
        return ($perPage = $request->get('per_page'))
        ? new GenericResourceCollection($query->paginate($perPage), $request->fields)
        : new GenericResourceCollection($query->get(), $request->fields);

    }

    function item(Request $request) {

        $query = DB::table($request->table);

        if($fields = $request->fields){
            foreach ($fields as $value) {
                $query->addSelect($value);
            }
        }

        if($where = $request->where){
            foreach ($where as $key => $value) {
                if ($key == 'role_id' && !\is_numeric($value)) {
                    $value = User::getRole($value);
                }
                if(\is_array($value))
                 $query->where($key, $value['operator'], $value['value']);
                else
                 $query->where($key,$value);
            }
            
        }
        
        return Response::json($query->first());

    }

    function video_status_view(){
        $user = Auth::user();
        $userP =  $user ? Auth::user()->userProfile()->first() : null;
        $update=false;
        if($userP){
            $userP->video_status_view = true;
            $userP->save();
            $update = true;
         } 

        return Response::json($update);
    }

    function get_video_status_view(){
        $user = Auth::user();
        $userP =  $user ? Auth::user()->userProfile()->first() : null;
        $get = $userP ? $userP->video_status_view: false;
        return Response::json($get);
    }
}
