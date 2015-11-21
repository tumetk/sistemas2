@extends('layouts.base')
@section('content')
@extends('layouts.base')
@section('content')

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
				<div class="row">
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
									<tr>
										<td>{{$servicio->id}}</td>
										<td>{{$servicio->nombre}}</td>
										<td>{{$servicio->descripcion}}</td>
										<td>{{$servicio->precio}}</td>
                                        <td><button class="btn btn-primary">Agregar a la cotizacion</button></td>
									</tr>
								@endforeach
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
