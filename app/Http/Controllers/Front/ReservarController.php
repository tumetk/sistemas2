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
use Illuminate\Http\Request;

class ReservarController extends Controller
{
    public function __construct()
    {
        
        $this->SessionUser = AuthService::getSessionData();
        
    }
    public function index()
    {
        
        $servicios = Servicios::all();
        $data = [
            'session_user' => $this->SessionUser,
            'servicios' => $servicios,
        ];
       
        return view('servicios.index',$data);
    }

    public function select($id)
    {
    	$servicio = Servicios::find($id);
    	$data = [
            'session_user' => $this->SessionUser,
            'servicios' => $servicio,
        ];
       return view('servicios.select',$data);
    }

    public function reservar(Request $request)
    {
    	
    }

}
