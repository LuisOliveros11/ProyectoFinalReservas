<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function getUsers()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apisistemadereservacion-production.up.railway.app/api/usuarios',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . session('user')->token
            ),
        ));

        $response = curl_exec($curl);
        $users = json_decode($response, true);

        curl_close($curl);

        return view('panelUsuario', compact('users'));
    }

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
            if (preg_match("/^[a-zA-Z\s]+$/", $request->nombres)) {
                if (preg_match("/^[a-zA-Z\s]+$/", $request->apellidos)) {
                    if (filter_var($request->correo_electronico, FILTER_VALIDATE_EMAIL)) {
                        if ($request->contrasena == $request->confirmar_contrasena) {
                            if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&.,])([A-Za-z\d$@$!%*?&.,]|[^ ]){8,15}$/", $request->contrasena)) {
                                if ($request->rol !== "Selecciona un Rol") {
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
                                        CURLOPT_POSTFIELDS => json_encode([
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
                                } else {
                                    echo "Error. Selecciona un rol.";
                                }
                            } else {
                                echo "Error. Ingresa un formato de contraseña valido. Al menos una mayuscula, un número y un caracter especial.";
                            }
                        } else {
                            echo "Error. Las contraseñas no coinciden.";
                        }
                    } else {
                        echo "Error. Formato de correo electrónico invalido.";
                    }
                } else {
                    echo "Error. Los apellidos solo puede contener letras.";
                }
            } else {
                echo "Error. El nombre solo puede contener letras.";
            }
        } else {
            echo "Error. Todos los campos deben ser llenados.";
        }
    }

    public function updateUser(Request $request)
    {
        $id = $request->usuario_id;
        $cuentaExistente = false;
        //OBTENER USUARIOS
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apisistemadereservacion-production.up.railway.app/api/usuarios',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . session('user')->token
            ),
        ));

        $response = curl_exec($curl);
        $users = json_decode($response);

        curl_close($curl);

        if (
            strlen($request->editar_nombres) >= 1 &&
            strlen($request->editar_apellidos) >= 1 &&
            strlen($request->editar_correo_electronico) >= 1 &&
            strlen($request->editar_contrasena) >= 1 &&
            strlen($request->editar_confirmar_contrasena) >= 1 &&
            strlen($request->editar_rol) >= 1
        ) {
            if (preg_match("/^[a-zA-Z\s]+$/", $request->editar_nombres)) {
                if (preg_match("/^[a-zA-Z\s]+$/", $request->editar_apellidos)) {
                    if (filter_var($request->editar_correo_electronico, FILTER_VALIDATE_EMAIL)) {
                        if ($request->editar_contrasena == $request->editar_confirmar_contrasena) {
                            if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&.,])([A-Za-z\d$@$!%*?&.,]|[^ ]){8,15}$/", $request->editar_contrasena)) {
                                if ($request->editar_rol !== "Selecciona un Rol") {
                                    foreach ($users->usuarios as $user) {
                                        if ($request->editar_correo_electronico === $user->correo_electronico) {
                                            if ((int) $id !== (int) $user->id) {
                                                $cuentaExistente = true;
                                            }
                                        }
                                    }
                                    if (!$cuentaExistente) {
                                        $fechaRegistro = $user->fecha_registro;
                                        $curl = curl_init();

                                        curl_setopt_array($curl, array(
                                            CURLOPT_URL => 'https://apisistemadereservacion-production.up.railway.app/api/usuarios/' . $id,
                                            CURLOPT_RETURNTRANSFER => true,
                                            CURLOPT_ENCODING => '',
                                            CURLOPT_MAXREDIRS => 10,
                                            CURLOPT_TIMEOUT => 0,
                                            CURLOPT_FOLLOWLOCATION => true,
                                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                            CURLOPT_CUSTOMREQUEST => 'PUT',

                                            CURLOPT_POSTFIELDS => json_encode([
                                                "nombre" => $request->editar_nombres,
                                                "apellidos" => $request->editar_apellidos,
                                                "correo_electronico" => $request->editar_correo_electronico,
                                                "contrasena" => $request->editar_contrasena,
                                                "fecha_registro" => $fechaRegistro,
                                                "rol" => $request->editar_rol
                                            ]),
                                            CURLOPT_HTTPHEADER => array(
                                                'Content-Type: application/json',
                                                'Authorization: Bearer ' . session('user')->token
                                            ),
                                        ));

                                        $response = curl_exec($curl);
                                        $response = json_decode($response);

                                        curl_close($curl);

                                        if ($response->status === 201) {
                                            return redirect()->route('panelUsuario');
                                        } else {
                                            echo "Error al editar usuario";
                                        }
                                    } else {
                                        echo "Error. Este correo electronico ya está en uso.";
                                    }
                                } else {
                                    echo "Error. Selecciona un rol.";
                                }
                            } else {
                                echo "Error. Ingresa un formato de contraseña valido. Al menos una mayuscula, un número y un caracter especial.";
                            }
                        } else {
                            echo "Error. Las contraseñas no coinciden.";
                        }
                    } else {
                        echo "Error. Formato de correo electrónico invalido.";
                    }
                } else {
                    echo "Error. Los apellidos solo puede contener letras.";
                }
            } else {
                echo "Error. El nombre solo puede contener letras.";
            }
        } else {
            echo "Error. Todos los campos deben ser llenados.";
        }
    }

    public function deleteUser(Request $request)
    {
        $id = $request->usuario_id;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apisistemadereservacion-production.up.railway.app/api/usuarios/' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . session('user')->token
            ),
        ));

        $response = curl_exec($curl);
        $response = json_decode($response);

        curl_close($curl);

        if ($response->status === 200) {
            return redirect()->route('panelUsuario');
        } else {
            echo "Error al eliminar usuario";
        }
    }
}
