@extends('main')
@section('title','| Create new User')
@section('stylesheets')

{!! Html::style('css/parsley.css') !!}
@endsection
@section('content')

<div class="row">

    <div class="col-md-8 col-md-offset-2">
        <h1>Stvori novog korisnika</h1>

  {!! Form::open(array('route' => 'users.store','data-parsley-validate'=>'')) !!}
        <div class="form-group">
        {{Form::label('name', 'Ime')}}

        {{ Form::text('name',null,array('class'=>'form-control','placeholder' => 'Ime','required'=>'')) }}

        </div>

        <div class="form-group">
        {{Form::label('last_name', 'Prezime')}}

        {{ Form::text('last_name',null,array('class'=>'form-control','placeholder' => 'Prezime','required'=>'')) }}

        </div>

        <div class="form-group">
        {{Form::label('email', 'E-mail')}}

        {{ Form::text('email',null,array('class'=>'form-control','placeholder' => 'E-mail','required'=>'')) }}

        </div>

        <div class="form-group">
        {{Form::label('password', 'Lozinka')}}

        {{ Form::password('password',['class' => 'form-control', 'placeholder' => 'Lozinka', 'type' => 'password'])}}

        </div>

        <div class="form-group">
        {{Form::label('role', 'Uloga')}}


        {{ Form::select('role', [
      'mentor' => 'Mentor',
      'student' => 'Student'] ,null,array('class'=>'form-control'
   ))}}

        </div>

            <div class="form-group" style="margin-bottom: 9%">

        {{Form::label('status', 'Status')}}

        {{ Form::select('status', [
   'redoviti' => 'Redovan student',
   'izvanredni' => 'Izvanredni student',
   'none' => 'Nije student'],null,array('class'=>'form-control')) }}

                </div>


        {{ Form::submit('Unesi Korisnika!',array('class'=>'btn btn-lg btn-block btn-success'))}}
  {!! Form::close() !!}
        <a href="{{route('users.index')}}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Povratak</a>

    </div>

</div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    @endsection