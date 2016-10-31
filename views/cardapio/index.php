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
					<li class="active"><a href="<?php echo URL;?>cardapio"><?php echo $this->title; ?></a></li>
				</ol>
			</div>
			<div class="col-lg-4 col-md-3">
			<form name="form-search" action="<?php echo URL;?>cardapio" method="post">
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
				<a href="<?php echo URL;?>cardapio/form" class="btn btn-dark">Cadastrar <?php echo $this->title; ?></a>
			</div>
		</div>
	</div>

<div class="x_content">

<?php if (isset($_GET["st"])) { $objAlert = new Alerta($_GET["st"]); } ?>

<table id="datatable-responsive" class="table table-striped" cellspacing="0" width="100%">
	<thead>
	<tr>
		<th>Cod </th>
		<th>Item </th>
		<th>Descricao </th>
		<th>Preco </th>
		<th>Status </th>
		<th>Promocao </th>
		<th>Categoria </th>
		<th></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach( $this->listarCardapio as $cardapio ) { ?>
	<tr>
 		<td><?php echo $cardapio->getId_cardapio(); ?></td>
		<td><?php echo $cardapio->getItem(); ?></td>
		<td><?php echo $cardapio->getDescricao(); ?></td>
		<td><?php echo Data::formataMoeda($cardapio->getPreco()); ?></td>
		<td>
			<?php
			if ($cardapio->getAtivo() == 1) {
				echo '<span class="label label-success">ATIVO</span>';
			} else {
				echo '<span class="label label-danger">INATIVO</span>';
			}
			?>
		</td>
		<td>
			<?php 
			if ($cardapio->getPromocao() == 1) {
				echo '<i class="fa fa-check">'; 
			}
			?>
		</td>
		<td><?php echo $cardapio->getCategoria()->getCategoria(); ?></td>
		<td align="right">
			<a href="<?php echo URL;?>cardapio/form/<?php echo $cardapio->getId_cardapio();?>" class="btn btn-dark btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
			<a href="<?php echo URL;?>cardapio/delete/<?php echo $cardapio->getId_cardapio();?>" class="delete btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></a>
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