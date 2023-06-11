<?php
include_once('config.php');

$sql_total= "SELECT COUNT(*) AS total_registros FROM clientes_cadastrados ORDER BY id";
$result_total= $conn->query($sql_total) ;
$total_registros = 0;
if ($result_total && $result_total->num_rows > 0) {
    $registro_total = $result_total->fetch_assoc();
    $total_registros = $registro_total['total_registros'];
}

$sql_dados = "SELECT * FROM clientes_cadastrados ORDER BY id";
$result_dados = $conn->query($sql_dados)

?>
<!doctype html>
<html lang="pt-br">
  <head>
  	<title>Sidebar 01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="arquivos_exportados3/https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="arquivos_exportados3/css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(arquivos_exportados3/images/logo.png);"></a>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
	            

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
    
              </ul>
            </div>
          </div>
        </nav>

        <h2 class="mb-4">Total de Registros: <?php echo $total_registros;?></h2>
    
        <section  id=" tabela" class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Clientes Registrados</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-dark">
							
								<tr>
									<th>Id</th>
									<th>Email</th>
									<th>Nome</th>
									<th>WhatsApp</th>
									<th>Endereço</th>
									<th>Marca</th>
									<th>Modelo</th>
									<th>Ano</th>
									<th>Data de Envio</th>

				
								</tr>
						
						  </thead>
						  <tbody>
                			<?php
							while($registro= mysqli_fetch_assoc($result_dados)){
								$data_formatada = date("d/m/Y H:i:s", strtotime($registro['data_registro']));
								echo "<tr>";
								echo "<td>".$registro['id']."</td>";
								echo "<td>".$registro['email']."</td>";
								echo "<td>".$registro['nome']."</td>";
								echo "<td>".$registro['wpp']."</td>";
								echo "<td>".$registro['endereco']."</td>";
								echo "<td>".$registro['marca']."</td>";
								echo "<td>".$registro['modelo']."</td>";
								echo "<td>".$registro['ano']."</td>";
								echo "<td>".$data_formatada."</td>";

							}
							?>
            </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="arquivos_exportados2/js/jquery.min.js"></script>
  <script src="arquivos_exportados2/js/popper.js"></script>
  <script src="arquivos_exportados2/js/bootstrap.min.js"></script>
  <script src="arquivos_exportados2/js/main.js"></script>      </div>
		</div>

    <script src="arquivosexportados3/js/jquery.min.js"></script>
    <script src="arquivosexportados3/js/popper.js"></script>
    <script src="arquivosexportados3/js/bootstrap.min.js"></script>
    <script src="arquivosexportados3/js/main.js"></script>
  </body>
</html>