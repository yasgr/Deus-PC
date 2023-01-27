<?php

   include '../../proyecto/elementos/conexion.php';
   session_start();
   $admin_id = $_SESSION['admin_id'];

   if(!isset($admin_id)){
      header('location:admin_login.php');
   }

   if(isset($_POST['anadir_producto'])){
      $name = $_POST['name'];
      $name = filter_var($name, FILTER_SANITIZE_STRING);
      $precio = $_POST['precio'];
      $precio = filter_var($precio, FILTER_SANITIZE_STRING);
      $detalles = $_POST['detalles'];
      $detalles  = filter_var($detalles , FILTER_SANITIZE_STRING);

      $img_01 = $_FILES['img_01']['name'];
      $img_01 = filter_var($img_01, FILTER_SANITIZE_STRING);
      $img_01_tamano = $_FILES['img_01']['size'];
      $img_01_tname = $_FILES['img_01']['tmp_name'];
      $img_01_loc = '../img/'.$img_01;

      $img_02 = $_FILES['img_02']['name'];
      $img_02 = filter_var($img_02, FILTER_SANITIZE_STRING);
      $img_02_tamano = $_FILES['img_02']['size'];
      $img_02_tname = $_FILES['img_02']['tmp_name'];
      $img_02_loc = '../img/'.$img_02;

      $img_03 = $_FILES['img_03']['name'];
      $img_03 = filter_var($img_03, FILTER_SANITIZE_STRING);
      $img_03_tamano = $_FILES['img_03']['size'];
      $img_03_tname = $_FILES['img_03']['tmp_name'];
      $img_03_loc = '../img/'.$img_03;

      $sel_productos = $conectar->prepare("SELECT * FROM `productos` WHERE name = ?");
      $sel_productos->execute([$name]);
      if($sel_productos->rowCount() > 0){
         $mensaje[] = 'Ese nombre de producto ya existe';
      }else{
         if($img_01_tamano > 2000000 || $img_02_tamano > 2000000 || $img_03_tamano > 2000000){
            $mensaje[] = 'El tamaño de la imagen es muy grande.';
         }else{
            move_uploaded_file($img_01_tname, $img_01_loc);/*mueve una imagen a una localizacionnueva*/
            move_uploaded_file($img_03_tname, $img_03_loc);
            move_uploaded_file($img_03_tname, $img_03_loc);

            $insertar_producto = $conectar->prepare("INSERT INTO `productos`(name, detalles, precio, img_01, img_02, img_03) VALUES (?, ?, ?, ?, ?, ?)");
            $insertar_producto->execute([$name, $detalles, $precio, $img_01, $img_02, $img_03]);

            $mensaje[] = 'Nuevo producto añadido';
         }
      }
   }

   if(isset($_GET['delete'])){

      $borrar_id = $_GET['delete'];
      $borrar_img_prod = $conectar->prepare("SELECT * FROM `productos` WHERE id = ?");
      $borrar_img_prod->execute([$borrar_id]);
      $fetch_borrar_img = $borrar_img_prod->fetch(PDO::FETCH_ASSOC); /*Obtiene una fila de un conjunto de resultados asociado con un objeto PDostatement.*/
      unlink('../img/'.$fetch_borrar_img['img_01']); /**Deletes a file */
      unlink('../img/'.$fetch_borrar_img['img_02']);
      unlink('../img/'.$fetch_borrar_img['img_03']);
      $borrar_producto = $conectar->prepare("DELETE FROM `productos` WHERE id = ?");
      $borrar_producto->execute([$borrar_id]);
      
      $borrar_carro = $conectar->prepare("DELETE FROM `carro` WHERE pid = ?");
      $borrar_carro->execute([$borrar_id]);
      $borrar_lista_deseos = $conectar->prepare("DELETE FROM `lista_deseos` WHERE pid = ?");
      $borrar_lista_deseos->execute([$borrar_id]);
      header('location:productos.php');
   }

?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Productos</title>
         <!-- Link de mi CSS -->

         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

      <link rel="stylesheet" href="../css/admin_estilos.css">
      
   </head>
   <body>
   <?php include '../elementos/admin_header.php' ?>
   <!-- section añadir productos -->

      <section class="anadirproductos">
         <h1 class="heading">Añadir Producto</h1>
         <form action="" method="POST" enctype="multipart/form-data">
            <div class="flex">
               <div class="inputBox">
                  <span>Nombre de Producto</span>
                  <input type="text" name="name" required placeholder="Introduce el nombre del producto" class="box" maxlength="50" >
               </div>
               <div class="inputBox">
                  <span>Precio de producto</span>
                  <input type="number" name="precio" min="0" max="99999" onkeypress="if(this.value.length == 6) return false;"  required placeholder="Introduce el precio del producto" class="box" >
               </div>
               <div class="inputBox">
                  <span>Imagen 1</span>
                  <input type="file" name="img_01" class="box" accept="image/jpg, image/jpeg, image/png image/webp" required>
               </div>
               <div class="inputBox">
                  <span>Imagen 2</span>
                  <input type="file" name="img_02" class="box" accept="image/jpg, image/jpeg, image/png image/webp" required>
               </div>
               <div class="inputBox">
                  <span>Imagen 3</span>
                  <input type="file" name="img_03" class="box" accept="image/jpg, image/jpeg, image/png image/webp" required>
               </div>
               <div class="inputBox">
                  <span>Detalles del Producto</span>
                  <textarea name="detalles" class="box" placeholder="Introduce los detalles del producto" required cols="20" rows="10" maxlength="400"></textarea>   
               </div>
               <input type="submit" value="Añadir Producto" name="anadir_producto" class="btn">
            </div>
         </form>
      </section>

      <!-- section añadir productos termina -->

      <!-- mostrar productos -->
      <section class="muestra-productos">
         <div class="box-container">
            <?php
               $muestra_productos = $conectar->prepare("SELECT * FROM `productos`");
               $muestra_productos->execute();
               if($muestra_productos->rowCount() > 0){
                  while($fetch_productos = $muestra_productos->fetch(PDO::FETCH_ASSOC)){/*muestra los productos insertados en la bd */
            ?>
                     <div class="box">
                        <img src="../img/<?= $fetch_productos['img_01'];?>"> <!-- muestra la imagen,precio etc debajo del form -->
                        <div class="name"><?= $fetch_productos['name'];?></div>
                        <div class="precio"><?= $fetch_productos['precio'];?>€</div>
                        <div class="detalles"><?= $fetch_productos['detalles'];?></div>
                        <div class="flex-btn">
                           <a href="actualiza_productos.php?update=<?= $fetch_productos['id']; ?>" 
                           class="option-btn">Actualizar</a>  <!--selecciona el id del producto -->
                           <a href="productos.php?delete=<?= $fetch_productos['id']; ?>"
                           class="delete-btn" onclick="return confirm('¿Desea eliminar este producto?');">Borrar</a> 
                        </div>
                     </div>
            <?php
                  }
               }else{
                  echo'<p class="vacio">Aún no has añadido productos.</p> ';
               }
            ?>
         </div>
      </section>

   <!-- mostrar productos termina-->

   <script src="../js/admin_script.js"></script>
   </body> 

</html>