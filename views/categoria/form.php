
<!-- Page Heading -->
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	<div class="x_title">
		<h2 class="page-header"><?php echo $this->title; ?></h2>
		<div class="clearfix"></div>
		<ol class="breadcrumb">
			<li><a href="<?php echo URL; ?>">Home</a></li>
			<li><a href="<?php echo URL; ?>categoria">Listar Categoria</a></li>
			<li class="active"><?php echo $this->title; ?></li>
		</ol>
	</div>

<form id="form1" name="form1" method="post" action="<?php echo URL;?>categoria/<?php echo $this->action;?>/" class="form-horizontal">

<div class="row">

<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
<input type="hidden" name="idCategoria" value="<?=$this->obj->getId_categoria()?>" />

<div class="form-group">
	<label for="categoria" class="col-md-2 col-sm-2 col-xs-12 control-label">Categoria</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="categoria" id="categoria"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getCategoria()?>" />
	</div>
</div>

<div class="form-group">
	<label for="id_tipo_categoria" class="col-md-2 col-sm-2 col-xs-12 control-label">Tipo Categoria</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
	<select name="id_tipo_categoria" id="id_tipo_categoria"  class="form-control col-md-7 col-xs-12" required="required">
		<?php
		foreach ($this->listaTipoCategoria as $tipoCategoria) {
			?>
			<option value="<?php echo $tipoCategoria->getId_tipo_categoria();?>"><?php echo $tipoCategoria->getTipo_categoria();?></option>
			<?php
		}
		?>
	</select>
	</div>
</div>

<div class="form-group">
	<div class="col-sm-10  col-sm-offset-2">
		<input type="submit" name="salvar" id="salvar" value="Salvar" class="btn btn-success" />
		<a href="<?php echo URL; ?>categoria" class="btn btn-primary">Cancelar</a>
	</div>
</div>


</div>
</div>

</form>
</div>
</div>
</div>
<!-- /.row -->