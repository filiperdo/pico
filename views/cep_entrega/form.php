
<!-- Page Heading -->
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	<div class="x_title">
		<h2 class="page-header"><?php echo $this->title; ?></h2>
		<div class="clearfix"></div>
		<ol class="breadcrumb">
			<li><a href="<?php echo URL; ?>">Home</a></li>
			<li><a href="<?php echo URL; ?>cep_entrega">Listar Cep_entrega</a></li>
			<li class="active"><?php echo $this->title; ?></li>
		</ol>
	</div>

<form id="form1" name="form1" method="post" action="<?php echo URL;?>cep_entrega/<?php echo $this->action;?>/" class="form-horizontal">

<div class="row">

<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
<input type="hidden" name="idCep_entrega" value="<?=$this->obj->getId_cep_entrega()?>" />

<div class="form-group">
	<label for="cep" class="col-md-2 col-sm-2 col-xs-12 control-label">Cep</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="cep" id="cep"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getCep()?>" />
	</div>
</div>

<div class="form-group">
	<div class="col-sm-10  col-sm-offset-2">
		<input type="submit" name="salvar" id="salvar" value="Salvar" class="btn btn-success" />
		<a href="<?php echo URL; ?>cep_entrega" class="btn btn-primary">Cancelar</a>
	</div>
</div>


</div>
</div>

</form>
</div>
</div>
</div>
<script src="<?php echo URL?>public/js/input_mask/jquery.inputmask.js"></script>
<script>
	$(function() {
		$('#cep').inputmask("99999-999");
	})
</script>
<!-- /.row -->