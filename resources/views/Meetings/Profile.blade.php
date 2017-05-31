@extends("layout")
<link href="css/UserProfile.css" type="text/css" rel="stylesheet" />
<script src="js/UserProfile.js"></script>

@section("Contend")
<div class="row">

        <div class="col-lg-4"></div>

        <!-- Div con info -->
        <div class="col-lg-4" id="UserData">
            <h2>Your MeetUp Profile</h2>
            <div class="col-lg-12" id="UserInfo">
            <h3>Your info.</h3>
            <p><span class="data">Location: </span><span id="U_loca">{{$data->LOCATION_NAME}}</span> </p>
            <p><span class="data">First Name: </span><span id="U_first">{{$data->FIRST_NAME}}</span> </p>
            <p><span class="data">Last Name: </span><span id="U_last">{{$data->LAST_NAME}}</span> </p>
            <p><span class="data">Your Title: </span> <span id="U_tit">{{$data->TITLE}}</span></p>
            <p><span class="data">E-mail: </span><span id="U_email">{{$data->EMAIL}}</span> </p>
            @if($data->ROLE_CODE == 1)
            <p><span class="data">Role: </span><span id="U_email">{{$data->ROLE_NAME}}</span> </p>
            @endif
            </div>
            <button id="edit" style="z-index:2"><span class="glyphicon glyphicon-pencil" ></span></button>
            
            <!-- Div con formualrio -->
            <div class="col-lg-12" id="update">
              <form id="form" method="post" action="profile">
                  <div class="form-group">

                      <span class="data">New Location: </span>
                        <select type="text" class="form-control" name="location">
                        <option value="1" selected>Bathgate</option>
                        <option value="4" disabled>Burton-on-Tre</option>
                        <option value="6" disabled>Dubai</option>
                        <option value="8" disabled>Hong Kong</option>
                        <option value="3" disabled>Macclesfield</option>
                        <option value="2" disabled>Madrid</option>
                        <option value="7" disabled>Norrtalj</option>
                        <option value="5" disabled>Tartu</option>
                        <option value="9" disabled>Toronto</option>
                        </select>

                      <span class="data">First and last name:</span><br />
                      <input type="text" class="form-control" name="first" pattern="^[a-zA-Z\-\s]{3,30}$"/>
                      <input type="text" class="form-control" name="last" pattern="^[a-zA-Z\-\s]{3,30}$"/>
                      <br />
                      <span class="data">Title:</span><input type="text" class="form-control" name="tit" pattern="^[a-zA-Z\-\s]{3,30}$"/>
                      <span class="data">Email:</span><input type="email" class="form-control" name="email"/>
                      @if($data->ROLE_CODE == 1)
                      <span class="data">Role:</span>
                      <select  class="form-control" name="role">
                        <option value="" selected >Select...</option>
                        <option value="1" >Admin</option>
                        <option value="2" >User</option>
                      </select>
                      @endif
                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                      <input type="hidden" name="id" value="{{Auth::user()->USER_ID}}">
                  </div>
                  <button id="save" type="submit" style="z-index:2" class="btn">Save changes <span class="glyphicon glyphicon-save"></span></button>
              </form>           
            </div>

        </div>
        <div class="col-lg-4"></div>
    </div>
@endsection