@extends('layouts.base')
@section('content')
@if(Session::has('exito_agregar'))
<div id="message" class="alert alert-success">  
	{{Session::get('exito_agregar')}}
</div>
@endif
@if(Session::has('exito'))
<div id="message" class="alert alert-success">  
	{{Session::get('exito')}}
</div>
@endif
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Productos</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					@foreach($productos as $producto)
						@foreach($producto->proveedores as $provedor)
							<div class="col-lg-4 form-group">
								<div class="row">
									<div class="col-lg-12 text-center">
										<img src="/assests/img/email.png">
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 text-center">
										<span>{{$producto->descripcion}}</span>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 text-center">
										<strong>Precio:</strong><span>{{$provedor->pivot->precio}}</span>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 text-center">
										<strong>Provedor:</strong><span>{{$provedor->descripcion}}</span>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 text-center">
										<a href="{{route('productos.detalle',['id_producto'=>$producto->id,'id_proveedor'=>$provedor->id])}}"><button class="btn btn-primary">Comprar</button></a>
									</div>
								</div>
							</div>
						@endforeach
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@stop