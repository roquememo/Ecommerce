$(document).ready(function(){
	var ref= getUrlParameter('ref');
	var pro= getUrlParameter('pro');
	$.ajax({
 		url:"php/consultas.php?consulta=5",
 		method:"GET",
 		date:"",
 		datatype:"html",
 		success:function(respuesta){
 			var obj=$.parseJSON(respuesta);
	 		var count = Object.keys(obj).length;
	 		var precio=0;
 			if(!(respuesta=="0")){
 				$("#small").prepend(count);
 				for (var i = 0; i < count; i++) {
	 				$("#tabla").prepend(' <tr>'+
	                  '<td colspan="2"> <img width="60" src="'+obj[i]['url']+'" alt=""/></td>'+
	                  '<td colspan="2">'+obj[i]['nombre']+'</td>'+
					  '<td colspan="2">'+
					  '<div class="input-append"><input class="span1" style="max-width:34px" placeholder="1"'+ 
					  'id="appendedInputButtons" size="16" type="text">'+
					  '<button class="btn" type="button"><i class="icon-minus"></i></button>'+
					  '<button class="btn" type="button"><i class="icon-plus"></i></button>'+
					  '<button class="btn btn-danger" type="button">'+
					  '<i class="icon-remove icon-white"></i></button></div>'+
					  '</td>'+
	                  '<td colspan="2">'+obj[i]['precio']+'</td>'+
	                  '<td colspan="2">'+obj[i]['precio']+'</td>'+
	                '</tr>');
	                precio=precio+parseInt(obj[i]['precio']);
 				}
 				$("#precio").html(precio);
 				$("#total").html(precio);
 				
 			}else{
	 			alert("Registrate para comprar");
	 			$(location).attr('href',ref);
 			}
 		},
		error:function(){
			alert("error");
		}
	});
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