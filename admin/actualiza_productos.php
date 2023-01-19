<?php

include '../../proyecto/elementos/conexion.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}
if (isset($_POST['update'])){//se actualiza el producto

   //id productos
   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_NUMBER_INT);
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $precio = $_POST['precio'];
   $precio = filter_var($precio, FILTER_SANITIZE_NUMBER_INT);
   $detalles = $_POST['detalles'];
   $detalles = filter_var($detalles, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

   $actualiza_producto = $conectar->prepare("UPDATE `productos` set name = ?, detalles = ?, precio = ? WHERE id = ?");
   $actualiza_producto->execute([$name, $detalles, $precio, $pid]);//ejecutamos la query

   $mensaje[]='<div class="mensajedos">
   <span>Producto actualizado correctamente</span>
  </div>';//mensaje en header 
}

?>
<!DOCTYPE html>
<html>
   <head>
   <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Actualizar Productos</title>
       <!-- Link de mi CSS -->

       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
       <link rel="stylesheet" href="../css/admin_estilos.css">

   </head>
   <body>
      <?php include '../elementos/admin_header.php' ?>
      
      <!-- actualizar productos  -->
      
      <section class="actualiza-producto">
         <h1 class="heading">ACTUALIZAR PRODUCTO</h1>
         <?php
            $actualiza_id = $_GET['update'];
            $muestra_productos = $conectar->prepare("SELECT * FROM `productos` WHERE id = ?");
            $muestra_productos->execute([$actualiza_id]);
            if($muestra_productos->rowCount() > 0){
               while($fetch_productos = $muestra_productos->fetch(PDO::FETCH_ASSOC)){/*muestra los productos insertados en la bd */
         ?>
         <form action="" method="POST" enctype="multipart/form-data"><!-- Cuando realiza una solicitud de publicación, debe codificar los datos que forman el cuerpo de la solicitud de alguna manera. -->
            <input type="hidden" name="vieja_img_01" value="<?$fetch_productos['img_01'];?>">
            <input type="hidden" name="vieja_img_02" value="<?$fetch_productos['img_02'];?>">
            <input type="hidden" name="vieja_img_03" value="<?$fetch_productos['img_03'];?>">
            <input type="hidden" name="pid" value="<?= $fetch_productos['id']; ?>">

            <div class="img-container">
               <div class="img-principal">
                  <img src="../img/<?= $fetch_productos['img_01']; ?>" alt=""> 
               </div>
               <div class="img-secundarias">
                  <img src="../img/<?= $fetch_productos['img_01']; ?>" alt="">
                  <img src="../img/<?= $fetch_productos['img_02']; ?>" alt="">
                  <img src="../img/<?= $fetch_productos['img_03']; ?>" alt="">
               </div>
            </div>

            <span>Actualizar Nombre:</span>
            <input type="text" name="name"  class="box" maxlength="50" value="<?= $fetch_productos['name'];?>">
            <span>Actualizar Precio:</span>
            <input type="number" name="precio" min="0" max="99999" onkeypress="if(this.value.length == 6) return false;"  required placeholder="Introduce el precio del producto" class="box" value="<?= $fetch_productos['precio'];?>">
            <span>Actualizar Detalles:</span>
            <textarea name="detalles" class="box"  required cols="20" rows="10" maxlength="400"><?= $fetch_productos['detalles'];?></textarea>         
            <span>Actualizar Imagen 1</span>
            <input type="file" name="img_01" class="box" accept="image/jpg, image/jpeg, image/png image/webp" >
            <span>Actualizar Imagen 2</span>
            <input type="file" name="img_02" class="box" accept="image/jpg, image/jpeg, image/png image/webp" >
            <span>Actualizar Imagen 3</span>
            <input type="file" name="img_03" class="box" accept="image/jpg, image/jpeg, image/png image/webp" >
            <div class="flex-btn">
               <input type="submit" value="Actualizar" class="btn" name="update">
               <a href="productos.php" class="option-btn">Volver atrás</a>
            </div>
         </form>   
         <?php
               }
            }else{
               echo'<p class="vacio">Aún no has añadido productos.</p> ';
            }
         ?>
      </section>
      
      <!-- actualizar productos  -->
      
      <script src="../js/admin_script.js"></script>
   </body> 

</html>
