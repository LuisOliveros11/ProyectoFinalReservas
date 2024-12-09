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
                            <form action="" method="">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="crearMesaModalLabel">Crear una Nueva Mesa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="Mesa" class="form-label">Número de Mesa</label>
                                            <input type="text" class="form-control" id="" name="" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="sillas" class="form-label">Cantidad de sillas</label>
                                            <input type="number" class="form-control" id="" name="" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="categoria" class="form-label">Categoría</label>
                                            <select class="form-select" id="" name="" required>
                                                <option value="">Selecciona una categoría</option>
                                                <option value="Normal">Normal</option>
                                                <option value="VIP">VIP</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="ubicacion" class="form-label">Ubicación</label>
                                            <select class="form-select" id="" name="" required>
                                                <option value="">Selecciona una ubicación</option>
                                                <option value="Interior">Interior</option>
                                                <option value="Exterior">Exterior</option>
                                                <option value="Privada">Privada</option>
                                            </select>
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
                                    <button class="btn btn-info btn-sm me-2" data-bs-toggle="modal" data-bs-target="#verMesasModal">Detalles</button>

                                    <button class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editarMesaModal">
                                        Editar
                                    </button>
                                    <button href="" class="btn btn-danger btn-sm">Eliminar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                    <div class="modal fade" id="editarMesaModal" tabindex="-1" aria-labelledby="editarMesaLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="" method="">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editarMesaModal">Editar Mesa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="Mesa" class="form-label">Número de Mesa</label>
                                            <input type="text" class="form-control" id="" name="" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="sillas" class="form-label">Cantidad de sillas</label>
                                            <input type="number" class="form-control" id="" name="" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="categoria" class="form-label">Categoría</label>
                                            <select class="form-select" id="" name="" required>
                                                <option value="">Selecciona una categoría</option>
                                                <option value="Normal">Normal</option>
                                                <option value="VIP">VIP</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="ubicacion" class="form-label">Ubicación</label>
                                            <select class="form-select" id="" name="" required>
                                                <option value="">Selecciona una ubicación</option>
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

                    <div class="modal fade" id="verMesasModal" tabindex="-1" aria-labelledby="verMesasModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarClienteLabel">Ver cliente</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="Mesa" class="form-label">Número de Mesa</label>
                                        <input type="text" class="form-control" id="" name="" disabled>
                                    </div>

                                    <div class="mb-3">
                                        <label for="sillas" class="form-label">Cantidad de sillas</label>
                                        <input type="number" class="form-control" id="" name="" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="categoria" class="form-label">Categoría</label>
                                        <input type="text" class="form-control" id="" name="" disabled>

                                    </div>
                                    <div class="mb-3">
                                        <label for="ubicacion" class="form-label">Ubicación</label>
                                        <input type="text" class="form-control" id="" name="" disabled>

                                    </div>
                                    <div class="mb-3">
                                        <label for="disponibilidad" class="form-label">Disponibilidad</label>
                                        <input type="text" class="form-control" id="" name="" disabled>

                                    </div>

                                    <div class="col-mb-3">
                                        <h5>Historial de reservaciones</h5>
                                        <section>
                                            <ul class="timeline">
                                                <li class="timeline-item mb-6">
                                                    <h6 class="mb-2 fw-bold">Fecha de reservacion: 2024-12-12</h6>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6 class="text-muted fw-bold">Hora de inicio:</h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <p>08:30:00</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6 class="text-muted fw-bold">Hora final:</h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <p>08:30:00</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6 class="text-muted fw-bold">Numero de mesa:</h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <p>2</p>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="timeline-item mb-6">
                                                    <h6 class="mb-2 fw-bold">Fecha de reservacion: 2024-12-12</h6>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6 class="text-muted fw-bold">Hora de inicio:</h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <p>08:30:00</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6 class="text-muted fw-bold">Hora final:</h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <p>08:30:00</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6 class="text-muted fw-bold">Numero de mesa:</h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <p>2</p>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="timeline-item mb-6">
                                                    <h6 class="mb-2 fw-bold">Fecha de reservacion: 2024-12-12</h6>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6 class="text-muted fw-bold">Hora de inicio:</h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <p>08:30:00</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6 class="text-muted fw-bold">Hora final:</h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <p>08:30:00</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h6 class="text-muted fw-bold">Numero de mesa:</h6>
                                                        </div>
                                                        <div class="col-8">
                                                            <p>2</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </section>
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


                let nombres = ref("")
                let apellidos = ref("")
                let correo_electronico = ref("")
                let contrasena = ref("")
                let confirmar_contrasena = ref("")
                let fecha_registro = ref("")
                let numero_telefonico = ref("")

                let correo_actual = ref("")
                let correo_cerrar_modal = ref("")

                let boolean_nombres = ref(false)
                let boolean_apellidos = ref(false)
                let boolean_correo_electronico = ref(false)
                let boolean_contrasena = ref(false)
                let boolean_confirmar_contrasena = ref(false)
                let boolean_fecha_registro = ref(false)
                let boolean_numero_telefonico = ref(false)

                let error_campos = ref("")
                let error_correo_electronico = ref("")

                let title = ref("")
                let text = ref("")


                return {
                    nombres,
                    apellidos,
                    correo_electronico,
                    contrasena,
                    confirmar_contrasena,
                    fecha_registro,
                    numero_telefonico,
                    boolean_nombres,
                    boolean_apellidos,
                    boolean_correo_electronico,
                    boolean_contrasena,
                    boolean_confirmar_contrasena,
                    boolean_fecha_registro,
                    boolean_numero_telefonico,
                    error_campos,
                    error_correo_electronico,
                    title,
                    text,
                    mesas,
                    obtener_mesas,
                    variable_rango_mesas,
                    variable_mesas,
                    cantidad_paginas,
                    pagina_actual,
                    correo_actual,
                    correo_cerrar_modal
                }
            },
            methods: {
                funcion_validar_usuario(event) {
                    const formId = event.target.id;

                    // Reutilizar el método para ambos formularios
                    if (formId === 'agregar_usuario') {
                        this.title = "Cuenta registrada!";
                        this.text = "La cuenta ha sido creada correctamente!";
                        this.validar_usuario('agregar_usuario');

                        console.log('agregar');
                    } else if (formId.startsWith('editar_usuario')) {
                        this.title = "La cuenta ha sido editada!";
                        this.text = "Cuenta editada correctamente!";
                        const usuarioId = formId.replace('editar_usuario', '');
                        this.validar_usuario('editar_usuario' + usuarioId);
                        console.log('editar id: ' + usuarioId)
                    }
                },

                validar_usuario(form_id) {
                    // VALIDAR FORMULARIO AGREGAR Y EDITAR USUARIO

                    const emailRegex = /^[a-zA-Z0-9._%+-]{1,64}@[a-zA-Z0-9-]{1,63}(\.[a-zA-Z0-9-]{1,63})*\.[a-zA-Z]{2,63}$/;
                    const nameRegex = /^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$/;
                    const contrasenaRegex = /^(?=.*[A-Z])(?=.*[!@#$%^&*(),.?":{}|<>])[A-Za-z\d!@#$%^&*(),.?":{}|<>]{8,}$/;

                    this.boolean_nombres = false;
                    this.boolean_apellidos = false;
                    this.boolean_correo_electronico = false;
                    this.boolean_contrasena = false;
                    this.boolean_confirmar_contrasena = false;
                    this.boolean_fecha_registro = false;
                    this.boolean_numero_telefonico = false;

                    let email_valido = emailRegex.test(this.correo_electronico);
                    let name_valido = nameRegex.test(this.nombres);
                    let lastname_valido = nameRegex.test(this.apellidos);
                    let password_valido = contrasenaRegex.test(this.contrasena);
                    let confirmar_contrasena = this.contrasena === this.confirmar_contrasena;
                    let fecha_valida = this.fecha_registro !== "";
                    let numero_telefonico_valido = this.numero_telefonico.length == 10;

                    const correo_existe = this.obtener_mesas.some(usuario =>
                        usuario.correo_electronico === this.correo_electronico && usuario.correo_electronico !== this.correo_actual
                    );

                    if (email_valido && name_valido && lastname_valido && password_valido && confirmar_contrasena && numero_telefonico_valido && !correo_existe) {
                        swal({
                            title: this.title,
                            text: this.text,
                            icon: "success",
                            button: "Aceptar",
                        }).then(() => {
                            document.getElementById(form_id).submit();
                        });
                    } else {
                        this.boolean_correo_electronico = !email_valido || correo_existe;
                        this.boolean_nombres = !name_valido;
                        this.boolean_apellidos = !lastname_valido;
                        this.boolean_contrasena = !password_valido;
                        this.boolean_confirmar_contrasena = !confirmar_contrasena;
                        this.boolean_numero_telefonico = !numero_telefonico_valido;

                        if (this.nombres.length == 0) {
                            this.error_nombres = "El campo es obligatorio";
                        } else {
                            this.error_nombres = "Los nombres solo pueden contener letras";
                        }

                        if (this.apellidos.length == 0) {
                            this.error_apellidos = "El campo es obligatorio";
                        } else {
                            this.error_apellidos = "Los apellidos solo pueden contener letras";
                        }

                        if (this.correo_electronico.length == 0) {
                            this.error_correo_electronico = "El campo es obligatorio";
                        } else if (correo_existe) {
                            this.error_correo_electronico = "El correo ya está registrado.";
                        } else {
                            this.error_correo_electronico = "El correo debe tener una estructura válida.";
                        }

                        if (this.contrasena.length < 8) {
                            this.error_contrasena = "La contraseña debe contener al menos 8 carácteres";
                        } else {
                            this.error_contrasena = "La contrasena debe contener al menos una mayúscula y un simbolo";
                        }

                        if (this.confirmar_contrasena != this.contrasena) {
                            this.error_confirmar_contrasena = "Las contraseñas no coinciden";
                        }

                        if (this.numero_telefonico.length !== 10) {
                            this.error_numero_telefonico = "El numero debe ser de 10 dígitos";
                        }

                        if (!fecha_valida) {
                            this.error_fecha_registro = "Debes seleccionar una fecha";
                        }
                    }
                },



                cargarUsuario(usuario) {
                    this.nombres = usuario.nombre;
                    this.apellidos = usuario.apellidos;
                    this.correo_electronico = usuario.correo_electronico;
                    this.correo_actual = usuario.correo_electronico;
                    this.numero_telefonico = usuario.numero_telefonico
                    this.contrasena = "";
                    this.confirmar_contrasena = "";
                },

                reiniciar_campos(modalId) { //Reiniciar los campos al cerrarr el modal
                    this.nombres = ""
                    this.apellidos = ""
                    this.correo_electronico = ""
                    this.correo_actual = ""
                    this.contrasena = ""
                    this.confirmar_contrasena = ""
                    this.fecha_registro = ""
                    this.numero_telefonico = ""

                    this.boolean_nombres = false
                    this.boolean_apellidos = false
                    this.boolean_contrasena = false
                    this.boolean_confirmar_contrasena = false
                    this.boolean_fecha_registro = false

                    this.error_nombres = ""
                    this.error_apellidos = ""
                    this.error_correo_electronico = ""
                    this.error_contrasena = ""
                    this.error_confirmar_contrasena = ""
                    this.error_fecha_registro = ""
                    this.error_numero_telefonico = ""

                    console.log(`Campos reiniciados para el modal: ${modalId}`);
                },
                sweetAlert_eliminar(id) {
                    swal({
                            title: "Seguro que quieres eliminar al usuario?",
                            text: "Una vez eliminado, no podrás recuperarlo",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            console.log("id de formulario: " + id)
                            if (willDelete) {
                                swal("El usuario ha sido eliminado!", {
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
                        const modalId = `editarClienteModal${usuario.id}`;
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
                        const modalId = `verClienteModal${usuario.id}`;
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
                /*const modal = document.getElementById('crearClienteModal')
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

            const nombres_input = document.getElementById("nombres");
            const apellidos_input = document.getElementById("apellidos");
            const contrasena_input = document.getElementById("contrasena");
            const confirmar_contrasena_input = document.getElementById("confirmar_contrasena");
            const numero_telefonico_input = document.getElementById("numero_telefonico");

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

            function validar_contrasena(e) {
                const regex = /\s/;
                if (regex.test(e.key)) {
                    e.preventDefault();
                }
                const input = e.target;
                if (input.value.length >= 64 && !['Backspace', 'Delete', 'ArrowLeft', 'ArrowRight'].includes(e.key)) {
                    e.preventDefault();
                }
            }
            function validar_numero_telefonico(e) {
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

            nombres_input.addEventListener("keydown", validar_nombres_apellidos);
            apellidos_input.addEventListener("keydown", validar_nombres_apellidos);
            contrasena_input.addEventListener("keydown", validar_contrasena);
            numero_telefonico_input.addEventListener("keydown", validar_numero_telefonico);

            contrasena_input.addEventListener("paste", function (e) {
                e.preventDefault();
            });

            confirmar_contrasena_input.addEventListener("paste", function (e) {
                e.preventDefault();
            });

            document.querySelectorAll("input[id^='editar_nombres']").forEach(input => {
                input.addEventListener("keydown", validar_nombres_apellidos);
            });

            document.querySelectorAll("input[id^='editar_apellidos']").forEach(input => {
                input.addEventListener("keydown", validar_nombres_apellidos);
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