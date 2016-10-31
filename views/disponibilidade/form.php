
<!-- Page Heading -->
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	<div class="x_title">
		<h2 class="page-header"><?php echo $this->title; ?></h2>
		<div class="clearfix"></div>
		<ol class="breadcrumb">
			<li><a href="<?php echo URL; ?>">Home</a></li>
			<li><a href="<?php echo URL; ?>disponibilidade">Listar Disponibilidade</a></li>
			<li class="active"><?php echo $this->title; ?></li>
		</ol>
	</div>

<form id="form1" name="form1" method="post" action="<?php echo URL;?>disponibilidade/<?php echo $this->action;?>/" class="form-horizontal">

<div class="row">

<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
<input type="hidden" name="idDisponibilidade" value="<?=$this->obj->getId_disponibilidade()?>" />

<div class="form-group">
	<label for="segunda" class="col-md-2 col-sm-2 col-xs-12 control-label">Segunda</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="segunda" id="segunda"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getSegunda()?>" />
	</div>
</div>

<div class="form-group">
	<label for="terca" class="col-md-2 col-sm-2 col-xs-12 control-label">Terca</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="terca" id="terca"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getTerca()?>" />
	</div>
</div>

<div class="form-group">
	<label for="quarta" class="col-md-2 col-sm-2 col-xs-12 control-label">Quarta</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="quarta" id="quarta"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getQuarta()?>" />
	</div>
</div>

<div class="form-group">
	<label for="quinta" class="col-md-2 col-sm-2 col-xs-12 control-label">Quinta</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="quinta" id="quinta"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getQuinta()?>" />
	</div>
</div>

<div class="form-group">
	<label for="sexta" class="col-md-2 col-sm-2 col-xs-12 control-label">Sexta</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="sexta" id="sexta"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getSexta()?>" />
	</div>
</div>

<div class="form-group">
	<label for="sabado" class="col-md-2 col-sm-2 col-xs-12 control-label">Sabado</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="sabado" id="sabado"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getSabado()?>" />
	</div>
</div>

<div class="form-group">
	<label for="domingo" class="col-md-2 col-sm-2 col-xs-12 control-label">Domingo</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="domingo" id="domingo"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getDomingo()?>" />
	</div>
</div>

<div class="form-group">
	<label for="hora_inicio1" class="col-md-2 col-sm-2 col-xs-12 control-label">Hora_inicio1</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="hora_inicio1" id="hora_inicio1"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getHora_inicio1()?>" />
	</div>
</div>

<div class="form-group">
	<label for="hora_fim1" class="col-md-2 col-sm-2 col-xs-12 control-label">Hora_fim1</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="hora_fim1" id="hora_fim1"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getHora_fim1()?>" />
	</div>
</div>

<div class="form-group">
	<label for="hora_inicio2" class="col-md-2 col-sm-2 col-xs-12 control-label">Hora_inicio2</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="hora_inicio2" id="hora_inicio2"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getHora_inicio2()?>" />
	</div>
</div>

<div class="form-group">
	<label for="hora_fim2" class="col-md-2 col-sm-2 col-xs-12 control-label">Hora_fim2</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="hora_fim2" id="hora_fim2"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getHora_fim2()?>" />
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
		<a href="<?php echo URL; ?>disponibilidade" class="btn btn-primary">Cancelar</a>
	</div>
</div>


</div>
</div>

</form>
</div>
</div>
</div>
<!-- /.row -->