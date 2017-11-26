@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Comments for <strong>{{$movie_name}}</strong></div>
                    <div class="panel-body">
                        <form name="movieCommentFrm" id="movieCommentFrm" action="{{route('action-movie-comment-add')}}" method="post">
                            <input type="hidden" name="movie_id" value="{{$id}}" /> 
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                                <table class="table">                                    
                                    <tr>
                                        <td>Description:</td>
                                        <td>
                                            <textarea name="movie_comment" class="form-control" id="movie_comment"></textarea>
                                            @if($errors->has("movie_comment"))
                                                {!!$errors->first("movie_comment", "<span class='error-failure'>:message</span>")!!}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>                                    
                                        <td>
                                            <input type="submit" name="addComment" value="Add Comment" class="btn btn-success" />                                               
                                        </td>
                                    </tr> 

                                </table>
                            </div>
                        </form>
                    </div>                    
            </div>           
             
        </div>        
    </div>
    
</div>
@endsection
