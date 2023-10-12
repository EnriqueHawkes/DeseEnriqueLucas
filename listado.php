<?php
$moneda = "PESOS";   ///USD
$cotizacion = 350;
$totalMonetarioEnStock = 0;

function convertirPrecio($precio, $moneda, $cotizacion)
{
  if ($moneda === "USD") {
    return "USD " . number_format($precio, 2);  // use el number format para precisión de 2 decimales C:
  } else {
    return "$" . number_format($precio * $cotizacion, 2);
  }
}


function mostrarIconoDisponibilidad($disponible)
{                                                                           // aprendi a usar el ? que es una manera mas prolija y simple de usar un elseif

  return $disponible ? '<i class="bi bi-cart4"></i>' : '<i class="bi bi-cart-x-fill"></i>';


}

function convertirMontoEnStock($stock_actual, $precio, $moneda, $cotizacion)
{
  if ($moneda === "USD") {
    return "USD " . number_format($stock_actual * $precio, 1);
  } else {
    return "$" . number_format($stock_actual * $precio * $cotizacion, 1);
  }

}

$productos = [   /// creacion del array de productos
  [
    "codigo" => 1,
    "imagen" => "assets/img/reloj.jpg",
    "descrip" => "Led Adjustable Sports Bracelet Watch",
    "stock_actual" => 30,
    "stock_minimo" => 20,
    "precio" => 6.99,

  ],
  [
    "codigo" => 2,
    "imagen" => "assets/img/auriculares1.jpg",
    "descrip" => "Wireless in-ear headphones Black",
    "stock_actual" => 40,
    "stock_minimo" => 20,
    "precio" => 59.99,

  ],
  [
    "codigo" => 3,
    "imagen" => "assets/img/auriculares2.jpg",
    "descrip" => "White wireless headset",
    "stock_actual" => 20,
    "stock_minimo" => 25,
    "precio" => 47.99,

  ],
  [
    "codigo" => 4,
    "imagen" => "assets/img/soporte.jpg",
    "descrip" => "Extendable Support Cell Phone for Notebook",
    "stock_actual" => 80,
    "stock_minimo" => 40,
    "precio" => 11.99,

  ],
  [
    "codigo" => 5,
    "imagen" => "assets/img/funda.jpg",
    "descrip" => "Sports Case For iPhone Armband",
    "stock_actual" => 100,
    "stock_minimo" => 50,
    "precio" => 47.99,

  ],
];

$CantidadElementos = count($productos);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>1er Desempeño</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#">
            <?php if ($moneda == "PESOS") { ?>  <!-- Logica para cambiar el simbolo de la bandera a ARS O USA -->
              <img src=assets/img/ar.png alt="lang" class="rounded-circle">
              <span class="d-none d-md-block dropdown-toggle ps-2">PESOS</span>
            <?php } else { ?>
              <img src=assets/img/en.jpg alt="lang" class="rounded-circle">
              <span class="d-none d-md-block dropdown-toggle ps-2">DÓLARES</span>
            <?php } ?>

          </a><!-- End Profile Iamge Icon -->
        </li><!-- End Profile Nav -->
      </ul>
    </nav>


  </header><!-- End Header -->
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Home</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Productos</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="listado.html">
              <i class="bi bi-circle"></i><span>Los mas vendidos</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>
        Listado de Productos </h1>

      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">Productos</a></li>
          <li class="breadcrumb-item active">Los mas vendidos</li>


        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">


            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="card-body pb-0">
                  <h5 class="card-title">Los mas vendidos </h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Stock Min.</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Venta Web</th>
                        <th scope="col">Monetario en stock</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php

                      $productosDisponiblesVentaWeb = 0;      // Recorrido del array use un for each por que es ma facil entender el codigo y para acceder mas facil a los elemetnos del array 
                                                             // uso la variable producto que es  temporal para ir conteniendo el valor actual del array en cada iteracion
                      foreach ($productos as $producto) { 
                        $diferencia_stock = $producto["stock_actual"] - $producto["stock_minimo"];
                        $disponible_venta_web = $diferencia_stock > 10;

                        if ($disponible_venta_web) {
                          $productosDisponiblesVentaWeb++;  // esto es para acumular lo que despues  serian 3 productos disponibles je
                        }

                        if ($moneda === "USD") {
                          $valorConvertido = $producto["stock_actual"] * $producto["precio"];
                        } elseif ($moneda === "PESOS") {
                          $valorConvertido = $producto["stock_actual"] * $producto["precio"] * $cotizacion;
                        }

                        // Acumula el valor en la variable $totalMonetarioEnStock  lo que saldria abajo de todo 
                        $totalMonetarioEnStock = $totalMonetarioEnStock + $valorConvertido;

                        ?>
                        <tr>
                          <th scope="row">
                            <?php echo $producto["codigo"]; ?>  <!-- Los codigos de los product-->
                          </th>
                          <th scope="row">
                            <a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                              title="#<?php echo $producto["codigo"]; ?>">
                              <img src="<?php echo $producto["imagen"]; ?>" title="#<?php echo $producto["codigo"]; ?>" />
                            </a>
                          </th>
                          <td>
                            <a href="#" class="text-primary fw-bold">
                              <?php echo $producto["descrip"]; ?>
                            </a>
                            <div class="progress mt-3">
                              <!--  Logica para  las barras de Colores-->            <!--si la diferencia es menor o ig a 10 rojo si esta entre 10 y 30 naranja y si es mayor a 30 verde -->
                              <div                                                    
                                class="progress-bar <?php echo $diferencia_stock <= 10 ? 'bg-danger' : ($diferencia_stock > 10 && $diferencia_stock < 30 ? 'bg-warning' : 'bg-success'); ?> progress-bar-striped progress-bar-animated"
                                role="progressbar" style="width: <?php echo ($producto["stock_actual"] / 100) * 100;/*Utilizo el valor de $producto["stock_actual"] para calcular el ancho relativo de la barra en porcentaje. */ ?>%"   
                                aria-valuenow="<?php echo $producto["stock_actual"]; ?>" aria-valuemin="0"
                                aria-valuemax="100" title='Stock Actual <?php echo $producto["stock_actual"]; ?>'></div>
                            </div>
                          </td>
                          <td>
                            <h4>
                              <span class="badge border-info border-1 text-info">
                                <?php echo $producto["stock_minimo"]; ?>    <!-- Imp del stock min-->
                              </span>
                            </h4>
                          </td>
                          <td> <!--  Logica para colores de los precios-->
                            <h4>   <!--Funciona literalmente igual a la que hice arriba je-->
                              <span                                                                     
                                class="badge border-border-1 text-<?php echo $diferencia_stock <= 10 ? 'danger' : ($diferencia_stock > 10 && $diferencia_stock < 30 ? 'warning' : 'success'); ?> ">
                                <?php echo convertirPrecio($producto["precio"], $moneda, $cotizacion); ?>
                              </span>

                            </h4>
                          </td>
                          <td>
                            <h3>
                              <!--  Logica para colores de los carritos funciona igual a las otras dos tmb C: -->
                              <span    
                                title="<?php echo $disponible_venta_web ? 'Se permite venta web' : 'No se permite venta web'; ?>"
                                class="badge border- border-1 text-<?php echo $diferencia_stock <= 10 ? 'danger' : ($diferencia_stock > 10 && $diferencia_stock < 30 ? 'warning' : 'success'); ?>">
                                <?php echo mostrarIconoDisponibilidad($disponible_venta_web); ?>
                              </span>

                            </h3>
                          </td>
                          <td>
                            <h4>
                              <span class="badge border-info border-1 text-info">   <!--uso de la funcion para convertir el monto en stock -->
                                <?php echo convertirMontoEnStock($producto["stock_actual"], $producto["precio"], $moneda, $cotizacion); ?> 
                              </span>
                            </h4>
                          </td>
                        </tr>

                        <?php
                      }
                      ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->



            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">
                    PRODUCTOS <span>| Cantidad para la venta web</span> </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-patch-check-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        <?php echo $productosDisponiblesVentaWeb; ?>
                      </h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body"><!--  Stock Actual * Precio -->
                  <h5 class="card-title">
                    Total <span>| Monetario en Stock</span> </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">  
                      <h6>      <!--  esto lo hice para concatenar los simbolos de usd y pesos en el total monetario  -->
                        <?php if ($moneda == "PESOS") {        
                          echo "$" . number_format($totalMonetarioEnStock); 
                        } else {
                          echo " USD " . number_format($totalMonetarioEnStock, 1);
                        } ?>
                      </h6>


                    </div>
                  </div>
                </div>

              </div>
            </div>


          </div><!-- End Left side columns -->
        </div>

    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working html/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files 2023-->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File 2023-->
  <script src="assets/js/main.js"></script>

</body>

</html>