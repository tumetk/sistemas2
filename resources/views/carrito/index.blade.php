@extends('layouts.base')
@section('content')
@if(Session::has('mensaje_exito'))
<div id="message" class="alert alert-success">  
	{{Session::get('mensaje_exito')}}
</div>
@endif
@if(Session::has('error'))
<div id="message" class="alert alert-danger">  
	{{Session::get('error')}}
</div>
@endif
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Carrito</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body">
				@if($pedido != null && !$pedido['productos']->isEmpty())
				@foreach($pedido['productos'] as $producto)
					<form  method="POST" action="{{route('carrito.eliminar',['id_producto'=>$producto->pivot->producto_almacen_id,'id_pedido'=>$producto->pivot->pedido_id])}}"> 
					<input hidden value="1"  name="cliente"	>
					<div class="row form-group">
						<div class="col-lg-6 text-center">
							<div class="input-group text-center">
							
							 <img src="{{asset('assets/img/'.$producto['pivot']['url'])}}" class="img-rounded img-product">
							</div>
						</div>
						<div class="col-lg-6">
							<p><strong>Producto:</strong>{{$producto['descripcion']}}</p>
							<p><strong>Precio:</strong> {{$producto['precio']}}</p>
							<p><strong>Pedido :</strong>{{$producto['pivot']['cantidad']}}</p>
							<p><strong>Monto total:</strong>{{$producto['pivot']['total']}}</p>
							<p><strong>Cantidad eliminar:</strong><input class="form-control form-group" name="cantidad"><button class="btn btn-red">Eliminar</button>
						</div>
					</div>
					</form>
				@endforeach
				<div class="row form-group">
					<form method="post" action="{{route('carrito.confirmar',['id_pedido'=>$pedido->id])}}"> 
						<div class="col-lg-12 text-center">
							<button class="btn btn-primary">Comprar</button>
						</div>
					</form>
				</div>
				@else
				<div class="row">
					<div class="col-lg-12 text-center">
						<div id="message" class="alert alert-danger">  
							Carrito Vacio
						</div>
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@stop