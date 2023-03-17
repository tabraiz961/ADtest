<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function registration(Request $request)
    {
        $credentials = ['email' => $request->email, 'password' => $request->password];
        $time = strtotime("-12 year", time());
        $date = date("Y-m-d", $time);
        echo('<pre>');print_r($date);echo('</pre>');die('call');

        $validator = Validator::make($request->all(),[
            'email' => 'required|unique:users,email|max:255',
            'password' => 'required',
            'password_confirmation' => 'required|confirmed',
            'dob'  => 'required|date_format:m/d/Y|before_or_equal:' . date(DATE_ATOM, $date)
        ]);
        if($validator->fails()){
            $response['success'] = false;
            $response['message'] = $validator->errors();
            return response()->json($response, 400);
        }
        $input = $credentials;
        $input = bcrypt($input['password']);
        $user = User::create($input);

        $response['success'] = true;
        $response['data']['token'] = $user->createToken('testToken')->plainTextToken;
        return response()->json($response);
    }
    public function login(Request $request)
    {
        $credentials = ['email' => $request->email, 'password' => $request->password];
        $validator = Validator::make($request->all(),[
            'email' => 'required|max:255',
            'password' => 'required',
        ]);

        $response['success'] = false;
        if($validator->fails()){
            $response['message'] = $validator->errors()->first();
            return response()->json($response);
        }
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = User::where('email', $request->email)->get()->first();
            $response['success'] = true;
            $response['data']['token'] = $user->createToken('testToken')->plainTextToken;
            return response()->json($response);
        }else{
            $response['data'] = [];
            $response['message'] = 'Incorrect Credentials';
            return response()->json($response);
        }
    }
}
