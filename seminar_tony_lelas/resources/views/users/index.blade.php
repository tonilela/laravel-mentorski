@extends('main')
@section('title','|svi')
@section('content')


    <div class="row">

        <div class="col-md-10">
           <h1>Svi korisnici</h1>

        </div>

        <div class="col-md-2">
            <a href="{{route('users.create')}}" class="btn btn-lg btn-block btn-primary btn-h1-spacing"> Novi korisnik</a>


        </div>
        <hr>
    </div>
    <div class="row">
        <div class="col-md-12" style="margin-top: 2%;margin-bottom: 3%">
            <h4>Redoviti</h4>
            <table class="table table-striped">
                <thead>

                    <th>Broj</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>              </th>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    @if(($user->status=='redoviti')&& ($user->role=='student'))
                    <tr>

                            <th>{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->last_name}}</td>

                            <td>
                                <div class="botuni_user">
                                    <a href="{{route('users.show',$user->id)}}" class="btn btn-default btn-sm">Vidi</a>
                                </div>

                                <div class="botuni_user">
                                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-default btn-sm">Uredi</a>
                                </div>

                                <div class="botuni_user">
                                    {!!  Form::open(['route'=>['users.destroy',$user->id],'method' => 'DELETE'])!!}
                                    {!! Form::submit('Izbriši',['class' => 'btn btn-danger btn-sm']) !!}

                                    {!! Form::close() !!}
                                </div>
                            </td>

                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>


        </div>
        <div class="col-md-12" style="margin-top: 2%;margin-bottom: 3% ">
           <h4> Izvanredni</h4>
            <table class="table table-striped">
                <thead>

                <th>Broj</th>
                <th>Ime</th>
                <th>Prezime</th>
                <th>              </th>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    @if(($user->status=='izvanredni') && ($user->role=='student'))
                        <tr>

                            <th>{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->last_name}}</td>

                            <td>
                                <div class="botuni_user">
                                    <a href="{{route('users.show',$user->id)}}" class="btn btn-default btn-sm">Vidi</a>
                                </div>

                                <div class="botuni_user">
                                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-default btn-sm">Uredi</a>
                                </div>

                                <div class="botuni_user">
                                    {!!  Form::open(['route'=>['users.destroy',$user->id],'method' => 'DELETE'])!!}
                                    {!! Form::submit('Izbriši',['class' => 'btn btn-danger btn-sm']) !!}

                                    {!! Form::close() !!}
                                </div>
                            </td>

                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>


        </div>


    </div>

@endsection