<?php

include '../../proyecto/elementos/conexion.php';

 session_start();

 if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $contrasena = md5($_POST['contrasena']);
    $contrasena = filter_var($contrasena, FILTER_SANITIZE_STRING);

    $select_admin = $conectar->prepare("SELECT * FROM `admin` WHERE name = ? AND password = ?");
    $select_admin->execute([$name, $contrasena]);

    if($select_admin->rowCount() > 0){
        $fetch_admin_id = $select_admin->fetch(PDO::FETCH_ASSOC);//PDO::FETCH_ASSOC Returns an array indexed by column name as returned in your result set.
        $_SESSION['admin_id'] = $fetch_admin_id['id'];
        header('location:pag_principal.php');
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
        <!-- Link de las fuentes -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    </head>
    <body>
        
        <?php
        if(isset($mensaje)){
            foreach($mensaje as $mensaje){
                echo 
                '<div class="mensaje">
                <span>Usuario o contraseña incorrecto</span>
                <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
                </div>';
            }
        }
        ?>
        <section class="form-container">
            <form action="" method="post">
                <h3>Inicia Sesión</h3>
                <!--SIGNO DE INTERROGACION<p style='cursor:help;'> <abbr title="Así se pone un signo de interrogación">Información adicional</abbr></p>SIGNO DE INTERROGACION-->
                <input type="text" name="name" maxlength="20" required 
                placeholder = "Introduce tu nombre de usuario:" class="box" 
                oninput="this.value = this.value.replace(/\s/g, '')">
                <input type="password" name="contrasena" maxlength="20" required 
                placeholder = "Introduce tu contraseña:" class="box" 
                oninput="this.value = this.value.replace(/\s/g, '')">
                <input type="submit" value="Iniciar Sesión" name="submit" class="btn">
            </form>
        </section>
    </body> 
</html>