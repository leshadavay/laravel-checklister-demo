@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header text-center"><h5> {{ __('Users') }}  </h5></div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{__('Register time')}}</th>
                                    <th scope="col">{{__('User Name')}}</th>
                                    <th scope="col">{{__('User Email')}}</th>
                                    <th scope="col">{{__('User Website')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr >
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->website}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$users->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
