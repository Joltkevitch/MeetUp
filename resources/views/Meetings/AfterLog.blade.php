@extends('layout')
<link type ="text/css" href="css/Logged.css" rel="stylesheet" />
<script src='js/Logged.js'></script>
@section('Contend')
    
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10" id="urls">
                <h2>Want to have a meeting? Go ahead</h2>
              <div class=" alert alert-info">
              <p>Make a meeting reservation! choosing time, day and the people attendig to the meeting, it'll be quick.</p>
              </div>  
              <br />
                <a href="Rooms" class="btn btn-primary btn-lg" id="reserve"><strong>Make a reservation </strong></a>
                <a href="PastMeetings" class="btn btn-warning btn-lg" id="btn-past" ><strong>See past meetings</strong></a>
                <a href="Cancellations" class="btn btn-danger btn-lg" id="viewCancel"><strong>Cancel meetings </strong></a>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-1"></div>
            <div class="col-lg-10" id="problematico">
                <button type='button' class="btn btn-primary btn-lg"  id='btn-todays'>Today's meetings</button>
                <button class="btn btn-primary btn-lg" id="btn-yours" ><strong>Your meetings</strong></button>
                 <!-- Tabla con las reuniones que se celebran en la fecha actual --> 
                 @if(!empty($todays)) 
                <table class=" table table-hover table-responsive" id='table-today'>
                    <thead>
                    <tr>
                        <th>Creator</th>
                        <th>Location</th>
                        <th>Room</th>
                        <th>Time from</th>
                        <th>Time to</th>
                        <th>People attending</th>
                        <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($todays as  $to)
                        <tr>
                            <td>{{$to->FIRST_NAME}} {{$to->LAST_NAME}}</td>
                            <td>{{$to->LOCATION_NAME}}</td>
                            <td>{{$to->NAME}}</td>
                            <td>{{$to->TIME_FROM}}</td>
                            <td>{{$to->TIME_TO}}</td>
                            <td>{{$to->USERS_ATT}}</td>
                            <td>{{$to->NOTES}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                 <div class="alert alert-info div">
                     <strong>Opps! </strong> There are not meetings for today, try to make a reservation.
                 </div>
                @endif
               
                <!-- Tabla con las reuniones que pertenecen al usuario loggeado [ se muestran a partir de la fecha actial] --> 
                
                 @if(!empty($yours) ) 
                <table class=" table table-hover table-responsive" id='table-yours'>
                    <thead>
                    <tr>
                        <th>Creator</th>
                        <th>Location</th>
                        <th>Room</th>
                        <th>Date</th>
                        <th>Time from</th>
                        <th>Time to</th>
                        <th>People attending</th>
                        <th>Notes</th>
                        <th></th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($yours as  $your)
                        <tr>
                            <td>{{$your->FIRST_NAME}} {{$your->LAST_NAME}}<input type="hidden" value="{{$your->MEETING_NUMBER}}" name="CancelData"></td>
                            <td>{{$your->LOCATION_NAME}}</td>
                            <td>{{$your->NAME}}</td>
                            <td>{{$your->MEETING_DATE}}</td>
                            <td>{{$your->TIME_FROM}}</td>
                            <td>{{$your->TIME_TO}}</td>
                            <td>{{$your->USERS_ATT}}</td>
                            <td>{{$your->NOTES}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                 <div class="alert alert-info div" id="booked">
                     <strong>Opps! </strong> You don't have any booked meetings, try to make a reservation.
                 </div>
                @endif       
        </div>
            <div class="col-lg-1"></div>
@endsection