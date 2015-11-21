@extends('layouts.base')
@section('content')
@if(Session::has('error'))
<div id="message" class="alert alert-danger">  
	{{Session::get('error')}}
</div>
@endif
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{$producto->descripcion}}</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-6 text-center">
						<div class="input-group text-center">
						 <img class ="img-rounder img-product"src="{{asset('assets/img/'.$producto['proveedores'][0]['pivot']['url'])}}">
						</div>
					</div>
					<form method="POST" action="{{route('productos.agregar',['id_producto'=>$producto->id,'id_proveedor'=>$producto['proveedores'][0]['id'],1])}}">
						<div class="col-lg-6">
							<p><strong>Precio:</strong> {{$producto['proveedores'][0]['pivot']['precio']}}</p>
							<p><strong>Provedor:</strong>{{$producto['proveedores'][0]['descripcion']}}</p>
							<p><strong>Stock Actual:</strong>{{$producto['proveedores'][0]['pivot']['stock']}}</p>
							@if($producto['proveedores'][0]['pivot']['stock'] != 0)
								<label>Cantidad</label><input class="form-control form-group" name="cantidad"><button class="btn btn-primary">Agregar al Carrito</button>
							@else
								<button disabled="true" class="btn">No hay stock</button>
							@endif
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop