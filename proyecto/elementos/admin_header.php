<?php
//mensaje en rojo
if(isset($mensaje)){
    foreach($mensaje as $mensaje){
        echo '
        <div class="mensaje">
        <span>'.$mensaje.'</span>
        <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
        ';
    }
}
//mensaje en verde
if(isset($mensajedos)){
    foreach($mensajedos as $mensajedos){
        echo '
        <div class="mensajedos">
        <span>'.$mensajedos.'</span>
        <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
        ';
    }
}
?>

<header class="header">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../../proyecto/css/admin_estilos.css">
    <section class="flex">
        <a href="pag_principal.php" class="logo">Panel <span>del Administrador</span></a>
        <nav class="navbar">
            <a href="pag_principal.php">Home</a>
            <a href="productos.php">Productos</a>
            <!-- <a href="pedidos.php">Pedidos</a> -->
            <a href="../admin/cuentas_admin.php">Administradores</a>
            <a href="cuentas_usuario.php">Usuarios</a>
            <!-- <a href="mensajes.php">Mensajes</a> -->
        </nav>
        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fa-regular fa-user"></div>    
        </div>
        <div class="perfil">
            <?php
                $select_perfil = $conectar->prepare("SELECT * FROM `admin` WHERE id = ?");
                $select_perfil->execute([$admin_id]);
                $fetch_perfil = $select_perfil->fetch(PDO::FETCH_ASSOC);
            ?>
            <p><?= $fetch_perfil['name']; ?></p>
            <a href="actualizar_perfil.php" class="btn"> Actualizar Perfil</a>
            <div class="flex-btn">
                <a href="../../proyecto/admin/admin_login.php" class="option-btn">Login</a>
                <a href="../../proyecto/admin/registrar_admin.php" class="option-btn">Registra</a>
            </div>
                <a href="../../proyecto/elementos/admin_logout.php" onclick="return confirm('¿Desea salir de esta página?');" class="delete-btn">Logout</a>
        </div>   
    </section>
</header>