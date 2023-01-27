<?php

include 'elementos/conexion.php';

session_start();
if (isset($_SESSION['id_usuario'])){
    $id_usuario = $_SESSION['id_usuario'];
}else{
    $id_usuario = '';
}

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <!--font awesome link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Link de mi CSS -->
        <link rel="stylesheet" href="../../proyecto/css/estilos.css">
        <link rel="icon" type="image" href="img/favicon.png"/>
    </head>
    <body>
        <?php include 'elementos/header_usuario.php'  ?>
        <div class="politica-privacidad-bg">
            <section class="home">
        
                <h1>POLÍTICA DE PRIVACIDAD</h1>
                <p> La visita a este sitio Web no implica que el usuario esté obligado a facilitar ninguna información. En el caso de que el usuario facilite alguna información de carácter personal, los datos recogidos en este sitio web serán tratados de forma leal y lícita con sujeción en todo momento a los principios y derechos recogidos en la Ley Orgánica 15/1999, de 13 de diciembre, de Protección de Datos de Carácter Personal (LOPD), y demás normativa de desarrollo.
                </p><br>
                <h2>1.1. Información a los usuarios
                1.1.1 Apartado "Registrar"</h2>
                <p>De acuerdo a la Ley Orgánica 15/1999 de 13 de Diciembre, de Protección de Datos de Carácter Personal (LOPD), le informamos que mediante la cumplimentación de los formularios, sus datos personales quedarán incorporados y serán tratados en ficheros de COOMOD INFORMATICA S.L ( en adelante, DEUSPC).
                <BR>
                La principal finalidad de dicho fichero es la gestión de los usuarios registrados en nuestra web, así como el envío de publicidad relativa a los productos y servicios comercializados por DEUSPC o para el envío de publicidad, descuentos y promociones de productos y servicios de otras entidades.
                <br>
                Si no desea recibir este tipo de publicidad deberá marcar la casilla que aparece en el formulario.
                DEUSPC asegura la confidencialidad de los datos aportados y garantiza que, en ningún caso, serán cedidos para ningún otro uso sin mediar consentimiento previo y expreso de nuestros usuarios. Sólo le pediremos aquellos datos necesarios para la prestación del servicio requerido y únicamente serán empleados para este fin.
                </p><br>
                <h2>1.1.2. Apartado "Realizar Compra"</h2>
                <p>
                De acuerdo a la Ley Orgánica 15/1999 de 13 de diciembre, de Protección de Datos de Carácter Personal (LOPD), le informamos que mediante la cumplimentación de los formularios, sus datos personales quedarán incorporados y serán tratados en ficheros de DEUSPC.
                <br>
                La principal finalidad de dicho fichero es mantener la relación contractual con nuestros clientes, facilitar la tramitación de los pedidos, la realización de estudios estadísticos, así como el envío de publicidad relativa a los productos y servicios comercializados por DEUSPC o para el envío de publicidad, descuentos y promociones de productos y servicios de otras entidades. La legitimación del tratamiento se efectúa en virtud de su propia compra en ejecución de dicho contrato.
                <br>
                Con motivo de la compra sus datos pueden ser comunicados a los siguientes destinatarios:
                <br>
                Entidades bancarias para el pago de compras mediante tarjeta.
                A la Oficina de consumidores y usuarios en caso de existir alguna reclamación.
                A los fabricantes, Servicios técnicos y/o mayoristas en el caso de garantías o reparaciones. Estos destinatarios pueden estar ubicados tanto dentro del territorio Español como fuera del mismo, en función del producto y/o servicio adquirido.
                En los supuestos legalmente establecidos, como es el caso de las Fuerzas y Cuerpos de Seguridad. DEUSPC asegura la confidencialidad de los datos aportados y garantiza que, en ningún caso, serán cedidos para ningún otro uso sin mediar consentimiento previo y expreso de nuestros clientes. Sólo le pediremos aquellos datos necesarios para la prestación del servicio requerido y únicamente serán empleados para este fin. Los datos serán tratados por un periodo mínimo de seis años conforme a la legislación vigente y hasta que se extinga la relación comercial.
                </p> 
                <br>
                <h2>1.1.3. Apartado "Boletín"</h2>
                <p>De conformidad con lo dispuesto en la Ley Orgánica 15/1999 de 13 de diciembre, de Protección de Datos de Carácter Personal, le informamos que el e-mail facilitado será incorporado en un fichero titularidad de DEUSPC con la finalidad de enviar el boletín de ofertas. Este Boletín tiene carácter exclusivamente informativo. Los datos personales son empleados por DEUSPC de acuerdo con las exigencias de la Ley 15/1999, de 13 de Diciembre, de protección de datos de carácter personal. La legitimación del tratamiento se efectúa en virtud de su propia petición y por tanto con su consentimiento. El plazo de conservación de los datos es indefinido hasta que usted decida darlos de baja.
                </p><br>
                <h2>1.1.4. Apartado "Formulario de Consultas de DEUSPC"</h2><br>
                <p>En cumplimiento de lo dispuesto en la Ley Orgánica 15/1999 de Protección de Datos de Carácter Personal, le informamos que los distintos datos de contacto que disponemos sobre usted o sobre su empresa han sido incorporados a un fichero denominado CONSULTAS del que es responsable esta empresa  DEUSPC INFORMATICA S.L., B-12650719, Almazora), y cuya finalidad no es otra que facilitar gestión y atención de las consultas planteadas por los usuarios. La legitimación del tratamiento se efectúa en virtud de su propia petición y por tanto con su consentimiento.
                <br>
                Igualmente le informamos que nuestra empresa tiene implantadas las medidas de índole técnica y organizativas necesarias para garantizar la seguridad, confidencialidad e integridad de los datos de carácter personal que trata.
                <br>
                Sus datos no serán cedidos a terceros sin que conste expresamente su consentimiento, salvo en los supuestos legalmente previstos, ni se destinarán a fines distintos de aquéllos para los que han sido recabados.
                <br>
                Por último le informamos de que puede ejercitar los derechos de acceso, rectificación, cancelación, oposición e impugnación de valoraciones en los términos previstos en la Ley Orgánica 15/99 y normativa de desarrollo y por los procedimientos definidos al efecto por esta empresa. Los datos serán tratados por un periodo mínimo de seis años conforme a la legislación vigente y hasta que se extinga la relación comercial.
                </p><br>
                <h2>1.2. Uso de los tickets</h2>
                <p>
                Cada usuario puede acceder a sus tickets mediante usuario y contraseña. Las contraseñas son personales e intransferibles, el usuario es responsable del uso de sus contraseñas y de su comunicación a terceros. La información que contienen los tickets es de carácter confidencial.
                DEUSPC prohíbe la publicación de los tickets a terceros y de su divulgación en foros, redes sociales y cualquier sitio web.
                </p><br>
                <h2>1.2.1. Apartado "Formulario RMA de garantías del cliente"</h2><br>
                <p>De acuerdo a la Ley Orgánica 15/1999 de 13 de Diciembre, de Protección de Datos de Carácter Personal (LOPDP), le informamos que mediante la cumplimentación de los formularios, sus datos personales quedarán incorporados y serán tratados en el fichero de clientes de DEUSPC.
                <br>
                La principal finalidad de dicho fichero es la gestión del RMA (Uso de garantía de su producto).
                <br>
                Sus datos pueden ser comunicados a los fabricantes en el supuesto de productos averiados o defectuosos. La legitimación del tratamiento se efectúa en virtud de su propia compra en ejecución de dicho contrato. Los datos serán mantenidos durante el periodo máximo de seis años.
                </p><br>
                <h2>1.2.2. Consentimiento</h2>
                <p>Mediante el envío de los formularios entendemos que el usuario presta su consentimiento para que se traten los datos conforme las finalidades previstas en cada uno de los formularios. DEUSPC no comunicará los datos a terceros salvo en los supuestos legalmente establecidos o autorizados por el interesado. DEUSPC comunica a los titulares de los datos su intención de enviarles comunicaciones comerciales por correo electrónico o por cualquier otro medio de comunicación electrónica equivalente. Asimismo, los titulares manifiestan conocer esta intención y prestan su consentimiento expreso para la recepción de las mencionadas comunicaciones. El consentimiento aquí prestado por el Titular para comunicación de datos a terceros tiene carácter revocable en todo momento, sin efectos retroactivos.
                </p><br>
                <h2>1.2.3. Plazo de conservación de los datos</h2>
                <p>Los datos serán tratados por un periodo mínimo de seis años conforme a la legislación vigente y hasta que se extinga la relación comercial.
                </p><br>
                <h2>1.2.4. Derechos de los interesados</h2>
                <p>El interesado puede ejercitar sus derechos ARCO (acceso, rectificación, cancelación y oposición) en relación con sus datos personales dirigiéndose por escrito y adjuntando fotocopia del DNI a la dirección Pol. Emp. La Plana – C/ Historico Reino de Valencia 2 , 12550 Almazora (Castellon), a través de nuestro formulario o al correo electrónico info DEUSPC.com.com DEUSPC tiene a su disposición modelos mediante los cuales puede ejercitar los derechos ARCO.
                <br>
                Los usuarios deberán garantizar la veracidad, exactitud, autenticidad y vigencia de los datos de carácter personal que les hayan sido recogidos.
                <br>
                No recogemos datos personales de menores. Es responsabilidad del padre/madre/tutor legal velar por para la privacidad de los menores, haciendo todo lo posible para asegurar que han autorizado la recogida y el uso de los datos personales del menor.
                </p><br>
                <h2>1.2.5. Redes Sociales</h2>
                <p>A través de nuestra página web puede acceder a las redes sociales Facebook, Twitter, Google+, Instagram, Pinterest o Youtube de acceso abierto a todos los usuarios. Se trata de sitios web donde el usuario puede registrase y seguirnos gratuitamente. En estas redes sociales los usuarios podrán conocer de nuestras actividades, opiniones, acceder a las fotos y vídeos. Los usuarios de estas redes sociales deben ser conscientes de que este lugar es independiente de la web www DEUSPC.com y está abierto, es decir, es visible para todos sus usuarios, y las políticas de privacidad a aplicar a estos contenidos son las fijadas por Facebook, Twitter, Google+, Instagram, Pinterest o Youtube. DEUSPC no es titular de las redes sociales.
                </p>
            </section>
        </div>
        <?php include 'elementos/footer.php'  ?>
        <!--Script js-->
        <script src="js\script.js"></script>
    </body>
</html>