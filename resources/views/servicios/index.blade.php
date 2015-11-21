@extends('layouts.base')
@section('content')
@if(Session::has('exito'))
<div id="message" class="alert alert-success">  
    {{Session::get('exito')}}
</div>
@endif
@if(Session::has('fin'))
<div id="message" class="alert alert-success">  
    {{Session::get('fin')}}
</div>
@endif
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Servicios</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row form-group">
					<div class="col-lg-12 table-responsive">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<th>Codigo</th>
								<th>Servicio</th>
								<th>Descripcion</th>
								<th>Precio</th>
                                <th>Acciones</th>
							</thead>
							<tbody>
								@foreach($servicios as $servicio)
									<form method="post" action="{{route('cotizar.agregar',['id_servicio'=>$servicio->id])}}">
                                    <tr>
										<td>{{$servicio->id}}</td>
										<td>{{$servicio->detalle}}</td>
										<td>{{$servicio->detalle}}</td>
										<td>{{$servicio->precio}}</td>
                                        <td><button class="btn btn-primary">Agregar a la cotizacion</button></td>
									</tr>
                                    </form>
								@endforeach
							</tbody>
						</table>

					</div>
				</div>
                <div class="row form-group">
                    <div class="col-lg-12 text-center">
                        <a href="{{route('cotizar.confirmar')}}"><button class="btn btn-primary">Terminar Cotizacion</button></a>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
@stop
