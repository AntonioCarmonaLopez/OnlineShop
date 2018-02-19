<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title>Tienda On-Line</title>
      <link rel="StyleSheet" href="css/index2.css" media="all" type="text/css">
      <link rel='stylesheet prefetch' href='http://dimsemenov-static.s3.amazonaws.com/dist/magnific-popup.css'>
      <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
      <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>
      <script src='http://dimsemenov-static.s3.amazonaws.com/dist/jquery.magnific-popup.min.js'></script>
      <script src="js/index.js"></script>
   </head>
   <body>
      <div class="cabecera">
         <a href ="index2.php">Inicio</a> | <a href ="contacto.html">Contacto</a> | <a href ="users/entrada.php">Login</a>
         <div class="carro"><a href="carro2.php"><img src="imagenes/iconos/carro_compra.jpg" width="25" height="25"></a></div>
      </div>
      <br>
      <div class="titulo">Tienda On-Line
      </div>
      <div class="buscar">
         <form id="formulario" name="frmbuscar" method="post" action="">
            <!--botón y campo de texto para buscar-->
            <input type="search" id="" name="srh" placeholder="buscar..."> 
            <input type="submit" name="btnBuscar" value="Buscar" class="boton negro redondo">
         </form>
      </div>
      <br>
      <div class="radio">
         <p><input id="Cat 1" type="radio" name="cats" value="Cat 1">  
            <label for="Cat 1">Cat 1</label>  
            <input id="Cat 2" type="radio" name="cats" value="Cat 2">  
            <label for="Cat 2">Cat 2</label>
         </p>
         <p><input id="Cat 3" type="radio" name="cats" value="Cat 3">  
            <label for="Cat 3">Cat 3</label>  
            <input id="Cat 4" type="radio" name="cats" value="Cat 4">  
            <label for="Cat 4">Cat 4</label>
         </p>
      </div>
      <div class="content">
         <?php
            //se incluye archivo php que contiene el descriptor para conectarnos a la B.D
            include('conexion.php'); ?>
         <?php
            //variable cantidad registros
            $consulta=mysql_query("select* from productos order by nombre");
            
            $nro_reg=mysql_num_rows($consulta);
            
            if ($nro_reg==0)
            	echo 'Actualmente no existen productos en la tienda';
            
            $reg_por_pagina=3;
            
            if(isset($_GET['pag'])){
            	$nro_pagina=$_GET['pag'];
            }
            else{
            		$nro_pagina=1;
            }
            
            if(is_numeric($nro_pagina))
            	$inicio=($nro_pagina-1)*$reg_por_pagina;
            	else
            		$inicio=0;
            
            $consulta=mysql_query("select* from productos order by nombre limit $inicio,$reg_por_pagina");
            
            $max_paginas=ceil($nro_reg/$reg_por_pagina);
            
            if (isset($_POST['btnBuscar'])){
                    $consulta=mysql_query("select* from productos where nombre like '%".$_POST['srh']."%'");
                }
            while($reg=mysql_fetch_array($consulta)){
            	$id=$reg['id'];
            	$img=$reg['imagen'];
            	$nombre=$reg['nombre'];
            	$desc=$reg['descripcion'];
            	$precio=$reg['precio'];
            	$stock=$reg['stock'];
            	$fecha=$reg['fecha'];
            	
            
            ?> 
         <div class="productos">
            <h2><?php echo $nombre ?></h2>
            <a href="<?php echo $img; ?>" class="without-caption image-link">
  	    <img src="<?php echo $img; ?>" width="150" height="100" /></a>
            <p><?php echo $precio ?></p>
            <form action="detalle.php" method="post" name="detalle">
               <input name="id" type="hidden" value="<?php echo $id ?>">
               <input type="hidden" name="imagen" value="<?php echo $img?>"/>
               <input type="hidden" name="nombre" value="<?php echo $nombre?>"/>
               <input type="hidden" name="descripcion" value="<?php echo $desc?>"/>
               <input type="hidden" name="precio" value="<?php echo $precio?>"/>
               <input type="submit" class="boton negro redondo" value="Detalle" >
            </form>
         </div>
         <?php } ?>
      </div>
      <div id="paginar" align="center">
         <?php
            if($nro_pagina>1)
            	echo " <a href='index2.php?pag=".($nro_pagina-1)."'>Anterior</a> ";
            for($i=1;$i<=$max_paginas;$i++){ 
            	if($i==$nro_pagina)
            		echo $i." ";
            	else
            		echo "<a href='index2.php?pag=$i'>$i</a> ";
            }
            //echo 'indice' .$i;
            if($nro_pagina<$max_paginas)
            	echo " <a href='index2.php?pag=".($nro_pagina+1)."'>Siguiente</a> "
            ?>   
      </div>
      <?php include ('footer.php');?>
