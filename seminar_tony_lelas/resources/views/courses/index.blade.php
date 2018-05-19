@extends('main')
@section('title','|svi')
@section('content')


    <div class="row">

        <div class="col-md-10">
            <h1>Svi predmeti</h1>

        </div>

        <div class="col-md-2">
            <a href="{{route('courses.create')}}" class="btn btn-lg btn-block btn-primary btn-h1-spacing"> Novi predmet</a>


        </div>
        <hr>
    </div>
    <div class="row">
        <div class="col-md-12">

            <table class="table table-striped">
                <thead>

                <th>    Broj      </th>
                <th>    Naziv predmeta       </th>

                <th>              </th>
                </thead>
                <tbody>
                @foreach ($courses as $course)

                    <tr>

                        <th>{{$course->id}}</th>
                        <td>{{$course->ime}}</td>


                        <td>

                            <div class="botuni_user">
                            <a href="{{route('courses.show',$course->id)}}" class="btn btn-default btn-sm">Vidi</a>
                            </div>

                            <div class="botuni_user">
                                <a href="{{route('courses.edit',$course->id)}}" class="btn btn-default btn-sm">Uredi</a>
                            </div>
                            <div>
                                {!!  Form::open(['route'=>['courses.destroy',$course->id],'method' => 'DELETE'])!!}
                                {!! Form::submit('Izbriši',['class' => 'btn btn-danger btn-sm']) !!}

                                {!! Form::close() !!}

                            </div>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


    </div>

@endsection