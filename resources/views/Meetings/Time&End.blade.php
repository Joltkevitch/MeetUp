@extends("layout")
<link type="text/css" href="css/ShowRooms.css" rel="stylesheet">
<script src='js/hourSelector.js' type='text/javascript'></script>
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
        <div id="message" style="opacity: 1; ">
            Now you most pick an hour to celebrate your meeting.<br>
        <span class="gray-span">gray = not available</span>
        </div>
    </div>
     <div class="col-lg-2">
    </div>
  
    
</div>
<div class="row">
    <div class="col-lg-1">
        @foreach ($meetings as $meet )
    <!--    <p>{{$meet->MEETING_DATE}}....{{$meet->TIME_FROM}}....{{$meet->TIME_TO}}</p>-->
        @endforeach
    </div>
    <div class="col-lg-10">
        <input type='hidden' value='{{$date}}' id='ChosenD'/>
        <input type='hidden' value='{{$room}}' id="ChosenR">
        <h2>Daily calendar:</h2>
        <table class='table table-responsive  table-borderless' id='hours'>
             <tr>
                    <th id='today' >Today's Date</th>
                </tr>
            <tbody id="table-body">
                <tr>                    <th>9:00</th>                </tr>           
                <tr>                    <td ></td>                </tr>      
                <tr>                    <td >10:00</td>                </tr>          
                <tr>                    <td ></td>                </tr>         
                <tr>                    <td >11:00</td>                </tr>          
                <tr>                    <td ></td>                </tr>
                <tr>                    <td >12:00</td>                </tr>       
                <tr>                    <td ></td>                </tr>             
                <tr>                    <th>1:00</th>                </tr>  
                <tr>                    <td ></td>                </tr>              
                <tr>                    <td >2:00</td>                </tr>         
                <tr>                    <td ></td>                </tr>          
                <tr>                    <td >3:00</td>                </tr>           
                <tr>                    <td ></td>                </tr>              
                <tr>                    <td >4:00</td>                </tr>
                <tr>                    <td ></td>                </tr>               
                <tr>                    <th >5:00</th>                </tr>   
                <tr>                    <td ></td>                </tr>
                <tr>                    <td >6:00</td>                </tr>          
                <tr>                    <td ></td>                </tr>
                
            </tbody>
        </table>
    </div>
    <div class="col-lg-1"></div>
    
</div>
</form>



@endsection