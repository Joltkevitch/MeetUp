@extends('layout')
<link href="../css/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type ="text/css">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link type ="text/css"  href="../css/Login.css" rel="stylesheet"  />
<script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script  type="text/javascript" src="../css/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>
@section('Contend')
<div class='row'>
<div class='col-lg-2'></div>
<div class='col-lg-8 alert alert-info'>
    <form method="POST" action="/password/email" class="form-group"> 
   {!! csrf_field() !!}

    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="form-group">
        Email
        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
    </div>

    <div >
        <button type="submit" class="btn btn-primary">
            Send Password Reset Link
        </button>
    </div>
</form>
</div>
<div class='col-lg-2'></div>
</div>
@endsection
