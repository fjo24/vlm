<?php

namespace App\Http\Controllers;

use App\Catalogo;
use App\Categoria;
use App\Dato;
use App\Descuento;
use App\Pedido;
use App\Producto;
use App\Banner;
use App\Modelo;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ZprivadaController extends Controller
{

    public function productos($id)
    {
        $activo        = 'productos';
        $todos = 'si';
        $categoria     = Categoria::find($id);
        $productos     = Producto::orderBy('orden', 'ASC')->Where('categoria_id', $id)->get();
        $ready         = 0;

        return view('privada.pedidos.productos', compact('categoria', 'productos', 'activo', 'ready', 'todos'));
    }

    public function productoinfo($id)
    {
        $p     = Producto::find($id);
        $categoria = Categoria::find($p->categoria_id);
        $ready         = 0;
        $relacionados  = Producto::OrderBy('orden', 'ASC')->Where('categoria_id', $p->categoria_id)->get();
        $activo        = 'productos';
        $productos     = Producto::OrderBy('categoria_id', 'ASC')->get();

        return view('privada.pedidos.productoinfo', compact('categoria', 'productos', 'ready', 'activo', 'p', 'relacionados'));
    }


    public function add(Request $request)
    {
        $activo    = 'productos';
        $carrito   = Cart::content();
        $items     = $carrito->all();
        $ready     = 0;
        $config    = 4;
        $im        = 0;
        $shop      = 0;
        $total_items = 0;
        $productos = Producto::OrderBy('orden', 'DESC')->get();
        $producto  = Producto::find($request->id);
        $modelo  = Modelo::find($request->modelo_id);
        //dd($request->medida);
        //dd($producto);
        foreach ($producto->imagenes as $img) {
            $imagen = $img->imagen;
            if ($im == 0) {
                break;
            }
        }
        
        $categoria = $producto->categoria->nombre;     

        if ($request->cantidad > 0) {
            Cart::add(['id' => $producto->id, 'name' => $producto->nombre, 'price' => $request->precio, 'qty' => $request->cantidad, 'options' => ['orden' => $producto->orden, 'modelo' => $modelo->nombre, 'imagen' => $imagen, 'categoria' => $categoria, 'codigo' => $request->codigo]]);
            return redirect()->route('carrito', compact('shop', 'medida', 'carrito', 'activo', 'productos', 'ready', 'prod', 'config', 'items', 'codigo', 'desc', 'iva'));
        } else {
            return back();
        }
    }

    public function carrito(Request $request)
    {

        $activo = 'carrito';
        $banner = Banner::Where('seccion', 'ofertas')->first();
        $total_items = 0;
        $subtotal    = Cart::Subtotal();
        $total       = Cart::Total();
        $carrito     = Cart::content();
        $total      = str_replace(',', '', $total);
        $subtotal   = str_replace(',', '', $subtotal);
        $diferencia = null;
        $id_desc = 0;
        $descuento_item = 0;
        $descuento_total = 0;
        $desc = 0;
        $total_iva = 0;

        if (count($carrito)>0) {
            # code...
        foreach (Cart::content() as $row) {
            if ($row->options->aplica_desc==1) {
                $total_items = $total_items + $row->qty;
            }
            
        }

//dd($desc);
//descuento en pesos
        $descuento = $descuento_total;
//iva
        $subtotal_desc = $subtotal-$descuento;
$constante = 21/100;
$iva = ($subtotal*$constante);

        $totales = $subtotal+$iva;
      //  $descuento = $total;
        }
        return view('privada.pedidos.carrito', compact('banner', 'activo', 'constante','desc', 'descuento', 'iva', 'totales', 'descuentos', 'diferencia', 'proximo'));
    }

    public function send(Request $request)
    {
        $fecha       = Carbon::now()->format('Y-m-d');
        $activo      = 'carrito';
        $total_items = 0;
        $dato        = Dato::where('tipo', 'email')->first();
        $subtotal    = Cart::Subtotal();
        $total       = Cart::Total();
        $carrito     = Cart::content();
        $total_iva = 0;
        $desc = 0;
        $id_desc = null;

        $pedido               = new Pedido;
        $pedido->fecha        = $fecha;
        $pedido->iva          = $request->iva;
        $pedido->subtotal     = $request->total;
        $pedido->total        = $request->totales;
        $pedido->user_id      = Auth()->user()->id;
        $pedido->save();

        foreach (Cart::content() as $row) {
            $producto = $row->name;
            $cantidad = $row->qty;
            $precio   = $row->price;
            $costo = $row->price * $row->qty;
            $r_iva = $row->options->iva/100;
            $total_ivap = $costo*$r_iva;
            $total_costo = $total_ivap + $costo;
            //$idproducto = $row->rowId
            $total_items = $total_items + $row->qty;
            $pedido->productos()->attach($producto, ['cantidad' => $row->qty, 'pedido_id' => $pedido->id, 'producto_id' => $row->id, 'modelo' => $row->options->modelo, 'costo' => $row->price * $row->qty, 'total' => $total_costo]);
        }

        $carrito = Cart::content();
        $items   = $carrito->all();

        $mensaje = $request->input('mensaje');
        // dd($request->total);
        $nombre       = Auth()->user()->name;
        $apellido     = Auth()->user()->apellido;
        $emailcliente = Auth()->user()->email;
        $username     = Auth()->user()->username;
        $social       = Auth()->user()->social;
        $cuit         = Auth()->user()->cuit;
        $telefono     = Auth()->user()->telefono;
        $direccion    = Auth()->user()->direccion;

        //dd($descuento);

        Mail::send('privada.mailpedido', ['total' => $pedido->total, 'username' => $username, 'nombre' => $nombre, 'apellido' => $apellido, 'social' => $social, 'cuit' => $cuit, 'telefono' => $telefono, 'direccion' => $direccion, 'emailcliente' => $emailcliente, 'items' => $items, 'row' => $row, 'subtotal' => $pedido->subtotal, 'mensaje' => $mensaje, 'iva' => $pedido->iva], function ($message) use ($nombre, $apellido) {

            $dato = Dato::where('tipo', 'email')->first();
            $message->from('info@aberturastolosa.com.ar', 'VLM | Pedidos');

            $message->to($dato->descripcion);

            //Add a subject
            $message->subject('Pedido de ' . $nombre . ' ' . $apellido);

        });
        if (count(Mail::failures()) > 0) {

            $failed = 'Ha ocurrido un error al enviar el correo';

        } else {

            $success = 'Pedido enviado correctamente';

        }

        Cart::destroy();
    return redirect()->route('carrito');
     //   return view('privada.carrito', compact('activo', 'success'));

    }

    public function delete($id)
    {
        $activo = 'carrito';
        Cart::remove($id);
        return redirect()->route('carrito');
    }

    public function listadeprecios()
    {
        $activo   = 'lista';
        $banner = Banner::Where('seccion', 'lista')->first();
        $catalogo = Catalogo::orderBy('created_at', 'ASC')->first();

        return view('privada.listadeprecios', compact('banner', 'activo', 'catalogo'));
    }

    public function downloadPdf2($id)
    {
        $catalogo = Catalogo::find($id);
        $path     = public_path();
        $url      = $path . '/' . $catalogo->pdf;
        return response()->download($url);
        return redirect()->route('catalogos.index');
    }

    public function ofertasynovedades()
    {
        $activo    = 'ofertasynovedades';
        $banner = Banner::Where('seccion', 'ofertas')->first();
        $productos = Producto::OrderBy('orden', 'ASC')->orwhere('oferta', 'descuento')->orwhere('oferta', 'promocion')->get();
        $ready     = 0;

        return view('privada.pedidos.ofertasynovedades', compact('productos', 'activo', 'ready', 'banner'));
    }

}
