<?php
namespace App\Http\Controllers\Back;
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
use User;
class ReporteController extends Controller
{
    public function __construct()
    {
        
        $this->SessionUser = AuthService::getSessionData();
        
    }
    public function index(Request $request)
    {
        $documentos = DocumentoPago::with('cliente');

        $searchFechaInicio = $request->input('fecha_inicio');
		$searchFechaFin    = $request->input('fecha_fin');
    	if ($searchFechaInicio && $searchFechaFin) 
		{
			$documentos->where('created_at','>=',$searchFechaInicio);
			$documentos->where('created_at','<=',$searchFechaFin ."+1 day" );
			
			
		}
		elseif($searchFechaInicio)
		{
			
			$documentos->where('created_at','>=',$searchFechaInicio);
			
		}
		elseif ($searchFechaFin) 
		{
			
			$documentos->where('created_at','<=',$searchFechaFin ."+1 day" );
			
			
		}
		$documentos = $documentos->get();
        $data = [
            'session_user' => $this->SessionUser,
            'documentos' => $documentos,
        ];
       
        return view('reportes.index',$data);
    }


}
