@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Movie Detail</div>
                    @if(session('success'))                        
                        <ul>                            
                            <li>{{ session('success') }}</li>                            
                        </ul>                            
                    @endif
                    <div class="panel-body">
                        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                            <table class="table">
                                <tr>
                                    <td>Name:</td>
                                    <td>{{ucfirst($movie->name)}}</td>
                                </tr> 
                                <tr>
                                    <td>Description:</td>
                                    <td>{{ucfirst($movie->description)}}</td>
                                </tr> 
                                <tr>
                                    <td>Status:</td>
                                    <td>@if($movie->status == 1){{ucfirst("Active")}}@else{{ucfirst("InActive")}}@endif</td>
                                </tr>
                                <tr>
                                    <td>Created At:</td>
                                    <td>{{date('Y-m-d', strtotime($movie->created_at))}}</td>
                                </tr>
                                <tr>
                                    <td>Updated At:</td>
                                    <td>{{date('Y-m-d', strtotime($movie->updated_at))}}</td>
                                </tr> 
                            </table>
                        </div>                 
                    </div>                    
            </div>            
             <div class="panel-group" id="accordion">
                 @if(!empty($comments))
                     @foreach($comments as $comm_key => $comment)                      
                        <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$comm_key}}">
                                {{ucfirst(substr($comm_key,0, -2))}}</a>
                                <a class="btn btn-success btn-xs" style="float:right;" href="{{route('add-movie-comment', ['id' => $movie->id ])}}">Add Comment</a>
                              </h4>
                            </div>
                            <div id="collapse{{$comm_key}}" class="panel-collapse collapse in">
                                @if(!empty($comment))
                                    @foreach($comment as $comm_key => $com_value)
                                        <div class="panel-body">{!!$com_value['comment']!!}</div>
                                    @endforeach
                                @endif
                            </div>
                        </div> 
                     @endforeach
                 @else                 
                 <a class="btn btn-success btn-xs" style="float:right;" href="{{route('add-movie-comment', ['id' => $movie->id ])}}">Add Comment</a>                 
                 @endif
            </div> 
        </div>        
    </div>
    
</div>
@endsection
