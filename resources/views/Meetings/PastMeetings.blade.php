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
                </table>
    <div id="render">
        <?php
        $lenght = count($pasts);
        $i;
        $x=0;
        if(isset($_GET['i'])){
            if($_GET["i"]>=2){
            $i=$_GET["i"];
            $x=$i;
            }
            else{
                $i=1;
                $x=$i;
            }
        }
        else{
            $i=1;
            $x=$i;
        }
        if ($lenght == 8 || $lenght >= 1 ){
            $i++;
            $x--;
            if($lenght < 8 && $lenght >= 1){
            echo "<a class='btn btn-md btn-primary' id='prev' href='PastMeetings?page=".$x."&i=".$x."'>Previous</a>";
            echo "<a class='btn btn-md btn-danger disabled'  id='nex'  href='PastMeetings?page=".$i."&i=".$i."'>Next</a>";
            }
            else{
            echo "<a class='btn btn-md btn-primary' id='prev' href='PastMeetings?page=".$x."&i=".$x."'>Previous</a>";
            echo "<a class='btn btn-md btn-primary' id='nex' href='PastMeetings?page=".$i."&i=".$i."'>Next</a>";
            }
        }
        ?>
    </div>
     @else
      <div class="alert alert-info div">
        <strong>Opps! </strong> There are not past meetings available on this page.
      </div>
    <?php
    $i;
        $x=0;
        if(isset($_GET['i'])){
            if($_GET["i"]>=2){
            $i=$_GET["i"];
            $x=$i;
            }
            else{
                $i=1;
                $x=$i;
            }
        }
        else{
            $i=1;
            $x=$i;
        }
            if(count($pasts) < 1){
            $i++;
            $x--;
            echo "<a class='btn btn-md btn-primary' id='prev' href='PastMeetings?page=".$x."&i=".$x."'>Previous</a>";
            echo "<a class='btn btn-md btn-danger disabled'  id='nex'  href='PastMeetings?page=".$i."&i=".$i."'>Next</a>";
            }
            ?>
    @endif
    
</div>
<div class="col-lg-1"></div>
</div>
                 @endsection