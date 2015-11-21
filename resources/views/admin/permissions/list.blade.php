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
            <h1 class="page-header">Permissions</h1>
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
                            <th>Route</th>
                            <th>Creation Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                            <td>{{$permission->id}}</td>
                            <td>{{$permission->name}}</td>
                            <td>{{$permission->route}}</td>
                            <td>{{$permission->created_at}}</td>
                            <td>
                                <a href="{{route('admin.permissions.edit', ['id' => $permission->id])}}" type="button"  class="btn btn-primary btn-circle">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="{{route('admin.permissions.delete', ['id' => $permission->id])}}" type="button"  class="btn btn-danger btn-circle">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
            <a href="{{route('admin.permissions.create')}}" type="button" class="btn btn-primary pull-right" >
                New Permission
            </a>
        </div>
        <!-- /.col-lg-12 -->
    </div>
@stop