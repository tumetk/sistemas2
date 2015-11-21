<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            
            
            @if($session_user->tipo == 2)
             <li>
                <a href="{{route('productos')}}"><i class="fa fa-money fa-fw"></i> Productos<span class="fa arrow"></span></a>
            </li>
            @endif
            @if($session_user->tipo == 1)
            <li>
                <a href="{{route('reportes')}}"><i class="fa fa-newspaper-o fa-fw"></i> Reportes<span class="fa arrow"></span></a>
                
            </li>
            @endif
            @if($session_user->tipo == 2)
            <li>
                <a href="{{route('cotizar')}}"><i class="fa fa-exclamation fa-fw"></i> Cotizacion</a>
            </li>                
            @endif
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>