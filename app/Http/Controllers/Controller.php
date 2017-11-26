<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    protected function getMovieCommentAssocArray($data){
        
        $result = array();
        $current_user_id = 0;
        $i = 0;
        if(!empty($data)){
            foreach($data as $data_key => $data_value){
               
                if(empty($result) && !$current_user_id){
                    
                    $result[$data_value->name.'_'.$data_value->user_id][$i]["comment"] = $data_value->comment;
                    $result[$data_value->name.'_'.$data_value->user_id][$i]["created_at"] = $data_value->created_at;
                    $result[$data_value->name.'_'.$data_value->user_id][$i]["updated_at"] = $data_value->updated_at;                    
                    $current_user_id = $data_value->user_id;
                    $i++;
                    
                }else if(!empty($result) && $current_user_id > 0){
                    if($current_user_id == $data_value->user_id){
                        $result[$data_value->name.'_'.$data_value->user_id][$i]["comment"] = $data_value->comment;
                        $result[$data_value->name.'_'.$data_value->user_id][$i]["created_at"] = $data_value->created_at;
                        $result[$data_value->name.'_'.$data_value->user_id][$i]["updated_at"] = $data_value->updated_at;                        
                        $current_user_id = $data_value->user_id;
                        $i++;
                    }else{
                       $result[$data_value->name.'_'.$data_value->user_id][$i]["comment"] = $data_value->comment;
                        $result[$data_value->name.'_'.$data_value->user_id][$i]["created_at"] = $data_value->created_at;
                        $result[$data_value->name.'_'.$data_value->user_id][$i]["updated_at"] = $data_value->updated_at;                       
                        $current_user_id = $data_value->user_id;
                        $i = 0; 
                    }
                }
            }
        }
        return $result;
    }
}
