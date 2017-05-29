@extends("layout")

<link type="text/css" rel="stylesheet" href="css/AdminBlade.css"> 
<script type="text/javascript" src=js/AdminBlade.js></script>

@section('Contend')

<div class="window red"></div>
<div class="window blue"></div>
<div class="window green"></div>

<form action="{{url('Admin')}}" method="post">
<div class="row">

    <div class="col-lg-12">
        <img id="logo" src=imgs/meetUp_v3.png >
    
        <input type="text" id="finder" class="form-control" placeholder="Looking for a user?" >
        <a href="Register" class="btn btn-primary" id="new-user">Add user</a>
    <table class="table table-responsive">
        <thead>
        <tr>
            <th>User name</th>
            <th>Title</th>
            <th>Location Name</th>
            <th>Email</th>
            <th>Working?</th>
            <th>Role</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="users">
                <td >{{ $user->FIRST_NAME }} {{ $user->LAST_NAME }}</td>
                <td>{{ $user->TITLE }}</td>
                <td>{{ $user->LOCATION_NAME }}</td>
                <td>{{ $user->EMAIL}}</td>
                <td class="working">{{ $user->IS_ACTIVE }}</td>
                <td>{{ $user->ROLE_NAME }}</td>
                @if($user->ROLE_ID == 1)
                <td>No actions</td>
                @elseif($user->IS_ACTIVE == 1)
                <td><button type="button" class="btn btn-primary role" value="{{$user->USER_ID}}" >Change Role</button></td>
                @endif
                @if($user->IS_ACTIVE == 1 && $user->ROLE_ID == 2 )
                <td><button type="button" class="btn btn-danger disableds" value="{{$user->USER_ID}}" >Disabled User</button>
                </td> 
                @elseif( $user->IS_ACTIVE == 0 && $user->ROLE_ID == 2 )
                <td colspan="2"><button type="button" class="btn btn-success enable" value="{{$user->USER_ID}}" >Enable User</button></td>
                @else
                <td>No actions</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
         <div id="render">
        <?php
        $lenght = count($users);
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
            echo "<a class='btn btn-md btn-primary' id='prev' href='Admin?page=".$x."&i=".$x."'>Previous</a>";
            echo "<a class='btn btn-md btn-danger disabled'  id='nex'  href='Admin?page=".$i."&i=".$i."'>Next</a>";
            }
            else{
            echo "<a class='btn btn-md btn-primary' id='prev' href='Admin?page=".$x."&i=".$x."'>Previous</a>";
            echo "<a class='btn btn-md btn-primary' id='nex' href='Admin?page=".$i."&i=".$i."'>Next</a>";
            }
        }
        ?>
    </div>
    </div>
</div>
   
    <div class="alert alert-warning" id="sure">
        <p><strong id="warn">Some random warning over here</strong></p>
        <br>
        <input type="hidden" name="dis" id="dis" value="">
        <input type="hidden" name="en" id="en" value="">
        <input type="hidden" name="change" id="Change" value="">
        <input type="hidden" name="_token"  value="{{csrf_token()}}">
        <button type="submit" class="btn btn-danger">Yes</button>
        <button type="button" class="btn btn-warning">No</button>
    </div>

</form>

@endsection