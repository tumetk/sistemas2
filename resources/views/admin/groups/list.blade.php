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
            <h1 class="page-header">Groups</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            @if (count($groups) === 0)
                <div class="jumbotron">
                    <p>There are no Groups available<p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Creation Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($groups as $group)
                                <tr>
                                <td>{{$group->id}}</td>
                                <td>{{$group->name}}</td>
                                <td>{{$group->created_at}}</td>
                                <td>
                                    <a href="{{route('admin.groups.edit', ['id' => $group->id])}}" type="button" class="btn btn-primary btn-circle">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="{{route('admin.groups.delete', ['id' => $group->id])}}" type="button" class="btn btn-danger btn-circle">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            @endif
                <a href="{{route('admin.groups.create')}}" type="button" class="btn btn-primary pull-right" >
                    Create new Group
                </a>
        </div>
        <!-- /.col-lg-12 -->
    </div>
@stop