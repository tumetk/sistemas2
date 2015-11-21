@extends('layouts.base')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if (session('errors'))
                    <div class="alert alert-danger">
                        {{ session('errors') }}
                    </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)  
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <a href="{{route('admin.users.edit', ['id' => $user->id])}}" type="button" class="btn btn-primary btn-circle">
                                            <i class="fa fa-pencil"></i>
                                        </a>  
                                        <a href="{{route('admin.users.delete', ['id' => $user->id])}}" type="button" class="btn btn-danger btn-circle">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $users->appends(['search' => Request::input('search')])->render() !!}
            </div>
            <a href="{{route('admin.users.create')}}" type="button" class="btn btn-primary pull-right">
                Nuevo usuario   
            </a>
        </div>
        <!-- /.col-lg-12 -->
    </div>
@stop