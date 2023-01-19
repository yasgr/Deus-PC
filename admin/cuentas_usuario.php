<?php

   include '../elementos/conexion.php';
   session_start();
   $admin_id = $_SESSION['admin_id'];

   if(!isset($admin_id)){
      header('location:admin_login.php');
   }
   if(isset($_GET['delete'])){
      $borrar_id = $_GET['delete'];
      $borrar_usuario = $conectar->prepare("DELETE FROM `usuarios` WHERE id = ?");
      $borrar_usuario->execute([$borrar_id]);
      $borrar_carro = $conectar->prepare("DELETE FROM `carro` WHERE id_usuario = ?");
      $borrar_carro->execute([$borrar_id]);
      $borrar_lista_deseos = $conectar->prepare("DELETE FROM `lista_deseos` WHERE id_usuario = ?");
      header('location:cuentas_usuario.php');
   }
 
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Cuentas de Usuarios</title>
         <!-- Link de mi CSS -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
         <link rel="stylesheet" href="../css/admin_estilos.css">   
   </head>

   <body>
      <section class="pagprincipal">
         <h1 class="heading">Cuentas de Usuarios</h1>
         <div class="box-container">
            <?php
               $select_cuenta = $conectar->prepare("SELECT * FROM `usuarios`");
               $select_cuenta->execute();
               if($select_cuenta->rowCount() > 0){
                  while($fetch_cuenta = $select_cuenta->fetch(PDO::FETCH_ASSOC)){
            ?>
                     <div class="box">
                        <p>ID Usuario: <?= $fetch_cuenta['id'];?></p>
                        <p>Nombre Admin: <?= $fetch_cuenta['name'];?></p>
                        <a href="cuentas_usuario.php?delete=<?= $fetch_cuenta['id'];?>" class="delete-btn" onclick="return confirm('¿Desea eliminar esta cuenta?');">Borrar</a>
                     </div>
            <?php
                  }
               }else{
                  echo '<p class="vacio">No existen cuentas.</p>';
               }
               ?>
         </div>
      </section>
      <script src="../js/admin_script.js"></script>
   </body>

</html>