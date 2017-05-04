<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title id="PageTitle">MeetUp-Log in</title>
    <link href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="css/Login.css" rel="stylesheet" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="css/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script src="js/jquery-1.11.2.min.js"></script>
</head>
<body style="overflow:no-display;background-color:#FFFDEA;">
    <nav class="navbar navbar-inverse" id="nav">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#" class="navbar-brand" id="brand">MeetUp</a>
            </div>
            <ul class="nav navbar-nav" id="navUl">
                <li><a href="https://redeemgroup.sharepoint.com/RedeemIT/SitePages/Home.aspx"><strong>SharePoint</strong></a></li>
                <li><a href="#"><strong>Redeem IT</strong></a></li>
                <li><a href="https://www.hotmail.com"><strong>Hotmail</strong></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right RightBar" id="log">
                <li><a id="buttonLog"  class="btn btn-primary btn-xs navButton "><span class="glyphicon glyphicon-user"></span>Log In</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right " id="RightBar">
                @if(Auth::check())
                <li class='dropdown'id="profileName"><a  class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span>{{ Auth::user()->FIRST_NAME }} </a>
                <ul class="dropdown-menu">
                <li id="logout"><a  class="btn btn-primary btn-xs " href="Logout"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
                 <li id="profile"><a  class="btn btn-primary btn-xs " href="#"><span class="glyphicon glyphicon-user"></span>Profile</a></li>
                </ul>
                </li>
                @endif
            </ul>
        </div>
    </nav>
        
        @yield("Contend")
        
               

    <!-- BLADE SPECIAL COMMAND FOR NONE REPETITIVE CODE -->

    
    
</body>
</html>