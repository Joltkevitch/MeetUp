@extends("layout")

<link type="text/css" rel="stylesheet" href="css/AdminBlade.css"> 
<script type="text/javascript" src=js/AdminBlade.js></script>

@section('Contend')

<div class="window red"></div>
<div class="window blue"></div>
<div class="window green"></div>

<form action="" method="post">
<div class="row">

    <div class="col-lg-12">
        <img id="logo" src=imgs/meetUp_v3.png >
    
    <table class="table table-responsive">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Title</th>
            <th>Location Name</th>
            <th>Email</th>
            <th>Working?</th>
            <th>Role</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <tbody>
            
            @foreach($users as $user)
            <tr>
                <td>{{ $user->FIRST_NAME }}</td>
                <td>{{ $user->LAST_NAME }}</td>
                <td>{{ $user->TITLE }}</td>
                <td>{{ $user->LOCATION_NAME }}</td>
                <td>{{ $user->EMAIL}}</td>
                <td>{{ $user->IS_ACTIVE }}</td>
                <td>{{ $user->ROLE_NAME }}</td>
                <td><button class="btn btn-primary" id="role">Change Role</button></td>
                <td><button class="btn btn-success" id="enable">Enable User</button></td>
                <td><button class="btn btn-danger" id="disabled">Disabled User</button></td> 
            </tr>
            @endforeach
        </tbody>
    </table>
    
    </div>


</div>
</form>

@endsection