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
            dd($clients);
            return view('panelClientes', compact('clients'));
        } else {
            echo "Error al obtener clientes";
        }
    }
}
