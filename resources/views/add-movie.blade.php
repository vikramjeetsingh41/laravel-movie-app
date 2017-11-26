@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Add Movie</strong></div>
                    <div class="panel-body">
                        <form name="movieAddFrm" id="movieAddFrm" action="{{route('action-movie-add')}}" method="post">     
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                                <table class="table">
                                    <tr>
                                        <td>Name:</td>
                                        <td>
                                            <input type="text" name="movie_name" class="form-control" id="movie_name" value="" />
                                            @if($errors->has("movie_name"))
                                                {!!$errors->first("movie_name", "<span class='error-failure'>:message</span>")!!}
                                            @endif
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>Description:</td>
                                        <td>
                                            <textarea name="movie_description" class="form-control" id="movie_description"></textarea>
                                            @if($errors->has("movie_description"))
                                                {!!$errors->first("movie_description", "<span class='error-failure'>:message</span>")!!}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>                                    
                                        <td>
                                            <input type="submit" name="addComment" value="Add Movie" class="btn btn-success" />                                               
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
