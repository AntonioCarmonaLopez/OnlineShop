<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Login</title>
      <link rel="stylesheet" href="../css/login.css" />
      <center>
         <form action="activacion.php" method="post" id="login">
            <table>
               <tr>
                  <td>Usuario:</td>
                  <td><input type="text" name="admin" required="required"></td>
               </tr>
               <tr>
                  <td>Password:</td>
                  <td><input type="password" name="password_usuario" required="required"></td>
               </tr>
               <tr>
                  <td colspan="2">
                     <center><input type="submit" value="Iniciar Sesión" name="iniciar"></center>
                  </td>
               </tr>
            </table>
         </form>
      </center>
      </body>
</html>
