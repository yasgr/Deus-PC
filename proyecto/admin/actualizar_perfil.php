<?php

include '../../proyecto/elementos/conexion.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);

   $actualiza_nombre = $conectar->prepare("UPDATE `admin` SET name = ?  WHERE id = ?");
   $actualiza_nombre->execute([$name, $admin_id]);
   //contraseña de admin md5
   $contrasena_vacia = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
   $contrasena_previa = $_POST['contrasena_previa'];

   $contrasena_ant = $_POST['contrasena_ant'];
   $contrasena_ant = md5($_POST['contrasena_ant']);
   $nueva_contrasena = $_POST['nueva_contrasena'];
   $nueva_contrasena = md5($_POST['nueva_contrasena']);
   $cnueva_contrasena = $_POST['cnueva_contrasena'];
   $cnueva_contrasena = md5($_POST['cnueva_contrasena']);

   if($contrasena_previa == $contrasena_vacia){
   $mensaje[] = 'Introduzca su contraseña antigua';
   }elseif($contrasena_ant != $contrasena_previa){
      $mensaje[] = 'Las contraseñas antiguas no coinciden.';
   }elseif($nueva_contrasena != $cnueva_contrasena){
      $mensaje[] = 'Las contraseñas nuevas no coinciden';
   }else{
      if($nueva_contrasena != $contrasena_vacia){
         $actualiza_contrasena = $conectar->prepare("UPDATE `admin` SET password = ? WHERE id = ?");
         $actualiza_contrasena->execute([$cnueva_contrasena, $admin_id]);
         $mensajedos[] = 'Contraseña actualizada correctamente';
      }else{
         $mensaje[] = 'Introduzca una nueva contraseña por favor.';
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
      <title>Actualizar Perfil</title>
      <!-- Link de mi CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
      <link rel="stylesheet" href="../css/admin_estilos.css">   
   </head>
   <body>
      <?php include '../elementos/admin_header.php' ?>

      <!--actualizar perfil admin-->
      <section class="form-container">
         <form action="" method="post">
            <h3>Actualizar Perfil</h3>
            
            <!--SIGNO DE INTERROGACION<p style='cursor:help;'> <abbr title="Así se pone un signo de interrogación">Información adicional</abbr></p>SIGNO DE INTERROGACION-->
            <!-- campo hidden para almacenar la contraseña previa y compararla con la que introduce el usuario -->
            <input type="hidden" name="contrasena_previa" value="<?= $fetch_perfil['password']; ?>">
            <input type="text" name="name" maxlength="20" required placeholder = "Introduce tu nombre de usuario:" class="box" oninput="this.value = this.value.replace(/\s/g, '')" value="<?= $fetch_perfil['name'];?>">
            <input type="password" name="contrasena_ant" maxlength="20"  placeholder = "Introduce tu contraseña actual:" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="password" name="nueva_contrasena" maxlength="20"  placeholder = "Introduce tu  nueva contraseña:" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="password" name="cnueva_contrasena" maxlength="20"  placeholder = "Confirma tu nueva contraseña:" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="submit" value="Actualizar Perfil" name="submit" class="btn">
         </form>
      </section>
      <!--actualizar perfil admin-->

      <script src="../js/admin_script.js"></script>
   </body> 
</html>