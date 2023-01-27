<?php

include 'elementos/conexion.php';

session_start();
if (isset($_SESSION['id_usuario'])){
   $id_usuario = $_SESSION['id_usuario'];
}else{
   $id_usuario = '';
   header('location:login_usuario.php');
}

if(isset($_POST['borrar'])){
   $carro_id = $_POST['carro_id'];
   $borra_carro = $conectar->prepare("DELETE FROM `carro` WHERE id = ?");
   $borra_carro->execute([$carro_id]);
   $mensaje[]= 'Producto eliminado';
}

if(isset($_POST['borrar_todo'])){
   $borrar_todo = $_POST['borrar_todo'];
   $borra_carro = $conectar->prepare("DELETE FROM `carro` WHERE id_usuario = ?");
   $borra_carro->execute([$id_usuario]);
   header('location:carrito.php');
}

// if(isset($_POST['update_ctd'])){
//    $carro_id = $_POST['carro_id'];
//    $ctd = $_POST['cantidad'];
//    $update_ctd = $conn->prepare("UPDATE `carro` SET cantidad = ? WHERE id = ?");
//    $update_ctd->execute([$ctd, $carro_id]);
//    $message[] = 'Cantidad  Actualizada';
// }

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Carrito</title>
      <!--font awesome link-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <!-- Link de mi CSS -->
      <link rel="stylesheet" href="../../proyecto/css/estilos.css">
   </head>
   <body>
      <?php include 'elementos/header_usuario.php'  ?>
      <section class="home-productos">
         <h3 class="heading">Tu carro</h3>
         <div class="box-container">
            <?php
               $el_total = 0;
               $select_carro = $conectar->prepare("SELECT * FROM `carro` WHERE id_usuario = ?");
               $select_carro->execute([$id_usuario]);
               if($select_carro->rowCount() > 0){
                  while($fetch_carro = $select_carro->fetch(PDO::FETCH_ASSOC)){
                     $el_total += $fetch_carro['precio'] *$fetch_carro['cantidad'];  
            ?>
               <form action="" method="post" class="box">
                  <input type="hidden" name="pid" value="<?= $fetch_carro['pid']; ?>">
                  <input type="hidden" name="carro_id" value="<?= $fetch_carro['id']; ?>">
                  <input type="hidden" name="name" value="<?= $fetch_carro['name']; ?>">
                  <input type="hidden" name="precio" value="<?= $fetch_carro['precio']; ?>">
                  <input type="hidden" name="imagen" value="<?= $fetch_carro['imagen']; ?>">
                  
                  <img src="img/<?= $fetch_carro['imagen']; ?>" alt="">
                  <div class="name"><?= $fetch_carro['name']; ?></div>
                  <div class="flex">
                     <div class="precio"><h3><?= $fetch_carro['precio']; ?>€</h3></div>
                     <input type="number" name="ctd" class="ctd" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
                  </div>
                  <div class="sub-total"> Sub total : <span><?= $sub_total = ($fetch_carro['precio'] * $fetch_carro['cantidad']); ?>€</span> </div>
                  <input type="submit" value="Borrar Producto" onclick="return confirm('¿Desea borrar este producto de  su carro?');" class="delete-btn" name="borrar">
               </form>
            <?php
                  }
               }else{
                  echo '<p class="empty">Tu carro está vacío</p>';
               }
            ?>
         </div>
            <div class="total"><h1>Total :<?= $el_total; ?>€</div>
            <div class="flex-btn">
               <a href="shop.php" class="option-btn">Continúa Comprando</a>
               <!-- <input type="submit"  name="borrar_todo" value="Borrar Todo" onclick="return confirm('¿Desea borrar todo de  su carro?');" class="delete-btn"> -->
            </div>
      </section>
      <?php include 'elementos/footer.php'  ?>
      <!--Script js-->
      <script src="js\script.js"></script>
   </body>
</html>