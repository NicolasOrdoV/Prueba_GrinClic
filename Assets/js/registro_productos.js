$(function(){

	$('#guardar').on('click',function(){
		var codigo = $('#codigo').val();
		var producto = $('#producto').val();
		var stock = $('#stock').val();
		var valor_unidad = $('#valor_unidad').val();
		var valor_total = $('#valor_total').val();
		var count = stock * valor_unidad;
		if (count >= 1000000) {
			alert('La cantidad supera lo permitido');
		}else{
			$.ajax({
				url: '?controller=product&method=save',
				method: 'POST',
				data: {
					codigo: codigo,
					producto: producto,
					stock: stock,
					valor_unidad: valor_unidad,
					valor_total: valor_total
				},
				success: function(result){
					if (result.indexOf('error')) {
						alert(result);
					}else if(result.indexOf('success')){
						alert(result);
						location.href = '?controller=product'
					}
				}
			});
		}
	});
});