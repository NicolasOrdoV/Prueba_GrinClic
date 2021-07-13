<main class="container">
	<section class="row m-auto">
		<h1>Lista de productos</h1>
		<div class="col-lg-12 m-2 d-flex justify-content-between">
			<h2>Productos</h2>
			<a href="?controller=product&method=excel" class="btn btn-info">Generar excel</a>
			<a href="?controller=product&method=pdf" class="btn btn-danger" target="_blank">Generar inventario</a>
			<a href="?controller=product&method=new" class="btn btn-success">+Agregar</a>
		</div>
		<section class="col-lg-12">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th scope="col">Codigo</th>
						<th scope="col">Nombre Producto</th>
						<th scope="col">Stock</th>
						<th scope="col">Valor unidad</th>
						<th scope="col">Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($products as $product){ ?>
						<tr>
							<td><?php echo $product->codigo ?></td>
							<td><?php echo $product->producto ?></td>
							<td><?php echo $product->stock ?></td>
							<td><?php echo $product->valor_unidad ?></td>
							<td>
								<a href="?controller=product&method=edit&id=<?php echo $product->id?>" class="btn btn-warning">Editar</a>
								<a href="?controller=product&method=delete&id=<?php echo $product->id?>" class="btn btn-danger" onclick="return confirm('¿Quieres eliminar este producto?')">Eliminar</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</section>
	</section>
</main>