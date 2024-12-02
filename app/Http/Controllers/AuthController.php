<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view("login");
    }

    public function login(Request $request)
    {
        if(strlen($request->correo_electronico) >= 1 &&
           strlen($request->contrasena) >= 1) {
                if(filter_var($request->correo_electronico, FILTER_VALIDATE_EMAIL)){
                    $request->correo_electronico = trim($request->correo_electronico);
                    $request->contrasena = trim($request->contrasena);

                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://apisistemadereservacion-production.up.railway.app/api/usuarios/login',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => json_encode([
                        'correo_electronico' => $request->correo_electronico,
                        'contrasena' => $request->contrasena,
                    ]),
                    CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json'
                    ),
                    ));

                    $response = curl_exec($curl);
                    $response = json_decode($response);

                    curl_close($curl);

                    if (isset($response->user) && is_object($response->user)) {
                        $_SESSION['user'] = $response;
                        return redirect()->route('index');
                    } else {
                        return redirect()->back()->with('error', 'Error. Credenciales Incorrectas');
                    }
                }else{
                    return redirect()->back()->with('error', 'Error. Ingrese un formato valido de correo');
                }
        }else{
            return redirect()->back()->with('error', 'Error. No se permiten campos vacios');
        }
    }
}
