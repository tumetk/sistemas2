@extends('layouts.base')
@section('extra_css')
	<link href="{{ asset('assets/css/checked-list-group.css') }}" rel="stylesheet">
@stop
@section('extra_scripts')
	<script src="{{ asset('assets/js/checked-list-group.js')}}"></script>
	<script src="{{asset('assets/js/users/checked-elements.js')}}"></script>
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create new Group</h1>
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
                <div class="panel-body">
                	<form role="form" method="POST" action={{route('admin.groups.create')}}>
                		{!! csrf_field() !!}
                        <fieldset>
	                        <div class="row">
	                            <div class="col-lg-4">
                                    <div class="form-group">
                                        Name
                                        <input class="form-control" placeholder="" name="name" type="text" autofocus>
                                        <input type="hidden" name="user-elements" value="" id="user-elements">
                                    	<input type="hidden" name="permission-elements" value="" id="permission-elements">
                                    </div>
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
									                		<li class="list-group-item" data-id="{{$user->id}}">
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
					                            Permissions
					                    </div>
					                    <div class="panel-body">
					                        <div class="col-xs-12">
									            <div class="well" style="max-height: 300px;overflow: auto;">
									        		<ul id="check-list-permissions" class="list-group checked-list-box">
									        			@foreach ($permissions as $permission)
									                		<li class="list-group-item" data-id="{{$permission->id}}">
									                			{{$permission->id.'- '.$permission->name}} 
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
	                        		<button type="submit" class="btn btn-lg btn-success btn-block" name ="create" id="submit">
	                        			Create new Group
	                        		</button>
	                        	</div>
	                        </div>
                        </fieldset>
                    </form>
                </div>
                <!-- /.panel-body -->
            </div>

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@stop
