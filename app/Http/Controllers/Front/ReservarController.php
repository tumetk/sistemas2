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
use Auth;
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

    public function agregarServicio($id_servicio)
    {
        $cliente_id = Auth::user()->id;
        $cotizacion = Cotizaciones::where('observaciones',0)->where('user_id',$cliente_id)->first();

        if($cotizacion == null){
        	$cotizacion = Cotizaciones::create([
        			'user_id' => $cliente_id ,
        			'observaciones' => 0,
        		]);
        }

       $cotizacion->servicios()->attach($id_servicio);

       return redirect()->route('cotizar')->with('exito','Servicio agregado a cotizacion correctamente');
    }

    

    public function confirmarCotizacion()
    {
    	$cliente_id = Auth::user()->id;
        $cotizacion = Cotizaciones::with('servicios')->where('observaciones',0)->where('user_id',$cliente_id)->first();
	    $total = 0 ;


    	if($cotizacion!=null)
    	{
    		$cotizacion->observaciones = 1;
    		$cotizacion->save();
	    	foreach ($cotizacion['servicios'] as $servicio) {
	    		$total += $servicio['precio'];
	    	}
    	}
    	$data= [
    		'session_user' =>$this->SessionUser,
    		'total'        => $total,
    		'cotizacion'   => $cotizacion,
    	];

    	return view('servicios.confirmar',$data);


    }

    public function finCotizacion()
    {
    	return redirect()->route('cotizar')->with('fin','Has confirmado tu cotizacion se te llamara para poder reservar una cita proximamente');
    }
}
