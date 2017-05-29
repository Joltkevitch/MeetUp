<html>
    <head>
    <title>Reset</title>
        <style type="text/css">
            @import url('https://fonts.googleapis.com/css?family=Quicksand');
            body{
                background-color: #FFFDEA;
            }
            .col-lg-4{
                width: 16%;
                height: 220px;
                background-color: #e0950b;
                padding: 8px;
                border: 2px solid black;
                border-radius: 8px;
                position: relative;
                top:15%;
                left:40%;
            }
            .form-group{
                padding: 6px;
                font-family: 'Quicksand', sans-serif;
            }
            .form-control{
                width: 90%;
                height: 30px;
                border-radius: 5px;
            }
            .btn-info{
                background-color: #337ab7;
                border: 1px solid #2e6da4;
                border-radius: 5px;
                padding: 3px;
                margin: auto;
                margin-top: 5px;
            }
            .btn-info:hover{
                background-color: #286090;
            }
        </style>
    </head>
    <body>
<div class='col-lg-4'>
   <form method="POST" action="/password/reset" class="form-group">
    {!! csrf_field() !!}
    <input type="hidden" name="token" value="{{ $token }}">

    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="form-group">
        Email:<br>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
    </div>

    <div class="form-group">
        Password:<br>
        <input type="password" name="password" class="form-control">
    </div>

    <div class="form-group">
        Confirm Password:<br>
        <input type="password" name="password_confirmation" class="form-control">
    </div>

    <div>
        <button type="submit" class="btn-info">
            Reset Password
        </button>
    </div>
</form>
</div>
</body>
</html>