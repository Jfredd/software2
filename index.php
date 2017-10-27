<?php
session_start();
$Usuario = $_SESSION['Usuario'];
if(isset($Usuario)){
if($Usuario['Perfil'] == "Administrador"){
header('Location: main_app/Admin/');
}else if($Usuario['Perfil'] == "Estudiante"){
header('Location: main_app/Usuario/');
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Sistema Academico ALlC</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Sistema Academico ALLC,SIALlC, Colegio ALberto Lleras Camargo">
<script type="application/x-javascript"> 
addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
</script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" /> 
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="error">
<span>Datos de Ingreso no validos.</span>
</div>
<!-- main -->
<div class="main-agileits">
<div class="mainw3-agileinfo form">
<div id="login">
<form action="" id="formlg"> 
<h1>Sistema Academico</h1>
<h1>ALLC </h1>
<div class="field-wrap">
<label>Usuario<span class="req">*</span> </label>
<input type="text" name="usuariolg" required autocomplete="off">
</div> 
<div class="field-wrap">
<label>Contraseña<span class="req">*</span> </label>
<input type="password" name="passlg" required autocomplete="off">
</div> 
<p class="forgot"><a href="notfound.php">¿..Olvido su contraseña..?</a></p>
<input type="submit" name="button" value="...Iniciar Sesion..." class="botonlg"> 
</form> 
</div>
</div>
</div>
<!-- //main -->
<!-- copyright -->
<footer class="w3copyright-agile">
<div class="w3copyright-agile">
<p>© 2017 Serverus Corporation. Todos los derechos reservados | Diseñado por: <a href="http://w3layouts.com/" target="_blank">W3layouts | JFEG </a></p>
</div>
</footer>
<script src="js/jquery-3.2.1.min.js"></script>
<!-- //copyright --> 
<script>
$('.form').find('input, textarea').on('keyup blur focus', function (e) { 
var $this = $(this),
label = $this.prev('label');
if (e.type === 'keyup') {
if ($this.val() === '') {
label.removeClass('active highlight');
} else {
label.addClass('active highlight');
}
} else if (e.type === 'blur') {
if( $this.val() === '' ) {
label.removeClass('active highlight'); 
} else {
label.removeClass('highlight');   
}
} else if (e.type === 'focus') {
if( $this.val() === '' ) {
label.removeClass('highlight'); 
} 
else if( $this.val() !== '' ) {
label.addClass('highlight');
}
}
}); 
</script>
<script>
$("#formlg").submit(function(){
//alert("Submitted");
//alert("Hola Mundo 2");
event.preventDefault();
$.ajax({
type: 'POST',
url: 'main_app/login.php',
dataType: "JSON",
data: $(this).serialize(),
beforeSend: function(){
$('.botonlg').val('..Validando..');
}
})
.done(function(respuesta){
 console.log('dd',respuesta);
if(!respuesta.error){
if(respuesta.tipo == 'Administrador'){
location.href = 'main_app/Admin/';
}else if(respuesta.tipo == 'Estudiante'){
location.href = 'main_app/Usuario/';
}
}else{
$('.error').slideDown('slow');
setTimeout(function(){
$('.error').slideUp('slow');
},3000);
$('.botonlg').val("...Iniciar Sesion...");
}
})
.fail(function(resp){
alert("Error",resp);
console.log('---',resp.responseText);
})
.always(function(){
console.log("Complete Always");
});
});
</script>
 <!--- Daniel R Sanchez M -->
 <!--- John F Estupiñan G -->
</body>
</html>
