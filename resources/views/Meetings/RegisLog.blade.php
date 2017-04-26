@extends("layout")

@section("Contend")
    <div class="row">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6" id="login">
            <form method="post" action="">
                <h2><strong>Log in</strong><span> with</span></h2>
                <div class="form-group">
                    <h4 for="email"><strong>Your Redeem email address:</strong></h4>
                    <input type="email" class="form-control" id="email" name="Email-Login" placeholder="Name.Lastname@redeemgroup.com" />
                    <input type="password" class="form-control" id="pass" name="Pass-Login" placeholder="Your Password " />
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" id="rememberMe" /><strong>Remember me</strong></label><span style="float:right;" class="label label-warning"><a href="#">Forgot your email?</a></span>
                </div>
                <div>
                    <input type="submit" class="btn btn-warning btn-md" id="submit" value="Submit" />
                    <input type="button" class="btn btn-primary btn-md" id="register" value="New User" />
                </div>
            </form>
        </div>
        <div class="col-lg-6" id="registerForm">
            <form action="{{url('congrats')}}" method="post">
                <div class="col-lg-6">
                    <div class="form-group">
                        <h3><strong>Register new user:</strong></h3>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="text" class="form-control" id="Name" name="Fname" placeholder="First Name" maxlength="30" required />
                        <input type="text" class="form-control" id="LastName" name="Lname" placeholder="Last Name" maxlength="30" required />
                        <input type="text" class="form-control" id="Title" name="Tit" placeholder="Your title" maxlength="30" />
                    </div>
                </div>
                <div class="col-lg-6" id="right">
                    <div class="form-group">
                        <h3><strong>Choose your Location:</strong></h3>
                    </div>
                    <select multiple class="form-control" id="locations" name="location" required>
                        <option value="1">Bathgate</option>
                        <option value="3">Macclesfield</option>
                        <option value="4">Burton-on-Tre</option>
                        <option value="5">Tartu</option>
                        <option value="6">Dubai</option>
                        <option value="7">Norrtalj</option>
                        <option value="8">Hong Kong</option>
                        <option value="9">Toronto</option>
                        <option value="2">Madrid</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="newEmail" name="e-mail" placeholder="Your Redeem email" maxlength="45" required />
                    <input type="password" class="form-control" id="newPass" name="pass" placeholder="Your Password: 16 Characters tops" maxlength="45" required />
                </div>
                <div>
                    <input type="submit" class="btn btn-warning btn-md" id="submit2" value="Register" />
                </div>
            </form>
        </div>
        <div class="col-lg-3">
        </div>
    </div>
    @endsection