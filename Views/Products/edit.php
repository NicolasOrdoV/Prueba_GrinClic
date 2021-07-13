<main class="container">
	<section class="row mt-5">
		<div class="card m-100 m-auto w-100">
			<div class="card-header justify-content-center">
				<a href="?controller=product" class="btn btn-danger">Volver</a>
				<h1>Registro de productos</h1>
			</div>
			<div class="card-body w-100">
				<form action="?controller=product&method=update" method="POST">
					<input type="hidden" name="id" value="<?php echo $data[0]->id?>">
					<div class="row">
						<div class="col-lg-6 form-group">
							<label>Codigo del producto</label>
							<input type="number" name="codigo" id="codigo" class="form-control" placeholder="Ingrese codigo del producto" value="<?php echo $data[0]->codigo?>">
						</div>
						<div class="col-lg-6 form-group">
							<label>Nombre del producto</label>
							<input type="text" name="producto" id="producto" class="form-control" placeholder="Ingrese el nombre del producto" value="<?php echo $data[0]->producto?>">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 form-group">
							<label>Cantidad del producto</label>
							<input type="number" name="stock" id="stock" class="form-control" placeholder="Ingrese cantidad del producto" value="<?php echo $data[0]->stock?>">
						</div>
						<div class="col-lg-4 form-group">
							<label>Valor unitario</label>
							<input type="number" name="valor_unidad" id="valor_unidad" class="form-control" placeholder="Ingrese el valor unitario del producto" value="<?php echo $data[0]->valor_unidad?>">
						</div>
						<div class="col-lg-4 form-group">
							<label>Valor total</label>
							<input type="number" name="valor_total" id="valor_total" class="form-control" value="<?php echo $data[0]->valor_total?>">
						</div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-warning">Actualizar</button>
					</div>
				</form>
			</div>
		</div>
	</section>
</main>
