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

class CarritoController extends Controller
{
    
	public function index()
	{
		
		$cliente_id =  Auth::user()->id;
		$pedido = Pedidos::with('productos')->where('confirmado',0)->where('cliente_id',$cliente_id)->first();

		$data = [

			'pedido'=> $pedido,
		];

		return view('carrito.index',$data);
	}


	public function eliminarProducto($id_producto,$id_pedido,Request $request)
	{

		$pedido = Pedidos::with(['productos'=>function($q) use ($id_producto){
			$q->where('producto_almacen_id',$id_producto);
		}])->where('id',$id_pedido)->first();
		$producto_pedido = $pedido['productos'][0];
		$producto = Almacen::find($id_producto);
		$cantidad = $request->input('cantidad');

		if($cantidad > $producto_pedido->pivot->cantidad || $cantidad <0 ){
			return redirect()->route('carrito',['id'=>$request->input('cliente')])->with('error','Cantidad a eliminar no valida');			
		}
		$producto->stock += $cantidad;
		$pedido->total -= $cantidad*$producto_pedido->precio;
		$producto->save();
		if($cantidad < $producto_pedido->pivot->cantidad)
		{
			$cantidad = $producto_pedido->pivot->cantidad - $cantidad;
			$precio = $cantidad*$producto_pedido->precio;
			$url = $producto_pedido->url;
			$descripcion = $producto_pedido->descripcion;
			$pedido->productos()->detach($id_producto);
			$pedido->productos()->attach([$id_producto =>['cantidad'=>$cantidad,'total'=> $precio,'descripcion'=>$descripcion,'url'=>$url]]);


		}else
		{
			$pedido->productos()->detach($id_producto);
		}
		$cliente_id =  Auth::user()->id;
		return redirect()->route('carrito',['id'=>$cliente_id])->with('mensaje_exito','Producto eliminado del carrito');

	}

	public function confirmar($id_pedido)
	{
		$pedido = Pedidos::find($id_pedido);

		$pedido->confirmado = 1 ;
		$pedido->save();
		$cliente_id = Auth::user()->id;
		$documento = DocumentoPago::create([
				'pedido_id' => $pedido->id,
				'reserva_id' => null,
				'cliente_id' => $cliente_id ,
				'total'      => $pedido->total,
				'subtotal'   => $pedido->total/ 1.19,
				'igv'        =>$pedido->total *0.19 / 1.19,
			]);

		$documento->save();

		return redirect()->route('productos')->with('exito','Tu compra ha sido realizada');

	}
   
}

