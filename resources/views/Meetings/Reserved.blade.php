@extends("layout")
<script src='js/hourSelector.js' type='text/javascript'></script>
<link type="text/css" href="css/ShowRooms.css" rel="stylesheet">

@section("Contend")
<div class="container">

    <div class="row">
        <div class="col-lg-3">
            
        </div>
    <div class="col-lg-6" id="newuser">
        <input type="hidden" id="ChosenD" value="{{$date}}">
        <h2><strong>New meeting on  <span id="today"> </span>.</strong></h2>
        <div class="alert alert-info"><p><strong>An email has been sent to all users that were invited to this meeting. The meeting holds from: {{$from}} to: {{$to}}</strong>
                <a id="urlClick" href="Welcome" class='btn btn-primary'>Home</a></p></div>
        </div>
         <div class="col-lg-3">
             
         </div>
    </div>
    </div>
@endsection