<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Client;
use App\User;
use Mail;


class AuthController extends Controller
{
  use RegistersUsers;

  public function __construct()
  {
    $this->middleware('guest');
  }

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return view('site.auth.register');
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
    //
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

  public function register(Request $request)
  {
    try {
      $user = User::create([
        'first_name' => $request['first_name'],
        'last_name' => $request['last_name'],
        'telephone' => $request['telephone'],
        'email' => $request['email'],
        'role_id' => $request['role_id'],
        'password' => bcrypt($request['password'])
      ]);

      $client = Client::create([
        'user_id' => $user->id
      ]);
    } catch (\Exception $e) {
      return redirect()->back();
    }

    try {
      $data = array(
        'first_name' => $user->first_name,
        'last_name' => $user->last_name,
        'email' => $user->email
      );
      auth()->login($user);
      return redirect('/');
    } catch (\Exception $e) {
      return redirect()->back();
    }
  }

  protected function validator(array $request)
  {
    return Validator::make($request, [
      'first_name' => 'required|string|max:100',
      'last_name' => 'required|string|max:100',
      'email' => 'required|email|max:191|unique:users',
      'role_id' => 'required',
      'password' => 'required|string|min:6|confirmed',
    ]);
  }
}
