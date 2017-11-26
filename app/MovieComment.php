<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovieComment extends Model
{
    
    protected $table = "movie_comments";    
    
    public function getMovieCommentsById($id){
        
        //echo $id; die;
        $movie_comments = $this::join('users', 'users.id', '=', 'movie_comments.user_id')->where(array("status" => 1, "movie_id" => $id))->orderBy("users.id", "DESC")->orderBy("movie_comments.id", "DESC")->select("users.name", "users.id as user_id", "movie_comments.comment", "movie_comments.created_at", "movie_comments.updated_at")->get();
        if($movie_comments->count() > 0){
            return $movie_comments;
        }else{
            return 0;
        }
        
    }
    
}
