<main class="container">
	<section class="row mt-5">
		<div class="card m-100 m-auto w-100">
			<div class="card-header justify-content-center">
				<a href="?controller=product" class="btn btn-danger">Volver</a>
				<h1>Registro de productos</h1>
			</div>
			<div class="card-body w-100">
				<!---Para validar el ingreso del producto, no se puede pasar directamente los datos al controlador, para esto hay que usar AJAX---->
				<!-- <form> -->
					<div class="row">
						<div class="col-lg-6 form-group">
							<label>Codigo del producto</label>
							<input type="number" name="codigo" id="codigo" class="form-control" placeholder="Ingrese codigo del producto">
						</div>
						<div class="col-lg-6 form-group">
							<label>Nombre del producto</label>
							<input type="text" name="producto" id="producto" class="form-control" placeholder="Ingrese el nombre del producto">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 form-group">
							<label>Valor unitario</label>
							$<input type="number" name="valor_unidad" id="valor_unidad" class="form-control" placeholder="Ingrese el valor unitario del producto">
						</div>
						<div class="col-lg-4 form-group">
							<label>Cantidad del producto</label>
							<input type="number" name="stock" id="stock" class="form-control" placeholder="Ingrese cantidad del producto">
						</div>
						<div class="col-lg-4 form-group">
							<label>Valor total</label>
							<input type="number" name="valor_total" id="valor_total" class="form-control" readonly>
						</div>
					</div>
					<div class="form-group">
						<button type="button" class="btn btn-success" id="guardar">Guardar</button>
					</div>
				<!-- </form> -->
			</div>
		</div>
	</section>
</main>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
<script type="text/javascript">
	$('#stock').change(function(){
		var valor_unidad = $('#valor_unidad').val();
		var stock = $('#stock').val();
		var valor_total = stock * valor_unidad;
		$('#valor_total').val(valor_total);
	});
</script>
