@extends("layout")
<link type="text/css" href="css/ShowRooms.css" rel="stylesheet">
<script src="js/dateTimePicker.js"></script>
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
            <div class="Data">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='date' class="form-control" id="dates" name="WishDate"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="Data">
                <span>On: 
                  <span class="label label-primary">{{ $Location }}</span>            
                </span>
            </div>
            <h2>Contend</h2>
        </div>
        <div class="col-lg-1">
            <select id="SelectRoom">
                <option value="1" selected></option>
                <option value="2"></option>
                <option value="3"></option>
                <option value="4"></option>
            </select>
        </div>
</div>
     </form>
@endif
@endsection
