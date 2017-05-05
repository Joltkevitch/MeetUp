@extends("layout")
<link type="text/css" href="css/ShowRooms.css" rel="stylesheet">
<script src="js/RoomsEfects.js"></script>

@section("Contend")
@if(Auth::check())
        <form >
<div class="row">
        
        <div class="col-lg-1"></div>
        <div class="col-lg-3 alert alert-info" id="select-column">
            <div id="message">
                Choose one of the following rooms to make a reservation on it, they all have different gadgets so watch the descriptions below.
            </div>
         <h1>Select a room</h1>
         </div>
        <div class="col-lg-7"></div>
        <div class="col-lg-1"></div>
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
                <input type='hidden' value='{{ $room->ROOM_ID }}' disabled id='roomId'>
                <h3>Room Name: <span>{{ $room->NAME }}</span></h3>
                <h4>Room Title: <span>{{ $room->TITLE }}</span></h4>
                <h4>Gadgets: <span>{{ $room->GADGETS }}</span></h4>
            </div>
             @endforeach
             <input type='hidden' value='algo' name='Picked' id='Pick' required>
             <input type="submit" value='Continue' id='Next'>
        </div>
        <div class="col-lg-1">
            <!-- Room selected -->
        </div>
</div>
     </form>
@endif
@endsection
