
<!-- Page Heading -->
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	<div class="x_title">
		<h2 class="page-header"><?php echo $this->title; ?></h2>
		<div class="clearfix"></div>
		<ol class="breadcrumb">
			<li><a href="<?php echo URL; ?>">Home</a></li>
			<li><a href="<?php echo URL; ?>cliente">Listar Cliente</a></li>
			<li class="active"><?php echo $this->title; ?></li>
		</ol>
	</div>

<form id="form1" name="form1" method="post" action="<?php echo URL;?>cliente/<?php echo $this->action;?>/" class="form-horizontal">

<div class="row">

<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
<input type="hidden" name="idCliente" value="<?=$this->obj->getId_cliente()?>" />

<div class="form-group">
	<label for="cliente" class="col-md-2 col-sm-2 col-xs-12 control-label">Cliente</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="cliente" id="cliente"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getCliente()?>" />
	</div>
</div>

<div class="form-group">
	<label for="telefone" class="col-md-2 col-sm-2 col-xs-12 control-label">Telefone</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="telefone" id="telefone"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getTelefone()?>" />
	</div>
</div>

<div class="form-group">
	<label for="celular" class="col-md-2 col-sm-2 col-xs-12 control-label">Celular</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="celular" id="celular"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getCelular()?>" />
	</div>
</div>

<div class="form-group">
	<label for="endereco" class="col-md-2 col-sm-2 col-xs-12 control-label">Endereco</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="endereco" id="endereco"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getEndereco()?>" />
	</div>
</div>

<div class="form-group">
	<label for="numero" class="col-md-2 col-sm-2 col-xs-12 control-label">Numero</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="numero" id="numero"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getNumero()?>" />
	</div>
</div>

<div class="form-group">
	<label for="bairro" class="col-md-2 col-sm-2 col-xs-12 control-label">Bairro</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="bairro" id="bairro"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getBairro()?>" />
	</div>
</div>

<div class="form-group">
	<label for="cidade" class="col-md-2 col-sm-2 col-xs-12 control-label">Cidade</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="cidade" id="cidade"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getCidade()?>" />
	</div>
</div>

<div class="form-group">
	<label for="estado" class="col-md-2 col-sm-2 col-xs-12 control-label">Estado</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="estado" id="estado"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getEstado()?>" />
	</div>
</div>

<div class="form-group">
	<label for="complemento" class="col-md-2 col-sm-2 col-xs-12 control-label">Complemento</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="complemento" id="complemento"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getComplemento()?>" />
	</div>
</div>

<div class="form-group">
	<label for="num_cep" class="col-md-2 col-sm-2 col-xs-12 control-label">Cep</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="num_cep" id="num_cep"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getNum_cep()?>" />
	</div>
</div>

<div class="form-group">
	<div class="col-sm-10  col-sm-offset-2">
		<input type="submit" name="salvar" id="salvar" value="Salvar" class="btn btn-success" />
		<a href="<?php echo URL; ?>cliente" class="btn btn-primary">Cancelar</a>
	</div>
</div>


</div>
</div>

</form>
</div>
</div>
</div>
<!-- /.row -->
<script src="<?php echo URL?>public/js/input_mask/jquery.maskedinput.js"></script>
<script>
	$(function() {
		$('#num_cep').mask("99999-999");
		$('#telefone').mask("(99) 9999-9999");
		$('#celular').mask("(99) 9999-9999?9").ready(function(event) {
			var target, phone, element;
			target = (event.currentTarget) ? event.currentTarget : event.srcElement;
			phone = target.value.replace(/\D/g, '');
			element = $(target);
			element.unmask();
			if(phone.length > 10) {
				element.mask("(99) 99999-999?9");
			} else {
				element.mask("(99) 9999-9999?9");
			}
		});
	})
</script>