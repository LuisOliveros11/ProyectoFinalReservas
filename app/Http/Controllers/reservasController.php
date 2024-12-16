<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use Illuminate\Http\Request;


class reservasController extends Controller
{
    public function index()
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
        $clientes = json_decode($response, true);
        
        curl_close($curl);

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
        $mesas = json_decode($response, true);

        curl_close($curl);

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
        $usuarios = json_decode($response, true);

        curl_close($curl);

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
        
        return view("dashboard", compact('clientes', 'mesas', 'usuarios', 'reservas'));
    }

    public function getReservas()
{
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
    $reservaciones = json_decode($response, true);
    
    curl_close($curl);

    // Verificar si 'reservaciones' existe y no está vacío
    if (!isset($reservaciones['reservaciones']) || empty($reservaciones['reservaciones'])) {
        $reservaciones['reservaciones'] = []; // Inicializar como un arreglo vacío
    }

    // Obtener clientes
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
    $clientes = json_decode($response, true);

    curl_close($curl);

    // Obtener mesas
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
    $mesas = json_decode($response, true);

    curl_close($curl);

    if (isset($reservaciones['status']) && $reservaciones['status'] === 200) {
        return view('panelReservas', compact('reservaciones', 'clientes', 'mesas'));
    } else {
        echo "Error al obtener reservas";
    }
}

    public function addReserva(Request $request)
    {
        $currentDate = now()->toDateString();
        $reservaExistente = false;
        //obtener mesas
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
        foreach ($response->mesas as $mesa) {
            if (is_object($mesa) && isset($mesa->numero)) {
                $listaNumerosMesa[] = $mesa->numero;
            }
        }

        //obtener clientes
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
        $response = json_decode($response);
        foreach ($response->clientes as $cliente) {
            if (is_object($cliente) && isset($cliente->correo_electronico)) {
                $listaClientes[] = $cliente->correo_electronico;
            }
        }

        //obtener reservas
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
        if (property_exists($response, 'reservaciones') && !empty($response->reservaciones)) {
            $listaReservas = $response->reservaciones;
        } else {
            $listaReservas = [];
        }
        curl_close($curl);

        if (
            strlen($request->fecha_reserva) >= 1 &&
            strlen($request->correo_electronico) >= 1 &&
            strlen($request->hora_inicio) >= 1 &&
            strlen($request->hora_final) >= 1 &&
            strlen($request->numero_mesa) >= 1
        ) {
            $fechaReserva = new DateTime($request->fecha_reserva);
            if ($fechaReserva >= $currentDate) {
                if (filter_var($request->correo_electronico, FILTER_VALIDATE_EMAIL)) {
                    if (in_array($request->correo_electronico, $listaClientes)) {
                        $horaInicio = Carbon::createFromFormat('H:i:s', $request->hora_inicio . ':00');
                        $horaFinal = Carbon::createFromFormat('H:i:s', $request->hora_final . ':00');
                        if ($horaInicio->isBefore($horaFinal)) {
                            if (!$horaInicio->eq($horaFinal)) {
                                if ($horaInicio->diffInHours($horaFinal) <= 2) {
                                    foreach ($listaReservas as $reserva) {
                                        $fechaReservaFormato = $fechaReserva->format('Y-m-d');
                                        if ($fechaReservaFormato == $reserva->fecha_reservacion) {
                                            if((int)$request->numero_mesa === $reserva->numero_mesa){
                                                if (
                                                    ($horaInicio->eq($reserva->hora_inicio)) || //RESERVAS QUE INICIAN A LA MISMA HORA
                                                    ($horaInicio->isAfter($reserva->hora_inicio) && //RESERVAS QUE INICIA A UNA HORA EN QUE ESTA OCUPADA LA MESA
                                                        $horaInicio->isBefore($reserva->hora_final)) ||
                                                    ($horaFinal->isAfter($reserva->hora_inicio) && //RESERVA QUE INICIA ANTES DE OTRA RESERVACION PERO ACABA EN MEDIO DE ESTA
                                                        $horaFinal->isBefore($reserva->hora_final)) ||
                                                    ($horaInicio->isBefore($reserva->hora_inicio) && //RESERVA QUE INICIA ANTES DE OTRA RESERVACION PERO ACABA DESPUES DE ESTA
                                                    $horaFinal->isafter($reserva->hora_final))
                                                ) {
                                                    $reservaExistente = true;
                                                }
                                            }
                                        }
                                    }
                                    if (!$reservaExistente) {
                                        $horaInicio = $horaInicio->format('H:i:s');
                                        $horaFinal = $horaFinal->format('H:i:s');
                                        if (in_array($request->numero_mesa, $listaNumerosMesa)) {
                                            curl_setopt_array($curl, array(
                                                CURLOPT_URL => 'https://apisistemadereservacion-production.up.railway.app/api/reservaciones',
                                                CURLOPT_RETURNTRANSFER => true,
                                                CURLOPT_ENCODING => '',
                                                CURLOPT_MAXREDIRS => 10,
                                                CURLOPT_TIMEOUT => 0,
                                                CURLOPT_FOLLOWLOCATION => true,
                                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                CURLOPT_CUSTOMREQUEST => 'POST',
                                                CURLOPT_POSTFIELDS => json_encode([
                                                    "fecha_reservacion" => $request->fecha_reserva,
                                                    "correo_electronico" => $request->correo_electronico,
                                                    "hora_inicio" => $horaInicio,
                                                    "hora_final" => $horaFinal,
                                                    "numero_mesa" => $request->numero_mesa,
                                                ]),
                                                CURLOPT_HTTPHEADER => array(
                                                    'Content-Type: application/json',
                                                    'Authorization: Bearer ' . session('user')->token
                                                ),
                                            ));

                                            $response = curl_exec($curl);
                                            $response = json_decode($response);

                                            curl_close($curl);
                                            if (isset($response->reservacion) && $response->status == 201) {
                                                return redirect()->route('panelReservas');
                                            } else {
                                                echo "Error al crear reservacion.";
                                            }
                                        } else {
                                            echo "Error. Número de mesa no disponible.";
                                        }
                                    } else {
                                        echo "Error. Ya existe una reservacion en este rango de horas.";
                                    }
                                } else {
                                    echo "Error. Las reservaciones pueden durar un máximo de dos horas.";
                                }
                            } else {
                                echo "Error. La hora final de reserva no puede ser igual a la de inicio.";
                            }
                        } else {
                            echo "Error. La hora final de reserva no puede ser anterior a la de inicio.";
                        }
                    } else {
                        echo "Error. Este correo electronico no pertenece a ningun cliente.";
                    }
                } else {
                    echo "Error. Formato de correo electrónico invalido.";
                }
            } else {
                echo "Error. La fecha de reservacion no puede ser anterior a la fecha actual.";
            }
        } else {
            echo "Error. Todos los campos deben ser llenados.";
        }

    }

    public function updateReserva(Request $request){
        $currentDate = now()->toDateString();
        $id = $request->usuario_id;
        $reservaExistente = false;

        //obtener mesas
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
        foreach ($response->mesas as $mesa) {
            if (is_object($mesa) && isset($mesa->numero)) {
                $listaNumerosMesa[] = $mesa->numero;
            }
        }

        //obtener clientes
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
        $response = json_decode($response);
        foreach ($response->clientes as $cliente) {
            if (is_object($cliente) && isset($cliente->correo_electronico)) {
                $listaClientes[] = $cliente->correo_electronico;
            }
        }

        //obtener reservas
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

        if (
            strlen($request->fecha_reserva) >= 1 &&
            strlen($request->correo_electronico) >= 1 &&
            strlen($request->hora_inicio) >= 1 &&
            strlen($request->hora_final) >= 1 &&
            strlen($request->numero_mesa) >= 1
        ) {
            $fechaReserva = new DateTime($request->fecha_reserva);
            if ($fechaReserva >= $currentDate) {
                if (filter_var($request->correo_electronico, FILTER_VALIDATE_EMAIL)) {
                    if (in_array($request->correo_electronico, $listaClientes)) {
                        $horaInicio = Carbon::createFromFormat('H:i:s', $request->hora_inicio . ':00');
                        $horaFinal = Carbon::createFromFormat('H:i:s', $request->hora_final . ':00');
                        if ($horaInicio->isBefore($horaFinal)) {
                            if (!$horaInicio->eq($horaFinal)) {
                                if ($horaInicio->diffInHours($horaFinal) <= 2) {
                                    foreach ($listaReservas as $reserva) {
                                        $fechaReservaFormato = $fechaReserva->format('Y-m-d');
                                        if ($fechaReservaFormato == $reserva->fecha_reservacion) {
                                            if((int)$request->numero_mesa === $reserva->numero_mesa){
                                                if (
                                                    ($horaInicio->eq($reserva->hora_inicio)) || //RESERVAS QUE INICIAN A LA MISMA HORA
                                                    ($horaInicio->isAfter($reserva->hora_inicio) && //RESERVAS QUE INICIA A UNA HORA EN QUE ESTA OCUPADA LA MESA
                                                        $horaInicio->isBefore($reserva->hora_final)) ||
                                                    ($horaFinal->isAfter($reserva->hora_inicio) && //RESERVA QUE INICIA ANTES DE OTRA RESERVACION PERO ACABA EN MEDIO DE ESTA
                                                        $horaFinal->isBefore($reserva->hora_final)) ||
                                                    ($horaInicio->isBefore($reserva->hora_inicio) && //RESERVA QUE INICIA ANTES DE OTRA RESERVACION PERO ACABA DESPUES DE ESTA
                                                    $horaFinal->isafter($reserva->hora_final))
                                                ) {
                                                    if((int) $id !== (int) $reserva->id){
                                                        $reservaExistente = true;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    if (!$reservaExistente) {
                                        $horaInicio = $horaInicio->format('H:i:s');
                                        $horaFinal = $horaFinal->format('H:i:s');
                                        if (in_array($request->numero_mesa, $listaNumerosMesa)) {
                                            $curl = curl_init();

                                            curl_setopt_array($curl, array(
                                              CURLOPT_URL => 'https://apisistemadereservacion-production.up.railway.app/api/reservaciones/'.$id,
                                              CURLOPT_RETURNTRANSFER => true,
                                              CURLOPT_ENCODING => '',
                                              CURLOPT_MAXREDIRS => 10,
                                              CURLOPT_TIMEOUT => 0,
                                              CURLOPT_FOLLOWLOCATION => true,
                                              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                              CURLOPT_CUSTOMREQUEST => 'PUT',
                                              CURLOPT_POSTFIELDS => json_encode([
                                                "fecha_reservacion" => $request->fecha_reserva,
                                                "correo_electronico" => $request->correo_electronico,
                                                "hora_inicio" => $horaInicio,
                                                "hora_final" => $horaFinal,
                                                "numero_mesa" => $request->numero_mesa,
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
                                                return redirect()->route('panelReservas');
                                            } else {
                                                echo "Error al editar reserva";
                                            }
                                        }else{
                                            echo "Error. Número de mesa no disponible.";
                                        }
                                    }else {
                                        echo "Error. Ya existe una reservacion en este rango de horas.";
                                    }
                                }else{
                                    echo "Error. Las reservaciones pueden durar un máximo de dos horas.";
                                }
                            }else{
                                echo "Error. La hora final de reserva no puede ser igual a la de inicio.";
                            }
                        }else{
                            echo "Error. La hora final de reserva no puede ser anterior a la de inicio.";
                        }
                    }else{
                        echo "Error. Este correo electronico no pertenece a ningun cliente.";
                    }
                }else{
                    echo "Error. Formato de correo electrónico invalido.";
                }
            }else{
                echo "Error. La fecha de reservacion no puede ser anterior a la fecha actual.";
            }
        }else{
            echo "Error. Todos los campos deben ser llenados.";
        }
    }

    public function deleteReserva(Request $request)
    {
        $id = $request->usuario_id;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apisistemadereservacion-production.up.railway.app/api/reservaciones/' . $id,
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
            return redirect()->route('panelReservas');
        } else {
            echo "Error al eliminar reserva";
        }
    }
}