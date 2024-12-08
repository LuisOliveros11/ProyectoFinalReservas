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
                        <tr>
                            <td class="small text-truncate">1</td>
                            <td class="small text-truncate">4</td>
                            <td class="small text-truncate">Vip</td>
                            <td class="small text-truncate">Interior</td>
                            <td class="small text-truncate">Ocupado</td>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/demo/chart-pie-demo.js"></script>
</body>

</html>