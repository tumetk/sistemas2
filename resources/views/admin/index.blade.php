@extends('layouts.base')
@section('content')
        <div id="message" class="">  
        </div>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        @if($session_user->permissions->contains('route', 'admin.users.list'))
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">Usuarios</div>
                            </div>
                        </div>
                    </div>
                    <a href={{route('admin.users.list')}}>
                        <div class="panel-footer">
                            <span class="pull-left">Ver</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        @endif
        @if($session_user->permissions->contains('route', 'admin.groups.list'))
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-users fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">Grupos</div>
                            </div>
                        </div>
                    </div>
                    <a href={{route('admin.groups.list')}}>
                        <div class="panel-footer">
                            <span class="pull-left">Ver</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        @endif
        @if($session_user->permissions->contains('route', 'admin.permissions.list'))
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-key fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">Permisos</div>
                            </div>
                        </div>
                    </div>
                    <a href={{route('admin.permissions.list')}}>
                        <div class="panel-footer">
                            <span class="pull-left">Ver</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        @endif
    </div>
    <!-- /.row -->
@stop

