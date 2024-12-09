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
                        <h2 class="text-center">Panel de Clientes</h2>

                        <div class="text-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Crear Cliente
                            </button>
                        </div>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{route(name: 'añadirCliente')}}" method="POST" id="agregar_usuario" @submit.prevent="funcion_validar_usuario($event)">
                                    @csrf
                                    @method('POST')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Crear un Nuevo Cliente</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" id="nombres" name="nombres" v-model="nombres">
                                                <label v-if="boolean_nombres" class="form-label" style="color: red;" v-text="error_nombres"></label>
                                            </div>
                                            <div class="mb-3">
                                                <label for="apellidos" class="form-label">Apellidos</label>
                                                <input type="text" class="form-control" id="apellidos" name="apellidos" v-model-="apellidos">
                                                <label v-if="boolean_apellidos" class="form-label" style="color: red;" v-text="error_apellidos"></label>
                                            </div>
                                            <div class="mb-3">
                                                <label for="numero_telefonico" class="form-label">Número Telefónico</label>
                                                <input type="text" class="form-control" id="numero_telefonico" name="numero_telefonico" v-model="numero_telefonico">
                                                <label v-if="boolean_numero_telefonico" class="form-label" style="color: red;" v-text="error_numero_telefonico"></label>
                                            </div>
                                            <div class="mb-3">
                                                <label for="correo_electronico" class="form-label">Correo Electrónico</label>
                                                <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" v-model="correo_electronico">
                                                <label v-if="boolean_correo_electronico" class="form-label" style="color: red;" v-text="error_correo_electronico"></label>
                                            </div>
                                            <div class="mb-3">
                                                <label for="contrasena" class="form-label">Contraseña</label>
                                                <input type="password" class="form-control" id="contrasena" name="contrasena" v-model="contrasena">
                                                <label v-if="boolean_contrasena" class="form-label" style="color: red;" v-text="error_contrasena"></label>
                                                
                                            </div>
                                            <div class="mb-3">
                                                <label for="contrasena" class="form-label">Confirmar Contraseña</label>
                                                <input type="password" class="form-control" id="confirmar_contrasena" name="confirmar_contrasena" v-model="confirmar_contrasena">
                                                <label v-if="boolean_confirmar_contrasena" class="form-label" style="color: red;" v-text="error_confirmar_contrasena"></label>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Crear Cliente</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">#</th>
                                    <th style="width: 17%;">Nombre</th>
                                    <th style="width: 17%;">Apellidos</th>
                                    <th style="width: 17%;">Teléfono</th>
                                    <th style="width: 17%;">Email</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(cliente, index) in clientes" :key="cliente.id">
                                    <td class="small text-truncate" v-text="cliente.id"></td>
                                    <td class="small text-truncate" v-text="cliente.nombre"></td>
                                    <td class="small text-truncate" v-text="cliente.apellidos"></td>
                                    <td class="small text-truncate" v-text="cliente.correo_electronico"></td>
                                    <td class="small text-truncate" v-text="cliente.numero_telefonico"></td>
                                    
                                    <td>
                                        <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#verClienteModal">Detalles</button>

                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editarClienteModal">
                                            Editar
                                        </button>

                                        <button @click="sweetAlert_eliminar(cliente.id)" class="btn btn-danger btn-sm">Eliminar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="modal fade" id="editarClienteModal" tabindex="-1" aria-labelledby="editarClienteLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="" method="">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editarClienteLabel">Editar un Cliente</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Cerrar"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" id="" name="" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="apellidos" class="form-label">Apellidos</label>
                                                <input type="text" class="form-control" id="" name="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="numero_telefonico" class="form-label">Número Telefónico</label>
                                                <input type="text" class="form-control" id="" name="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="correo_electronico" class="form-label">Correo Electrónico</label>
                                                <input type="email" class="form-control" id="" name="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="contrasena" class="form-label">Contraseña</label>
                                                <input type="password" class="form-control" id="" name="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="confirmar_contrasena" class="form-label">Confirmar
                                                    Contraseña</label>
                                                <input type="password" class="form-control" id="" name="">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>


                        <div class="modal fade" id="verClienteModal" tabindex="-1" aria-labelledby="verClienteLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editarClienteLabel">Ver cliente</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="nombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="" name="" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="apellidos" class="form-label">Apellidos</label>
                                            <input type="text" class="form-control" id="" name="" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="numero_telefonico" class="form-label">Número Telefónico</label>
                                            <input type="text" class="form-control" id="" name="" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="correo_electronico" class="form-label">Correo Electrónico</label>
                                            <input type="email" class="form-control" id="" name="" disabled>
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
        </div>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>

        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script>
            const {
                createApp,
                ref
            } = Vue

            createApp({
                setup() {
                    const obtener_clientes = ref(<?php echo json_encode($clients['clientes']); ?>);
                    let clientes = ref(obtener_clientes.value.slice(0, 10));
                    let variable_clientes = ref(0)
                    let variable_rango_clientes = ref(10)
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
                        clientes,
                        obtener_clientes,
                        variable_rango_clientes,
                        variable_clientes,
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

                        const correo_existe = this.obtener_clientes.some(usuario =>
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

                        console.log(`Campos reiniciados para el modal: ${modalId}`);
                    },
                    sweetAlert_eliminar(id) {
                        swal({
                            title: "Seguro que quieres eliminar al cliente?",
                            text: "Una vez eliminado, no podrás recuperarlo",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                            .then((willDelete) => {
                                console.log("id de formulario: " + id)
                                if (willDelete) {
                                    swal("El cliente ha sido eliminado!", {
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
                        this.clientes.forEach((usuario) => {
                            const modalId = `editarUsuarioModal${usuario.id}`;
                            const modalElement = document.getElementById(modalId);

                            if (modalElement) {
                                modalElement.addEventListener('hidden.bs.modal', () => {
                                    this.reiniciar_campos(modalId);
                                });
                            }
                        });
                    },
                    reiniciar_campos_modals_detalles() {
                        this.clientes.forEach((usuario) => {
                            const modalId = `verUsuarioModal${usuario.id}`;
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
                        if ((this.obtener_clientes.length - this.variable_clientes) <= 10) {
                            ultima_pagina = true;
                            console.log("true")
                        }

                        if (this.variable_clientes <= this.obtener_clientes.length && !ultima_pagina) {
                            this.clientes = [];
                            this.variable_clientes += 10;
                            this.variable_rango_clientes += 10;
                            this.clientes = this.obtener_clientes.slice(this.variable_clientes, this.variable_rango_clientes);
                            this.pagina_actual += 1;

                            this.reiniciar_campos_modals();
                            this.reiniciar_campos_modals_detalles();
                        }
                    },
                    pagina_anterior() {
                        let primera_pagina = false;
                        console.log(this.obtener_clientes.length)
                        if (this.pagina_actual == 1) {
                            primera_pagina = true;
                        } else {
                            primera_pagina = false;
                        }

                        if (this.variable_clientes <= this.obtener_clientes.length && primera_pagina == false) {
                            this.variable_clientes -= 10;
                            this.variable_rango_clientes -= 10
                            this.clientes = [];
                            this.clientes = ref(this.obtener_clientes.slice(this.variable_clientes, this.variable_rango_clientes));;
                            this.pagina_actual -= 1;
                            this.reiniciar_campos_modals();
                            this.reiniciar_campos_modals_detalles()

                        }


                    },
                    seleccionar_pagina(numero) {
                        this.pagina_actual = numero;

                        const inicio = (numero - 1) * 10;
                        const fin = inicio + 10;

                        this.variable_clientes = inicio;
                        this.variable_rango_clientes = fin;

                        this.clientes = this.obtener_clientes.slice(inicio, fin);
                        this.reiniciar_campos_modals()
                        this.reiniciar_campos_modals_detalles()
                    },
                    obtener_paginas() {


                        let contador = 0;
                        for (let index = 0; index < this.obtener_clientes.length; index++) {
                            contador++
                            if (contador % 10 == 0) {
                                console.log(this.cantidad_paginas)
                                this.cantidad_paginas++

                                console.log(this.obtener_clientes.length)
                            }

                        }
                        if (this.obtener_clientes.length > 1 && this.obtener_clientes.length % 10 == 0) {
                            this.cantidad_paginas--
                        }

                        console.log(this.obtener_clientes)

                    },



                },
                mounted() {
                    /*const modal = document.getElementById('crearUsuarioModal')
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