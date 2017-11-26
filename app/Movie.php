<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    
    protected $table = "movies";
    //
    public function getMovieList(){
        
        $movies = $this::orderBy("id", "DESC")->select("id", "name", "status", "created_at", "updated_at")->get();    
        //echo "<pre>";
        //print_r($movies); die;
        if($movies->count() > 0){
            return $movies;
        }else{
            return 0;
        }
    }
    
    public function getMovieDetailById($id){
        $movie_detail = $this::where("id", $id)->select("id", "name","description", "status", "created_at", "updated_at")->first();    
        //echo "<pre>";
        //print_r($movies); die;
        if($movie_detail != NULL){
            return $movie_detail;
        }else{
            return 0;
        }
    }
    
    public function getMovieNameById($id){
        
        $movie_detail = $this::where("id", $id)->select("name")->first();    
        //echo "<pre>";
        //print_r($movies); die;
        if($movie_detail != NULL){
            return $movie_detail->name;
        }else{
            return 0;
        }
        
    }
    
    
}
