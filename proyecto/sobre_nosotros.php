<?php

include 'elementos/conexion.php';

 session_start();
 if (isset($_SESSION['id_usuario'])){
    $id_usuario = $_SESSION['id_usuario'];
 }else{
    $id_usuario = '';
 }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>


    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Link de mi CSS -->
    <link rel="stylesheet" href="../../proyecto/css/estilos.css">

    <link rel="icon" type="image" href="img/favicon.png"/>
</head>
    <body> 
        <?php include 'elementos/header_usuario.php'  ?>
        <section class="sn">
            <h1>Compromiso DeusPC</h1>
            <h2>En DeusPC sabemos lo importante que es construir nuestra marca a partir del valor real que entregamos a nuestros clientes. 
                Por ello, creemos que no solo nuestros productos deben tener la mejor relación calidad-precio, 
                si no que además, deben ir acompañados de unos servicios que te lo pongan fácil y que te ayuden a tomar la mejor decisión.</h2>
            <div class="sobre-nosotros-bg">
                <div class="row">
                    <div class="col-md-6"><img class="quienes-somos" src="img/quienes-somos_01.jpg" alt=""></div>
                    <div class="col-md-6"><h1>¿Qué puedes esperar de DeusPC?</h1><p class=texto>Llevamos más de 17 años a tu lado, construyendo y adaptándonos a lo que necesitas a 
                        medida que hemos ido avanzando.<br>No obstante, no es tanto todo lo que hemos hecho sino nuestra manera de hacerlo. 
                        Por ello, queremos que tengas claro que puedes esperar de nosotros y en qué centramos nuestros esfuerzos día a día. 
                        Para que sepas que puedes esperar de DeusPC si decides formar parte de esta familia.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6"><h1>Nuestros Valores</h1><p class=texto>Disponemos de un equipo técnico altamente cualificado que nos permite prestar un servicio puntero a 
                        los entusiastas que prefieren diseñar a medida sus equipos.<br> Les ayudamos a escoger los componentes que mejor se ajustan a 
                        sus necesidades y después montamos los equipos respetando los estándares de calidad más exigentes de la industria.<br> Garantizamos la máxima calidad
                        de construcción y de envío en cada equipo.</p>
                    </div>
                    <div class="col-md-6"><img class="quienes-somos" src="img/quienes-somos_02.jpg" alt=""></div>   
                </div>
                
            </div>
        </section>
        <?php include 'elementos/footer.php'  ?>
        <!--Script js-->
        <script src="js\script.js"></script>
    </body>
</html>