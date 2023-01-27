<?php

include 'elementos/conexion.php';

session_start();
if (isset($_SESSION['id_usuario'])){
    $id_usuario = $_SESSION['id_usuario'];
}else{
    $id_usuario = '';
}

if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $email = filter_var($email, FILTER_SANITIZE_STRING);
  $contrasena = md5($_POST['contrasena']);
  $contrasena = filter_var($contrasena, FILTER_SANITIZE_STRING);

  $select_usuario = $conectar->prepare("SELECT * FROM `usuarios` WHERE email = ? AND password = ?");
  $select_usuario->execute([$email, $contrasena]);

  $row = $select_usuario->fetch(PDO::FETCH_ASSOC);

  if($select_usuario->rowCount() > 0){
    // $select_usuario_id = $select_usuario->fetch(PDO::FETCH_ASSOC);//PDO::FETCH_ASSOC Returns an array indexed by column name as returned in your result set.
      $_SESSION['id_usuario'] = $row['id'];
      // $mensaje[] = 'Inicio de sesión correcto';
      header('location:home.php');
  } else{
      $mensaje[] = 'Usuario introducido incorrecto';
  }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Inicio Admin</title>

      <!-- Link de mi CSS -->
      <link rel="stylesheet" href="../../proyecto/css/admin_estilos.css">
      <!--<link rel="stylesheet" href="../../proyecto/css-bootstrap/bootstrap.css">-->
      <!-- Link de las fuentes -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

      <link rel="icon" type="image" href="img/favicon.png"/>
  </head>
  <body>
    <?php include 'elementos/header_usuario.php'?>
    <?php
      if(isset($mensaje)){
        foreach($mensaje as $mensaje){
          echo '<div class="mensaje">
          <span>Usuario o contraseña incorrecto</span>
          <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
          </div>
          ';
        }
      }
    ?>
    <section class="form-container">
      <form action="" method="post">
        <h3>Inicia Sesión</h3>
        <input type="email" required maxlength="50" name="email" placeholder = "Introduce tu correo:" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
        <!-- <input type="text" name="name" maxlength="20" required 
        placeholder = "Introduce tu nombre de usuario:" class="box" 
        oninput="this.value = this.value.replace(/\s/g, '')"> -->
        <input type="password" name="contrasena" maxlength="20" required placeholder = "Introduce tu contraseña:" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
        <input type="submit" value="Iniciar Sesión" name="submit" class="btn">
        <p>¿No tienes una cuenta?</p>
        <a href="registro_usuario.php" class="option-btn">Regístrate Ahora</a>
      </form>
    </section>
    <script src="js\script.js"></script>
  </body> 
</html>

