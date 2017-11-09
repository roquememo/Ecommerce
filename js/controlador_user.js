$(document).ready(function(){
	var valor = getUrlParameter('id');
	if(valor){
		$.ajax({
			url:"php/consultas.php?consulta=3&id="+valor,
			method:"GET",
			data:"",
			success:function(respuesta){
				var hasta=respuesta.length;
				var obj=$.parseJSON(respuesta);
				$("#nombreProducto").html(obj['nombre']);
				$("#precioProducto").html('L.'+obj['precio']);
				$("#cantidadProducto").html(obj['cantidad']+' en inventario');
				$("#descripcionProducto").html(obj['descripcion']);
				$("#nombreProducto2").html(obj['nombre']);
				$("#nombreModelo").html(obj['modelo']);
				$("#pesoProducto").html(obj['peso']);
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