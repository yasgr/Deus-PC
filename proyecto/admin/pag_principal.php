<?php

   include '../../proyecto/elementos/conexion.php';
   session_start();

   $admin_id = $_SESSION['admin_id'];
   if(!isset($admin_id)){
      header('location:admin_login.php');
   }
 
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Página Principal</title>
      <!-- Link de mi CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
      <link rel="stylesheet" href="../css/admin_estilos.css">        
   </head>

   <body>

      <?php include '../elementos/admin_header.php' ?>
      <!--SECCIÓN DE DASHBOARD DEL ADMIN-->

      <section class="pagprincipal">
         <h1 class="heading">Panel de Control</h1>
         <div class="box-container">
            <div class="box">
               <h3>¡Bienvenido!</h3>
               <p><?= $fetch_perfil['name']; ?></p>
               <a href='../admin/actualizar_perfil.php' class='btn'>Actualizar Perfil</a>
            </div>
            
            <!--ADMINISTRADORES-->
            <div class="box">
               <?php
                  $select_admins = $conectar->prepare("SELECT * FROM `admin`");
                  $select_admins->execute();
                  $numero_admins = $select_admins->rowCount();
               ?>
               
               <h3><?= $numero_admins?></h3>
               <p>Administradores</p>
               <a href="cuentas_admin.php" class="btn">Ver Cuentas</a>
            </div>

            <!--USUARIOS-->
            <div class="box">
               <?php
                  $select_usuarios = $conectar->prepare("SELECT * FROM `usuarios`");
                  $select_usuarios->execute();
                  $numero_usuarios = $select_usuarios->rowCount();
               ?>
               
               <h3><?= $numero_usuarios?></h3>
               <p>Cuenta de Usuarios</p>
               <a href="cuentas_usuario.php" class="btn">Ver Cuentas</a>
            </div>
            <!--PRODUCTOS-->
            <div class="box">
               <?php
                  $select_productos = $conectar->prepare("SELECT * FROM `productos` ");
                  $select_productos->execute();
                  $numero_productos = $select_productos->rowCount();
                 
               ?>
               <h3><?= $numero_productos?></h3>
               <p>Productos añadidos</p>
               <a href="productos.php" class="btn">Ver Productos</a>
            </div>

         </div>
      </section>


      <!--SECCIÓN DE DASHBOARD DEL ADMIN TERMINA-->


      <script src="../js/admin_script.js"></script>
   </body> 

</html>