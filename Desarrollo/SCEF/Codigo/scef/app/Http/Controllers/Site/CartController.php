<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Product;
use \Cart as Cart;

class CartController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $products = Cart::content();
    dd($products);

    return response()->json($products);

    return view('view.cart.index', compact('cart'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
      return $cartItem->id === $request['id'];
    });

    if (!$duplicates->isEmpty()) {
      return response()->json([
        'success' => false,
        'message' => 'Producto en el carrito'
      ]);
    }

    try {
      Cart::add([
        'id' => $request->id,
        'qty' => $request->qty,
        'name' => $request->name,
        'price' => $request->price,
        'options' => [
          'slug' => $request->slug,
          'image' => $request->image,
        ]
      ])->associate('App\Product');
      return response()->json([
        'success' => true,
        'message' => 'Agregado correctamente'
      ]);
    } catch (Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'No se pudo agregar'
      ]);
    }


  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    //
  }
}
