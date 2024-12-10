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
                    <h2 class="text-center">Lista de mesa</h2>
                    <div class="text-end">
                        <button type="button" class="btn btn-primary text-end" data-bs-toggle="modal" data-bs-target="#crearMesaModal">
                            Crear Mesa
                        </button>
                    </div>

                    <div class="modal fade" id="crearMesaModal" tabindex="-1" aria-labelledby="crearMesaModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{route(name: 'añadirMesa')}}" method="POST" id="agregar_mesa" @submit.prevent="funcion_validar_formulario($event)">
                                @csrf
                                @method('POST')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="crearMesaModalLabel">Crear una Nueva Mesa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="Mesa" class="form-label">Número de Mesa</label>
                                            <input type="text" class="form-control" id="numero_mesa" name="numero_mesa" v-model="numero_mesa">
                                            <label v-if="boolean_numero_mesa" class="form-label" style="color: red;" v-text="error_numero_mesa"></label>
                                        </div>

                                        <div class="mb-3">
                                            <label for="sillas" class="form-label">Cantidad de sillas</label>
                                            <input type="text" class="form-control" id="cantidad_sillas" name="cantidad_sillas" v-model="cantidad_sillas">
                                            <label v-if="boolean_cantidad_sillas" class="form-label" style="color: red;" v-text="error_cantidad_sillas"></label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="categoria" class="form-label">Categoría</label>
                                            <select class="form-select" id="categoria" name="categoria" v-model="categoria">
                                                <option value="">Selecciona una categoría</option>
                                                <option value="Normal">Normal</option>
                                                <option value="VIP">VIP</option>
                                            </select>
                                            <label v-if="boolean_categoria" class="form-label" style="color: red;" v-text="error_categoria"></label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="ubicacion" class="form-label">Ubicación</label>
                                            <select class="form-select" id="ubicacion" name="ubicacion" v-model="ubicacion">
                                                <option value="" disabled selected>Selecciona una ubicación</option>
                                                <option value="Interior">Interior</option>
                                                <option value="Exterior">Exterior</option>
                                                <option value="Privada">Privada</option>
                                            </select>
                                            <label v-if="boolean_ubicacion" class="form-label" style="color: red;" v-text="error_ubicacion"></label>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Crear Mesa</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                                <th style="width: 17%;">Numero de mesa</th>
                                <th style="width: 17%;">Cantidad de sillas</th>
                                <th style="width: 17%;">categoria</th>
                                <th style="width: 17%;">Ubicacion</th>
                                <th style="width: 17%;">Disponibilidad</th>
                                <th style="width: 25%;">Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(mesa, index) in mesas" :key="mesa.id">
                                <td class="small text-truncate" v-text="mesa.numero"></td>
                                <td class="small text-truncate" v-text="mesa.cantidad_sillas"></td>
                                <td class="small text-truncate" v-text="mesa.categoria"></td>
                                <td class="small text-truncate" v-text="mesa.ubicacion"></td>
                                <td class="small text-truncate" v-text="mesa.disponibilidad"></td>
                                <td>
                                    <button class="btn btn-info btn-sm me-2" data-bs-toggle="modal" :data-bs-target="'#verMesaModal' + mesa.id"  @click="cargar_datos(mesa)">Detalles</button>

                                    <button class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" :data-bs-target="'#editarMesaModal' + mesa.id" @click="cargar_datos(mesa)">
                                        Editar
                                    </button>
                                    <form method="POST" action="{{ route('eliminarMesa') }}" :id="'form_borrar_perfil_' + mesa.id" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="usuario_id" :value="mesa.id">
                                        <button type="button" @click="sweetAlert_eliminar(mesa.id)" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div v-for="(mesa, index) in obtener_mesas" :key="mesa.id">
                        <div class="modal fade" :id="'editarMesaModal'+mesa.id" :data-modal-id="mesa.id" tabindex="-1" aria-labelledby="editarMesaLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{route(name: 'editarMesa')}}" method="POST" :id="'editar_mesa'+mesa.id" @submit.prevent="funcion_validar_formulario($event)">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editarMesaModal">Editar Mesa</h5>
                                            <button type="button" @click="sweetAlert_eliminar(cliente.id)" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                        </div>
                                        <div class="modal-body">
                                        <input type="hidden" name="mesa_id" :value="mesa.id">
                                            <div class="mb-3">
                                                <label for="Mesa" class="form-label">Número de Mesa</label>
                                                <input type="text" class="form-control" :id="'editar_numero_mesa'+mesa.id" name="numero_mesa" v-model="numero_mesa">
                                            </div>

                                            <div class="mb-3">
                                                <label for="sillas" class="form-label">Cantidad de sillas</label>
                                                <input type="text" class="form-control" :id="'editar_cantidad_sillas'+mesa.id" name="cantidad_sillas" v-model="cantidad_sillas">
                                            </div>
                                            <div class="mb-3">
                                                <label for="categoria" class="form-label">Categoría</label>
                                                <select class="form-select" :id="'editar_categoria'+mesa.id" name="categoria" v-model="categoria">
                                                    <option value="" disabled selected>Selecciona una categoría</option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="VIP">VIP</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="ubicacion" class="form-label">Ubicación</label>
                                                <select class="form-select" :id="'editar_ubicacion'+mesa.id" name="ubicacion" v-model="ubicacion">
                                                    <option value="" disabled selected>Selecciona una ubicación</option>
                                                    <option value="Interior">Interior</option>
                                                    <option value="Exterior">Exterior</option>
                                                    <option value="Privada">Privada</option>
                                                </select>
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


                    </div>

                    <div v-for="(mesa, index) in obtener_mesas" :key="mesa.id">
                        <div class="modal fade" :id="'verMesaModal'+mesa.id" :data-modal-id="mesa.id" tabindex="-1" aria-labelledby="verMesasModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editarClienteLabel">Ver cliente</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="Mesa" class="form-label">Número de Mesa</label>
                                            <input type="text" class="form-control" v-model="numero_mesa" disabled>
                                        </div>

                                        <div class="mb-3">
                                            <label for="sillas" class="form-label">Cantidad de sillas</label>
                                            <input type="number" class="form-control" v-model="cantidad_sillas" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="categoria" class="form-label">Categoría</label>
                                            <input type="text" class="form-control" v-model="categoria" disabled>

                                        </div>
                                        <div class="mb-3">
                                            <label for="ubicacion" class="form-label">Ubicación</label>
                                            <input type="text" class="form-control" v-model="ubicacion" disabled>

                                        </div>
                                        <div class="mb-3">
                                            <label for="disponibilidad" class="form-label">Disponibilidad</label>
                                            <input type="text" class="form-control" v-model="mesa.disponibilidad" disabled>

                                        </div>

                                        <div class="col-mb-3">
                                            <h5>Historial de reservaciones</h5>
                                            <section>
                                                <ul v-if="Object.keys(mesa.reservas).length > 0"  class="timeline">
                                                    <li v-for="reserva in mesa.reservas" :key="reserva.id" class="timeline-item mb-6">
                                                    <div class="row">
                                                            <div class="col-4">
                                                                <h6 class="mb-2 fw-bold">Fecha de reservación: </h6>
                                                            </div>
                                                            <div class="col-8">
                                                            <h6 class="mb-2 fw-bold" v-text="reserva.fecha_reservacion"></h6>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <h6 class="text-muted fw-bold">Hora de inicio:</h6>
                                                            </div>
                                                            <div class="col-8">
                                                                <p v-text="reserva.hora_inicio"></p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <h6 class="text-muted fw-bold">Hora final:</h6>
                                                            </div>
                                                            <div class="col-8">
                                                                <p v-text="reserva.hora_final"></p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <h6 class="text-muted fw-bold">Numero de mesa:</h6>
                                                            </div>
                                                            <div class="col-8">
                                                                <p v-text="reserva.numero_mesa"></p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div v-else>
                                                    <h6 class="mb-2">No hay reservaciones</h6>
                                                </div>    
                                            </section>
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
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
                const obtener_mesas = ref(<?php echo json_encode($mesasActualizadas['mesas']); ?>);
                
                let mesas = ref(obtener_mesas.value.slice(0, 10));
                let variable_mesas = ref(0)
                let variable_rango_mesas = ref(10)
                let cantidad_paginas = ref(1);
                let pagina_actual = ref(1);


                let numero_mesa = ref("")
                let cantidad_sillas = ref("")
                let categoria = ref("")
                let ubicacion = ref("")
                let correo_actual = ref("")
                let correo_electronico = ref("")

                let boolean_numero_mesa = ref(false)
                let boolean_cantidad_sillas = ref(false)
                let boolean_categoria = ref(false)
                let boolean_ubicacion = ref(false)

                let title = ref("")
                let text = ref("")


                return {
                    numero_mesa,
                    cantidad_sillas,
                    categoria,
                    ubicacion,
                    correo_actual,
                    correo_electronico,

                    boolean_numero_mesa,
                    boolean_cantidad_sillas,
                    boolean_categoria,
                    boolean_ubicacion,

                    title,
                    text,

                    mesas,
                    obtener_mesas,
                    variable_rango_mesas,
                    variable_mesas,
                    cantidad_paginas,
                    pagina_actual,
                }
            },
            methods: {
                funcion_validar_formulario(event) {
                    const formId = event.target.id;

                    // Reutilizar el método para ambos formularios
                    if (formId === 'agregar_mesa') {
                        this.title = "Mesa registrada!";
                        this.text = "La Mesa ha sido creada correctamente!";
                        this.validar_usuario('agregar_mesa');

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
                    // VALIDAR FORMULARIO AGREGAR Y EDITAR USUARIO
                    const numeroMesaRegex = /^[0-9]+$/;
                    const emailRegex = /^[a-zA-Z0-9._%+-]{1,64}@[a-zA-Z0-9-]{1,63}(\.[a-zA-Z0-9-]{1,63})*\.[a-zA-Z]{2,63}$/;

                    this.boolean_numero_mesa = false
                    this.boolean_cantidad_sillas = false
                    this.boolean_categoria = false
                    this.boolean_ubicacion = false

                    let numero_mesa_valido = numeroMesaRegex.test(this.numero_mesa);
                    let cantidad_sillas_valido =numeroMesaRegex.test(this.cantidad_sillas);
                    let categoria_valida = this.categoria === "Normal" || this.categoria === "VIP";
                    let ubicacion_valida = this.ubicacion != "";
                    let email_valido = emailRegex.test(this.correo_electronico);


                    const numero_mesa_existe = this.obtener_mesas.some(usuario =>
                        String(usuario.numero) === String(this.numero_mesa) //&& usuario.numero_mesa !== this.correo_actual
                    );

                    if (numero_mesa_valido && cantidad_sillas_valido && categoria_valida && ubicacion_valida) {
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
                        this.boolean_cantidad_sillas = !cantidad_sillas_valido
                        this.boolean_categoria = !categoria_valida
                        this.boolean_ubicacion = !ubicacion_valida

                        if (this.numero_mesa.length == 0) {
                            this.error_numero_mesa = "El campo es obligatorio";
                        }
                        else if (numero_mesa_existe) {
                            this.error_numero_mesa = "Este número de mesa ya está registrado.";
                        }
                        else {
                            this.error_numero_mesa = "El campo solo puede contener numeros";
                        }

                        if (this.cantidad_sillas.length == 0) {
                            this.error_cantidad_sillas = "El campo es obligatorio";
                        } else {
                            this.error_cantidad_sillas = "Los apellidos solo pueden contener letras";
                        }
                        if (this.categoria.length == 0) {
                            this.error_categoria = "El campo es obligatorio";
                        } 
                        else if(!categoria_valida){
                            this.error_categoria = "Esta categoría no existe"
                        } 
                        if (this.ubicacion.length == 0) {
                            this.error_ubicacion = "El campo es obligatorio";
                        } 
                    
                    }
                },



                cargar_datos(mesa) {
                    this.numero_mesa = mesa.numero;
                    this.cantidad_sillas = mesa.cantidad_sillas;
                    this.categoria = mesa.categoria;
                    this.ubicacion = mesa.ubicacion;
                  
                },

                reiniciar_campos(modalId) { //Reiniciar los campos al cerrarr el modal
                    this.numero_mesa = "";
                    this.cantidad_sillas = ""
                    this.categoria = ""
                    this.ubicacion = ""

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
                    this.mesas.forEach((usuario) => {
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
                    this.mesas.forEach((usuario) => {
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
                    if ((this.obtener_mesas.length - this.variable_mesas) <= 10) {
                        ultima_pagina = true;
                        console.log("true")
                    }

                    if (this.variable_mesas <= this.obtener_mesas.length && !ultima_pagina) {
                        this.mesas = [];
                        this.variable_mesas += 10;
                        this.variable_rango_mesas += 10;
                        this.mesas = this.obtener_mesas.slice(this.variable_mesas, this.variable_rango_mesas);
                        this.pagina_actual += 1;

                        this.reiniciar_campos_modals();
                        this.reiniciar_campos_modals_detalles();
                    }
                },
                pagina_anterior() {
                    let primera_pagina = false;
                    console.log(this.obtener_mesas.length)
                    if (this.pagina_actual == 1) {
                        primera_pagina = true;
                    } else {
                        primera_pagina = false;
                    }

                    if (this.variable_mesas <= this.obtener_mesas.length && primera_pagina == false) {
                        this.variable_mesas -= 10;
                        this.variable_rango_mesas -= 10
                        this.mesas = [];
                        this.mesas = ref(this.obtener_mesas.slice(this.variable_mesas, this.variable_rango_mesas));
                        this.pagina_actual -= 1;
                        this.reiniciar_campos_modals();
                        this.reiniciar_campos_modals_detalles()

                    }


                },
                seleccionar_pagina(numero) {
                    this.pagina_actual = numero;

                    const inicio = (numero - 1) * 10;
                    const fin = inicio + 10;

                    this.variable_mesas = inicio;
                    this.variable_rango_mesas = fin;

                    this.mesas = this.obtener_mesas.slice(inicio, fin);
                    this.reiniciar_campos_modals()
                    this.reiniciar_campos_modals_detalles()
                },
                obtener_paginas() {
                    let contador = 0;
                    for (let index = 0; index < this.obtener_mesas.length; index++) {
                        contador++
                        if (contador % 10 == 0) {
                            console.log(this.cantidad_paginas)
                            this.cantidad_paginas++

                            console.log(this.obtener_mesas.length)
                        }

                    }
                    if (this.obtener_mesas.length > 1 && this.obtener_mesas.length % 10 == 0) {
                        this.cantidad_paginas--
                    }

                    console.log(this.obtener_mesas)

                },
            


            },
            mounted() {
                const modal = document.getElementById('crearMesaModal')
                modal.addEventListener('hidden.bs.modal', () => {
                    this.reiniciar_campos()
                })
                this.reiniciar_campos_modals();
                this.reiniciar_campos_modals_detalles();

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