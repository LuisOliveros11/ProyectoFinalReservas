<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Registrar</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="app">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Crear una Cuenta</h3>
                                    </div>
                                    <div class="card-body">
                                        @if (session('error'))
                                            <div class="alert alert-danger" role="alert">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                        <form method="POST" action="{{route(name: 'añadirUsuario')}}"
                                            @submit.prevent="funcion_agregar_usuario" id="agregar_usuario">
                                            @csrf
                                            @method('POST')
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <input type="hidden" name="origen" value="login">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="nombres" type="text"
                                                            placeholder="Nombres" v-model="nombres" name="nombres" />
                                                        <label for="">Nombres</label>
                                                    </div>
                                                    <label v-if="boolean_nombres" class="form-label" style="color: red;"
                                                        v-text="error_nombres"></label>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="apellidos" type="text"
                                                            placeholder="Apellidos" name="apellidos"
                                                            v-model="apellidos" />
                                                        <label for="">Apellidos</label>
                                                    </div>
                                                    <label v-if="boolean_apellidos" class="form-label"
                                                        style="color: red;" v-text="error_apellidos"></label>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">

                                                        <select class="form-select" id="" name="rol" v-model="rol">
                                                            <option value="" disabled selected>Selecciona un Rol
                                                            </option>
                                                            <option value="Administrador">Administrador</option>
                                                            <option value="Empleado">Empleado</option>
                                                        </select>
                                                        <label for="rol">Rol</label>

                                                    </div>
                                                    <label v-if="boolean_rol" class="form-label" style="color: red;"
                                                        v-text="error_rol"></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="" type="text"
                                                            placeholder="name@example.com" name="correo_electronico"
                                                            v-model="correo_electronico" />
                                                        <label for="">correo electrónico</label>
                                                    </div>
                                                    <label v-if="boolean_correo_electronico" class="form-label"
                                                        style="color: red;" v-text="error_correo_electronico"></label>
                                                </div>
                                            </div>


                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="contrasena" type="password"
                                                            placeholder="crea una Contraseña" name="contrasena"
                                                            v-model="contrasena" />
                                                        <label for="">Contraseña</label>
                                                    </div>
                                                    <label v-if="boolean_contrasena" class="form-label"
                                                        style="color: red;" v-text="error_contrasena"></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="confirmar_contrasena"
                                                            type="password" placeholder="confirmar Contraseña"
                                                            name="confirmar_contrasena"
                                                            v-model="confirmar_contrasena" />
                                                        <label for="">confirmar Contraseña</label>
                                                    </div>
                                                    <label v-if="boolean_confirmar_contrasena" class="form-label"
                                                        style="color: red;" v-text="error_confirmar_contrasena"></label>
                                                </div>
                                            </div>

                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block"
                                                        type="submit">Crear una Cuenta</>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="{{route(name: 'inicio')}}">¿Tienes una Cuenta?
                                                inicia sesión</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>

    <script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <script>
        const { createApp, ref } = Vue

        createApp({
            setup() {

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

                return {
                    nombres, boolean_nombres, error_campos,
                    apellidos, boolean_apellidos,
                    correo_electronico, boolean_correo_electronico, error_correo_electronico,
                    contrasena, boolean_contrasena,
                    confirmar_contrasena, boolean_confirmar_contrasena,
                    rol, boolean_rol,
                    fecha_registro, boolean_fecha_registro
                }
            },
            methods: {

                funcion_agregar_usuario() {
                    //VALIDAR FORMULARIO AGREGAR USUARIO

                    const emailRegex = /^[a-zA-Z0-9._%+-]{1,64}@[a-zA-Z0-9-]{1,63}(\.[a-zA-Z0-9-]{1,63})*\.[a-zA-Z]{2,63}$/;
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
                        document.getElementById('agregar_usuario').submit();
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

            },
            mounted() {

            }

        }).mount('#app')
    </script>

    <script>
        const nombres_input = document.getElementById("nombres");
        const apellidos_input = document.getElementById("apellidos");
        const contrasena_input = document.getElementById("contrasena");
        const confirmar_contrasena_input = document.getElementById("confirmar_contrasena");

        //VALIDAR LONGITUD Y CARACTERES INGRESADOS A LOS CAMPOS
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

        //EVITAR PEGAR TEXTO EN LOS CAMPOS DE CONTRASEÑAS
        contrasena_input.addEventListener("paste", function (e) {
            e.preventDefault();
        });
        confirmar_contrasena_input.addEventListener("paste", function (e) {
            e.preventDefault();
        });
    </script>
</body>

</html>