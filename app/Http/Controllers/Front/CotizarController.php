<?php
namespace App\Http\Controllers\Front;
use App\Models\Almacen;
use App\Models\Citas;
use App\Models\Cliente;
use App\Models\Cotizaciones;
use App\Models\DocumentoPago;
use App\Models\Pedidos;
use App\Models\Productos;
use App\Models\Proveedores;
use App\Models\Reservas;
use App\Models\Servicios;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Faker\Factory as Faker;

class CotizarController extends Controller
{
    public function cotizarServices()
    {

        $dummy= [
            'try' => 'data1',
            'try2' =>'data2'
        ];

        $data['almacen'] =  Almacen::with('pedidos')->get()->toArray();
        $data['citas'] =  Citas::with('servicios')->get()->toArray();
        $data['cliente'] =  Cliente::with('cotizaciones','documentos_pago','pedidos','reservas')->get()->toArray();
        $data['cotizacion'] =  Cotizaciones::with('cliente')->get()->toArray();
        $data['documento'] =  DocumentoPago::with('reservas','pedidos','cliente')->get()->toArray();
        $data['pedido']  =  Pedidos::with('productos','cliente')->get()->toArray();
        $data['producto'] =  Productos::with('proveedores')->get()->toArray();
        $data['proveedor'] =  Proveedores::with('productos')->get()->toArray();
        $data['reservas'] = Reservas::with('cliente','citas')->get()->toArray();
        $data['servicio'] =  Servicios::with('citas')->get()->toArray();
        
        return response()->json($data);
    }
}
