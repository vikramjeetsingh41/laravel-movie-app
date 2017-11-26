<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ["except" => ["ajaxMovieList", "getMovieDetail", "addMovie", "addMovieAction"]]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    public function ajaxMovieList(Request $request){        
        
        if($request->ajax()){

            $obj_movie = new \App\Movie();
            $movies = $obj_movie->getMovieList();           
            //echo "<pre>";
            //print_r($movies); die;
            if(!empty($movies)){
                foreach($movies as $key => $movie){
                    
                    $movie->action = '<a href="'.route('ajax-movie-detail', ["id" => $movie->id]).'">View</a>';
                }                
            }
            return response()->json([
                'error' => 0,
                'data' => $movies
            ]);

        }else{
            return response()->json([
                'error' => 1,
                'msg' => 'This is not valid request.'
            ]);
        }
                
        
        
    }
    
    public function getMovieDetail(Request $request, $movie_id)
    {
        $obj_movie = new \App\Movie();
        $obj_movie_comments = new \App\MovieComment();
        $movie_detail = $obj_movie->getMovieDetailById($movie_id);
        $movie_comments = $this->getMovieCommentAssocArray($obj_movie_comments->getMovieCommentsById($movie_id));
        //echo "<pre>";
        //print_r($movie_comments); die;
        return view('movie-detail', ["movie" => $movie_detail, "id" => $movie_id, "comments" => $movie_comments]);
    }
    
    public function showMovieComment(Request $request, $movie_id)
    {
        $obj_movie = new \App\Movie();
        $movie_name = $obj_movie->getMovieNameById($movie_id);
        return view('movie-comment', [ "id" => $movie_id, "movie_name" => $movie_name]);
    }
    
    public function addMovieCommentAction(Request $request)
    {
        //echo "ok"; die;
        $messages = [
            'required' => 'The :attribute is required.',
        ];
        $this->validate($request, [
            'movie_comment' => 'required|max:255'
        ],$messages);            
        //saving users in database
        $movie_comment = new \App\MovieComment();       
        $movie_comment->user_id = Auth::user()->id;
        $movie_comment->movie_id = $request->movie_id;
        $movie_comment->comment = addslashes($request->movie_comment);        
        $movie_comment->status = 1;        
        $movie_comment->save();
        return redirect()->route('ajax-movie-detail', ["id" => $request->movie_id])->with("success", "Comment has been added successfully.");
            
        
    }
    
    public function addMovie(){
        
        return view('add-movie');
        
    }
    public function addMovieAction(Request $request)
    {
        //echo "ok"; die;
        $messages = [
            'required' => 'The :attribute is required.',
        ];
        $this->validate($request, [
            'movie_name' => 'required|max:255',
            'movie_description' => 'required'
        ],$messages);            
        //saving users in database
        $movie = new \App\Movie();       
        $movie->name = $request->movie_name;        
        $movie->description = addslashes($request->movie_description);        
        $movie->status = 1;        
        $movie->save();
        return redirect()->route('welcome')->with("success", "Movie has been added successfully.");
            
        
    }
    
}
