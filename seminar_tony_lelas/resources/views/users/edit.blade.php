@extends('main')
@section('title','|edit')
@section('content')

    <div class="row">
        @include('users.errors')
        {!! Form::model($user,['route'=>['users.update',$user->id],'method'=> 'PUT']) !!}
        <div class="col-md-8 col-md-offset-2">

            <div class="form-group">
           {{Form::label('title','Prezime',['class'=>'form-spacing-top'])}}
            {{Form::text('last_name',null,['class'=>'form-control'])}}
            </div>

            <div class="form-group">
            {{Form::label('title','Ime',['class'=>'form-spacing-top'])}}
            {{Form::text('name',null,['class'=>'form-control'])}}
            </div>

            <div class="form-group">
            {{Form::label('title','Email',['class'=>'form-spacing-top'])}}
            {{Form::text('email',null,['class'=>'form-control'])}}
            </div>

            <div class="form-group">
            {{Form::label('title','Lozinka',['class'=>'form-spacing-top'])}}
            {{Form::text('password',null,['class'=>'form-control'])}}
            </div>

            <div class="form-group">
            {{Form::label('title','Uloga',['class'=>'form-spacing-top'])}}<br>
            {{ Form::select('role', [
      'mentor' => 'Mentor',
      'student' => 'Student'] ,null,array('class'=>'form-control'))}}
            </div>

            <div class="form-group">
            {{Form::label('title','Status',['class'=>'form-spacing-top'])}}<br>
            {{ Form::select('status', [
  'redoviti' => 'Redovan student',
  'izvanredni' => 'Izvanredni student',
  'none' => 'Nije student'],null,array('class'=>'form-control')) }}
            </div>

            <div class="form-group" style="margin-top: 9%">

            {{Form::submit('Save',['class'=>'btn btn-lg btn-primary btn-block'])}}
            </div>

            <div class="form-group">

            {!! Html::linkRoute('users.index','Cancel',array($user->id),array('class'=>'btn btn-lg btn-danger btn-block')) !!}
            </div>




        </div>

        {!! Form::close() !!}
    </div>
@endsection