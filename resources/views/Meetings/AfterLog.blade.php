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
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-1"></div>
            <div class="col-lg-10" id="problematico">
                <button type='button' class="btn btn-primary btn-lg"  id='btn-todays'>Today's meetings</button>
                <button class="btn btn-primary btn-lg" id="btn-yours" ><strong>Your meetings</strong></button>
                <button class="btn btn-primary btn-lg" id="btn-past" ><strong>See past meetings</strong></button>
                 @if(count($Meetings) > 0)
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
                        
                        @foreach($Meetings as  $today)
                        <tr>
                            <td>{{$today->FIRST_NAME}} {{$today->LAST_NAME}}</td>
                            <td>{{$today->LOCATION_NAME}}</td>
                            <td>{{$today->NAME}}</td>
                            <td>{{$today->TIME_FROM}}</td>
                            <td>{{$today->TIME_TO}}</td>
                            <td>{{$today->USERS_ATT}}</td>
                            <td>{{$today->NOTES}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                 @else
                 <div class="alert alert-info">
                     <strong>Opps! </strong> There are not meetings for today, try to make a reservation.
                 </div>
                @endif
                 @if(count($pasts) > 0)
                <table class=" table table-hover table-responsive" id='table-past'>
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
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($pasts as  $past)
                        <tr>
                            <td>{{$past->FIRST_NAME}} {{$today->LAST_NAME}}</td>
                            <td>{{$past->LOCATION_NAME}}</td>
                            <td>{{$past->NAME}}</td>
                            <td>{{$past->MEETING_DATE}}</td>
                            <td>{{$past->TIME_FROM}}</td>
                            <td>{{$past->TIME_TO}}</td>
                            <td>{{$past->USERS_ATT}}</td>
                            <td>{{$past->NOTES}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                 @else
                 <div class="alert alert-info">
                     <strong>Opps! </strong> There are not meetings for today, try to make a reservation.
                 </div>
                @endif
                 @if(count($yours) > 0)
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
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($yours as  $your)
                        <tr>
                            <td>{{$your->FIRST_NAME}} {{$today->LAST_NAME}}</td>
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
                 <div class="alert alert-info">
                     <strong>Opps! </strong> There are not meetings for today, try to make a reservation.
                 </div>
                @endif
        </div>
            <div class="col-lg-1"></div>

@endsection