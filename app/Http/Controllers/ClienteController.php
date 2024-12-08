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

    if (isset($clients['status']) && $clients['status'] === 200) {
      return view('panelClientes', compact('clients'));
    } else {
      echo "Error al obtener clientes";
    }
  }

  public function getClientByID(Request $request)
  {
    $id = $request->usuario_id;
    $reservasCliente = [];

    //OBTENER DETALLES DE CLIENTE
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://apisistemadereservacion-production.up.railway.app/api/clientes/' . $id,
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
    $response = json_decode($response, true);
    $detalleCliente = $response['cliente'];

    curl_close($curl);

    //OBTENER RESERVAS DEL CLIENTE
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
    $response = json_decode($response, true);
    $listaReservas = $response['reservaciones'];

    curl_close($curl);

    foreach ($listaReservas as $reserva) {
      if ((int) $id === (int) $reserva['id_cliente']) {
        $reservasCliente[] = $reserva;
      }
    }

    if (isset($response['status']) && $response['status'] === 200) {
      return view('panelClientes', compact('detalleCliente', 'reservasCliente'));
    } else {
      echo "Error al obtener detalles del cliente";
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
