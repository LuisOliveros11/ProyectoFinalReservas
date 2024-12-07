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
                    <h2 class="text-center">Panel de Usuarios</h2>


                    <div class="text-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crearUsuarioModal">
                            Crear Usuario
                        </button>
                    </div>
                    <div class="modal fade" id="crearUsuarioModal" tabindex="-1" aria-labelledby="crearUsuarioModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="POST" action="{{route(name: 'añadirUsuario')}}" @submit.prevent="funcion_validar_usuario($event)" id="agregar_usuario">
                                @csrf
                                @method('POST')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="crearUsuarioModalLabel">Crear un Nuevo Usuario</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="nombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="nombres" name="nombres" v-model="nombres">
                                            <label v-if="boolean_nombres" class="form-label" style="color: red;" v-text="error_nombres"></label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="apellidos" class="form-label">Apellidos</label>
                                            <input type="text" class="form-control" id="apellidos" name="apellidos" v-model="apellidos" >
                                            <label v-if="boolean_apellidos" class="form-label" style="color: red;" v-text="error_apellidos"></label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="correo_electronico" class="form-label">Correo Electrónico</label>
                                            <input type="text" class="form-control" id="correo_electronico" name="correo_electronico" v-model="correo_electronico">
                                            <label v-if="boolean_correo_electronico" class="form-label" style="color: red;" v-text="error_correo_electronico"></label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="contrasena" class="form-label">Contraseña</label>
                                            <input type="password" class="form-control" id="contrasena" name="contrasena" v-model="contrasena">
                                            <label v-if="boolean_contrasena" class="form-label" style="color: red;" v-text="error_contrasena"></label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="contrasena_confirmada" class="form-label">Confirmar Contraseña</label>
                                            <input type="password" class="form-control" id="confirmar_contrasena" name="confirmar_contrasena" v-model="confirmar_contrasena">
                                            <label v-if="boolean_confirmar_contrasena" class="form-label" style="color: red;" v-text="error_confirmar_contrasena"></label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="rol" class="form-label">Rol</label>
                                            <select class="form-select" id="rol" name="rol" v-model="rol" >
                                                <option value="" disabled selected>Selecciona un Rol</option>
                                                <option value="Administador">Administrador</option>
                                                <option value="Empleado">Empleado</option>
                                            </select>
                                            <label v-if="boolean_rol" class="form-label" style="color: red;" v-text="error_rol"></label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Crear Usuario</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>


                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(usuario, index) in usuarios" :key="usuario.id">
                                <td v-text="usuario.id"></td>
                                <td v-text="usuario.nombre"></td>
                                <td v-text="usuario.apellidos"></td>
                                <td v-text="usuario.correo_electronico"></td>
                                <td v-text="usuario.rol"></td>

                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" :data-bs-target="'#editarUsuarioModal' + usuario.id" @click="cargarUsuario(usuario)"                                    >
                                        Editar
                                    </button>
                                    <form action="POST" :id="'form_borrar_perfil' + usuario.id" class="d-inline">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" name="usuario_id" :value="usuario.id">
                                        <button type="button" @click="sweetAlert_eliminar(usuario.id)" class="btn btn-danger btn-sm">Eliminar</button>

                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div v-for="(usuario, index) in usuarios" :key="usuario.id">
                        <div class="modal fade" :id="'editarUsuarioModal'+usuario.id" :data-modal-id="usuario.id" tabindex="-1" aria-labelledby="editarUsuarioModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form method="POST" action="" @submit.prevent="funcion_validar_usuario($event)" :id="'editar_usuario'+usuario.id">
                                    @csrf
                                    @method('POST')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="editarUsuarioModalLabel">Editar un Usuario</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" :id="'editar_nombres'+usuario.id" name="editar_nombres" v-model="nombres" >
                                                <label v-if="boolean_nombres" class="form-label" style="color: red;" v-text="error_nombres"></label>
                                            </div>
                                            <div class="mb-3">
                                                <label for="apellidos" class="form-label">Apellidos</label>
                                                <input type="text" class="form-control" :id="'editar_apellidos'+usuario.id" name="editar_apellidos" v-model="apellidos" >
                                                <label v-if="boolean_apellidos" class="form-label" style="color: red;" v-text="error_apellidos"></label>
                                            </div>
                                            <div class="mb-3">
                                                <label for="correo_electronico" class="form-label">Correo Electrónico</label>
                                                <input type="text" class="form-control" :id="'editar_correo_electronico'+usuario.id" name="editar_correo_electronico" v-model="correo_electronico">
                                                <label v-if="boolean_correo_electronico" class="form-label" style="color: red;" v-text="error_correo_electronico"></label>
                                            </div>
                                            <div class="mb-3">
                                                <label for="contrasena" class="form-label">Contraseña</label>
                                                <input type="password" class="form-control" :id="'editar_contrasena'+usuario.id" name="editar_contrasena" v-model="contrasena">
                                                <label v-if="boolean_contrasena" class="form-label" style="color: red;" v-text="error_contrasena"></label>
                                            </div>
                                            <div class="mb-3">
                                                <label for="contrasena_confirmada" class="form-label">Confirmar Contraseña</label>
                                                <input type="password" class="form-control" :id="'editar_confirmar_contrasena'+usuario.id" name="editar_confirmar_contrasena" v-model="confirmar_contrasena">
                                                <label v-if="boolean_confirmar_contrasena" class="form-label" style="color: red;" v-text="error_confirmar_contrasena"></label>
                                            </div>
                                            <div class="mb-3">
                                                <label for="rol" class="form-label">Rol</label>
                                              
                                                <select class="form-select" :id="'editar_rol'+usuario.id" name="editar_rol" v-model="rol">
                                                    <option value="Administrador" :selected="rol === 'Administrador'">Administrador</option>
                                                    <option value="Empleado" :selected="rol === 'Empleado'">Empleado</option>
                                                </select>
                                                <label v-if="boolean_rol" class="form-label" style="color: red;" v-text="error_rol"></label>
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

                    


                    <div class="d-flex justify-content-end">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
                            </ul>
                        </nav>
                    </div>
                </main>
            </div>
           
        </div>

    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <script>
    const obtener_usuarios = @json($users);
    </script>

    <script>
        const { createApp, ref } = Vue

        createApp({
            setup() {
                let usuarios = ref(obtener_usuarios.usuarios);

                let nombres = ref("")
                let apellidos = ref("")
                let correo_electronico = ref("")
                let contrasena = ref("")
                let confirmar_contrasena = ref("")
                let rol = ref("")
                let fecha_registro = ref("")

                let boolean_nombres = ref(false)
                let boolean_apellidos = ref(false)
                let boolean_correo_electronico = ref(false)
                let boolean_contrasena = ref(false)
                let boolean_confirmar_contrasena = ref(false)
                let boolean_rol = ref(false)
                let boolean_fecha_registro = ref(false)

                let error_campos = ref("")
                let error_correo_electronico = ref("")

                let title = ref("")
                let text = ref("")

                return {
                    nombres, apellidos, correo_electronico, contrasena, confirmar_contrasena, rol, fecha_registro,
                    boolean_nombres, boolean_apellidos, boolean_correo_electronico, boolean_contrasena, boolean_confirmar_contrasena,
                    boolean_rol, boolean_fecha_registro, error_campos, error_correo_electronico, 
                    title, text,usuarios
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
                        this.validar_usuario('editar_usuario', usuarioId);
                        console.log('editar id: ' + usuarioId)
                    }
                },

                validar_usuario(form_id) {
                    //VALIDAR FORMULARIO AGREGAR Y EDITAR USUARIO

                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
                    const nameRegex = /^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$/;
                    const apellidosRegex = /^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$/;
                    const contrasenaRegex = /^(?=.*[A-Z])(?=.*[!@#$%^&*(),.?":{}|<>])[A-Za-z\d!@#$%^&*(),.?":{}|<>]{8,}$/;



                    this.boolean_nombres = false;
                    this.boolean_apellidos = false;
                    this.boolean_correo_electronico = false;
                    this.boolean_contrasena = false;
                    this.boolean_confirmar_contrasena = false;
                    this.boolean_rol = false;
                    this.boolean_fecha_registro = false;


                    let email_valido = emailRegex.test(this.correo_electronico);
                    let name_valido = nameRegex.test(this.nombres);
                    let lastname_valido = nameRegex.test(this.apellidos);
                    let password_valido = contrasenaRegex.test(this.contrasena);
                    let confirmar_contrasena = this.contrasena === this.confirmar_contrasena;
                    let rol_valido = this.rol !== "";
                    let fecha_valida = this.fecha_registro !== "";






                    if (email_valido && name_valido && lastname_valido && password_valido && confirmar_contrasena && rol_valido) {
                        swal({
                            title: this.title,
                            text: this.text,
                            icon: "success",
                            button: "Aceptar",
                        }).then(() => {
                            document.getElementById(form_id).submit();
                        });


                    }
                    else {
                        this.boolean_correo_electronico = !email_valido;
                        this.boolean_nombres = !name_valido;
                        this.boolean_apellidos = !lastname_valido;
                        this.boolean_contrasena = !password_valido;
                        this.boolean_confirmar_contrasena = !confirmar_contrasena;
                        this.boolean_rol = !rol_valido;
                    }
                    if (this.nombres.length == 0) {
                        this.error_nombres = "El campo es obligatorio";

                    } else {
                        this.error_nombres = "Los nombres solo pueden contener letras"
                    }
                    if (this.apellidos.length == 0) {
                        this.error_apellidos = "El campo es obligatorio";

                    } else {
                        this.error_apellidos = "Los apellidos solo pueden contener letras"
                    }
                    if (this.correo_electronico.length == 0) {
                        this.error_correo_electronico = "El campo es obligatorio";

                    } else {
                        this.error_correo_electronico = "El correo debe tener una estructura válida"
                    }
                    if (this.contrasena.length < 8) {
                        this.error_contrasena = "La contraseña debe contener al menos 8 carácteres"
                    } else {
                        this.error_contrasena = "La contrasena debe contener al menos una mayúscula y un simbolo"
                    }
                    if (this.confirmar_contrasena != this.contrasena) {
                        this.error_confirmar_contrasena = "Las contraseñas no coinciden"
                    }
                    if (!rol_valido) {
                        this.error_rol = "El usuario debe poseer un rol"
                    }
                    if (!fecha_valida) {
                        this.error_fecha_registro = "Debes seleccionar una fecha"
                    }

                },

                cargarUsuario(usuario) {
                    this.nombres = usuario.nombre;
                    this.apellidos = usuario.apellidos;
                    this.correo_electronico = usuario.correo_electronico;
                    this.rol = usuario.rol;
                    this.contrasena = ""; 
                    this.confirmar_contrasena = ""; 
                },

                reiniciar_campos(modalId) { //Reiniciar los campos al cerrarr el modal
                this.nombres = ""
                this.apellidos = ""
                this.correo_electronico = ""
                this.contrasena = ""
                this.confirmar_contrasena = ""
                this.rol = ""
                this.fecha_registro = ""

                this.boolean_nombres = false
                this.boolean_apellidos = false
                this.boolean_correo_electronico = false
                this.boolean_contrasena = false
                this.boolean_confirmar_contrasena = false
                this.boolean_rol = false
                this.boolean_fecha_registro = false

                this.error_nombres = ""
                this.error_apellidos = ""
                this.error_correo_electronico = ""
                this.error_contrasena = ""
                this.error_confirmar_contrasena = ""
                this.error_rol = ""
                this.error_fecha_registro = ""

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

            },
            mounted() {
                const modal = document.getElementById('crearUsuarioModal')
                modal.addEventListener('hidden.bs.modal', () => {
                    this.reiniciar_campos()
                })
                this.usuarios.forEach((usuario) => {
                    const modalId = `editarUsuarioModal${usuario.id}`;
                    const modalElement = document.getElementById(modalId);

                    if (modalElement) {
                        modalElement.addEventListener('hidden.bs.modal', () => {
                            this.reiniciar_campos(modalId);
                        });
                    }
                });

            }

        }).mount('#app')
    </script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
       
        const nombres_input = document.getElementById("nombres");
        const apellidos_input = document.getElementById("apellidos");
        const contrasena_input = document.getElementById("contrasena");
        const confirmar_contrasena_input = document.getElementById("confirmar_contrasena");

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

        nombres_input.addEventListener("keydown", validar_nombres_apellidos);
        apellidos_input.addEventListener("keydown", validar_nombres_apellidos);
        contrasena_input.addEventListener("keydown", validar_contrasena);

        contrasena_input.addEventListener("paste", function(e) {
            e.preventDefault();
        });

        confirmar_contrasena_input.addEventListener("paste", function(e) {
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
            input.addEventListener("paste", function(e) {
                e.preventDefault();
            });
        });
        
        document.querySelectorAll("input[id^='editar_confirmar_contrasena']").forEach(input => {
            input.addEventListener("paste", function(e) {
                e.preventDefault();
            });
        });
    });
</script>



   
</body>

</html>