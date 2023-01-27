<?php
//mensaje en rojo
include 'conexion.php';

if(isset($mensaje)){
    foreach($mensaje as $mensaje){
        echo '
        <div class="mensaje">
        <span>'.$mensaje.'</span>
        <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
    </div>';
    }
}
//mensaje en verde
if(isset($mensajedos)){
    foreach($mensajedos as $mensajedos){
        echo '
        <div class="mensajedos">
        <span>'.$mensajedos.'</span>
        <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
    </div>';
    }
}
?>

<header class="header">
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../../proyecto/css/estilos.css">
    <section class="flex">
        <a href="/proyecto/home.php" class="logo">DEUS<span>PC</span></a>
        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="sobre_nosotros.php">Quienes Somos</a>
            <a href="tienda.php">Tienda</a>
        </nav>
        <div class="icons">
            <?php 
                $listadeseos_items = $conectar->prepare("SELECT * FROM `lista_deseos` WHERE id_usuario = ?");
                $listadeseos_items->execute([$id_usuario]);
                $total_listadeseos = $listadeseos_items->rowCount();
                $carro_items = $conectar->prepare("SELECT * FROM `carro` WHERE id_usuario = ?");
                $carro_items->execute([$id_usuario]);
                $total_carro = $carro_items->rowCount();
            ?>
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="pagina_busqueda.php"><i class="fa fa-search"></i></a>
            <a href="/proyecto/listadeseos.php"><i class="fas fa-heart"></i><span>(<?=$total_listadeseos;?>) </span></a>
            <a href="/proyecto/carrito.php"><i class="fas fa-shopping-cart"></i><span>(<?=$total_carro;?>) </span></a>
            <div id="user-btn" class="fa-regular fa-user"></div>  
        </div>

        <div class="perfil">
            <?php
                    $select_perfil = $conectar->prepare("SELECT * FROM `usuarios` WHERE id = ?");
                    $select_perfil->execute([$id_usuario]);
                    if($select_perfil->rowCount() > 0){
                        $fetch_perfil = $select_perfil->fetch(PDO::FETCH_ASSOC); 
            ?>
            <p><?= $fetch_perfil['name']; ?></p>
            <a href="actualizar_usuario.php" class="btn"> Actualizar Perfil</a>
            <a href="../../proyecto/elementos/usuario_logout.php" onclick="return confirm('¿Desea salir de esta página?');" class="delete-btn">Logout</a>
            <?php
                }else{

            ?>
            <p>Inicie sesión por favor</p>
            <div class="flex-btn">
                <a href="login_usuario.php" class="option-btn">Login</a>
                <a href="registro_usuario.php" class="option-btn">Regístrate</a><br>   
            </div>
            <div><a href="admin\admin_login.php" class="btn">Login de Administrador</a> </div>
            <?php
                }
            ?>
        </div>
    </section>
</header>
