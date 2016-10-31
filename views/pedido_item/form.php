
<!-- Page Heading -->
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	<div class="x_title">
		<h2 class="page-header"><?php echo $this->title; ?></h2>
		<div class="clearfix"></div>
		<ol class="breadcrumb">
			<li><a href="<?php echo URL; ?>">Home</a></li>
			<li><a href="<?php echo URL; ?>pedido_item">Listar Pedido_item</a></li>
			<li class="active"><?php echo $this->title; ?></li>
		</ol>
	</div>

<form id="form1" name="form1" method="post" action="<?php echo URL;?>pedido_item/<?php echo $this->action;?>/" class="form-horizontal">

<div class="row">

<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
<input type="hidden" name="idPedido_item" value="<?=$this->obj->getId_pedido_item()?>" />

<div class="form-group">
	<label for="id_pedido" class="col-md-2 col-sm-2 col-xs-12 control-label">Id_pedido</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
	<select name="id_pedido" id="id_pedido"  class="form-control col-md-7 col-xs-12" required="required">
		<option value=""></option>
	</select>
	</div>
</div>

<div class="form-group">
	<label for="quantidade" class="col-md-2 col-sm-2 col-xs-12 control-label">Quantidade</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="quantidade" id="quantidade"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getQuantidade()?>" />
	</div>
</div>

<div class="form-group">
	<label for="id_cardapio" class="col-md-2 col-sm-2 col-xs-12 control-label">Id_cardapio</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
	<select name="id_cardapio" id="id_cardapio"  class="form-control col-md-7 col-xs-12" required="required">
		<option value=""></option>
	</select>
	</div>
</div>

<div class="form-group">
	<div class="col-sm-10  col-sm-offset-2">
		<input type="submit" name="salvar" id="salvar" value="Salvar" class="btn btn-success" />
		<a href="<?php echo URL; ?>pedido_item" class="btn btn-primary">Cancelar</a>
	</div>
</div>


</div>
</div>

</form>
</div>
</div>
</div>
<!-- /.row -->