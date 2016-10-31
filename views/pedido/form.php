
<!-- Page Heading -->
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	<div class="x_title">
		<h2 class="page-header"><?php echo $this->title; ?></h2>
		<div class="clearfix"></div>
		<ol class="breadcrumb">
			<li><a href="<?php echo URL; ?>">Home</a></li>
			<li><a href="<?php echo URL; ?>pedido">Listar Pedido</a></li>
			<li class="active"><?php echo $this->title; ?></li>
		</ol>
	</div>

<form id="form1" name="form1" method="post" action="<?php echo URL;?>pedido/<?php echo $this->action;?>/" class="form-horizontal">

<div class="row">

<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
<input type="hidden" name="idPedido" value="<?=$this->obj->getId_pedido()?>" />

<div class="form-group">
	<label for="id_forma_pagamento" class="col-md-2 col-sm-2 col-xs-12 control-label">Id_forma_pagamento</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
	<select name="id_forma_pagamento" id="id_forma_pagamento"  class="form-control col-md-7 col-xs-12" required="required">
		<option value=""></option>
	</select>
	</div>
</div>

<div class="form-group">
	<label for="id_cliente" class="col-md-2 col-sm-2 col-xs-12 control-label">Id_cliente</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
	<select name="id_cliente" id="id_cliente"  class="form-control col-md-7 col-xs-12" required="required">
		<option value=""></option>
	</select>
	</div>
</div>

<div class="form-group">
	<label for="data_pedido" class="col-md-2 col-sm-2 col-xs-12 control-label">Data_pedido</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="data_pedido" id="data_pedido"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getData_pedido()?>" />
	</div>
</div>

<div class="form-group">
	<label for="observacao" class="col-md-2 col-sm-2 col-xs-12 control-label">Observacao</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="observacao" id="observacao"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getObservacao()?>" />
	</div>
</div>

<div class="form-group">
	<label for="total" class="col-md-2 col-sm-2 col-xs-12 control-label">Total</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="total" id="total"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getTotal()?>" />
	</div>
</div>

<div class="form-group">
	<label for="id_status_pedido" class="col-md-2 col-sm-2 col-xs-12 control-label">Id_status_pedido</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
	<select name="id_status_pedido" id="id_status_pedido"  class="form-control col-md-7 col-xs-12" required="required">
		<option value=""></option>
	</select>
	</div>
</div>

<div class="form-group">
	<div class="col-sm-10  col-sm-offset-2">
		<input type="submit" name="salvar" id="salvar" value="Salvar" class="btn btn-success" />
		<a href="<?php echo URL; ?>pedido" class="btn btn-primary">Cancelar</a>
	</div>
</div>


</div>
</div>

</form>
</div>
</div>
</div>
<!-- /.row -->