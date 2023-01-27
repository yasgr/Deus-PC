<?php

   include '../../proyecto/elementos/conexion.php';
   session_start();
   $admin_id = $_SESSION['admin_id'];

   if(!isset($admin_id)){
      header('location:admin_login.php');
   };

   if(isset($_POST['submit'])){

      $name = $_POST['name'];
      $name = filter_var($name, FILTER_SANITIZE_STRING);
      $contrasena = md5($_POST['contrasena']);
      $contrasena = filter_var($contrasena, FILTER_SANITIZE_STRING);
      $ccontrasena = md5($_POST['ccontrasena']);
      $ccontrasena = filter_var($ccontrasena, FILTER_SANITIZE_STRING);

      $select_admin = $conectar->prepare("SELECT * FROM `admin` WHERE name = ?");
      $select_admin->execute([$name]);
   
      if($select_admin->rowCount() > 0){
         $mensaje[] = '¡Ese nombre de usuario ya existe!'; 
      }else{
         if($contrasena != $ccontrasena){
            $mensaje[] = '¡La contraseña no coincide!';
         }else{
            $insertar_admin = $conectar->prepare("INSERT INTO `admin`(name, password) VALUES(?,?)");
            $insertar_admin->execute([$name, $ccontrasena]);
            $mensajedos[] = 'Nuevo administrador registrado.';
         }
      }
   }
 
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Regístrate</title>
         <!-- Link de mi CSS -->

         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

      <link rel="stylesheet" href="../css/admin_estilos.css">
      
   </head>
   <body>

      <?php include '../elementos/admin_header.php' ?>

      <!--REGISTRAR ADMIN SECCION-->

      <section class="form-container">
         <form action="" method="post">
            <h3>Regístrate Ahora</h3>
            <!--SIGNO DE INTERROGACION<p style='cursor:help;'> <abbr title="Así se pone un signo de interrogación">Información adicional</abbr></p>SIGNO DE INTERROGACION-->
            <input type="text" name="name" maxlength="20" required placeholder = "Introduce tu nombre de usuario:" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="password" name="contrasena" maxlength="20" required placeholder = "Introduce tu contraseña:" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="password" name="ccontrasena" maxlength="20" required placeholder = "Confirma tu contraseña:" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="submit" value="Regístrate Ahora" name="submit" class="btn">
         </form>
      </section>

      <!--REGISTRAR ADMIN SECCION-->

      <script src="../js/admin_script.js"></script>
   </body> 

</html>