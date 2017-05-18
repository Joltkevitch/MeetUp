@extends('layout')
@section('Contend')
<div class='row'>
<div class='col-lg-2'></div>
<div class='col-lg-8'>
    <form method="POST" action="/password/email"> 
   {!! csrf_field() !!}

    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        <button type="submit">
            Send Password Reset Link
        </button>
    </div>
</form>
</div>
<div class='col-lg-2'></div>
</div>
@endsection
