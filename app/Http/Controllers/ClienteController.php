<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function getClients(){
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

    public function getClientByID(Request $request){
      $id = $request->usuario_id;
      $reservasCliente = [];

      //OBTENER DETALLES DE CLIENTE
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://apisistemadereservacion-production.up.railway.app/api/clientes/'.$id,
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

      foreach($listaReservas as $reserva){
        if((int)$id === (int)$reserva['id_cliente']){
          $reservasCliente[] = $reserva;
        }
      }

      if(isset($response['status']) && $response['status'] === 200){
        return view('panelClientes', compact('detalleCliente', 'reservasCliente'));
      }else{
        echo "Error al obtener detalles del cliente";
      }
  }

    public function deleteClient(Request $request){
      $id = $request->usuario_id;

      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://apisistemadereservacion-production.up.railway.app/api/clientes/'.$id,
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
      }else{
          echo "Error al eliminar cliente";
      }
    }
}
