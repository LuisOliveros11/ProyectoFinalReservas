<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class reservasController extends Controller
{
    public function index(){
        return view("dashboard");
    }

    public function getReservas(){
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
        $response = json_decode($response);

        curl_close($curl);


        if (isset($response->status) && $response->status === 200) {
            return view('panelReservas');
          } else {
            echo "Error al obtener reservas";
          }
    }
}
