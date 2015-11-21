<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<style type="text/css">
body {
	margin: 50px 35px 35px 35px;
	color : #8B8D8E;
	background-color: #FFF;
	font-family: Arial;
	font-size: 12px;
	text-align:center;
}

#contenedor {
	width:542px;
	height:400px;
	margin:0 auto;
	text-align:left;
}
#titulo {
	color:#0099CC;
	font-size:14px;
	font-weight:bold;
	text-align:center;
	margin-top:0px;
}
#num_cotizacion {
	color:#00AF3F;
	font-size:12px;
	font-weight:bold;
	text-align:center;
	margin-top:10px;
}
#subtitulo {
	color:#0099CC;
	font-size:12px;
	font-weight:bold;
	text-align:left;
	margin:5px 5px 0px 5px;
}
.sub {
	color:#00AF3F;
	font-size:12px;
	text-align:left;
	margin:15px 15px 15px 15px;

}
.table_info{
	padding:5px 5px 5px 5px;
	width:100%;
	margin-top:10px;
	border:#0099CC solid 1px;
	border-spacing:0;
	font-family: Arial;
	font-size:12px;
}

.table_info tr td{
	padding-bottom:0;
}

.bold{
	font-weight:bold;
}

.bold_center{
	font-weight:bold;
	text-align:center;
}

.bold_right{
	font-weight:bold;
	text-align:right;
}
.bold_right_orange{

	color:#FF6319;
	font-weight:bold;
	text-align:right;
	padding:5px 5px 5px 5px;
}

.detalle_cotizacion{
	padding:5px 5px 5px 5px;
	width:50%;
	margin-top:0px;
	border-spacing:0;
	font-family: Arial;
	font-size:12px;
}

.table_data{
	margin-top:10px;
	width:80%;

	border: #8B8D8E solid 1px;
	border-collapse:collapse;
	font-family: Arial;
	font-size:12px;
	margin: 0 auto;

}
.table_data td{

	border:#8B8D8E solid 1px;
	padding-left:5px;
	padding-right:5px;

}

.resaltar{
	color:#0099CC;
}

.align_td{
	text-align:right;
}
.restrictions{
	font-size:10px;
	margin:10px 10px 10px 10px;
}
.group{
	margin-top:5px;
}
.benefits{
	font-size:12px;
}
.benefits ul {
	color:#0099cc;
}

.benefits span{
	color:#8B8D8E;
}
#leg_benefits{
	margin-left:30px;
	margin-bottom:5px;
}
.consultas{
	color:#00AF3F;
	font-size:12px;
	margin-left:5px;
	margin-bottom:5px;
}
.disclaimer{
	font-size:12px;
	margin-left:5px;
	margin-bottom:5px;
}
.motto{
	font-size:12px;
	font-weight:bold;
	margin-left:5px;
}
.links{
	font-size:10px;
	color:#0099cc;

}

#nota{
	font-size:10px;

}

.vineta {
	margin-right:1px;
	float:left;
	width:5%;

}
.respuesta {
	width:90%;
	float:left;
	margin-bottom:10px;

}
#espacio {
	clear:both;
	height:10px;
}
#footer {
	border-top:2px solid #4077A0;
	clear:both;
	color:#4077A0;
	font-weight:bold;
	margin:20px auto 0;
	padding-bottom:10px;
	padding-top:10px;
	text-align:center;
	width:540px;
}
#logo img {

	width:100px;
	height:60px;
	margin-left:5px;
	margin-bottom:10px;
}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	</head>
	<body style="margin: 50px 35px 35px 35px;
	color : #8B8D8E;
	background-color: #FFF;
	font-family: Arial;
	font-size: 12px;
	text-align:center;">

	<div id=contenedor style="width:542px; height:400px; margin:0 auto; text-align:left;">
		<div id="logo">
			<img style="width:100px; height:60px; margin-left:5px; margin-bottom:10px;" src="{{ asset('assets/img/header/logo_pacifico_pdf.png') }}">
		</div>
		<div id="subtitulo" style="color:#0099CC; font-size:12px; font-weight:bold; text-align:left; margin:5px 5px 0px 5px;">Estimado(a) {{ $to_name }},</div>
		<div id="espacio" style="clear:both; height:10px;"></div>
		<div id="cuerpo" style="margin:5px 5px 0px 5px; color:#8B8D8E;">

		<p>Pensando en tu tranquilidad y la de tu familia, {{ $from_name }} ha generado una cotización del {{ $nombre_plan }} de Pacífico Seguros que desea compartir contigo a través del pdf adjunto.</p>

		<p>{{ $message_text }}</p>

		</div>
		<div style="color:#00af3f;font-family:Arial;font-size:12px;text-align:left;margin:15px 15px 15px 15px">Detalle de la Cotización</div>

		<div id="resumen-container">
			<table style="padding:5px 5px 5px 5px;width:100%;margin-top:12px;border:#0099cc solid 1px;border-spacing:0;font-family:Arial;font-size:12px">
				<tr>
					<td class="row-header">Tipo de Cotización</td>
					<td class="resaltar">: Seguros de {{ $nombre_plan}}</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td class="row-header">Fecha de Cotización</td>
					<td>{{ date('d/m/Y') }}</td>
					<td class="row-header">Hora de Cotización</td>
					<td>: {{ date('H:m') }} hrs.</td>
				</tr>
			</table>
		</div>

		<div style="clear:both;min-height:10px"></div>

		<table style="padding:5px 5px 5px 5px;width:100%;margin-top:10px;border:#0099cc solid 1px;border-spacing:0;font-family:Arial;font-size:12px">
						<tbody><tr>
							<td style="font-weight:bold;padding-bottom:0">Nombre del producto </td>
							<td style="color:#0099cc;padding-bottom:0">:&nbsp;&nbsp;&nbsp;&nbsp;{{ $nombre_plan }}</td>
							<td style="padding-bottom:0"></td>
							<td style="padding-bottom:0"></td>
						</tr>
						@foreach($cotizacion_asegurados as $asegurado)

						<tr>
							<td class="row-header">
							@if ($asegurado['asegurado']['tipo'] == TITULAR_ID)
							Edad del titular
							@elseif ($asegurado['asegurado']['tipo'] == CONYUGUE_ID)
							Edad del cónyuge
							@elseif ($asegurado['asegurado']['tipo'] == HIJOS_ID)
							Edad del dependiente
							@endif
							</td>
							<td>:&nbsp;&nbsp;&nbsp;&nbsp;{{ $asegurado['asegurado']['edad'] }} años</td>
						</tr>

						@endforeach
						<tr></tr>
						<tr>
							<td colspan="4" style="color:#ff6319;font-weight:bold;text-align:right;padding:5px 5px 5px 5px">Total A Pagar : S/. {{ $total }} (sin deducible)</td>
						</tr>
						<tr></tr>
						<tr>
							<td colspan="4" style="font-size:10px;margin:10px 10px 10px 10px">Con débito automático:
		- 1 cuota sin interés.
		- 4 cuotas sin intereses.**
		- 6 cuotas (aplican intereses con una TCEA 12%).
		- 10 cuotas (aplica intereses con una TCEA 12%).*
		- 12 cuotas (aplican intereses con una TCEA de 12 %).**
		Con cupones:
		- 1 cuota sin interés.
		- 4 cuotas sin intereses*.
		- 6 cuotas (aplican intereses con una TCEA de 17.5%).*
		-10 cuotas (aplican intereses con una TCEA de 17.5%).*
		-12 cuotas (aplican intereses con una TCEA de 17.5%).*


		* Solo a través de corredores
		** Solo a través de asesores</td>
						</tr>
						
						
		</tbody></table>

		<div id="espacio" style="clear:both; height:10px;"></div>
		<div class="motto" style=" font-size:12px;  font-weight:bold;	margin-left:5px; color:#8B8D8E;">Pacífico Seguros</div>
		<div id="espacio" style="clear:both; height:10px;"></div>
		<div class="links" style="font-size:10px; color:#0099cc;" >
			www.pacificoseguros.com
		<div id="espacio" style="clear:both; height:3px;"></div>
			www.facebook.com/pacificoseguros
		</div>
		<div id="nota" style="font-size:10px; color:#8B8D8E">
			Nota: Este correo es generado automáticamente por lo que agradecemos no responder a esta dirección de correo electrónico.
		</div>
	</div>

	</body>
</html>