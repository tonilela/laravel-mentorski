@extends('main')
@section('title','Show')
@section('content')



    <div >
         <h1>  {{$user->last_name }}
             {{$user->name }}<br></h1><br>



    </div>
                <h3>Predmeti</h3>
            <div >
                <div class="panel-group">
                <div class="panel panel-default" style="width: 43%;height: 600px;float:left;overflow-y: scroll; margin-left: 5%">

                    @foreach($nisu_upisani as $coursess)
                    <div class="panel-body" >
                        {!! Form::open(['route' =>['dodaj_upisni',$user->id,$coursess['id']],'method'=>'GET','id'=>'dodaj_upisni']) !!}


                        {{Form::button('<i class="glyphicon glyphicon-plus"></i>', array('type' => 'submit', 'class' => ''))}}
                              {{ $coursess['ime']}}
                        {!! Form::close() !!}

                        <hr style="margin-bottom:-4%;margin-top: 2%;">

                   </div>
                       @endforeach
                </div>
                </div>

                <div style="float: left; margin-left: 15%;width: 33%;">

                    <h3 style="margin-bottom: 25px;">Upisi({{$user->email}})</h3>

                    <div class="panel-group" style="border-color: black;border: 2px" >


                            <h5 id="semestri" style=" ">Semestar 1:</h5>
                        <div class="panel panel-default">
                            @include('course_users.semestri',['upisani_predmeti'=>$upisani_predmeti,'user'=>$user,'sem'=>1])
                        </div>


                            <h5 id="semestri" style=" ">Semestar 2:</h5>
                        <div class="panel panel-default">
                            @include('course_users.semestri',['upisani_predmeti'=>$upisani_predmeti,'user'=>$user,'sem'=>2])
                        </div>

                            <h5 id="semestri" style=" ">Semestar 3:</h5>
                        <div class="panel panel-default">
                            @include('course_users.semestri',['upisani_predmeti'=>$upisani_predmeti,'user'=>$user,'sem'=>3])
                        </div>

                            <h5 id="semestri" style=" ">Semestar 4:</h5>
                        <div class="panel panel-default">
                            @include('course_users.semestri',['upisani_predmeti'=>$upisani_predmeti,'user'=>$user,'sem'=>4])
                        </div>

                            <h5 id="semestri" style=" ">Semestar 5:</h5>
                        <div class="panel panel-default">
                            @include('course_users.semestri',['upisani_predmeti'=>$upisani_predmeti,'user'=>$user,'sem'=>5])
                        </div>

                            <h5 id="semestri" style=" ">Semestar 6:</h5>
                        <div class="panel panel-default">
                            @include('course_users.semestri',['upisani_predmeti'=>$upisani_predmeti,'user'=>$user,'sem'=>6])
                        </div>
                    </div>
                </div>
            </div>
@endsection