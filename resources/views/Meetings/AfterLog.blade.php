@extends('layout')
<link type ="text/css" href="css/mineStyle2.css" rel="stylesheet" />

@section('Contend')

        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10" id="urls">
                <h2>Want to have a meeting? Go ahead</h2>
              <div class=" alert alert-info">
              <p>Make a meeting reservation! choosing time, day and the people attendig to the meeting, it'll be quick.</p>
              </div>  
              <br />
                <a href="#" class="btn btn-primary btn-lg" id="reserve"><strong>Make a reservation </strong></a>
                <a href="#" class="btn btn-primary btn-lg" id="FutureMeetings" ><strong>Watch future meetings</strong></a>
                <a href="#" class="btn btn-primary btn-lg" id="PastMeetings" ><strong>Watch past meetings</strong></a>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-1"></div>
            <div class="col-lg-10" id="problematico">
                <table class=" table table-hover table-responsive" id='table'>
                    <caption><strong>Today's meetings</strong></caption>
                    <thead>
                    <tr>
                        <th>Creator</th>
                        <th>Location</th>
                        <th>Room</th>
                        <th>Time from</th>
                        <th>Time to</th>
                        <th>People attending</th>
                        <th>Notes</th>
                        <th>Type</th>
                        <th>Department</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>George Bedd</td>
                            <td>Bathgate</td>
                            <td>Meeting room 1</td>
                            <td>12:30</td>
                            <td>14:00</td>
                            <td>Neil Ferguson, David Lannell</td>
                            <td>Tesco project</td>
                            <td>Departamental</td>
                            <td>Development</td>
                        </tr>
                        <tr>
                            <td>Neil Ferguson</td>
                            <td>Bathgate</td>
                            <td>Meeting room 1</td>
                            <td>14:30</td>
                            <td>15:30</td>
                            <td>Thania, David Lannell, Chris, Other David</td>
                            <td>New Project</td>
                            <td>Departamental</td>
                            <td>Development</td>
                        </tr>
                        <tr>
                            <td>CEO PAUL</td>
                            <td>Bathgate</td>
                            <td>War room</td>
                            <td>15:30</td>
                            <td>16:00</td>
                            <td>Neil Ferguson, David Lannell</td>
                            <td>Tesco project</td>
                            <td>Departamental</td>
                            <td>Development</td>
                        </tr>
                        <tr>
                            <td>George Bedd</td>
                            <td>Bathgate</td>
                            <td>Meeting room 1</td>
                            <td>12:30</td>
                            <td>14:00</td>
                            <td>Neil Ferguson, David Lannell</td>
                            <td>Tesco project</td>
                            <td>Departamental</td>
                            <td>Development</td>
                        </tr>
                    </tbody>
                </table>
                
        </div>
            <div class="col-lg-1"></div>

@endsection