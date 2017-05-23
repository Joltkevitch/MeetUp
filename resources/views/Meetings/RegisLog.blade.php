@extends("layout")

@section("Contend")
    <div class="row">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6" id="login">
            <form method="post" action="{{url('Welcome')}}">
                <h2><strong>Log in</strong><span> with</span></h2>
                <div class="form-group">
                    <h4 for="email"><strong>Your Redeem email address:</strong></h4>
                    <input type="email" class="form-control" id="email" name="EMAIL" placeholder="Name.Lastname@redeemgroup.com" value="{{ old('Email-Login') }}"/>
                    <input type="password" class="form-control" id="pass" name="PASSWORD" placeholder="Your Password " />
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" id="rememberMe" value="true" name='remember' /><strong>Remember me</strong></label><span style="float:right;" class="label label-warning"><a href="password/email">Forgot your password?</a></span>
                </div>
                <div>
                    <input type="submit" class="btn btn-warning btn-md" id="submit" value="Submit" />
                </div>
            </form>
            @include("Partials/TryAgain")
        </div>
       
        <div class="col-lg-3">
        </div>
    </div>
    @endsection