<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class MesaController extends Controller
{
    public function getMesas()
    {
        $horaActual = now()->toTimeString();
        $horaActual = Carbon::createFromFormat('H:i:s', $horaActual);
        $currentDate = now()->toDateString();

        //TRAER MESAS
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apisistemadereservacion-production.up.railway.app/api/mesas',
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
        $mesasSinActualizar = $response->mesas;

        curl_close($curl);

        //TRAER RESERVAS
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
        $listaReservas = $response->reservaciones;

        curl_close($curl);

        foreach ($mesasSinActualizar as $mesa) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://apisistemadereservacion-production.up.railway.app/api/mesas/'.$mesa->id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'PUT',
                CURLOPT_POSTFIELDS => json_encode([
                    "numero" => $mesa->numero,
                    "cantidad_sillas" => $mesa->cantidad_sillas,
                    "categoria" => $mesa->categoria,
                    "ubicacion" => $mesa->ubicacion,
                    "disponibilidad" => "Disponible",
                ]),
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . session('user')->token
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
        }

        foreach ($listaReservas as $reserva) {
            $horaInicio = Carbon::createFromFormat('H:i:s', $reserva->hora_inicio);
            $horaFinal = Carbon::createFromFormat('H:i:s', $reserva->hora_final);
            if ($currentDate === $reserva->fecha_reservacion && ($horaActual->isAfter($horaInicio) && $horaActual->isBefore($horaFinal))) {
                foreach ($mesasSinActualizar as $mesa) {
                    if ($mesa->numero === $reserva->numero_mesa) {
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                            CURLOPT_URL => 'https://apisistemadereservacion-production.up.railway.app/api/mesas/'.$mesa->id,
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => 'PUT',
                            CURLOPT_POSTFIELDS => json_encode([
                                "numero" => $mesa->numero,
                                "cantidad_sillas" => $mesa->cantidad_sillas,
                                "categoria" => $mesa->categoria,
                                "ubicacion" => $mesa->ubicacion,
                                "disponibilidad" => "Ocupado",
                            ]),
                            CURLOPT_HTTPHEADER => array(
                                'Content-Type: application/json',
                                'Authorization: Bearer ' . session('user')->token
                            ),
                        ));

                        $response = curl_exec($curl);

                        curl_close($curl);
                    }
                }
            }
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apisistemadereservacion-production.up.railway.app/api/mesas',
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
        $mesasActualizadas = json_decode($response, true);

        curl_close($curl);

        // Relacionar reservas con mesas
        foreach ($mesasActualizadas['mesas'] as &$mesa) {
            $mesa['reservas'] = array_filter($listaReservas, function ($reserva) use ($mesa) {
            return $reserva->numero_mesa == $mesa['numero'];
            });
        }

        if (isset($mesasActualizadas['status']) && $mesasActualizadas['status'] === 200) {
            return view('panelMesas', compact('mesasActualizadas'));
        } else {
            echo "Error al obtener mesas";
        }
    }

    public function deleteMesa(Request $request){
        $id = $request->usuario_id;

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://apisistemadereservacion-production.up.railway.app/api/mesas/'.$id,
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
        return redirect()->route('panelMesas');
        } else {
        echo "Error al eliminar mesa";
        }
    }
}
