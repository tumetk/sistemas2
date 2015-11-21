@extends('layouts.base')
@section('extra_css')
    <link href="{{asset('assets/css/checked-list-group.css')}}" rel="stylesheet">
@stop
@section('extra_scripts')
    <script src="{{asset('assets/js/checked-list-group.js')}}"></script>
    <script src="{{asset('assets/js/users/checked-elements.js')}}"></script>
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Permission</h1>
        </div>
            <!-- /.col-lg-12 -->
    </div>
        <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                        ID: {{$permission->id}}
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{route('admin.permissions.edit', ['id' => $permission->id])}}">
                        {!! csrf_field() !!}
                        <fieldset>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        New Name
                                        <input class="form-control" placeholder="{{$permission->name}}" name="name" value="{{$permission->name}}" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        New Route
                                        <select class="form-control"  name="route" id="route">
                                         <option selected disabled>Select a Route</option>
                                            @foreach ($permissions as $p)
                                                <option
                                                    @if ($p->id == $permission->id)
                                                        selected="true"
                                                    @endif
                                                >
                                                    {{$p->route}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" name="user-elements" value="" id="user-elements">
                                    <input type="hidden" name="group-elements" value="" id="group-elements">
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                                <div class="col-lg-4">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                                Users
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-xs-12">
                                                <div class="well" style="max-height: 300px;overflow: auto;">
                                                    <ul id="check-list-users" class="list-group checked-list-box">
                                                       @foreach ($users as $user)
                                                            <li 
                                                                class="list-group-item"
                                                                data-id="{{$user->id}}"
                                                                @if (in_array($user->id, $permission_users))
                                                                    data-checked="true"
                                                                @endif
                                                            >
                                                                @if (in_array($user->id, $inherited_permissions_users))
                                                                    (Inherited)<br>
                                                                @endif
                                                                {{$user->id.'- '.$user->name}} 
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.panel-body -->
                                    </div>
                                    <!-- /.panel -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                                <div class="col-lg-4">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                                Groups
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-xs-12">
                                                <div class="well" style="max-height: 300px;overflow: auto;">
                                                    <ul id="check-list-groups" class="list-group checked-list-box">
                                                        @foreach ($groups as $group)
                                                            <li 
                                                                class="list-group-item"
                                                                data-id={{$group->id}}
                                                                @if (in_array($group->id, $permission_groups))
                                                                    data-checked="true"
                                                                @endif
                                                            >
                                                                {{$group->id.'- '.$group->name}} 
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.panel-body -->
                                    </div>
                                    <!-- /.panel -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->

                            </div>
                            <!-- /.row (nested) -->
                            <div class="row">
                                <div class="col-lg-4">
                                    <button 
                                        type="submit" 
                                        class="btn btn-lg btn-success btn-block"
                                        id="submit"
                                    >
                                    Done
                                    </button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@stop