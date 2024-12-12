<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">


    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div id="app">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Acceder</h3>
                                    </div>
                                    <div class="card-body">
                                        @if (session('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('error') }}
                                        </div>
                                        @endif
                                        <form method="post" action="{{ route('login') }}" id="login">
                                            @csrf
                                            @method('POST')
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="" type="email" placeholder="name@example.com" name="correo_electronico" v-model="correo" />
                                                <label for="">Correo electronico</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="" type="password" placeholder="Contraseña" name="contrasena" v-model="ingresar_contrasena" />
                                                <label for="">Contraseña</label>
                                            </div>

                                            <div class="d-flex align-items-center justify-content-end mt-6 mb-0">
                                                <button class="btn btn-primary" href="">Acceder</button>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="./crearCuenta">¿Necesitas una cuenta? ¡Registrate!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>


    <script>
        const {
            createApp,
            ref
        } = Vue

        createApp({
            setup() {

                let ingresar_contrasena = ref("")
                let validar_contrasena = ref(false)

                return {
                    ingresar_contrasena,
                    validar_contrasena
                }
            },
            methods: {



            },
            mounted() {

            }

        }).mount('#app')
    </script>

</body>

</html>