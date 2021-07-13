<?php 

require 'Models/Product.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

/**
 * Controlador de productos
 */
class ProductController
{
	private $model;

	public function __construct()
	{
		$this->model = new Product;
	}

	public function index()
	{
		require 'Views/Layout.php';
		$products = $this->model->getAll();
		require 'Views/Products/list.php';
		require 'Views/Scripts.php';
	}

	public function new()
	{
		require 'Views/Layout.php';
		require 'Views/Products/new.php';
		require 'Views/Scripts.php';
	}

	public function save()
	{
		date_default_timezone_set('America/Bogota');
		$datesProducts = [
			'codigo'         => $_POST['codigo'],
			'producto'       => $_POST['producto'],
			'stock'          => $_POST['stock'],
			'valor_unidad'   => $_POST['valor_unidad'],
			'valor_total'    => $_POST['valor_total'],
			'fecha_registro' => date('Y-m-d h:i:s')
		];
		$result = [];
		$validateCode = $this->model->getAllCode($datesProducts['codigo']);
		if (!empty($validateCode)) {
			$result = [
				'error' => "El producto ya se encuentra en la base de datos: <br>Codigo del producto: ".$datesProducts['codigo']."<br>Nombre del producto: ".$datesProducts['producto']
			];

			echo json_encode($result);
			
		}else{
			$this->model->saveProduct($datesProducts);
			$result = [
				'success' => "Producto registrado correctamente"
			];
			echo json_encode($result);
		}	
	}

	public function edit()
	{
		if (isset($_REQUEST['id'])) {
			$id = $_REQUEST['id'];
			$data = $this->model->getById($id);
			require 'Views/Layout.php';
			require 'Views/Products/edit.php';
			require 'Views/Scripts.php';
		}
	}

	public function update()
	{
		if ($_POST['id']) {
			$this->model->updateProduct($_POST);
			header('Location: ?controller=product');
		}
	}

	public function delete()
	{
		if ($_GET['id']) {
			$id = $_GET['id'];
			$this->model->deleteProduct($id);
			header('Location: ?controller=product');
		}
	}

	public function pdf()
	{
		 $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);
		 $products = $this->model->getAll();
		 $total_stock = $this->model->getTotalStock();
		 $valor_total_inventario = $this->model->getTotalInventario();
		 $html = "<main>
		 	<table>
		 		<thead>
		 			<tr>
		 				<th scope='col'>Codigo</th>
		 				<th scope='col'>Nombre producto</th>
		 				<th scope='col'>Stock</th>
		 				<th scope='col'>Valor unitario</th>
		 				<th scope='col'>Valor total</th>
		 			</tr>
		 		</thead>
		 		<tbody>";
		 			foreach($products as $product){
		 				$html .= "<tr>";
		 				$html .= "<td>".$product->codigo."</td>";
		 				$html .= "<td>".$product->producto."</td>";
		 				$html .= "<td>".$product->stock."</td>";
		 				$html .= "<td>".$product->valor_unidad."</td>";
		 				$html .= "<td>".$product->valor_total."</td>";
		 				$html .= "</tr>";
		 			}	
		$html .= "</tbody>
		 	</table>
		 	<h1>Total stock: ".$total_stock[0]->stock."</h1><br>
		 	<h1>Valor total del inventario: ".$valor_total_inventario[0]->valor."</h1><br>
		 </main>";
		 $mpdf->WriteHTML($html);
		 $mpdf->Output();
	}

	public function excel()
	{
		$timestamp = time();
    	$filename = 'Productos_' . $timestamp . '.xls';
		header("Pragma: public");
	    header("Expires: 0");
	    header("Content-type: application/x-msdownload");
	    header("Content-Type: text/csv; charset-utf8");
	    header("Content-Disposition: attachment; filename=\"$filename\"");
	    header("Pragma: no-cache");
	    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

	    $isPrintHeader = false;
	    $products = $this->model->getAll();
	    $total_stock = $this->model->getTotalStock();
		 $valor_total_inventario = $this->model->getTotalInventario();
	    if (!$isPrintHeader) {
	    	$html = "<main>
		 	<table>
		 		<thead>
		 			<tr>
		 				<th scope='col'>id</th>
		 				<th scope='col'>Codigo</th>
		 				<th scope='col'>Nombre producto</th>
		 				<th scope='col'>Stock</th>
		 				<th scope='col'>Valor unitario</th>
		 				<th scope='col'>Valor total</th>
		 				<th scope='col'>Fecha registro</th>
		 			</tr>
		 		</thead>
		 		<tbody>";
		 			foreach($products as $product){
		 				$html .= "<tr>";
		 				$html .= "<td>".$product->id."</td>";
		 				$html .= "<td>".$product->codigo."</td>";
		 				$html .= "<td>".$product->producto."</td>";
		 				$html .= "<td>".$product->stock."</td>";
		 				$html .= "<td>".$product->valor_unidad."</td>";
		 				$html .= "<td>".$product->valor_total."</td>";
		 				$html .= "<td>".$product->fecha_registro."</td>";
		 				$html .= "</tr>";
			 			}	
			$html .= "</tbody>
			 	</table>
			 	<h1>Total stock: ".$total_stock[0]->stock."</h1><br>
			 	<h1>Valor total del inventario: ".$valor_total_inventario[0]->valor."</h1><br>
			 </main>";
			echo $html;
			$isPrintHeader = true; 
	    }
	    exit();
	}
}