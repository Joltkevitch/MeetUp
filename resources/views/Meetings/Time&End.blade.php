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
        </script>
<script src='js/hourSelector.js' type='text/javascript'></script>
<div id="gray-window"></div>
@section("Contend")

<form>
<div class="row">
    <div class="col-lg-2"></div>
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
        <input type='hidden' value='{{$date}}' id='ChosenD'/>
        <input type='hidden' value='{{$room}}' id="ChosenR">
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
        @foreach ($roomName as $room )
        <p><span class=''>Location: {{$room->LOCATION_NAME}}</span></p>  <input class="form-control" type='hidden' value='{{$room->LOCATION_CODE}}' name="F_LOCATION" required disabled/>
        <p><span>Room's name: {{$room->NAME}}</span></p>  <input class="form-control" type='hidden' value='{{$room->ROOM_ID}}' name="F_ROOM" required disabled/>
        @endforeach
        <p><span>Chosen Date: {{$date}}</span></p>  <input class="form-control" type='hidden' value='{{$date}}' name="F_DATE" required disabled/>
        <p><span>Meeting starts at: </span><span id='hour'></span></p><input class="form-control" type='hidden' value='' name="StartsAt" id="SA" required disabled/>
                <span>Meeting ends at:</span>
        <select class="form-control" id="future-hours">
        </select>
        <div class="mult">
            <input type="text" class="form-control" placeholder="Looking for" id="finder">
            <p> <span>Users:</span> </p>
        <select class="form-control" id="users" multiple>
            @foreach($users as $user)
            <option value="{{$user->USER_ID}}">{{$user->FIRST_NAME}} {{$user->LAST_NAME}}</option>
            @endforeach
        </select>
            </div>
            <div class="mult">
                <p><span>Attending:</span></p>
        <select class="form-control" id="attending" multiple name="Attending">
        </select>
        </div>
                <textarea></textarea>
    </div>
</form>



@endsection