<?php
//establecemos conexion con el servidor con B.D
include("../conexion.php");
  
//caturamos enviados desde el formulario
$usuario = $_POST["admin"];   
$password = $_POST["password_usuario"];
 
//Consulta de mysql tabla usuarios
$resultado = mysql_query("SELECT * FROM usuarios WHERE alias = '$usuario'"); 


//comprobamos si el nombre del usuario existe en la base de datos 
if($row = mysql_fetch_array($resultado)){      
	$id=$row['id'];
	$alias=$row['alias'];
	$pass=$row['pass'];
	$email=$row['email'];
	$permisos=$row['permisos'];
	$avatar=$row['avatar'];
	$fecha=$row['fecha'];
	//Creamos sesión
	session_start();
	$sesion=array('id'=>$id,'alias'=>$alias,'pass'=>$pass,'email'=>$email,'permisos'=>$permisos,'avatar'=>$avatar,'fecha'=>$fecha);	
		 
  	//se guarda el nombre de usuario en una variable de sesión, sesión
 	$_SESSION['sesion']=$sesion;
	//Si el usuario es correcto ahora validamos su contraseña 
	if($row["pass"] == $password){
		echo 'bienvenido '.$alias;
		echo 'permisos'.$_SESSION['sesion']['permisos']; 
  		//si nos hemos logeado ok, redireciccionamos a la pagina buscar producto
  		header('Location: ../buscar.php');   
 		}
	else{
        //si la contraseña es incorrecta, saco un alert con la incidencia y redirecciono a entrada.php
	?>
   <script languaje="javascript">
    alert("Contraseña Incorrecta");
    location.href = "entrada.php";
   </script>
  <?php
             
 }
}
else
{
//si el nombre de usuario es incorrecto, saco un alert con la incidencia y redirecciono a entrada.ph
?>
 <script languaje="javascript">
  alert("El nombre de usuario es incorrecto!");
  location.href = "entrada.php";
 </script>
<?php         
}
 
//libero memoria
mysql_free_result($resultado);
 
//cerrar la sesión B.D 
mysql_close();
?>
