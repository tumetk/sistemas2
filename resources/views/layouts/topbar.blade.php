<ul class="nav navbar-top-links navbar-right">
	<li class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			<i class="fa fa-user fa-fw"></i> 
			{{$session_user->nombre}}
		    <i class="fa fa-caret-down"></i>
		</a>
		<ul class="dropdown-menu dropdown-user">
			<li class="divider"></li>
			<li><a href={{route('auth.logout')}}><i class="fa fa-sign-out fa-fw"></i> Logout </a>
			</li>
		</ul>
		<!-- /.dropdown-user -->
	</li>
	@if($session_user->tipo == 2)
	<li class="">
		<a  href="{{route('carrito',['id'=>$session_user->id])}}">
			<i class="fa fa-shopping-cart fa-fw"></i> 
			
		    <i class="fa fa-caret-down"></i>
		</a>
	</li>
	@endif
	<!-- /.dropdown -->
</ul>