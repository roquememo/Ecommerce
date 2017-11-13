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
			url:"php/consultas.php?consulta=4&id="+valor2,
			method:"GET",
			data:"",
			success:function(respuesta){
				var obj=$.parseJSON(respuesta);
				var count=Object.keys(obj).length;
				
			},
			error:function(){
				alert("Error desconocido");
			}
		});


	}else{
		alert("no hay datos");
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