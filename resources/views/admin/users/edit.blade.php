@extends('layouts.base')
@section('extra_css')
    <link href={{asset("assets/css/checked-list-group.css")}} rel="stylesheet">
@stop
@section('extra_scripts')
    <script src = {{asset("assets/js/checked-list-group.js")}}></script>
    <script src = {{asset("assets/js/users/checked-elements.js")}}></script>
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edición de usuario</h1>
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
                        Id de usuario: {{$user->id}}
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action={{route('admin.users.edit', ['id' => $user->id])}}>
                        {!! csrf_field() !!}
                        <fieldset>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        Nuevo Nombre
                                        <input class="form-control" placeholder={{$user['name']}} name="name" value={{$user['name']}} type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        Nuevo email
                                        <input class="form-control" placeholder={{$user['email']}} name="email" value={{$user['email']}} type="email" autofocus>
                                    </div>
                                    <div class="form-group">
                                         Nueva contraseña
                                        <small><small>(opcional)</small></small>
                                        <input class="form-control"  name="password" type="password"  autofocus>
                                    </div>
                                     <div class="form-group">
                                        Repita la nueva contraseña
                                        <input class="form-control"  name="password_confirmation" type="password" autofocus>
                                    </div>
                                    <input type="hidden" name="group-elements" value="" id="group-elements">
                                    <input type="hidden" name="permission-elements" value="" id="permission-elements">
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                                <div class="col-lg-4">                                   
                                    <div class="col-xs-12">
                                        Grupos
                                        <div class="well" style="max-height: 300px;overflow: auto;">
                                            <ul id="check-list-groups" class="list-group checked-list-box">       
                                                @foreach($groups as $group)
                                                    <li 
                                                        class="list-group-item"
                                                        data-id={{$group->id}}
                                                        @if(in_array($group->id, $user_groups))
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
                                <!-- /.col-lg-4 (nested) -->
                                <div class="col-lg-4">                                    
                                    <div class="col-xs-12">
                                        Permisos
                                        <div class="well" style="max-height: 300px;overflow: auto;">
                                            <ul id="check-list-permissions" class="list-group checked-list-box">
                                                @foreach($permissions as $permission)
                                                    <li 
                                                        class="list-group-item"
                                                        data-id={{$permission->id}}
                                                        @if(in_array($permission->id, $user_permissions))
                                                            data-checked="true"
                                                        @endif
                                                    >
                                                        @if(in_array($permission->id, $groups_permissions))
                                                            (Heredado)<br>                                                  
                                                        @endif
                                                         {{$permission->id.'- '.$permission->name}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                            <div class="row">
                                <div class="col-lg-4">
                                    <button 
                                        type="submit" 
                                        class="btn btn-lg btn-success btn-block"
                                        name ="update"
                                        id="submit"
                                    >
                                    Terminar
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
