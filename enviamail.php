<?php
header('Content-Type: text/html; charset=UTF-8');
	$destino = "camposf2010@hotmail.com";
	$nombreApellido=$_POST['input-nombreApellido'];
	$telefonoContacto=$_POST['input-telefonoContacto'];
	$email=$_POST['input-email'];
	$mensaje=$_POST['input-mensaje'];
	$contenido = "\nNombre y Apellido: " . $nombreApellido . "\nTelefono contacto: " .$telefonoContacto . "\nEmail: " .$email . "\nMensaje: " .$mensaje;
	if(mail($destino,"FlexTIC", "Datos del email recibido: "."\n". $contenido)){
	header("Location:mailenviado.html");
}else{
echo "El mensaje no se pudo entregar";
}
?>
<?php
header('Content-Type: text/html; charset=UTF-8');
	$destino = "nestorfabriciocampos@gmail.com";
	$nombreApellido=$_POST['input-nombreApellido'];
	$telefonoContacto=$_POST['input-telefonoContacto'];
	$email=$_POST['input-email'];
	$mensaje=$_POST['input-mensaje'];
	$contenido = "\nNombre y Apellido: " . $nombreApellido . "\nTelefono contacto: " .$telefonoContacto . "\nEmail: " .$email . "\nMensaje: " .$mensaje;
	if(mail($destino,"FlexTIC", "Datos del email recibido: "."\n". $contenido)){
	header("Location:mailenviado.html");
}else{
echo "El mensaje no se pudo entregar";
}
?>