@extends("layout")
<link type="text/css" href="css/ShowRooms.css" rel="stylesheet">
<script type="text/javascript">
            var i=0;
            var meetings=[];
@foreach ($meetings as $meet )
       window["meeting"+i]={timeFrom:"{{$meet->TIME_FROM}}", timeTo:"{{$meet->TIME_TO}}"}; // creamos variables dinamicas 
       meetings.push( window["meeting"+i]);
             i++;
        @endforeach
        console.log(meetings);
        </script>
<script src='js/hourSelector.js' type='text/javascript'></script>
<div id="gray-window"></div>
@section("Contend")

<form method="post" action="{{url('Done')}}">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="row">
    <div class="col-lg-2">@include("Partials/errors")</div>
    <div class="col-lg-3 alert alert-info" id="select-column">
    <h1>Select an hour</h1>
    </div>
    <div class="col-lg-3">
        <a href="{{url('Rooms')}}" class='btn btn-warning btn-md' id='back'><span class='glyphicon glyphicon-circle-arrow-left'> </span>  Choose another room or date</a>
    </div>
     <div class="col-lg-2">
        <div id="message" style="opacity: 1; z-index: 0;">
            Now you most pick an hour to celebrate your meeting.<br>

        <span class="gray-span">Colored rows are already taken</span>
        </div>
    </div>
     <div class="col-lg-2">
    </div>
</div>
<div class="row">
    <div class="col-lg-1">

    </div>
    <div class="col-lg-10" id="table-container">
        <table class='table table-responsive  table-borderless' id='hours'>
                    <h2>Daily calendar:</h2>
             <tr>
                    <th id='today' >Today's Date</th>
                </tr>
            <tbody id="table-body">
                <tr>                    <td><span class="hour">09:00</span><button type="button" class='add'><span class='glyphicon glyphicon-plus'> </span>add</button></td>                </tr>           
                <tr>                    <td ><span class="hour hidden">09:30</span><button  type="button" class='add'><span class='glyphicon glyphicon-plus'> </span>add</button></td>                </tr>      
                <tr>                    <td ><span class="hour">10:00</span><button type="button" class='add'><span class='glyphicon glyphicon-plus'> </span>add</button></td>                </tr>          
                <tr>                    <td ><span class="hour hidden">10:30</span><button type="button" class='add'><span class='glyphicon glyphicon-plus'> </span>add</button></td>                </tr>         
                <tr>                    <td ><span class="hour">11:00</span><button type="button" class='add'><span class='glyphicon glyphicon-plus'> </span>add</button></td>                </tr>          
                <tr>                    <td ><span class="hour hidden">11:30</span><button type="button" class='add'><span class='glyphicon glyphicon-plus'> </span>add</button></td>                </tr>
                <tr>                    <td ><span class="hour">12:00</span><button type="button" class='add'><span class='glyphicon glyphicon-plus'> </span>add</button></td>                </tr>       
                <tr>                    <td ><span class="hour hidden">12:30</span><button  type="button" class='add'><span class='glyphicon glyphicon-plus'> </span>add</button></td>                </tr>             
                <tr>                    <td><span class="hour">13:00</span><button type="button" class='add'><span class='glyphicon glyphicon-plus'> </span>add</button></td>                </tr>  
                <tr>                    <td ><span class="hour hidden">13:30</span><button type="button" class='add'><span class='glyphicon glyphicon-plus'> </span>add</button></td>                </tr>              
                <tr>                    <td ><span class="hour">14:00</span><button type="button" class='add'><span class='glyphicon glyphicon-plus'> </span>add</button></td>                </tr>         
                <tr>                    <td ><span class="hour hidden">14:30</span><button type="button" class='add'><span class='glyphicon glyphicon-plus'> </span>add</button></td>                </tr>          
                <tr>                    <td ><span class="hour">15:00</span><button type="button" class='add'><span class='glyphicon glyphicon-plus'> </span>add</button></td>                </tr>           
                <tr>                    <td ><span class="hour hidden">15:30</span><button type="button" class='add'><span class='glyphicon glyphicon-plus'> </span>add</button></td>                </tr>              
                <tr>                    <td ><span class="hour">16:00</span><button type="button" class='add'><span class='glyphicon glyphicon-plus'> </span>add</button></td>                </tr>
                <tr>                    <td ><span class="hour hidden">16:30</span><button type="button" class='add'><span class='glyphicon glyphicon-plus'> </span>add</button></td>                </tr>               
                <tr>                    <td ><span class="hour">17:00</span><button type="button" class='add'><span class='glyphicon glyphicon-plus'> </span>add</button></td>                </tr>   
                <tr>                    <td ><span class="hour hidden">17:30</span><button type="button" class='add'><span class='glyphicon glyphicon-plus'> </span>add</button></td>                </tr>
                <tr>                    <td ><span class="hour">18:00</span><button type="button" class='add'><span class='glyphicon glyphicon-plus'> </span>add</button></td>                </tr>          
                <tr>                    <td ><span class="hour hidden">18:30</span><button type="button" class='add'><span class='glyphicon glyphicon-plus'> </span>add</button></td>                </tr>

            </tbody>
        </table>
    </div>
    <div class="col-lg-1"></div>
    
</div>
    <div class="form-group" id="ReservationEnd">
       <input class="form-control" type='hidden' value='{{Auth::user()->USER_ID}}' name="USER" required />
        @foreach ($roomName as $room )          
        <p><span class=''>Location: {{$room->LOCATION_NAME}}</span></p>  <input class="form-control" type='hidden' value='{{$room->LOCATION_CODE}}' name="F_LOCATION" required />
        <p><span>Room's name: {{$room->NAME}}</span></p>  <input class="form-control" type='hidden' value='{{$room->ROOM_ID}}' name="F_ROOM" required />
        @endforeach
        <p><span>Chosen Date: {{$date}}</span></p>  <input id="ChosenD" class="form-control" type='hidden' value='{{$date}}' name="F_DATE" required />
        <p><span>Meeting starts at: </span><span id='hour'></span></p><input class="form-control"  id="SA" type='hidden' value='' name="StartsAt" required />
                <span>Meeting ends at:</span>
        <select class="form-control" id="future-hours" name='EndsAt'>
        </select>
        <div class="mult">
            <input type="text" class="form-control" placeholder="Look for a user" id="finder">
            <p> <span>Users:</span> </p>
        <select class="form-control" id="users" multiple>
            @foreach($users as $user)
            <option value="{{$user->EMAIL}}">{{$user->FIRST_NAME}} {{$user->LAST_NAME}}</option>
            @endforeach
        </select>
            </div>
            <div class="mult">
                <p><span>Users invited:</span></p>
                <select class="form-control" id="attending" multiple name="Attending[]" required>
        </select>
        </div>
                <span>Notes:</span>
                <textarea class="form-control" id='textarea' placeholder="What's the meeting about?" name='Notes' maxlength="255"></textarea>
                <button type='submit' class="formButton R">Reserve</button>
                <button type='button' class="formButton  C">Cancel</button>
    </div>
</form>



@endsection