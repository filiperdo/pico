<!-- Page Heading -->
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	<div class="x_title">
		<h2 class="page-header"><?php echo $this->title; ?></h2>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li class="active"><a href="<?php echo URL;?>cliente"><?php echo $this->title; ?></a></li>
				</ol>
			</div>
			<div class="col-lg-4 col-md-3">
			<form name="form-search" action="<?php echo URL;?>cliente" method="post">
				<div class="form-group input-group">
					<input type="text" class="form-control" required="required" name="like" id="busca">
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit">
								<i class="glyphicon glyphicon-search"></i>
						</button>
					</span>
				</div>
				</form>
			</div>
			<div class="col-lg-2 col-md-2">
				<a href="<?php echo URL;?>cliente/form" class="btn btn-dark">Cadastrar <?php echo $this->title; ?></a>
			</div>
		</div>
	</div>

<div class="x_content">

<?php if (isset($_GET["st"])) { $objAlert = new Alerta($_GET["st"]); } ?>

<table id="datatable-responsive" class="table table-striped" cellspacing="0" width="100%">
	<thead>
	<tr>
		<th>Id</th>
		<th>Cliente </th>
		<th>Telefone </th>
		<th>Celular </th>
		<th>Endere&ccedil;o </th>
		<th>N&uacute;mero </th>
		<th>Bairro </th>
		<th>Cidade </th>
		<th>Estado </th>
		<th>Complemento </th>
		<th>CEP </th>
		<th></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach( $this->listarCliente as $cliente ) { ?>
	<tr>
 		<td><?php echo $cliente->getId_cliente(); ?></td>
		<td><?php echo $cliente->getCliente(); ?></td>
		<td><?php echo $cliente->getTelefone(); ?></td>
		<td><?php echo $cliente->getCelular(); ?></td>
		<td><?php echo $cliente->getEndereco(); ?></td>
		<td><?php echo $cliente->getNumero(); ?></td>
		<td><?php echo $cliente->getBairro(); ?></td>
		<td><?php echo $cliente->getCidade(); ?></td>
		<td><?php echo $cliente->getEstado(); ?></td>
		<td><?php echo $cliente->getComplemento(); ?></td>
		<td><?php echo $cliente->getNum_cep(); ?></td>
		<td align="right">
			<a href="<?php echo URL;?>cliente/form/<?php echo $cliente->getId_cliente();?>" class="btn btn-dark btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
			<a href="<?php echo URL;?>cliente/delete/<?php echo $cliente->getId_cliente();?>" class="delete btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></a>
		</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
</div>
</div>
</div>
</div>

<script>
$(function() {
	$(".delete").click(function(e) {
		var c = confirm("Deseja realmente deletar este registro?");
		if (c == false) return false;
	}); 
 });
</script>