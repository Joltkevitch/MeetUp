@extends("layout")
<script src="js/MainPage.js"></script>
@section("Contend")
<div class="row">
<div class="col-lg-3"></div> 
<div class="col-lg-6" id="registerForm">
            <form action="{{url('congrats')}}" method="post">
                <div class="col-lg-6">
                    <div class="form-group">
                        <h3><strong>Register new user:</strong></h3>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="text" class="form-control" id="Name" name="Fname" placeholder="First Name" maxlength="30" required value="{{ old('Fname') }}"/>
                        <input type="text" class="form-control" id="LastName" name="Lname" placeholder="Last Name" maxlength="30" required value="{{ old('Lname') }}" />
                        <input type="text" class="form-control" id="Title" name="Tit" placeholder="Your title" maxlength="30" value="{{ old('Tit') }}" />
                    </div>
                </div>
                <div class="col-lg-6" id="right">
                    <div class="form-group">
                        <h3><strong>Choose your Location:</strong></h3>
                    </div>
                    <select multiple class="form-control" id="locations" name="location" required>
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
                </div>
                <div class="form-group" id="emailDiv">
                    <input type="email" class="form-control" id="newEmail" name="email" placeholder="Your Redeem email" maxlength="45" required value="{{ old('email') }}" />
                    <input type="password" class="form-control" id="newPass" name="pass" placeholder="Your Password: Min 8 characters, at least one number" maxlength="20" required value="" />
                    <input type="hidden" name="active" value="1">
                </div>
                <div>
                    <input type="submit" class="btn btn-warning btn-md" id="submit2" value="Register" />
                </div>
                 @include("Partials/errors")
            </form>
        </div>
<div class="col-lg-3"></div> 
</div>
@endsection