<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;
use Illuminate\Notifications\Notifiable;
use Auth;


class ApiController extends Controller
{
  public $successStatus = 200;



/**

 * login api

 *

 * @return \Illuminate\Http\Response

 */

public function login(){

    if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){

        $user = Auth::user();

        $success['token'] =  $user->createToken('laravelTask')->accessToken;

        return response()->json(['success' => $success], $this->successStatus);

    }

    else{

        return response()->json(['error'=>'Unauthorised'], 401);

    }

}



/**

 * Register api

 *

 * @return \Illuminate\Http\Response

 */

public function register(Request $request)

{

    $validator = Validator::make($request->all(), [
      'name' => ['required', 'string', 'max:255'],
      'surname' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'max:255'],
      'identity_Number' => ['required', 'string', 'max:11', 'min:11'],
      'birthdate' => ['required', 'string', 'max:4', 'min:4'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],

    ]);



    if ($validator->fails()) {

        return response()->json(['error'=>$validator->errors()], 401);

    }



    $input = $request->all();

    $input['password'] = bcrypt($input['password']);

    $user = User::create($input);

    $success['token'] =  $user->createToken('laravelTask')->accessToken;

    $success['name'] =  $user->name;

    $success['surname'] =  $user->surname;
    $success['email'] =  $user->email;
    $success['identity_Number'] =  $user->identity_Number;
    $success['birthdate'] =  $user->birthdate;
    $success['password'] =  $user->password;
    $success['api_token'] =  $user->api_token;


    return response()->json(['success'=>$success], $this->successStatus);

}



/**

 * details api

 *

 * @return \Illuminate\Http\Response

 */

public function getDetails()

{

    $user = Auth::user();

    return response()->json(['success' => $user], $this->successStatus);

}

}
