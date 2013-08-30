<?php
/****************************************/
require_once '../../libsigma/Sigma.php';
$plantilla = new HTML_Template_Sigma('plantilla/');
$plantilla->loadTemplateFile('admin2.tlp.html');

//datos session
$id_perfil;$id_usuario;$nom_usuario;
/****************************************/
session_start();
if((!isset($_SESSION['perfil'])||!$_SESSION['perfil'])&&
   (!isset($_SESSION['nom_usu'])||!$_SESSION['nom_usu'])&&
   (!isset($_SESSION['id_usu'])||!$_SESSION['id_usu'])){
     //si la session viene vacia
     
     header('Status: 301 Moved Permanently', false, 301);
     header('Location:../iniciosesion.php');
     exit();
	
}
else{
$id_perfil=$_SESSION['perfil'];
$nom_usuario=$_SESSION['nom_usu'];
$id_usuario=$_SESSION['id_usu'];
if($id_perfil==1){
$titulo_pagina='Panel de administración de Reportes';
$contenido_pagina='
   <div id="head">
	<div class="bot-sec">
		<a href=""class="current">'.$nom_usuario.'</a> | 
                <a href="panel.php">Panel de Admin</a> | 
                <a href="logout.php/">Cerrar Sesión</a>
        </div>
   </div>    
<br />
<h2>Panel de Administración de Usuarios </h2>
<br />
<form id="formulario_usuario" action="" method="POST">
<input type="hidden" value="'.$id_usuario.'"  Perfil="'.$id_perfil.'" id="id_usuario"/>
<table>
   <tr> <td>Nombre Usuario </td><td><input type="text" value="" name="nom_usu" id="nom_usu" maxlength=30 />
   <div id="val"></div>  
   </td></tr>
   <tr> <td>Tipo de Usuario </td>
   <td><select id="selperfil" style="width:25%;">
   <option id="">Selecciona Un Perfil</option>
   <select></td></tr>
   <tr> <td>Contraseña </td><td><input type="password" value="" name="pass" id="pass" maxlength=30/>
   &nbsp;
   Repetir Contraseña <input type="password" value="" name="pass2" id="pass2" maxlength=30/><div id="val2"></div> 
   </td></tr>
</table>
   <br /><br />
<table id="tablauser" >
</table> 
<br /><br />
     <input  class="" type="button" id="crear" name="crear" value="Nuevo Usuario"  />
     &nbsp;
     <input  class="" type="button" id="guardar" name="guardar" value="Guardar Cambios" />
     <div id="mens"></div>
</form>
';
$plantilla->setVariable('titulo',$titulo_pagina);
$plantilla->setVariable('content_place',$contenido_pagina);
$plantilla->parse();
$plantilla->show();
}
  else{
     header('Status: 301 Moved Permanently', false, 301);
         header('Location:../panel/panel.php');
         exit();
  }
}

?>
