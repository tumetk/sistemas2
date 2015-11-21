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
use App\Services\AuthService;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Faker\Factory as Faker;

class CotizarController extends Controller
{
    public function __construct()
    {
        
        $this->SessionUser = AuthService::getSessionData();
        
    }
    public function cotizarServicesIndex()
    {

        
        $data = [
            'session_user' => $this->SessionUser
        ];
        //return view('productos.index',$data);
    }
}
