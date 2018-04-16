$(document).ready(function(){
	articulosCesta();
	$.ajax({
 		url:"php/consultas.php?consulta=1",
 		method:"GET",
 		date:"",
 		datatype:"JSON",
 		success:function(respuesta){
	 			var obj=$.parseJSON(respuesta);
	 			var count = Object.keys(obj).length;
	 			$('#numero-categorias').append('['+count+']');
	 			for (i = 0; i <count; i++) {
	 				$("#select-categorias").append('<option value="'+obj[i]['id']+'" >'
	 					+obj[i]['nombre']+'</option>');
	 				$('#lateral-categorias').append('<li><a class="active" href="productos.html?cate='+obj[i]['id']+'">'+
	 					'<i class="icon-chevron-right"></i>'+obj[i]['nombre']+'</a></li>');
				}
 		},
		error:function(){
			alert("error 2");
		}
	});
	$.ajax({
		url:"php/consultas.php?consulta=2",
		method:"GET",
		date:"",
		datatype:"JSON",
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
					var nombre="'"+obj[i]['nombre'].trim()+"'"
					var id=obj[i]['id'];
					$("#ul-productos").append('<li class="span3">'+
				  		'<div class="thumbnail">'+
						'<a  href="productodetalles.html?id='+obj[i]['id']+'"><img src="'+obj[i]['url']+'" alt=""/></a>'+
						'<div class="caption">'+
					  	'<h5>'+obj[i]['nombre']+'</h5>'+
					  	'<h4 style="text-align:center"><a class="btn" href="productodetalles.html?id='+obj[i]['id']+'">'+
					  	'<i class="icon-zoom-in"></i></a> <button class="btn" onClick="agregar('+id+','+nombre+')">Agregar '+
					  	'<i class="icon-shopping-cart"></i></button> '+
					  	'<a class="btn btn-primary" href="#">LPS '+obj[i]['precio']+'</a></h4>'+
						'</div>'+
				  		'</div>'+
						'</li>');
			
			}

		},
		error:function(){
			alert("error 3");
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
				$("#btn-principal").prepend('<a href="php/destruir.php" role="button" style="padding-right:0">'+
					'<span class="btn btn-large btn-success">Salir</span></a>');
                $("#menu1").html('<a href="perfil.html">Perfil</a>');
				$("#menu2").html('<a href="historial.html">Historial</a>');
				$("#menu3").html('<a href="Ticket.html">Ticket</a>');
                
			}else{
				$("#bienvenido").html("Usuario");
				$("#btn-principal").prepend('<a href="#login" role="button" data-toggle="modal" style="padding-right:0">'+
					'<span class="btn btn-large btn-success">Entrar</span></a>');
				$("#menu1").html('<a href="faq.html">FAQ</a>');
				$("#menu2").html('<a href="contacto.html">Contáctanos</a>');
				$("#menu3").html('');
			}
		},
		error:function(){

		}
	});


  $.ajax({
		url:"php/modificar.php",
		method:"GET",
		datatype:"json",
		
		success:function(respuesta){
				var obj = $.parseJSON(respuesta);
	
				$("#txtNombre").val(obj.nombre);
				$("#txtApellido").val(obj.apellido);
				$("#txtContrasena").val(obj.password);
                $("#txtEmail").val(obj.correo);
                $("#txtDireccion").val(obj.nombre_direccion);
                $("#txtCiudad").val(obj.ciudad);
                $("#txtTelefono").val(obj.telefono1);
                $("#txtTelefono2").val(obj.telefono2);
                $("#txtInformacion").val(obj.observaciones);
                $("#txtDireccion2").val(obj.direccion_2);
                $("#txtcoordenada").val(obj.coordenada);
                $("#cbxDepartamento option:selected" ).text(obj.departamento);
               
	
                

	

		},
		error:function(){

		}
	});






});

function articulosCesta(){
	$.ajax({
 		url:"php/consultas.php?consulta=5&carrito=1",
 		method:"GET",
 		date:"",
 		datatype:"html",
 		success:function(respuesta){
 			var url = window.location;
 			if(respuesta==0){
 				$("#btn-cesta").html('<i class="icon-shopping-cart icon-white"></i> Sin Artículos en cesta');
 				$("#a-cesta").attr('href','cesta.html?ref='+url);
 			}else{
	 			$("#btn-cesta").html('<i class="icon-shopping-cart icon-white"></i> ['+respuesta+'] Artículos en tu cesta');
	 			$("#a-cesta").attr('href','cesta.html');
	 			$("#btnPagar").css('display','block');
 			}
 		},
		error:function(){
			alert("error 1");
		}
	});
}

$("#registro").click(function(){
	if( ($("#inputemail").val()!='') && ($("#inputpassword").val()!='') ){
		var email_usuario = $("#inputemail").val();
		var password_usuario =$("#inputpassword").val();
		var parametros="correo="+ email_usuario + "&password=" + password_usuario;
		$.ajax({
			url:'php/login.php',
			method:"GET",
			data:parametros,
			success:function(respuesta){
				if (respuesta==1) {
					var url = window.location;
			      	$(location).attr('href',url);
				 }
			       else if(respuesta==2) {
                     $('#error').html("correo o password invalidos");
                     $('#inputemail').focus();				
			}
			},
			error:function(){
				alert("Error desconocido");
			}
		});
		
	}else{
		$("#error").html("Campos vacios");
	}
});

$("#guardar").click(function(){

  
   var nombre_usuario = $("#txtNombre").val();
   var apellido_usuario=  $("#txtApellido").val();
   var email_usuario = $("#txtEmail").val();   
   var contrasena = $("#txtContrasena").val();
   var input  =    $("#cbxDepartamento option:selected" ).text();
   var nombre_direccion =$("#txtDireccion").val(); 
   
   var direccion2 = $("#txtDireccion2").val();
   var ciudad_usuario = $("#txtCiudad").val();
   var telefono1 = $("#txtTelefono").val();
   var telefono2 = $("#txtTelefono2").val();
   var observaciones = $("#txtInformacion").val();
   

   var valores= "usuario="+ nombre_usuario+"&apellido="+ apellido_usuario +"&email="+email_usuario 
   			+ "&contrasena="+contrasena +   "&departamento=" +input
               + "&direccion_1=" + nombre_direccion+  "&direccion_2=" + direccion2
               +"&ciudad=" + ciudad_usuario + "&telefono_1=" + telefono1 + "&telefono_2=" + telefono2 
                + "&observaciones=" + observaciones ;
     
	    $.ajax({
	    	url: "php/actualizar.php",
	        method: "GET",
	        data: valores,
	        
	        success: function(respuesta){
	            if(respuesta==1){
	            	
                  $.toast({
                  	  beforeShow: function () {
                      desahabilitar();
                       },
                      heading: 'Success',
                      text: 'se ha modificado correctamente',
                      showHideTransition: 'slide',
                      icon: 'success',
                      hideAfter: 1200
                   })        
                 
      }
					     
					       
				      	    

	        },
	        error:function(){
	        	alert("error");
	        }
		});
	
});



$("#prueba-registro").click(function(){


   var nombre_usuario = $("#txtNombre").val();
   var apellido_usuario=  $("#txtApellido").val();
   var email_usuario = $("#txtEmail").val();   
   var fecha_dia =$("#cbxDiaa").val();
   var contrasena = $("#txtContrasena").val();
   var fecha_mes =$("#cbxMess").val();
   var fecha_anio =$("#cbxAnoo").val();
   var nombre_direccion =$("#txtDireccion").val(); 
   var dpt =$("#cbxDepartamento").val();
   var direccion2 = $("#txtDireccion2").val();
   var ciudad_usuario = $("#txtCiudad").val();
   var telefono1 = $("#txtTelefono").val();
   var telefono2 = $("#txtTelefono2").val();
   var observaciones = $("#txtInformacion").val();
   var coordenadas =$("#coords").val();

   var valores= "usuario="+ nombre_usuario+"&apellido="+ apellido_usuario +"&email="+email_usuario
   				+ "&dia=" +fecha_dia + "&contrasena="+contrasena   + "&anio=" + fecha_anio + "&mes=" + fecha_mes
                + "&direccion_1=" + nombre_direccion+ "&departamento=" + dpt + "&direccion_2=" + direccion2
                +"&ciudad=" + ciudad_usuario + "&telefono_1=" + telefono1 + "&telefono_2=" + telefono2 
                + "&observaciones=" + observaciones + "&coordenada=" + coordenadas;
     
  if((validar()==true)) {
	    $.ajax({
	    	url: "php/registro.php",
	        method: "GET",
	        data: valores,
	        success: function(respuesta){
	            
	               if(respuesta==1){
	                 $('#capchas').html("correo ya existe");
					 $('#txtEmail').focus();
	               }
				   else if (respuesta==2) {
				   	$.toast({
                  	  afterHidden: function () {
                      window.location="index.html";
                       },
                      heading: 'Success',
                      text: 'se ha registroado correctamente',
                      showHideTransition: 'slide',
                      icon: 'success',
                      hideAfter: 1200

                   })        
				      			
				      	    }


	        },
	        error:function(){
	        	alert("error");
	        }
		});
	}
});


function validar(){
		   var validacion_email = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
		   var numeros = /^[0-9]+$/;

		/*************************nombre****************************/

		   if($("#txtNombre").val() == ""){
		   
		   	  	$('#nombre').html('campo nombre esta vacio' +" "+ '<i class="fas fa-times"></i>' );
		   		$("#txtNombre").focus();  
		   	     	
		      return false;
		    }
		  else
		     {
		  	  $("#nombre").html(" ");
		  	  
		  	}

		   /****************************************Apellido*************************************/
		if($("#txtApellido").val() == ""){
		   	  $('#apellido').html('campo apellido esta vacio' + " "+'<i class="fas fa-times"></i>');
		   	  $("#txtApellido").focus();  
		      return false;
		    }
		  else
		      {
		  	   $("#apellido").html(" ");
		  	  }
		  

		  /************************************EMAIL*********************************************/

		   if($("#txtEmail").val() == "" ){
		   	  $('#capchas').html('campo correo esta vacio' +" "+ '<i class="fas fa-times"></i>');
		   	  $("#txtEmail").focus();  
		      return false;
		    }
		  else
		      {
		  	   $("#capchas").html(" ");
		  	  }


		  if( !validacion_email.test( $("#txtEmail").val() ) ) {
				 $('#capchas').html('introduzca una direccion valida' +" "+ '<i class="fas fa-times"></i>');
		   	     $("#txtEmail").focus();  
				 return false;
			} else 
		        	{
				 $("#capchas").html(" ");
		         	}
			  
		/***********************************contraeña***************************************************/
		   if($("#txtContrasena").val() == ""){
		   	  $('#contrasena').html('campo contraseña esta vacio' +" "+ '<i class="fas fa-times"></i>');
		   	  $("#txtContrasena").focus();  
		       return false;
		    }else if($("#txtContrasena").val().length<8) {

		    	$('#contrasena').html('contraseña debe tener 8 al menos 8 caracteres' +" "+ '<i class="fas fa-times"></i>');
		   	  $("#txtContrasena").focus();  
		   	  return false;
		    }
               
                    


		  else{
		  	 $("#contrasena").html(" ");
		  	}
	/****************************************fecha******************************************************************/		

		  if( ($('#cbxDiaa').val() ==00) || ($('#cbxAnoo').val()==0000 ) || ($("#cbxMess").val()==00)) {
		         $('#fecha').html('introduzca una fecha valida' +" "+ '<i class="fas fa-times"></i>');
		         $("#cbxDiaa").focus();  
		         return false;
		   	    
		    } else {
		        $("#fecha").html(" ");
		    }


		/***********************************direccion***************************************************/
		   if($("#txtDireccion").val() == ""){
		   	 $('#direccion').html('campo direccion esta vacio' +" "+ '<i class="fas fa-times"></i>');
		   	 $("#txtDireccion").focus();  
		       
		        return false;
		    }
		  else
		    {
		  	 $("#direccion").html(" ");
		  	}



		/***********************************ciudad***************************************************/
		     if($("#txtCiudad").val() == ""){
		   	    $('#ciudad').html('campo ciudad esta vacio' +" "+ '<i class="fas fa-times"></i>' );
		   	    $("#txtCiudad").focus();  
		       
		        return false;
		    }
		  else
		    {
		  	 $("#ciudad").html(" ");
		  	}


		/***********************************departamento***************************************************/
		  
		 if($("#cbxDepartamento").val() == ""){
		   	 $('#departamento').html('campo departamento esta vacio' +" "+ '<i class="fas fa-times"></i>' );
		   	 $("#cbxDepartamento").focus();  
		       
		        return false;
		    }
		  else
		    {
		  	 $("#departamento").html(" ");
		  	}


		/***********************************telefono***************************************************/
		  if($("#txtTelefono").val() ==  ""){
		   	 $('#telefono').html('telefono esta vacio o tiene letras' +" "+ '<i class="fas fa-times"></i>' );

		   	 $("txtTelefono").focus();  
		       
		        return false;
		    }
		           else  if($("#txtTelefono").val().length<8 ){
		               	 $('#telefono').html('debe tener 8 numeros' +" " +'<i class="fas fa-exclamation"></i>');
		   	             $("txtTelefono").focus();  
		       
		                 return false;
		                  }
		                 
		  else
		    {
		  	 $("#telefono").html(" ");
		  	}

		/***********************************telefono2***************************************************/
		  if(($("#txtTelefono2").val().length<8 ) && ($("#txtTelefono2").val().length>=1)){
		      $('#telefono2').html('debe tener 8 numeros' +" " +'<i class="fas fa-exclamation"></i>' );
		   	  $("txtTelefono2").focus();  
		       return false;
		    }
		 else
		    {
		  	 $("#telefono2").html(" ");
		  	}
    return true;
}
//funcion habilitar inputs en el perfil de usuario para poder modificarlos los campos. 
function habilitar(){

$("#txtNombre").removeAttr('disabled'); 
$("#txtApellido").removeAttr('disabled');
//$("#txtEmail").removeAttr('disabled');	
$("#txtContrasena").removeAttr('disabled');	
$("#txtCiudad").removeAttr('disabled');
$("#cbxDepartamento").removeAttr('disabled');
$("#txtDireccion2").removeAttr('disabled');
$("#txtDireccion").removeAttr('disabled');
$("#txtInformacion").removeAttr('disabled');
$("#txtTelefono").removeAttr('disabled');
$("#txtTelefono2").removeAttr('disabled');

$("#guardar").removeAttr("disabled");
}
function desahabilitar(){

$("#txtNombre").attr('disabled',true); 
$("#txtApellido").attr('disabled',true);
$("#txtEmail").attr('disabled',true);	
$("#txtContrasena").attr('disabled',true);	
$("#txtCiudad").attr('disabled',true);
$("#cbxDepartamento").attr('disabled',true);
$("#txtDireccion2").attr('disabled',true);
$("#txtDireccion").attr('disabled',true);
$("#txtInformacion").attr('disabled',true);
$("#txtTelefono").attr('disabled',true);
$("#txtTelefono2").attr('disabled',true);

$("#guardar").attr("disabled",true);
}


$("#submitButton").click(function(){
	var url= 'productos.html?cate='+$("#select-categorias").val();
	$(location).attr('href',url);
});

function agregar(id,nombre){
	var cantidad=0;
	if($("#cantidadCarrito").length){
		cantidad=$("#cantidadCarrito").val();
	}
	$.ajax({
		url:"php/sesion.php",
		method:"POST",
		date:"",
		datatype:"json",
		success:function(respuesta){
			if(!(respuesta=="error")){
				guardarCarro(id,nombre,cantidad);
			}else{
				$.toast({
				    heading: 'Inicia sesión',
				    text: 'Para poder Agregar productos al carrito',
				    icon: 'error'
				});
			}
		}
	});
}
function guardarCarro(id,nombre,cantidad){
	$.ajax({
			url:'php/agregarProducto.php',
			method:'GET',
			data: "id="+id+"&cantidad="+cantidad,
			success:function(respuesta){
				if(respuesta=='error'){
					$.toast({
				    heading: 'Error',
				    text: 'Ocurrio un error al intentar agregar un producto',
				    icon: 'error'
				});
				}else{
					$.toast({
				    heading: 'Producto Agregado al Carrito',
				    text: nombre,
				    icon: 'success'
				});
					articulosCesta();
				}
			}
		});
}