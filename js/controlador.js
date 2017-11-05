$(document).ready(function(){

	$("#select-categorias").html('<option>Todo</option>'+
		'<option>Ropa</option>'+
		'<option>Comida y Bebidas </option>'+
		'<option>Salud y Belleza </option>'+
		'<option>Deportes </option>'+
		'<option>Libros y Entretenimiento </option>');



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