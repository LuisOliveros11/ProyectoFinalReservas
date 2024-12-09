<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
  public function getClients()
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://apisistemadereservacion-production.up.railway.app/api/clientes',
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
    $clients = json_decode($response, true);

    curl_close($curl);

    // Obtener reservas
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://apisistemadereservacion-production.up.railway.app/api/reservaciones',
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
    $reservas = json_decode($response, true);

    curl_close($curl);

    // Relacionar reservas con clientes
    foreach ($clients['clientes'] as &$client) {
      $client['reservas'] = array_filter($reservas['reservaciones'], function ($reserva) use ($client) {
        return $reserva['id_cliente'] == $client['id'];
      });
    }

    if (isset($clients['status']) && $clients['status'] === 200) {
      return view('panelClientes', compact('clients'));
    } else {
      echo "Error al obtener clientes";
    }
  }

  public function addClient(Request $request)
  {
    $currentDate = now()->toDateString();
    if (
      strlen($request->nombres) >= 1 &&
      strlen($request->apellidos) >= 1 &&
      strlen($request->numero_telefonico) >= 1 &&
      strlen($request->correo_electronico) >= 1 &&
      strlen($request->contrasena) >= 1
    ) {
      if (preg_match("/^[a-zA-Z\s]+$/", $request->nombres)) {
        if (preg_match("/^[a-zA-Z\s]+$/", $request->apellidos)) {
          if (ctype_digit($request->numero_telefonico)) {
            if (filter_var($request->correo_electronico, FILTER_VALIDATE_EMAIL)) {
              if ($request->contrasena == $request->confirmar_contrasena) {
                if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&.,])([A-Za-z\d$@$!%*?&.,]|[^ ]){8,15}$/", $request->contrasena)) {
                  $curl = curl_init();

                  curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://apisistemadereservacion-production.up.railway.app/api/clientes',
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
                      "fecha_registro" => $currentDate,
                      "numero_telefonico" => $request->numero_telefonico,
                      "correo_electronico" => $request->correo_electronico,
                      "contrasena" => $request->contrasena,
                    ]),
                    CURLOPT_HTTPHEADER => array(
                      'Content-Type: application/json',
                      'Authorization: Bearer ' . session('user')->token
                    ),
                  ));

                  $response = curl_exec($curl);
                  $response = json_decode($response);

                  curl_close($curl);

                  if (isset($response->cliente) && $response->status == 201) {
                    return redirect()->route('panelClientes');
                  } else {
                    echo "Error al crear cliente. Este correo ya ha sido registrado";
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
            echo "Error. El numero telefonico solo puede contener numeros.";
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

  public function updateClient(Request $request)
  {
    $id = $request->usuario_id;
    $cuentaExistente = false;
    //OBTENER CLIENTES
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://apisistemadereservacion-production.up.railway.app/api/clientes',
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
    $clients = json_decode($response);

    curl_close($curl);

    if (
      strlen($request->nombres) >= 1 &&
      strlen($request->apellidos) >= 1 &&
      strlen($request->numero_telefonico) >= 1 &&
      strlen($request->correo_electronico) >= 1 &&
      strlen($request->contrasena) >= 1 &&
      strlen($request->confirmar_contrasena) >= 1
    ) {
      if (preg_match("/^[a-zA-Z\s]+$/", $request->nombres)) {
        if (preg_match("/^[a-zA-Z\s]+$/", $request->apellidos)) {
          if (ctype_digit($request->numero_telefonico)) {
            if (filter_var($request->correo_electronico, FILTER_VALIDATE_EMAIL)) {
              if ($request->contrasena == $request->confirmar_contrasena) {
                if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&.,])([A-Za-z\d$@$!%*?&.,]|[^ ]){8,15}$/", $request->contrasena)) {
                  foreach ($clients->clientes as $client) {
                    if ($request->correo_electronico === $client->correo_electronico) {
                      if ((int) $id !== (int) $client->id) {
                        $cuentaExistente = true;
                      }
                    }
                  }
                  if (!$cuentaExistente) {
                    $fechaRegistro = $client->fecha_registro;
                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                      CURLOPT_URL => 'https://apisistemadereservacion-production.up.railway.app/api/clientes/'.$id,
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => '',
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 0,
                      CURLOPT_FOLLOWLOCATION => true,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => 'PUT',
                      CURLOPT_POSTFIELDS => json_encode([
                        "nombre" => $request->nombres,
                        "apellidos" => $request->apellidos,
                        "fecha_registro" => $fechaRegistro,
                        "numero_telefonico" => $request->numero_telefonico,
                        "correo_electronico" => $request->correo_electronico,
                        "contrasena" => $request->contrasena,
                      ]),
                      CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json',
                        'Authorization: Bearer ' . session('user')->token
                      ),
                    ));

                    $response = curl_exec($curl);
                    $response = json_decode($response);

                    curl_close($curl);

                    if (isset($response->cliente) && $response->status == 201) {
                      return redirect()->route('panelClientes');
                    } else {
                      echo "Error al editar cliente. Este correo ya ha sido registrado";
                    }
                  } else {
                    echo "Error. Este correo electronico ya está en uso.";
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
            echo "Error. El numero telefonico solo puede contener numeros.";
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
  public function deleteClient(Request $request)
  {
    $id = $request->usuario_id;

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://apisistemadereservacion-production.up.railway.app/api/clientes/' . $id,
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
      return redirect()->route('panelClientes');
    } else {
      echo "Error al eliminar cliente";
    }
  }
}
