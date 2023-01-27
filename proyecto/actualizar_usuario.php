<?php

include 'elementos/conexion.php';

session_start();
if (isset($_SESSION['id_usuario'])){
   $id_usuario = $_SESSION['id_usuario'];
}else{
   $id_usuario = '';
   header('location:home.php');
}

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);

   $actualiza_nombre = $conectar->prepare("UPDATE `usuarios` SET name = ?, email = ?,  WHERE id = ?");
   $actualiza_nombre->execute([$name, $email, $id_usuario]);

   $contrasena_vacia = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';

   //contrasena_previa ya está encriptada al ser extraída de la base de datos
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
         $actualiza_contrasena = $conectar->prepare("UPDATE `usuarios` SET password = ? WHERE id = ?");
         $actualiza_contrasena->execute([$cnueva_contrasena, $id_usuario]);
         $mensajedos[] = 'Contraseña actualizada correctamente';
      }else{
         $mensaje[] = 'Introduzca una nueva contraseña por favor.';
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Actualizar Perfil</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <!-- Link de mi CSS -->
      <link rel="stylesheet" href="../../proyecto/css/estilos.css">
   </head>
   <body>
      <?php include 'elementos/header_usuario.php'  ?>
         <section class="form-container">
            <form action="" method="post">
               <h3>Actualizar Perfil</h3>
               <!-- campo hidden para almacenar la contraseña previa y compararla con la que introduce el usuario -->
               <input type="hidden" name="contrasena_previa" value="<?=$fetch_perfil['password']; ?>">
               <input type="text" required maxlength="20" name="name" placeholder = "Introduce tu nombre:" class="box" oninput="this.value = this.value.replace(/\s/g, '')" value="<?= $fetch_perfil['name']; ?>">
               <input type="email" required maxlength="50" name="email" placeholder = "Introduce tu correo:" class="box" oninput="this.value = this.value.replace(/\s/g, '')" value="<?= $fetch_perfil['email']; ?>">
               <input type="password" name="contrasena_ant" maxlength="20" required placeholder = "Introduce tu contraseña antigua:" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
               <input type="password" name="nueva_contrasena" maxlength="20" required placeholder = "Introduce tu nueva contraseña:" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
               <input type="password" name="cnueva_contrasena" maxlength="20" required placeholder = "Confirma tu nueva contraseña:" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
               <input type="submit" value="Actualizar Perfil" name="submit" class="btn">
               <a href="home.php" class="option-btn">Volver Atrás</a>
            </form>
         </section>
      <?php include 'elementos/footer.php'  ?>
      <!--Script js-->
      <script src="js\script.js"></script>
   </body>
</html>