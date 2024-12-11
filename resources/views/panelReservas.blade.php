<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Reserva en Restaurante</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

</head>

<body class="sb-nav-fixed">
    @include('layouts.navbar')


    <div id="layoutSidenav">
        @include('layouts.sidevar')



        <div id="layoutSidenav_content">
            <div id="app">
                <main class="container mt-4">
                    <h2 class="text-center">Lista de Reservas</h2>
                    <div class="text-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reservarModal">
                            Crear Reserva
                        </button>
                    </div>

                    <div class="modal fade" id="reservarModal" tabindex="-1" aria-labelledby="reservarModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{route(name: 'añadirReserva')}}" method="POST" id="agregar_reserva" @submit.prevent="funcion_validar_formulario($event)">
                                @csrf
                                @method('POST')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="reservarModalLabel">Crear una Reserva</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="fecha" class="form-label">Fecha de la Reserva</label>
                                            <input type="date" class="form-control" id="" name="fecha_reserva" v-model="fecha_reserva">
                                            <label v-if="boolean_fecha_reserva" class="form-label" style="color: red;" v-text="error_fecha_reserva"></label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="correo_electronico" class="form-label">Correo Electrónico</label>
                                            <input type="text" class="form-control" id="" name="correo_electronico" v-model="correo_electronico">
                                            <label v-if="boolean_correo_electronico" class="form-label" style="color: red;" v-text="error_correo_electronico"></label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inicio" class="form-label">Hora de inicio</label>
                                            <input type="time" class="form-control" id="" name="hora_inicio" v-model="hora_inicio">
                                            <label v-if="boolean_hora_inicio" class="form-label" style="color: red;" v-text="error_hora_inicio"></label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="final" class="form-label">Hora final</label>
                                            <input type="time" class="form-control" id="" name="hora_final" v-model="hora_final">
                                            <label v-if="boolean_hora_final" class="form-label" style="color: red;" v-text="error_hora_final"></label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="mesa" class="form-label">Número de mesa</label>
                                            <input type="text" class="form-control" id="" name="numero_mesa" v-model="numero_mesa">
                                            <label v-if="boolean_numero_mesa" class="form-label" style="color: red;" v-text="error_numero_mesa"></label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Crear Reserva</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                                <th style="width: 10%;">#</th>
                                <th style="width: 18%;">ID del Cliente</th>
                                <th style="width: 18%;">Fecha de Reserva</th>
                                <th style="width: 18%;">Hora de Inicio</th>
                                <th style="width: 18%;">Mesa</th>
                                <th style="width: 25%;">Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(reserva, index) in reservas" :key="reserva.id">
                                <td class="small text-truncate" v-text="reserva.id"></td>
                                <td class="small text-truncate" v-text="reserva.id_cliente"></td>
                                <td class="small text-truncate" v-text="reserva.fecha_reservacion"></td>
                                <td class="small text-truncate" v-text="reserva.hora_inicio"></td>
                                <td class="small text-truncate" v-text="reserva.numero_mesa"></td>

                                <td>
                                    <button class="btn btn-info btn-sm me-2" data-bs-toggle="modal" data-bs-target="#verReservasModal">Detalles</button>

                                    <button type="button" class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editarReservaModal">
                                        Editar
                                    </button> <button href="" class="btn btn-danger btn-sm">Eliminar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="modal fade" id="editarReservaModal" tabindex="-1" aria-labelledby="editarReservaModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="" method="">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editarReservaModalLabel">Editar una Reserva</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="fecha" class="form-label">Fecha de la Reserva</label>
                                            <input type="date" class="form-control" id="" name="" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="correo_electronico" class="form-label">Correo Electrónico</label>
                                            <input type="email" class="form-control" id="" name="" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inicio" class="form-label">Hora de inicio</label>
                                            <input type="time" class="form-control" id="" name="" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="final" class="form-label">Hora final</label>
                                            <input type="time" class="form-control" id="" name="" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="mesa" class="form-label">Número de mesa</label>
                                            <input type="number" class="form-control" id="" name="" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="modal fade" id="verReservasModal" tabindex="-1" aria-labelledby="verReservasModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarClienteLabel">Ver Usuario</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">


                                    <div class="mb-3">
                                        <label for="fecha" class="form-label">Fecha de la Reserva</label>
                                        <input type="date" class="form-control" id="" name="" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="correo_electronico" class="form-label">Correo Electrónico</label>
                                        <input type="email" class="form-control" id="" name="" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inicio" class="form-label">Hora de inicio</label>
                                        <input type="time" class="form-control" id="" name="" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="final" class="form-label">Hora final</label>
                                        <input type="time" class="form-control" id="" name="" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="mesa" class="form-label">Número de mesa</label>
                                        <input type="number" class="form-control" id="" name="" disabled>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="d-flex justify-content-end">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li @click="pagina_anterior()" class="page-item" style="cursor: pointer"><a class="page-link">Anterior</a></li>
                                <div v-for="n in cantidad_paginas" :key="n">
                                    <div v-if="n <= Math.min(3, pagina_actual + 1) || (n >= pagina_actual - 1 && n <= pagina_actual + 1)">
                                        <li v-if="n === pagina_actual" class="page-item">
                                            <a class="page-link active" style="cursor: pointer;" v-text="n"></a>
                                        </li>

                                        <li @click="seleccionar_pagina(n)" v-else class="page-item">
                                            <a class="page-link" style="cursor: pointer;" v-text="n"></a>
                                        </li>
                                    </div>
                                </div>
                                <li @click="pagina_siguiente()" class="page-item" style="cursor: pointer"><a class="page-link">Siguiente</a></li>
                            </ul>
                        </nav>
                    </div>
                </main>

            </div>
           
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="assets/demo/chart-pie-demo.js"></script>

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        const {
            createApp,
            ref
        } = Vue

        createApp({
            setup() {
                const obtener_reservas = ref(<?php echo json_encode($reservaciones['reservaciones']); ?>);
                
                let reservas = ref(obtener_reservas.value.slice(0, 10));
                let variable_reservas = ref(0)
                let variable_rango_reservas = ref(10)
                let cantidad_paginas = ref(1);
                let pagina_actual = ref(1);

                let fecha_reserva = ref("")
                let correo_electronico = ref("")
                let hora_inicio = ref("")
                let hora_final = ref("")
                let numero_mesa = ref("")
                let numero_mesa_actual = ref("")
                let correo_actual = ref("")

                let boolean_fecha_reserva = ref(false)
                let boolean_correo_electronico = ref(false)
                let boolean_hora_inicio = ref(false)
                let boolean_hora_final = ref(false)
                let boolean_numero_mesa = ref(false)


                let title = ref("")
                let text = ref("")


                return {
                    numero_mesa,
                    numero_mesa_actual,
                    correo_actual,

                    fecha_reserva,
                    correo_electronico,
                    hora_final,
                    hora_inicio,

                    boolean_numero_mesa,
                    boolean_fecha_reserva,
                    boolean_correo_electronico,
                    boolean_hora_inicio,
                    boolean_hora_final,


                    title,
                    text,

                    reservas,
                    obtener_reservas,
                    variable_rango_reservas,
                    variable_reservas,
                    cantidad_paginas,
                    pagina_actual,
                }
            },
            methods: {
                funcion_validar_formulario(event) {
                    const formId = event.target.id;

                    // Reutilizar el método para ambos formularios
                    if (formId === 'agregar_reserva') {
                        this.title = "Reserva registrada!";
                        this.text = "La reserva ha sido creada correctamente!";
                        this.validar_usuario('agregar_reserva');

                        console.log('agregar');
                    } else if (formId.startsWith('editar_mesa')) {
                        this.title = "La mesa ha sido editada!";
                        this.text = "Mesa editada correctamente!";
                        const usuarioId = formId.replace('editar_mesa', '');
                        this.validar_usuario('editar_mesa' + usuarioId);
                        console.log('editar id: ' + usuarioId)
                    }
                },

                validar_usuario(form_id) {
                    const numeroMesaRegex = /^[0-9]+$/;
                    const emailRegex = /^[a-zA-Z0-9._%+-]{1,64}@[a-zA-Z0-9-]{1,63}(\.[a-zA-Z0-9-]{1,63})*\.[a-zA-Z]{2,63}$/;
                    const fechaRegex = /^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/;
                    const horaRegex = /^(?:[01]\d|2[0-3]):[0-5]\d$/;

                    this.boolean_numero_mesa = false;
                    this.boolean_fecha_reserva = false;
                    this.boolean_categoria = false;
                    this.boolean_ubicacion = false;
                    this.boolean_correo_electronico = false;
                    this.boolean_hora_inicio = false;
                    this.boolean_hora_final = false

                    let numero_mesa_valido = numeroMesaRegex.test(this.numero_mesa);
                    let email_valido = emailRegex.test(this.correo_electronico);
                    let fecha_reserva_valida = this.fecha_reserva != "" && fechaRegex.test(this.fecha_reserva)
                    let hora_final_valida = this.hora_final != "" && horaRegex.test(this.hora_final)
                    let hora_inicio_valida = this.hora_inicio != "" &&horaRegex.test(this.hora_inicio)
                    let duracion_valida = false;
                    if (this.hora_inicio && this.hora_final) {
                        const fechaInicio = new Date(`1970-01-01T${this.hora_inicio}`);
                        const fechaFinal = new Date(`1970-01-01T${this.hora_final}`);
                        const diferenciaMilisegundos = fechaFinal - fechaInicio;

                        duracion_valida = diferenciaMilisegundos > 0 && diferenciaMilisegundos <= 7200000; 
                    }

                    let horario_valido = true;
                    if (this.hora_inicio && this.hora_final) {
                        const fechaInicio = new Date(`1970-01-01T${this.hora_inicio}`);
                        const fechaFinal = new Date(`1970-01-01T${this.hora_final}`);

                        if (fechaInicio >= fechaFinal) {
                            horario_valido = false;
                        }
                    }

                    const numero_mesa_existe = this.obtener_reservas.some(reserva => {
                        const mismaMesa = String(reserva.numero_mesa) === String(this.numero_mesa);
                        const mismaFecha = reserva.fecha_reservacion === this.fecha_reserva;

                        //Convertir las horas a formato Date para comparar
                        const horaInicioExistente = new Date(`1970-01-01T${reserva.hora_inicio}`);
                        const horaFinalExistente = new Date(`1970-01-01T${reserva.hora_final}`);
                        const horaInicioUsuario = new Date(`1970-01-01T${this.hora_inicio}`);
                        const horaFinalUsuario = new Date(`1970-01-01T${this.hora_final}`);

                        const horarioSolapado = 
                            (horaInicioUsuario < horaFinalExistente && horaFinalUsuario > horaInicioExistente);

                        return mismaMesa && mismaFecha && horarioSolapado;
                    });


                    if (numero_mesa_valido && !numero_mesa_existe && email_valido && fecha_reserva_valida && duracion_valida && hora_final_valida && hora_inicio_valida && horario_valido) {
                        swal({
                            title: this.title,
                            text: this.text,
                            icon: "success",
                            button: "Aceptar",
                        }).then(() => {
                            document.getElementById(form_id).submit();
                        });
                    } else {
                        this.boolean_numero_mesa = !numero_mesa_valido || numero_mesa_existe;
                        this.boolean_correo_electronico = !email_valido
                        this.boolean_fecha_reserva = !fecha_reserva_valida
                        this.boolean_hora_final = !duracion_valida || !hora_final_valida
                        this.boolean_hora_inicio = !hora_inicio_valida || !horario_valido

                        if (this.numero_mesa.length == 0) {
                            this.error_numero_mesa = "El campo es obligatorio";
                        } else if (numero_mesa_existe) {
                            this.error_numero_mesa = "Ya hay un número de mesa reservado a esa hora.";
                        } else {
                            this.error_numero_mesa = "El campo solo puede contener números.";
                        }

                        if(!email_valido){
                            this.error_correo_electronico = "La estructura no es valida"
                        }

                        if((!duracion_valida && this.hora_inicio.length != 0) && (!duracion_valida && this.hora_final.length != 0)){
                            this.error_hora_final = "La duración de la reserva no puede ser mayor a dos horas"
                        }
                        if(this.hora_inicio.length == 0){
                            this.error_hora_inicio = "Campo obligatorio"
                        }
                        if(this.hora_final.length == 0){
                            this.error_hora_final = "Campo obligatorio"
                        }else if(!duracion_valida && this.hora_inicio != 0){
                            this.error_hora_final = "La duración de la reserva no puede ser mayor a dos horas"
                        }else{
                            this.boolean_hora_final = false
                        }
                        if(this.hora_inicio.length == 0){
                            this.error_hora_inicio = "Campo obligatorio"
                        }else if(!horario_valido && !duracion_valida){
                            this.error_hora_inicio = "La hora de inicio no puede estar después de la hora final"
                            this.boolean_hora_final = false
                        }else if(!horario_valido){
                            this.error_hora_inicio = "La hora de inicio no puede estar después de la hora final"
                            this.boolean_hora_final = true
                        }

                        if(!horaRegex.test(this.hora_inicio) && this.hora_inicio.length != 0){
                            this.error_hora_inicio = "El formato de hora permitido es de 00:00 a 23:59"
                        }
                        if(!horaRegex.test(this.hora_final) && this.hora_final.length != 0){
                            this.error_hora_final = "El formato de hora permitido es de 00:00 a 23:59"
                        }

                        if(this.fecha_reserva.length <= 0){
                            this.error_fecha_reserva = "Campo obligatorio"
                        }else if(!fechaRegex.test(this.fecha_reserva)){
                            
                            this.error_fecha_reserva = "Debes ingresar un formato de fecha yyyy-mm-dd"
                        }
                        
                       
                    }
                },



                cargar_datos(mesa) {
                    this.numero_mesa = mesa.numero;
                    this.cantidad_sillas = mesa.cantidad_sillas;
                    this.categoria = mesa.categoria;
                    this.ubicacion = mesa.ubicacion;
                    this.numero_mesa_actual = mesa.numero;
                  
                },

                reiniciar_campos(modalId) { //Reiniciar los campos al cerrarr el modal
                    this.numero_mesa = "";
                    this.cantidad_sillas = ""
                    this.categoria = ""
                    this.ubicacion = ""
                    this.numero_mesa_actual = ""

                    this.boolean_numero_mesa = false
                    this.boolean_cantidad_sillas = false
                    this.boolean_categoria = false
                    this.boolean_ubicacion = false

                    this.error_numero_mesa = ""
                    this.error_cantidad_sillas = ""
                    this.error_categoria = ""
                    this.error_ubicacion = ""
              

                    console.log(`Campos reiniciados para el modal: ${modalId}`);
                },
                sweetAlert_eliminar(id) {
                    swal({
                            title: "Seguro que quieres eliminar esta mesa?",
                            text: "Una vez eliminada, no podrás recuperarla",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            console.log("id de formulario: " + id)
                            if (willDelete) {
                                swal("La mesa ha sido eliminada!", {
                                    icon: "success",


                                }).then(() => {
                                    document.getElementById('form_borrar_perfil_' + id).submit();
                                });

                            } else {
                                swal("El proceso se ha descartado");
                            }
                        });
                },

                //FUNCIONES PARA LA PAGINACIÓN

                reiniciar_campos_modals() {
                    this.reservas.forEach((usuario) => {
                        const modalId = `editarMesaModal${usuario.id}`;
                        const modalElement = document.getElementById(modalId);

                        if (modalElement) {
                            modalElement.addEventListener('hidden.bs.modal', () => {
                                this.reiniciar_campos(modalId);
                            });
                        }
                    });
                },
                reiniciar_campos_modals_detalles() {
                    this.reservas.forEach((usuario) => {
                        const modalId = `verMesaModal${usuario.id}`;
                        const modalElement = document.getElementById(modalId);

                        if (modalElement) {
                            modalElement.addEventListener('hidden.bs.modal', () => {
                                this.reiniciar_campos(modalId);
                            });
                        }
                    });
                },


                pagina_siguiente() {
                    let ultima_pagina = false;
                    if ((this.obtener_reservas.length - this.variable_reservas) <= 10) {
                        ultima_pagina = true;
                        console.log("true")
                    }

                    if (this.variable_reservas <= this.obtener_reservas.length && !ultima_pagina) {
                        this.reservas = [];
                        this.variable_reservas += 10;
                        this.variable_rango_reservas += 10;
                        this.reservas = this.obtener_reservas.slice(this.variable_reservas, this.variable_rango_reservas);
                        this.pagina_actual += 1;

                        this.reiniciar_campos_modals();
                        this.reiniciar_campos_modals_detalles();
                    }
                },
                pagina_anterior() {
                    let primera_pagina = false;
                    console.log(this.obtener_reservas.length)
                    if (this.pagina_actual == 1) {
                        primera_pagina = true;
                    } else {
                        primera_pagina = false;
                    }

                    if (this.variable_reservas <= this.obtener_reservas.length && primera_pagina == false) {
                        this.variable_reservas -= 10;
                        this.variable_rango_reservas -= 10
                        this.reservas = [];
                        this.reservas = ref(this.obtener_reservas.slice(this.variable_reservas, this.variable_rango_reservas));
                        this.pagina_actual -= 1;
                        this.reiniciar_campos_modals();
                        this.reiniciar_campos_modals_detalles()

                    }


                },
                seleccionar_pagina(numero) {
                    this.pagina_actual = numero;

                    const inicio = (numero - 1) * 10;
                    const fin = inicio + 10;

                    this.variable_reservas = inicio;
                    this.variable_rango_reservas = fin;

                    this.reservas = this.obtener_reservas.slice(inicio, fin);
                    this.reiniciar_campos_modals()
                    this.reiniciar_campos_modals_detalles()
                },
                obtener_paginas() {
                    let contador = 0;
                    for (let index = 0; index < this.obtener_reservas.length; index++) {
                        contador++
                        if (contador % 10 == 0) {
                            console.log(this.cantidad_paginas)
                            this.cantidad_paginas++

                            console.log(this.obtener_reservas.length)
                        }

                    }
                    if (this.obtener_reservas.length > 1 && this.obtener_reservas.length % 10 == 0) {
                        this.cantidad_paginas--
                    }

                    console.log(this.obtener_reservas)

                },
            


            },
            mounted() {
                /*const modal = document.getElementById('crearMesaModal')
                modal.addEventListener('hidden.bs.modal', () => {
                    this.reiniciar_campos()
                })
                this.reiniciar_campos_modals();
                this.reiniciar_campos_modals_detalles();*/

                this.obtener_paginas();

            }

        }).mount('#app')
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            const numero_mesa_input = document.getElementById("numero_mesa");
            const cantidad_sillas_input = document.getElementById("cantidad_sillas");
            const categoria_input = document.getElementById("categoria");
            const ubicacion_input = document.getElementById("ubicacion");

            function validar_nombres_apellidos(e) {
                const regex = /[^A-Za-zÑñ\s]/g;
                if (regex.test(e.key)) {
                    e.preventDefault();
                }
                const input = e.target;
                if (input.value.length >= 60 && !['Backspace', 'Delete', 'ArrowLeft', 'ArrowRight'].includes(e.key)) {
                    e.preventDefault();
                }
            }

           
            function validar_inputs_numeros(e) {
                const regex = /^[0-9]$/;
                const teclasPermitidas = ['Backspace', 'Delete', 'ArrowLeft', 'ArrowRight'];

                if (!regex.test(e.key) && !teclasPermitidas.includes(e.key)) {
                    e.preventDefault();
                }

                const input = e.target;
                if (input.value.length >= 10 && !teclasPermitidas.includes(e.key)) {
                    e.preventDefault();
                }
            }

            numero_mesa_input.addEventListener("keydown", validar_inputs_numeros);
            cantidad_sillas_input.addEventListener("keydown", validar_inputs_numeros);

           
            document.querySelectorAll("input[id^='editar_numero_mesa']").forEach(input => {
                input.addEventListener("keydown", validar_inputs_numeros);
            });

            document.querySelectorAll("input[id^='editar_cantidad_sillas']").forEach(input => {
                input.addEventListener("keydown", validar_inputs_numeros);
            });

            document.querySelectorAll("input[id^='editar_contrasena']").forEach(input => {
                input.addEventListener("keydown", validar_contrasena);
            });
            document.querySelectorAll("input[id^='editar_numero_telefonico']").forEach(input => {
                input.addEventListener("keydown", validar_numero_telefonico);
            });

            document.querySelectorAll("input[id^='editar_confirmar_contrasena']").forEach(input => {
                input.addEventListener("keydown", validar_contrasena);
            });

            document.querySelectorAll("input[id^='editar_contrasena']").forEach(input => {
                input.addEventListener("paste", function (e) {
                    e.preventDefault();
                });
            });

            document.querySelectorAll("input[id^='editar_confirmar_contrasena']").forEach(input => {
                input.addEventListener("paste", function (e) {
                    e.preventDefault();
                });
            });
        });
    </script>
</body>


</html>