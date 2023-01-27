<?php

include 'elementos/conexion.php';

 session_start();
 if (isset($_SESSION['id_usuario'])){
    $id_usuario = $_SESSION['id_usuario'];
 }else{
    $id_usuario = '';
 }

 include 'elementos/lista_deseos.php';

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>

        <!--font awesome link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Link de mi CSS -->
        <link rel="stylesheet" href="../../proyecto/css/estilos.css">
        
        <link rel="icon" type="image" href="img/favicon.png"/>
        <?php include 'elementos/header_usuario.php'  ?>
    </head>
    <body>
        <div class="banner-bg">
            <section class="home">
                <!-- SLIDER CON BOOTSTRAP -->
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <!-- IMAGENES -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="img" src="img/pb_02.png" alt="First slide">
                            <div class="carousel-texto">
                                <h1>Aorus Elite V2</h1>
                                <p>Ya disponible</p>
                                <a href="tienda.php" class="btn">Comprar Ahora</a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="img" src="img/tg_01.png" alt="Second slide">
                            <div class="carousel-texto">
                                <h1>NVIDIA RTX 4090</h1>
                                <p>Ya disponible</p>
                                <a href="tienda.php" class="btn">Comprar Ahora</a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="img" src="img/prcsr_01.png" alt="Third slide">
                            <div class="carousel-texto">
                                <h1>AMD Ryzen 9 5950X </h1>
                                <p>Ya disponible</p>
                                <a href="tienda.php" class="btn">Comprar Ahora</a>
                            </div>
                        </div>
                    </div>
                    <!-- /IMAGENES -->
                    <!-- CONTROL SLIDE -->
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    <!-- /CONTROL SLIDE -->
                </div>
                <!-- /SLIDER CON BOOTSTRAP -->
            </section>
        </div>
        <!-- /CATEGORÍAS SECCION -->
        <section class="categorias">
            <h1>CATEGORÍAS</h1><br>
                <div class="box-container">
                    <div class="box">                     
                        <a href="categoria.php?categoria=prcsr" >
                            <img class="categorias-iconos"  src="img/cpuicon.png" alt="First slide" >
                            <h3>Procesadores</h3>
                        </a>
                    </div>
                    <div class="box">      
                        <a href="categoria.php?categoria=tg" >
                            <img class="categorias-iconos"  src="img/tgicon.png" alt="Second slide" >
                            <h3>Tarjetas Gráficas</h3>
                        </a>
                    </div>
                    <div class="box">      
                        <a href="categoria.php?categoria=pb" >
                            <img class="categorias-iconos"  src="img/mb1icon.png" alt="Third slide" >
                            <h3>Placas Base</h3>
                        </a>
                    </div>
                    <div class="box">                     
                        <a href="categoria.php?categoria=psu" >
                            <img class="categorias-iconos"  src="img/psuicon.png" alt="" >
                            <h3>PSU</h3>
                        </a>
                    </div>

                    <div class="box">                     
                        <a href="categoria.php?categoria=ram" >
                            <img class="categorias-iconos"  src="img/ramicon.png" alt="First slide" >
                            <h3>Memoria RAM</h3>
                        </a>
                    </div>
                    <div class="box">      
                        <a href="categoria.php?categoria=hdd" >
                            <img class="categorias-iconos"  src="img/ssd.png" alt="Second slide" >
                            <h3>Memoria</h3>
                        </a>
                    </div>
                    <div class="box">      
                        <a href="categoria.php?categoria=caja" >
                            <img class="categorias-iconos"  src="img/cajaicon.png" alt="Third slide" >
                            <h3>Cajas</h3>
                        </a>
                    </div>
                    <div class="box">                     
                        <a href="categoria.php?categoria=tec" >
                            <img class="categorias-iconos"  src="img/perifericon.png" alt="" >
                            <h3>Periféricos</h3>
                        </a>
                    </div>       
                </div>
        </section>
        <!-- /CATEGORÍAS SECCION -->
        <!-- SECCIÓN DE PRODUCTOS -->
        <section class="home-productos">
            <h1>PRODUCTOS DESTACADOS</h1><br>
                <div class="box-container">
                    <?php
                        $select_productos = $conectar->prepare("SELECT * FROM `productos` LIMIT 4");
                        $select_productos->execute();
                        if($select_productos->rowCount() > 0){
                            while($fetch_productos = $select_productos->fetch(PDO::FETCH_ASSOC)){
                    ?>
                                <form action="" method="post">
                                    <input type="hidden" name="pid" value="<?=$fetch_productos['id'];?>">
                                    <input type="hidden" name="name" value="<?=$fetch_productos['name'];?>">
                                    <input type="hidden" name="precio" value="<?=$fetch_productos['precio'];?>">
                                    <input type="hidden" name="img" value="<?=$fetch_productos['img_01'];?>">
                                </form>
                                <div class="box">
                                    <form action="" method="post" class="">
                                    
                                        <img src="img/<?= $fetch_productos['img_01'];?>" alt="" class="img">
                                        <button class="fas fa-heart" name="anadir_lista_deseos" > </button>
                                        <!-- <a href="vista_rapida.php?pid=<?= $fetch_productos['id'];?>" class="fas fa-eye"></a> -->
                                        <div class="name"><h3> <?= $fetch_productos['name'];?></h3></div>
                                        <div class="precio"><h3> <?= $fetch_productos['precio'];?>€</h3></div>
                                        <input class="ctd" type="number" name="cantidad"  min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value = "1">
                                        <input type="submit" value="Añadir Producto" name="anadir_al_carro" class="btn">
                                    </form>
                                </div>
                    
                    <?php
                            }
                        }else{
                            echo '<p class="vacio">No hay productos añadidos.</p>';
                        }

                    ?>                           
                </div>
        </section>
        <!--/SECCIÓN DE PRODUCTOS -->
        <!-- SECCIÓN DE MARCAS -->
        <section class="home-marcas">
            <h1>NUESTRAS MARCAS</h1>
                <div class="box-container">
                    <div class="box">      
                        <a href="https://www.nvidia.com" >
                            <img class="marcas"  src="img/nvidia.png" alt="" >
                        </a>
                    </div>              
                    <div class="box">      
                        <a href="https://www.gigabyte.com" target="_blank">
                            <img class="marcas"  src="img/gigabyte.png" alt="" >
                        </a>
                    </div>              
                    <div class="box">      
                    <a href="https://www.corsair.com" target="_blank">
                            <img class="marcas"  src="img/corsair.png" alt="" >
                        </a>
                    </div>   
                    <div class="box">      
                        <a href="https://www.amd.com" target="_blank">
                            <img class="marcas"  src="img/amd.png" alt="" >
                        </a>
                    </div>            
                </div>
        </section>
        <!--/SECCIÓN DE MARCAS -->

        <?php include 'elementos/footer.php'  ?>

        <!--Script js-->
        <script src="js\script.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>