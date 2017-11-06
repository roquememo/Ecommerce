$(document).ready(function(){

	$("#select-categorias").html('<option>Todo</option>'+
		'<option>Ropa</option>'+
		'<option>Comida y Bebidas </option>'+
		'<option>Salud y Belleza </option>'+
		'<option>Deportes </option>'+
		'<option>Libros y Entretenimiento </option>');

	$.ajax({
		url:"php/sesion.php",
		method:"POST",
		date:"",
		datatype:"json",
		success:function(respuesta){
			if(!(respuesta=="error")){
				var obj = $.parseJSON(respuesta);
				$("#bienvenido").html(obj.nombre);
				$("#btn-cesta").html('<i class="icon-shopping-cart icon-white"></i> [ 3 ] Artículos en tu cesta');
				$("#btn-principal").prepend('<a href="php/destruir.php" role="button" style="padding-right:0">'+
					'<span class="btn btn-large btn-success">Salir</span></a>');
			}else{
				$("#bienvenido").html("Usuario");
				$("#btn-cesta").html('<i class="icon-shopping-cart icon-white"></i> Sin Artículos en cesta');
				$("#btn-principal").prepend('<a href="#login" role="button" data-toggle="modal" style="padding-right:0">'+
					'<span class="btn btn-large btn-success">Entrar</span></a>');
			}
		},
		error:function(){

		}
	});



});
$("#iii").click(function(){
	if( ($("#inputemail").val()=='') || ($("#inputpassword").val()=='') ){
		$("#error").html("Campos vacios");
	}else{
		var parametros="correo="+$("#inputemail").val()+"&"+
					"password="+$("#inputpassword").val();
		$.ajax({
			url:"php/login.php",
			method:"GET",
			data:parametros,
			success:function(respuesta){
				if(!(respuesta=="Datos incorrectos")){
					var url = window.location;
					$(location).attr('href',url);
				}else{
					$("#error").html("Datos incorrectos");	
				}	
			},
			error:function(){
				alert("Error desconocido");
			}
		});
	}
	
});