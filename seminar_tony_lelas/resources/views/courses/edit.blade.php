@extends('main')
@section('title','|edit')
@section('content')

    <div class="row">
        {!! Form::model($course,['route'=>['courses.update',$course->id],'method'=> 'POST']) !!}
        <div class="col-md-8 col-md-offset-2">

            <div class="form-group">
            {{Form::label('title','Ime',['class'=>'form-spacing-top'])}}
            {{Form::text('ime',null,['class'=>'form-control'])}}
            </div>

            <div class="form-group">
            {{Form::label('title','Kod',['class'=>'form-spacing-top'])}}
            {{Form::text('kod',null,['class'=>'form-control'])}}
            </div>

            <div class="form-group">
            {{Form::label('title','Opis programa',['class'=>'form-spacing-top'])}}
            {{Form::textarea('program',null,['class'=>'form-control'])}}
            </div>

            <div class="form-group">
            {{Form::label('title','bodovi',['class'=>'form-spacing-top'])}}
            {{Form::text('bodovi',null,['class'=>'form-control'])}}
            </div>

            <div class="form-group">
            {{Form::label('title','Semestar Redovni',['class'=>'form-spacing-top'])}}
                {{ Form::select('sem_redovni', [
          '1' => '1. Semestar',
           '2' => '2. Semestar',
            '3' => '3. Semestar',
             '4' => '4. Semestar',
              '5' => '5. Semestar', '6' => '6. Semestar'
         ],null,array('class'=>'form-control')) }}       </div>

            <div class="form-group">
            {{Form::label('title','Semestar izvanredni',['class'=>'form-spacing-top'])}}
                {{ Form::select('sem_izvanredni', [
           '1' => '1. Semestar',
            '2' => '2. Semestar',
             '3' => '3. Semestar',
              '4' => '4. Semestar',
               '5' => '5. Semestar', '6' => '6. Semestar'
          ],null,array('class'=>'form-control')) }}
            </div>

            <div class="form-group">
            {{Form::label('title','Izborni',['class'=>'form-spacing-top'])}}<br>

                {{ Form::select('izborni', [
 'ne' => 'Obavezni',
 'da' => 'Izborni'],null,array('class'=>'form-control')) }}

            </div>
            <div class="form-group" style="margin-top: 9%">
                {{Form::submit('Save',['class'=>'btn btn-primary btn-lg btn-block'])}}

            </div>
            <div class="form-group" >

                {!! Html::linkRoute('courses.index','Cancel',array($course->id),array('class'=>'btn btn-lg btn-danger btn-block')) !!}

            </div>



        </div>

        {!! Form::close() !!}
    </div>
@endsection