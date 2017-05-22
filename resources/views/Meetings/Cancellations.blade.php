@extends("layout")
<link href="css/ShowMeetings.css" type="text/css" rel="stylesheet" />
@section("Contend")

<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <a href="Rooms" class="btn btn-primary btn-lg" id="reserve" style="margin-top:5px;"><strong>Make a reservation </strong></a>
        <a href="PastMeetings" class="btn btn-warning btn-lg" id="btn-past" style="margin-top:5px; float:right; left:0;" ><strong>See past meetings</strong></a>
        <h2 id="past">Cancel Meetings</h2>
        
                 @if(count($cancels) >= 1) 
                <table class=" table table-hover table-responsive" id='table-cancel'>
                    <thead>
                    <tr>
                        <th>Creator</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cancels as  $cancel)
                        <tr>
                            <td>{{{$cancel->FIRST_NAME}}} {{{$cancel->LAST_NAME}}}</td>
                            <td>{{{$cancel->LOCATION_NAME}}}</td>
                            <td>{{{$cancel->CANCEL_DATE}}}</td>
                            <td>{{{$cancel->NOTES}}}</td>
                        </tr>
                        @endforeach
                    </tbody> 
                    @else
                 <div class="alert alert-info div">
                     <strong>Opps! </strong> There are not cancel meetings available, weird huh?.
                 </div>
                @endif
                </table>
    {!! $cancels ->render() !!}
    </div>
    <div class="col-lg-2"></div>
</div>

@endsection