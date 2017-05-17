@extends("layout")
<link type="text/css" href="css/ShowRooms.css" rel="stylesheet">
<script src="js/RoomsEfects.js"></script>

@section("Contend")
@if(Auth::check())
<form action="{{url('When')}}" method="post">
<div class="row">
        
        <div class="col-lg-1"></div>
        <div class="col-lg-3 alert alert-info" id="select-column">
            <div id="message">
                Choose one of the following rooms to make a reservation on it, they all have different gadgets so watch the descriptions below.
            </div>
         <h1>Select a room</h1>
         </div>
        <div class="col-lg-4">
        </div>
        <div class="col-lg-3">
                        @include("Partials/errors")
        </div>
        <div class="col-lg-1">
        </div>
</div>
<div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10" id="RoomList">
            <!-- INFO -->

            <div class="Data">
                <!-- Date -->
                <div class='input-group date' id='datetimepicker1'>
                    <input type='date' class="form-control" id="dates" name="WishDate" value="" required/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="Data">
                <span>On: 
                    <!-- Location -->
                  <span class="label label-primary">{{ $Location }}</span>            
                </span>
            </div>
             @foreach ($rooms as $room)
            <div class="roomdesc shadow" >
                <div class="contend-room">
                <input type='hidden' value='{{ $room->ROOM_ID }}' disabled id='roomId'>
                <h4>Room Name: <span class="info">{{ $room->NAME }}</span></h4>
                <h4>Room Title: <span class="info">{{ $room->TITLE }}</span></h4>
                <h4>Gadgets: <span class="info">{{ $room->GADGETS }}</span></h4>
                 </div>
            </div>
             @endforeach
             <input type="hidden" name="_token" value="{{csrf_token()}}">
             <input type='hidden' value='' name='room' id='Pick' required>
             <input type="submit" value='Continue' id='Next'>
        </div>
        <div class="col-lg-1">
            <!-- Room selected -->
        </div>
</div>
     </form>
@endif
@endsection
