@extends('main')
@section('title','| Novi predmet')
@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}
@endsection
@section('content')

    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <h1>Stvori novi predmet</h1>

            {!! Form::open(array('route' => 'courses.store','data-parsley-validate'=>'')) !!}
            <div class="form-group">
            {{Form::label('ime', 'Ime Predmeta')}}
            {{ Form::text('ime',null,array('class'=>'form-control','placeholder' => 'Ime Predmeta')) }}
            </div>

            <div class="form-group">
            {{Form::label('kod', 'Šifra predmeta')}}

            {{ Form::text('kod',null,array('class'=>'form-control','placeholder' => 'Šifra Predmeta')) }}

            </div>

            <div class="form-group">
            {{Form::label('program', 'Opis program')}}
            {{ Form::textarea('program',null,array('class'=>'form-control','placeholder' => 'Opis Programa')) }}
            </div>

            <div class="form-group">
            {{Form::label('bodovi', 'Broj ECTS Bodova')}}
            {{ Form::text('bodovi',null,array('class'=>'form-control','placeholder' => 'Bodovi')) }}
            </div>

            <div class="form-group">
            {{Form::label('sem_redovni', 'Semestar Redoviti')}}
                {{ Form::select('sem_redovni', [
        '1' => '1. Semestar',
         '2' => '2. Semestar',
          '3' => '3. Semestar',
           '4' => '4. Semestar',
            '5' => '5. Semestar', '6' => '6. Semestar'
       ],null,array('class'=>'form-control')) }}  </div>


            <div class="form-group">
            {{Form::label('sem_izvanredni', 'Semestar Izvanredni')}}
                 {{ Form::select('sem_izvanredni', [
    '1' => '1. Semestar',
     '2' => '2. Semestar',
      '3' => '3. Semestar',
       '4' => '4. Semestar',
        '5' => '5. Semestar', '6' => '6. Semestar'
   ],null,array('class'=>'form-control')) }}

            </div>

            <div class="form-group" style="margin-bottom: 9%">
            {{Form::label('izborni', 'Izborni')}}<br>

                {{ Form::select('izborni', [
 'ne' => 'Obavezni',
 'da' => 'Izborni'],null,array('class'=>'form-control')) }}


            </div>
            {{ Form::submit('Save',['class'=>'btn btn-success btn-block'])}}

            {!! Form::close() !!}

        </div>

    </div>
@endsection
@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection
