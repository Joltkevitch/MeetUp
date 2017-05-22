@extends("layout")
<link href="css/ShowMeetings.css" type="text/css" rel="stylesheet" />
@section("Contend") 
<div class="row">
<div class="col-lg-1"></div>
<div class="col-lg-10">
    <a href="Rooms" class="btn btn-primary btn-lg" id="reserve" style="margin-top:5px;"><strong>Make a reservation </strong></a>
    <a href="CancelMeetings" class="btn btn-danger btn-lg" id="viewCancel" style="margin-top:5px; "><strong>Cancel meetings </strong></a>
    <h2 id="past">Past Meetings</h2>
                 @if(count($pasts) > 1) 
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
                            <td>{{{$past->FIRST_NAME}}} {{{$past->LAST_NAME}}}</td>
                            <td>{{{$past->LOCATION_NAME}}}</td>
                            <td>{{{$past->NAME}}}</td>
                            <td>{{{$past->MEETING_DATE}}}</td>
                            <td>{{{$past->TIME_FROM}}}</td>
                            <td>{{{$past->TIME_TO}}}</td>
                            <td>{{{$past->USERS_ATT}}}</td>
                            <td>{{{$past->NOTES}}}</td>
                        </tr>
                        @endforeach
                    </tbody> 
                    @else
                 <div class="alert alert-info div">
                     <strong>Opps! </strong> There are not past meetings available, weird huh?
                 </div>
                @endif
                </table>
    {!! $pasts ->render() !!}
</div>
<div class="col-lg-1"></div>
</div>
                 @endsection