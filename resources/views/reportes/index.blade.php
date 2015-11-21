
@extends('layouts.base')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Reporte de documentos de pago</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Filtros
                </div>
                <div class="panel-body">
                <form method="GET" action="{{route('reportes')}}">
                    <div class="row">
                        
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>Fecha Inicio</label>
                                <input type="text" class="form-control" name="fecha_inicio" id="datepickerInicio">
                            </div>        
                        </div>
                        <div class="col-lg-2 col-lg-offset-1">
                            <div class="form-group">
                                <label>Fecha Fin</label>
                                <input type="text" class="form-control" name="fecha_fin" id="datepickerFin">
                            </div>
                        </div>
                      
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <button  type="submit" class="btn btn-default">Buscar</button>
                            <a href="{{route('reportes')}}" type="button" class="btn btn-default">Limpar Filtros</a>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
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
								<th>Cliente</th>
								<th>Igv</th>
								<th>Subtotal</th>
								<th>Total</th>
							</thead>
							<tbody>
								@foreach($documentos as $documento)
									<tr>
										<td>{{$documento->id}}</td>
										<td>{{$documento->cliente_id}}</td>
										<td>{{$documento->igv}}</td>
										<td>{{$documento->subtotal}}</td>
										<td>{{$documento->total}}</td>
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
