
<!-- Default Bootstrap Navbar -->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
<?php use Illuminate\Support\Facades\Auth;;
$us=Auth::user();
if($us['role']=='mentor')
{
?>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{Request::is('/')?"active":""}}" style="margin-left: 150px"><a href="{{route('users.index')}}">Studenti</a></li>
                <li class="{{Request::is('/')?"active":""}}" ><a href="{{route('courses.index')}}">Predmeti</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">


              <li class="{{Request::is('/')?"active":""}}" style="margin-right: 160px"> <a href="{{ route('logout') }}" >
                      Odjavite se!
                  </a></li>


            </ul>
        </div>
 <?php
 }
 else{

 ?>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">


                <li class="{{Request::is('/')?"active":""}}" style="margin-right: 160px"> <a href="{{ route('logout') }}" >
                        Odjavite se!
                    </a></li>


            </ul>
        </div>

    <?php
     }
     ?><!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>


