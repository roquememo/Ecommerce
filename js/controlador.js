$(document).ready(function(){
	$.ajax({
 		url:"php/consultas.php?consulta=1",
 		method:"GET",
 		date:"",
 		datatype:"json",
 		success:function(respuesta){
	 			var hasta=respuesta.length;
	 			var obj=$.parseJSON(respuesta);
	 			var count = Object.keys(obj).length;
	 			$('#numero-categorias').append('['+count+']');
	 			for (i = 0; i <=hasta; i++) {
	 				$("#select-categorias").append('<option value="'+obj[i]['id']+'" >'
	 					+obj[i]['nombre']+'</option>');
	 				$('#lateral-categorias').append('<li><a class="active" href="productos.html">'+
	 					'<i class="icon-chevron-right"></i>'+obj[i]['nombre']+'</a></li>');
				}
 		},
		error:function(){
			alert("error");
		}
	});
	$.ajax({
		url:"php/consultas.php?consulta=2",
		method:"GET",
		date:"",
		datatype:"json",
		success:function(respuesta){
			var hasta=respuesta.length;
			var obj=$.parseJSON(respuesta);
			for (var i = 0; i <12; i++) {
				if(i<4){
					$("#destacados1").append('<li class="span3">'+
				  		'<div class="thumbnail">'+
				  		'<i class="tag"></i>'+
						'<a href="productodetalles.html?id='+obj[i]['id']+'"><img width="160px" height="160px" src="'+obj[i]['url']+'" alt=""></a>'+
						'<div class="caption">'+
					  	'<h5>'+obj[i]['nombre']+'</h5>'+
					  	'<h4><a class="btn" href="productodetalles.html?id='+obj[i]['id']+'">VER</a>'+
					  	'<span class="pull-right">LPS '+obj[i]['precio']+'</span></h4>'+
						'</div>'+
				  		'</div>'+
						'</li>');
				}else if(i<8){
					$("#destacados2").append('<li class="span3">'+
				  		'<div  class="thumbnail">'+
				  		'<i class="tag"></i>'+
						'<a href="productodetalles.html?id='+obj[i]['id']+'"><img width="160px" height="160px" src="'+obj[i]['url']+'" alt=""></a>'+
						'<div class="caption">'+
					  	'<h5>'+obj[i]['nombre']+'</h5>'+
					  	'<h4><a class="btn" href="productodetalles.html?id='+obj[i]['id']+'">VER</a>'+
					  	'<span class="pull-right">LPS '+obj[i]['precio']+'</span></h4>'+
						'</div>'+
				  		'</div>'+
						'</li>');
				}
					$("#ul-productos").append('<li class="span3">'+
				  		'<div class="thumbnail">'+
						'<a  href="productodetalles.html?id='+obj[i]['id']+'"><img src="'+obj[i]['url']+'" alt=""/></a>'+
						'<div class="caption">'+
					  	'<h5>'+obj[i]['nombre']+'</h5>'+
					  	'<h4 style="text-align:center"><a class="btn" href="productodetalles.html?id='+obj[i]['id']+'">'+
					  	'<i class="icon-zoom-in"></i></a> <a class="btn" href="#">Agregar '+
					  	'<i class="icon-shopping-cart"></i></a> '+
					  	'<a class="btn btn-primary" href="#">LPS '+obj[i]['precio']+'</a></h4>'+
						'</div>'+
				  		'</div>'+
						'</li>');
			
			}

		},
		error:function(){
			alert("error");
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