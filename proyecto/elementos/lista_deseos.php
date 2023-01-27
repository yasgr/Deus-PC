<?php

if(isset($_POST['anadir_lista_deseos'])){

   if ($id_usuario == ''){
      header('location:login_usuario.php');
   }else{

      $pid =  $_POST['pid'];

      $name = $_POST['name'];

      $precio = $_POST['precio'];

      $img = $_POST['img'];

      $check_lista_deseos = $conectar->prepare("SELECT * FROM `lista_deseos` WHERE name = ? AND id_usuario = ?");
      $check_lista_deseos->execute([$name, $id_usuario]);

      $check_carro = $conectar->prepare("SELECT * FROM `carro` WHERE name = ? AND id_usuario = ?");
      $check_carro->execute([$name, $id_usuario]);

      if($check_lista_deseos->rowCount() > 0){

         $mensaje[] = 'Este producto ya se encuentra en su lista de deseos.';

      }elseif($check_carro->rowCount() > 0){
         $mensaje[] = 'Este producto ya se encuentra en su carrito.';

      }else{
         $insert_lista_deseos = $conectar->prepare("INSERT INTO `lista_deseos`(pid, name, precio, imagen, id_usuario) VALUES (?, ?, ?, ?, ? ) ");
         $insert_lista_deseos->execute([$pid, $name, $precio, $img, $id_usuario]);
         $mensaje[] = 'Añadido a la lista de deseos.';

      }
   }
}

if(isset($_POST['anadir_al_carro'])){

   if ($id_usuario == ''){
      header('location:login_usuario.php');
   }else{

      $pid =  $_POST['pid'];

      $name = $_POST['name'];

      $precio = $_POST['precio'];

      $img = $_POST['imagen'];

      $cantidad = $_POST['cantidad'];

      $check_carro = $conectar->prepare("SELECT * FROM `carro` WHERE name = ? AND id_usuario = ?");
      $check_carro->execute([$name, $id_usuario]);

      if($check_carro->rowCount() > 0){
         $mensaje[] = 'Este producto ya se encuentra en su carrito.';

      }else{
         $check_lista_deseos = $conectar->prepare("SELECT * FROM `lista_deseos` WHERE name = ? AND id_usuario = ?");
         $check_lista_deseos->execute([$name, $id_usuario]);
         
         if($check_lista_deseos->rowCount() > 0){
               $borra_lista_deseos = $conectar->prepare("DELETE FROM `lista_deseos` WHERE name = ? AND id_usuario = ?");
               $borra_lista_deseos->execute([$name, $id_usuario]);
         }
      
         $insert_carro = $conectar->prepare("INSERT INTO `carro`(id_usuario, pid, name, precio, cantidad, imagen) VALUES (?, ?, ?, ?, ?, ? ) ");
         $insert_carro->execute([$id_usuario, $pid, $name, $precio, $cantidad, $img,  ]);
         $mensajedos[] = 'Añadido al carro.';
   
      }
   }
}

?>



