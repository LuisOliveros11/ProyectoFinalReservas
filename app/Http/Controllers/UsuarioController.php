<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function addUser(Request $request)
    {
        $currentDate = now()->toDateString(); 
        if (
            strlen($request->nombres) >= 1 &&
            strlen($request->apellidos) >= 1 &&
            strlen($request->correo_electronico) >= 1 &&
            strlen($request->contrasena) >= 1 &&
            strlen($request->rol) >= 1
        ) {
            if(preg_match("/^[a-zA-Z\s]+$/",$request->nombres)){
                if(preg_match("/^[a-zA-Z\s]+$/",$request->apellidos)){
                    if(filter_var($request->correo_electronico, FILTER_VALIDATE_EMAIL)){
                        if($request->contrasena == $request->confirmar_contrasena){
                            if(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&.,])([A-Za-z\d$@$!%*?&.,]|[^ ]){8,15}$/",$request->contrasena)){
                                if($request->rol !== "Selecciona un Rol"){
                                    $curl = curl_init();

                                    curl_setopt_array($curl, array(
                                    CURLOPT_URL => 'https://apisistemadereservacion-production.up.railway.app/api/usuarios',
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_ENCODING => '',
                                    CURLOPT_MAXREDIRS => 10,
                                    CURLOPT_TIMEOUT => 0,
                                    CURLOPT_FOLLOWLOCATION => true,
                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                    CURLOPT_CUSTOMREQUEST => 'POST',
                                    CURLOPT_POSTFIELDS =>json_encode([
                                        "nombre" => $request->nombres,
                                        "apellidos" => $request->apellidos,
                                        "correo_electronico" => $request->correo_electronico,
                                        "contrasena" => $request->contrasena,
                                        "fecha_registro" => $currentDate,
                                        "rol" => $request->rol
                                    ]),
                                    CURLOPT_HTTPHEADER => array(
                                        'Content-Type: application/json'
                                    ),
                                    ));

                                    $response = curl_exec($curl);
                                    $response = json_decode($response);

                                    curl_close($curl);

                                    if (isset($response->usuario) && $response->status == 201) {
                                        return redirect()->route('inicio');
                                    } else {
                                        echo "Error al crear usuario. Este correo ya ha sido registrado";
                                    }
                                }else{
                                    echo "Error. Selecciona un rol.";
                                }
                            }else{
                                echo "Error. Ingresa un formato de contraseña valido. Al menos una mayuscula, un número y un caracter especial.";
                            }
                        }else{
                            echo "Error. Las contraseñas no coinciden.";
                        }
                    }else{
                        echo "Error. Formato de correo electrónico invalido.";
                    }
                }else{
                    echo "Error. Los apellidos solo puede contener letras.";
                }
            }else{
                echo "Error. El nombre solo puede contener letras.";
            }
        } else {
            echo "Error. Todos los campos deben ser llenados.";
        }
    }
}
