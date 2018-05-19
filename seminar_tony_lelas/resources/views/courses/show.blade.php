@extends('main')
@section('title','Show')
@section('content')



    <div class="row">
        <div class="col-md-8" style="">

            <div >
              <h3>  Naziv Predmeta  :
                        {{$course->ime }}
              </h3><br>
            </div>
            <h4>                      <br>
           <div >
          Šifra predmeta:    {{$course->kod }}<br>
           </div>

            <div style="margin-top: 5%">
                    <div style="">
                        Opis programa:
                    </div>

                    <div style="">
                    {{$course->program }}<br>
                    </div>
            </div>
            <div  style="margin-top: 5%; ">
            Bodovi:      {{$course->bodovi }}<br>
            </div>
            <div  style="margin-top: 5%">
            Semestar Redovni:
                {{$course->sem_redovni }}<br>
            </div>
            <div  style="margin-top: 5%">
           Semestar Izvanredni: {{$course->sem_izvanredni }}<br>
            </div>
            <div style="margin-top: 5%">
            Izborni predmet:    {{$course->izborni }}<br>
            </div>
            </h4>

        </div>
        <div  class="col-md-4">
            <div class="well">
                <div class="row">
                    <div class="col-sm-6">

                        {!! Html::linkRoute('courses.edit','Uredi',array($course->id),array('class'=>'btn btn-primary btn-block')) !!}
                        {!! Html::linkRoute('courses.index','Vrati se',array($course->id),array('class'=>'btn btn-primary btn-block')) !!}

                    </div>
                    <div class="col-sm-6">
                       {!!  Form::open(['route'=>['courses.destroy',$course->id],'method' => 'DELETE'])!!}
                        {!! Form::submit('Izbriši',['class' => 'btn btn-danger btn-block']) !!}

                        {!! Form::close() !!}

                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection