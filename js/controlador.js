$(document).ready(function(){
	//Cargar categorias a barra de categorias y columna categorias
	$.ajax({
		url:"php/consultas.php?consulta=1",
		method:"GET",
		date:"",
		datatype:"json",
		success:function(respuesta){
			var hasta=respuesta.length;
			var obj=$.parseJSON(respuesta);
			var count = 0;
			while (obj[count]) {
			    count++;
			}
			$('#numero-categorias').append('['+count+']');
			for (i = 0; i <=hasta; i++) {
				$("#select-categorias").append('<option value="'+obj[i]['id']+'" >'
					+obj[i]['nombre']+'</option>');
				$('#lateral-categorias').append('<li><a class="active" href="productos.html">'+
					'<i class="icon-chevron-right"></i>'+obj[i]['nombre']+'</a></li>');
			}

		},
		error:function(){

		}
	});

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