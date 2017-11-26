<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sample App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/datatable.css') }}" rel="stylesheet">
        <link href="{{ asset('css/datatable.responsive.bootstrap.min.css') }}" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('add-movie') }}">Add Movie</a>
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('add-movie') }}">Add Movie</a>
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif            
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="content">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="alert alert-success">
                            @if(session('success'))                        
                                <ul>                            
                                    <li>{{ session('success') }}</li>                            
                                </ul>                            
                            @endif                                
                            </div> 
                        </div>
                        <table id="resp_table_data" class="display table" cellspacing="0" width="100%">
                            <thead>
                              <tr> 
                                <th>ID</th>  
                                <th>Name</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Action</th>  
                              </tr>
                            </thead>                
                          </table>  
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/datatable.js') }}"></script>        
        <script type="text/javascript">            
            $(document).ready(function(){
                var table = $('#resp_table_data').DataTable( {
                responsive: true,
                "processing": true,
                "ajax": "{{route('ajax-movie-list')}}",
                "columns": [
                    { "data": "id" },            
                    { "data": "name" },
                    { "data": "status" },
                    { "data": "created_at" },
                    { "data": "updated_at" },
                    { "data": "action" }

                ],
                "lengthMenu": [[5, 10, -1], [5, 10, "All"]],
                "order": [[ 0, "desc" ]],
        "pagingType": "numbers"
            } );
                
        });
        </script>
    </body>
</html>
