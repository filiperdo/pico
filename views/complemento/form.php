
<!-- Page Heading -->
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	<div class="x_title">
		<h2 class="page-header"><?php echo $this->title; ?></h2>
		<div class="clearfix"></div>
		<ol class="breadcrumb">
			<li><a href="<?php echo URL; ?>">Home</a></li>
			<li><a href="<?php echo URL; ?>complemento">Listar Complemento</a></li>
			<li class="active"><?php echo $this->title; ?></li>
		</ol>
	</div>

<form id="form1" name="form1" method="post" action="<?php echo URL;?>complemento/<?php echo $this->action;?>/" class="form-horizontal">

<div class="row">

<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
<input type="hidden" name="idComplemento" value="<?=$this->obj->getId_complemento()?>" />

<div class="form-group">
	<label for="complemento" class="col-md-2 col-sm-2 col-xs-12 control-label">Complemento</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="complemento" id="complemento"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getComplemento()?>" />
	</div>
</div>

<div class="form-group">
	<label for="descricao" class="col-md-2 col-sm-2 col-xs-12 control-label">Descricao</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="descricao" id="descricao"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getDescricao()?>" />
	</div>
</div>

<div class="form-group">
	<label for="preco" class="col-md-2 col-sm-2 col-xs-12 control-label">Preco</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="preco" id="preco"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getPreco()?>" />
	</div>
</div>

<div class="form-group">
	<label for="ativo" class="col-md-2 col-sm-2 col-xs-12 control-label">Ativo</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<div class="checkbox">
          <label class="">
            <div class="icheckbox_flat-green checked" style="position: relative;">
            <input type="checkbox" name="ativo" id="ativo" class="flat" <?=$this->obj->getAtivo() == 1 ? 'checked="checked"': ''?> 
            	style="position: absolute; opacity: 0;" value="1">
            <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
          </label>
        </div>
	</div>
</div>

<div class="form-group">
	<label for="id_categoria" class="col-md-2 col-sm-2 col-xs-12 control-label">Categoria</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
	<select name="id_categoria" id="id_categoria"  class="form-control col-md-7 col-xs-12" required="required">
		<option value=""></option>
		<?php
		foreach ($this->listaCategoria as $categoria) {
			?>
			<option value="<?php echo $categoria->getId_categoria();?>"
				<?php echo ($this->obj->getCategoria()->getId_categoria() == $categoria->getId_categoria()) ? 'selected':'';?>>
				<?php echo $categoria->getCategoria();?>
			</option>
			<?php
		}
		?>
	</select>
	</div>
</div>

<div class="form-group">
	<div class="col-sm-10  col-sm-offset-2">
		<input type="submit" name="salvar" id="salvar" value="Salvar" class="btn btn-success" />
		<a href="<?php echo URL; ?>complemento" class="btn btn-primary">Cancelar</a>
	</div>
</div>


</div>
</div>

</form>
</div>
</div>
</div>
<!-- /.row -->
<script src="<?php echo URL?>public/js/input_mask/jquery.inputmask.js"></script>
<script src="<?php echo URL?>public/js/input_mask/jquery.maskMoney.min.js"></script>
<script>
  $(function() {
    $('#preco').maskMoney({prefix:'R$ ', thousands:'.', decimal:','});
  })
</script>