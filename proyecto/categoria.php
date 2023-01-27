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
      <title>Categorías</title>
      <!--font awesome link-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <!-- Link de mi CSS -->
      <link rel="stylesheet" href="../../proyecto/css/estilos.css">

   </head>
   <body>
      <?php include 'elementos/header_usuario.php'  ?>
      <!--EMPIEZA CATEGORIAS-->
      <section class="home-productos">
         <div class="box-container">
            <?php
               $categoria = $_GET['categoria'];
               $select_productos = $conectar->prepare("SELECT * FROM `productos` WHERE img_01 LIKE '%{$categoria}%'");
               $select_productos->execute();
               if($select_productos->rowCount() > 0 ){
                  while($fetch_productos = $select_productos->fetch(PDO::FETCH_ASSOC)){
            ?>
                     <form action="" method="post" class="box">
                        <input type="hidden"  name="pid" value=" <?= $fetch_productos['id']; ?>" >
                        <input type="hidden"  name="name" value=" <?= $fetch_productos['name']; ?>" >
                        <input type="hidden"  name="precio" value=" <?= $fetch_productos['precio']; ?>" >
                        <input type="hidden"  name="img" value=" <?= $fetch_productos['img_01']; ?>" >
               
                        <img src="img/<?= $fetch_productos['img_01']; ?>" alt="" class="img">
                        <div class="name"><h3><?= $fetch_productos['name']; ?></h3></div>
                        <div class="flex">
                           <div class="precio"><h3><?= $fetch_productos['precio']; ?>€</h3></div>
                           <input class="ctd" type="number" name="cantidad"  min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value = "1">   <!--Crear clase ctd para cantidad producto -->
                        </div>
                        <button class='fas fa-heart' type="submit" name="anadir_lista_deseos"></button>
                        <a href="vista_rapida.php?pid=<?= $fetch_productos['id']; ?>"> <i class="fas fa-eye"></i></a>
                        <input type="submit" value="Añadir al carrito" class="btn" name="anadir_al_carrito">
                     </form>
            <?php
                  }
               }else{
                  echo '<p class="empty">No se han encontrado productos</p>';
               }
            ?>
         </div>
      </section>
      <!--TERMINA CATEGORIAS-->
      <?php include 'elementos/footer.php'  ?>
      <!--Script js-->
      <script src="js\script.js"></script>
   </body>
</html>