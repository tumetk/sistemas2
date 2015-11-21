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
use Auth;
use App\Services\AuthService;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Faker\Factory as Faker;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function __construct()
    {
        
        $this->SessionUser = AuthService::getSessionData();
        
    }
    public function index()
    {
        
        
        $productos = Productos::with('proveedores')->get();
        $data = [
            'session_user' => $this->SessionUser,
            'productos' => $productos,
        ];
        return view('productos.index',$data);
    }

    public function select($id_producto,$id_proveedor)
    {
    	$producto = Productos::with(['proveedores' => function($q) use($id_proveedor){
            $q->where('proveedor_id',$id_proveedor);
        }])->where('id',$id_producto)->first();

        
        

    	$data = [
    		'session_user' => $this->SessionUser,
    		'producto'     => $producto,
    	];

    	return view('productos.select',$data);
    }
    


    public function agregarCarrito($id_producto ,$id_proveedor,Request $request)
    {
        

        $producto = Almacen::where('producto_id',$id_producto)->where('proveedor_id',$id_proveedor)->first();
        $cantidad = $request->input('cantidad');

        $validator =  Validator::make(['cantidad'=>$cantidad],$this->rules());

        if($cantidad< 0)
        {
            return redirect()->route('productos.detalle',['id_producto'=>$id_producto,'id_proveedor'=>$id_proveedor])->with('error','Cantidad no Valida');   
        }
        if($producto->stock < $cantidad)
        {
            return redirect()->route('productos.detalle',['id_producto'=>$id_producto,'id_proveedor'=>$id_proveedor])->with('error','Cantidad no validad');
        }

        $producto->stock = $producto->stock - $cantidad;
        $producto->save();
        $cliente_id = Auth::user()->id;
        
        $pedido = Pedidos::where('user_id',$cliente_id)->where('confirmado',0)->first();

        if( $pedido == NULL){
            $pedido = Pedidos::create([

                    'user_id' => $cliente_id,
                    'total'      => 0 ,
                    'confirmado' => 0,
                ]);
        };

        $pedido->total = $pedido->total + $cantidad*$producto->precio;
        $pedido->save(); 
        $pedido->productos()->attach($producto->id,['cantidad'=>$cantidad,'total'=> $cantidad*$producto->precio,'descripcion'=>$producto->descripcion,'url'=>$producto->url]);
        
        return redirect()->route('productos')->with('exito_agregar','Producto agregado al carrito correctamente');

    }

    public function rules()
    {
        return [
            'cantidad' => 'required|min:1'
        ];
    }
}
