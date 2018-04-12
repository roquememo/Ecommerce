
var cesta='';
$(document).ready(function(){
	cargarCesta();
});

function cargarCesta(){
	$.ajax({
 		url:"php/consultas.php?consulta=5",
 		method:"GET",
 		date:"",
 		datatype:"JSON",
 		success:function(respuesta){
 			var obj=$.parseJSON(respuesta);
	 		var count = Object.keys(obj).length;
	 		var precio=0;
 			if(!(respuesta==0)){
 				$("#small").prepend(count);
 				for (var i = 0; i < count; i++) {
 					cesta=cesta+obj[i]['nombre'];
 					cesta=cesta+","+obj[i]['cantidad'];
 					cesta=cesta+","+obj[i]['precio'];
 					cesta=cesta+"|";
 					var suma=(obj[i]['precio']*obj[i]['cantidad']);
 	 				$("#tabla").prepend(' <tr>'+
	                  '<td colspan="2"> <img width="60" src="'+obj[i]['url']+'" alt=""/></td>'+
	                  '<td colspan="2">'+obj[i]['nombre']+'</td>'+
					  '<td colspan="2">'+
					  '<div class="input-append"><input  class="span1" style="max-width:34px" value="'+obj[i]['cantidad']+ 
					  '" size="16" type="text" disabled>'+
					  '<button onclick="borrar('+obj[i]['id_producto']+')" class="btn btn-danger" type="button">'+
					  '<i class="icon-remove icon-white"></i></button></div>'+
					  '</td>'+
	                  '<td colspan="2">'+obj[i]['precio']+'</td>'+
	                  '<td colspan="2">'+suma+'</td>'+
	                '</tr>');
	                precio=precio+parseInt(suma);
 				}
 				$("#precio").html(precio);
 				$("#total").html(precio);
 				
 			}else{
	 			
 			}
 		},
		error:function(){
			alert("error");
		}
	});
}

function borrar(id){
	$.ajax({
		url: 'php/borrarProducto.php',
		method: 'GET',
		data: 'id='+id,
		success:function(respuesta){
			$("#tabla").html('<table class="table table-bordered">'+
             ' <thead>'+
                '<tr>'+
                  '<th colspan="2">Producto</th>'+
                  '<th colspan="2">Nombre</th>'+
                  '<th colspan="2">Cantidad</th>'+
				  '<th colspan="2">Precio</th>'+
                  '<th colspan="2">Total</th>'+
				'</tr>'+
              '</thead>'+
              '<tbody id="tabla">'+
                  '<td colspan="8" style="text-align:right">Total Precio:	</td>'+
                  '<td id="precio" colspan="2"> </td>'+
                '</tr>'+
				 '<tr>'+
                  '<td colspan="8" style="text-align:right">Total Descuento:	</td>'+
                  '<td colspan="2"> 0</td>'+
                '</tr>'+
				 '<tr>'+
                  '<td colspan="8" style="text-align:right"><strong>TOTAL</strong></td>'+
                  '<td colspan="2" class="label label-important" style="display:block"> <strong id="total">  </strong></td>'+
                '</tr>'+
				'</tbody>'+
            '</table>');
			cargarCesta();
			$.toast({
				    heading: 'Eliminado',
				    text: 'Se ha eliminado un producto del carrito',
				    icon: 'error'
				});
		},
		error:function(){
			alert('error al borrar');
		}
	});
}

function paypal(){
	$.ajax({
		url:'php/procesar.php',
		method:'GET',
		data:'articulos='+cesta,
		success:function(respuesta){
			$(location).attr('href',respuesta);
		},
		error:function(error){
			
		}
	});
}