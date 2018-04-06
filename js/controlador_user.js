$(document).ready(function(){
	var valor = getUrlParameter('id');
	var valor2 = getUrlParameter('cate');

	if(valor){
		$.ajax({
			url:"php/consultas.php?consulta=3&id="+valor,
			method:"GET",
			data:"",
			success:function(respuesta){
				var obj=$.parseJSON(respuesta);
				var count=Object.keys(obj).length;
				var nombre="'"+obj['nombre'].trim()+"'";
				var id=valor;
				var h=(count-6);
				$("#nombreProducto").html(obj['nombre']);
				$("#precioProducto").html('L.'+obj['precio']);
				$("#cantidadProducto").html(obj['cantidad']+' en inventario');
				$("#descripcionProducto").html(obj['descripcion']);
				$("#nombreProducto2").html(obj['nombre']);
				$("#nombreModelo").html(obj['modelo']);
				$("#pesoProducto").html(obj['peso']);
				$("#a-img").attr('href',obj['url0']);
				$("#a-img").attr('title',obj['nombre']);
				$("#agregar").html('<button class="btn btn-large btn-primary pull-right" onClick="agregar('+id+','+nombre+')"> Agregar a la cesta<i class=" icon-shopping-cart"></i></button>');
				$("#a-img").html('<img src="'+obj['url0']+'" '+
					'style="height: 200px; width:100%" alt="'+obj['nombre']+'">');
				for (var i = 1; i <h ; i++) {
					$("#img-car"+i).attr('href',obj['url'+i]);
					$("#img-car"+i).append('<img style="width:39%" src="'+obj['url'+i]+'">');
				}
				
			},
			error:function(){
				alert("Error desconocido");
			}
		});
		
	}else if(valor2){

		$.ajax({
			url:"php/consultas.php?consulta=4&cate="+valor2,
			method:"GET",
			data:"",
			success:function(respuesta){
				var obj=$.parseJSON(respuesta);
				var count=Object.keys(obj).length;
				for (var i = 0; i < count; i++) {
					var nombre="'"+obj[i]['nombre'].trim()+"'"
					var id=obj[i]['id'];
					$("#listView").append('<div class="row">'+	  
						'<div class="span2">'+
						'<img src="'+obj[i]['url']+'" alt="'+obj[i]['nombre']+'"/>'+
						'</div>'+
						'<div class="span4">'+
						'<h3>'+obj[i]['nombre']+'</h3>'+				
						'<hr class="soft"/>'+
						'<h5>Descripcion </h5>'+
						'<p>'+obj[i]['descripcion']+'</p>'+
						'<br class="clr"/>'+
						'</div>'+
						'<div class="span3 alignR">'+
						'<div class="form-horizontal qtyFrm">'+
						'<h3> L. '+obj[i]['precio']+'</h3>'+			
			  			'<button class="btn btn-large btn-primary" onClick="agregar('+id+','+nombre+')" > Agregar a la cesta '+
			  			'<i class=" icon-shopping-cart"></i></button>'+
			  			'<a href="productodetalles.html?id='+obj[i]['id']+'" class="btn btn-large">'+
			  			'<i class="icon-zoom-in"></i></a>'+
						'</div>'+
						'</div>'+
						'</div>'+
						'<hr class="soft"/>');


					$("#ul-blockView").append('<li class="span3">'+
			  			'<div class="thumbnail">'+
						'<a href="productodetalles.html?id='+obj[i]['id']+'">'+
						'<img src="'+obj[i]['url']+'" alt=""/></a>'+
						'<div class="caption">'+
				  		'<h5>'+obj[i]['nombre']+'</h5>'+
				   		'<h4 style="text-align:center"><a class="btn" href="productodetalles.html?id='+obj[i]['id']+'">'+ 
				   		'<i class="icon-zoom-in"></i></a>'+ 
				   		'<button class="btn" onClick="agregar('+id+','+nombre+')" >Agregar a la cesta <i class="icon-shopping-cart"></i>'+
				   		'</button> <a class="btn btn-primary" href="#">'+obj[i]['precio']+'</a></h4>'+
						'</div>'+
			  			'</div>'+
						'</li>');
				}
			},
			error:function(){
				alert("Error desconocido");
			}
		});


	}else{
		alert("no hay datos  sss");
	}
	
});

function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};