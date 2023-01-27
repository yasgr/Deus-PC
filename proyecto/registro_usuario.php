<?php

include 'elementos/conexion.php';

session_start();

if(isset($id_usuario)){
  $id_usuario = $_SESSION['id_usuario'];
}else{
  $id_usuario='';
};


if(isset($_POST['submit'])){
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $contrasena = md5($_POST['contrasena']);
   $contrasena = filter_var($contrasena, FILTER_SANITIZE_STRING);
   $ccontrasena = md5($_POST['ccontrasena']);
   $ccontrasena = filter_var($ccontrasena, FILTER_SANITIZE_STRING);

   $select_usuario = $conectar->prepare("SELECT * FROM `usuarios` WHERE email = ?");
   $select_usuario->execute([$email]);
   $row = $select_usuario->fetch(PDO::FETCH_ASSOC);
 

  if($select_usuario->rowCount() > 0){
      $mensaje[] = '¡Ese nombre de usuario ya existe!'; 
  }else{
    if($contrasena != $ccontrasena){
    $mensaje[] = '¡La contraseña no coincide!';
    }else{
        $insertar_usuario = $conectar->prepare("INSERT INTO `usuarios`(name, email, password) VALUES(?,?,?)");
        $insertar_usuario->execute([$name, $email, $ccontrasena]);
        $mensajedos[] = 'Nuevo usuario registrado. Por favor, inicie sesión.';
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
    <link rel="stylesheet" href="css/admin_estilos.css">
    <link rel="icon" type="image" href="img/favicon.png"/>
  </head>
  <body>
    <?php include 'elementos/header_usuario.php' ?>

    <!--REGISTRAR ADMIN SECCION-->

    <section class="form-container">
        <form action="" method="post">
          <h3>Regístrate Ahora</h3>
          <input type="name" required maxlength="20" name="name" placeholder = "Introduce tu nombre:" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
          <input type="email" required maxlength="50" name="email" placeholder = "Introduce tu correo:" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
          <input type="password" name="contrasena" maxlength="20" required placeholder = "Introduce tu contraseña:" class="box"oninput="this.value = this.value.replace(/\s/g, '')">
          <input type="password" name="ccontrasena" maxlength="20" required placeholder = "Confirma tu contraseña:" class="box"oninput="this.value = this.value.replace(/\s/g, '')">
          <input type="submit" value="Registrarse" name="submit" class="btn">
            <p>¿Ya tienes una cuenta?</p>
          <a href="login_usuario.php" class="option-btn">Inicia Sesión</a>
        </form>
    </section>

    <!--REGISTRAR ADMIN SECCION-->

    <script src="js\script.js"></script>
  </body> 

</html>