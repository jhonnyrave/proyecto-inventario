<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body class="d-flex">
    <main class="d-flex w-100">
        <!-- Menu lateral -->
        <div class="d-flex flex-column p-3 text-white bg-dark" style="width: 280px; height:100vh">
            <a href="<?=base_url?>"
                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <h1 class="fs-4">Cafetería</h1>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="<?=base_url?>" class="nav-link text-white" aria-current="page">
                        Productos
                    </a>
                </li>
                <li>
                    <a href="<?= base_url."Venta/index" ?>" class="nav-link text-white">
                        Ventas
                    </a>
                </li>
            </ul>
        </div>
        <!-- Contenido -->
        <div id="content" class="container p-4">