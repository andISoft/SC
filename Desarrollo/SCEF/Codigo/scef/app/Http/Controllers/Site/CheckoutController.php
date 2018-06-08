<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Mail;

class CheckoutController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    //
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
  public function store()
  {
    return response()->json([
      'success' => true,
      'message' => 'Holis'
    ]);

    $SECRET_KEY = env('CULQI_SK');

    $culqi = new Culqi(array('api_key' => $SECRET_KEY));

    // Creando Cargo a una tarjeta
    try {
      $charge = $culqi->Charges->create(
        array(
          "amount" => $request->reserve['subtotal'],
          "currency_code" => "USD",
          "description" => "Venta en ChaguaFarma",
          "email" => 'jorge@prodequa.com',
          "antifraud_details" => array(
            "address" => 'Mi casa',
            "address_city" => 'Lima',
            "country_code" => 'PE',
            "first_name" => 'Jorge',
            "last_name" => 'De la Cruz',
            "phone_number" => '987654321'
          ),
          "source_id" => $request['source_id']
          // "installments" => $request->installments,
        )
      );
      Cart::destroy();
      return response()->json([
        'success' => true,
        'message' => 'Pago exitoso'
      ]);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'El pago no fue efectuado'
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
