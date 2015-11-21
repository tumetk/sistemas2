@extends('layouts.base')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body">
				@if($cotizacion != null)
				<div class="row form-group">
					<div class="col-lg-12">
						<div class="form-group">
							<label>Codigo:</label><input class="form-control" disabled="true" value="{{$cotizacion->id}}">
							
						</div>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-lg-12 table-responsive">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<th>Codigo</th>
								<th>Servicio</th>
								<th>Descripcion</th>
								<th>Precio</th>
							</thead>
							<tbody>
								@foreach($cotizacion['servicios'] as $servicio)
									
                                    <tr>
										<td>{{$servicio->id}}</td>
										<td>{{$servicio->detalle}}</td>
										<td>{{$servicio->detalle}}</td>
										<td>{{$servicio->precio}}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-lg-12 text-center">
						<a href="{{route('cotizar.finalizar')}}"><button class="btn btn-primary">Finalizar</button></a>
					</div>
				</div>
			</div>
			@else
			<div class="row">
					<div class="col-lg-12 text-center">
						<div id="message" class="alert alert-danger">  
							Cotizacion Vacia
						</div>
					</div>
				</div>
			@endif
		</div>
	</div>
</div>
@stop