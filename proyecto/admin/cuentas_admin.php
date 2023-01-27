<?php

   include '../../proyecto/elementos/conexion.php';
   session_start();
   $admin_id = $_SESSION['admin_id'];

   if(!isset($admin_id)){
      header('location:admin_login.php');
   }
   if(isset($_GET['delete'])){
      $borrar_id = $_GET['delete'];
      $borrar_admin = $conectar->prepare("DELETE FROM `admin` WHERE id = ?");
      $borrar_admin->execute([$borrar_id]);
      header('location:cuentas_admin.php');
   }
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Cuentas de Administrador</title>
      <!-- Link de mi CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
      <link rel="stylesheet" href="../css/admin_estilos.css">
   </head>

   <body>
   <?php include '../elementos/admin_header.php' ?>
      <section class="pagprincipal">
         <h1 class="heading">Cuentas de Administradores</h1>
         <div class="box-container">
            <?php
               $select_cuenta = $conectar->prepare("SELECT * FROM `admin`");
               $select_cuenta->execute();
               if($select_cuenta->rowCount() > 0){
                  while($fetch_cuenta = $select_cuenta->fetch(PDO::FETCH_ASSOC)){
            ?>
                     <div class="box">
                        <p>ID Admin: <?= $fetch_cuenta['id'];?></p>
                        <p>Nombre Admin: <?= $fetch_cuenta['name'];?></p>
                        <div class="flex-btn">
                           <a href="cuentas_admin.php?delete=<?= $fetch_cuenta['id'];?>" class="delete-btn" onclick="return confirm('¿Desea eliminar esta cuenta?');">Borrar</a> 
                           <?php
                              if($fetch_cuenta['id'] == $admin_id){
                                 echo '<a href="actualizar_perfil.php" class="btn btn-info">Actualizar</a>';
                              }
                           ?>
                        </div>
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