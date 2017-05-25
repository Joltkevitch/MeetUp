<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title id="PageTitle">MeetUp-Log in</title>
    <link href="./css/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type ="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link type ="text/css"  href="./css/Login.css" rel="stylesheet"  />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script  type="text/javascript" src="./css/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./js/jquery-1.11.2.min.js"></script>
</head>
<body style="overflow:no-display;background-color:#FFFDEA;">
    <nav class="navbar navbar-inverse" id="nav">
        <div class="container-fluid">
            <div class="navbar-header">
                <a><img id="meetpng" src="imgs/meetUp_v3.png" /></a>
            </div>
            <ul class="nav navbar-nav" id="navUl">
                @if(Auth::check())
                 <li id="home"><a href={{url('Welcome')}}><span class="glyphicon">&#xe021;</span><strong class="place-swich">Home</strong></a></li>
                 @endif
                <li id="share"><a href="https://redeemgroup.sharepoint.com/RedeemIT/SitePages/Home.aspx"><span class="glyphicon">&#xe086;</span><strong class="place-swich">SharePoint</strong></a></li>
                <li id="hotmail"><a href="https://www.hotmail.com"><span class="glyphicon">&#x2709;</span><strong class="place-swich">Hotmail</strong></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right " id="RightBar">
                @if(Auth::check())
                <li class='dropdown'id="profileName"><a  class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" href="#" id="ProfileName"><span class="caret"></span>{{ Auth::user()->FIRST_NAME }} </a>
                <ul class="dropdown-menu" id="menu">
                <li id="logout"><a  class="btn btn-primary btn-xs " href="Logout"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
                 <li id="profile">
                     <a  class="btn btn-primary btn-xs " href="Profile">
                         <span class="glyphicon glyphicon-user"></span >Profile
                     </a>
                    </li>
                @if(Auth::user()->ROLE_CODE == 1)
                <li id="">
                    <a class="btn btn-primary btn-xs " href="Admin">
                    <span class="glyphicon glyphicon-globe "></span>Users
                    </a>    
                </li>
                @endif
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