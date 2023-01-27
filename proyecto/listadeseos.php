<?php

include 'elementos/conexion.php';

session_start();

if(isset($_SESSION['id_usuario'])){
   $id_usuario = $_SESSION['id_usuario'];
}else{
   $id_usuario = '';
   header('location:login_usuario.php');
};

include 'elementos/lista_deseos.php';

if(isset($_POST['borrar'])){
    $lista_deseos_id = $_POST['lista_deseos_id'];
    $borra_lista_deseos = $conectar->prepare("DELETE FROM `lista_deseos` WHERE id = ?");
    $borra_lista_deseos->execute([$lista_deseos_id]);
    $mensaje[]= 'Producto eliminado';
 }

if(isset($_GET['borrar_todo'])){
    $borrar_todo = $_GET['borrar_todo'];
    $borra_lista_deseos = $conectar->prepare("DELETE FROM `lista_deseos` WHERE id_usuario = ?");
    $borra_lista_deseos->execute([$id_usuario]);
    header('location:listadeseos.php');
}

?>

<!DOCTYPE html>
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Lista de Deseos</title>


      <!--font awesome link-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

      <!-- Link de mi CSS -->
      <link rel="stylesheet" href="../../proyecto/css/estilos.css">

      <link rel="icon" type="image" href="img/favicon.png"/>
   </head>
   <body>

      <?php include 'elementos/header_usuario.php'  ?>

      <!-- LISTA DE DESEOS -->
      <section class="home-productos">
         <h1 class="heading">Tu Lista de Deseos</h1>
         <div class="box-container">
            <?php
               $el_total=0;
               $select_lista_deseos = $conectar->prepare("SELECT * FROM `lista_deseos` WHERE id_usuario = ?");
               $select_lista_deseos->execute([$id_usuario]);
               if($select_lista_deseos->rowCount() > 0){
                  while($fetch_lista_deseos = $select_lista_deseos->fetch(PDO::FETCH_ASSOC)){
                     $el_total += $fetch_lista_deseos['precio'];  
            ?>
                        <form action="" method="post" class="box">
                           <input type="hidden" name="pid" value="<?= $fetch_lista_deseos['pid']; ?>">
                           <input type="hidden" name="lista_deseos_id" value="<?= $fetch_lista_deseos['id']; ?>">
                           <input type="hidden" name="name" value="<?= $fetch_lista_deseos['name']; ?>">
                           <input type="hidden" name="precio" value="<?= $fetch_lista_deseos['precio']; ?>">
                           <input type="hidden" name="imagen" value="<?=$fetch_lista_deseos['imagen'];?>">
                           <img src="img/<?= $fetch_lista_deseos['imagen']; ?>" alt="">
                           <div class="name"><?= $fetch_lista_deseos['name']; ?></div>
                           <div class="flex">
                              <div class="precio"><?= $fetch_lista_deseos['precio']; ?>€</div>
                              <input type="number" name="cantidad" class="ctd" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
                           </div>
                           <input type="submit" value="Añadir al carro" class="btn" name="anadir_al_carro">
                           <input type="submit" value="Borrar Producto" onclick="return confirm('¿Desea borrar este producto de su lista de deseos?');" class="delete-btn" name="borrar">
                        </form>
            <?php
                  }
               }else{
                  echo '<p class="vacio">Tu lista de deseos está vacía.</p>';
               }
            
            ?>
                     
            <div class="total"><h1>Total :<?= $el_total; ?>€</div>
            <div class="flex-btn">
               <a href="shop.php" class="option-btn">Continúa Comprando</a>
               <!-- <a href="carro.php?borrar_todo.php" class="delete-btn <?= ($el_total > 1)?'':'disabled'; ?>" onclick="return confirm('¿Desea borrar todo de  su carro?');">Borrar todo</a> -->
         </div>              
      </section>
         <!-- LISTA DE DESEOS -->

      <?php include 'elementos/footer.php'  ?>

      <!--Script js-->
      <script src="js\script.js"></script>
   </body>
</html>