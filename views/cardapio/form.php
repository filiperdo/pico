<!-- Styles -->
<link href="<?php echo URL?>util/jqueryfiler/css/jquery.filer.css" rel="stylesheet">
<link href="<?php echo URL?>util/jqueryfiler/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet">

<!-- Jvascript -->
<script src="<?php echo URL?>util/jqueryfiler/js/jquery.filer.min.js" type="text/javascript"></script>
<script src="<?php echo URL?>util/jqueryfiler/js/custom.js" type="text/javascript"></script>

<!-- Page Heading -->
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	<div class="x_title">
		<h2 class="page-header"><?php echo $this->title; ?></h2>
		<div class="clearfix"></div>
		<ol class="breadcrumb">
			<li><a href="<?php echo URL; ?>">Home</a></li>
			<li><a href="<?php echo URL; ?>cardapio">Listar Cardapio</a></li>
			<li class="active"><?php echo $this->title; ?></li>
		</ol>
	</div>



<div class="row">

<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
<form id="form1" name="form1" method="post" action="<?php echo URL;?>cardapio/<?php echo $this->action;?>/" class="form-horizontal">
<input type="hidden" name="idCardapio" value="<?=$this->obj->getId_cardapio()?>" />

<div class="form-group">
	<label for="item" class="col-md-2 col-sm-2 col-xs-12 control-label">Item</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="item" id="item"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getItem()?>" />
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
	<label for="promocao" class="col-md-2 col-sm-2 col-xs-12 control-label">Promocao</label> 
	<div class="col-md-9 col-sm-9 col-xs-12">
		<div class="checkbox">
          <label class="">
            <div class="icheckbox_flat-green checked" style="position: relative;">
            <input type="checkbox" name="promocao" id="promocao" class="flat" <?=$this->obj->getPromocao() == 1 ? 'checked="checked"': ''?> style="position: absolute; opacity: 0;" value="1">
            <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
          </label>
        </div>
	</div>
</div>

<div class="form-group">
	<label for="imagem" class="col-md-2 col-sm-2 col-xs-12 control-label">Imagem</label> 
	<div class="col-md-9 col-sm-9 col-xs-12"> 
		<input type="text" name="imagem" id="imagem"  class="form-control col-md-7 col-xs-12" value="<?=$this->obj->getImagem()?>" />
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
		<a href="<?php echo URL; ?>cardapio" class="btn btn-primary">Cancelar</a>
	</div>
</div>

</form>
</div>

<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
				
	<!-- debug <form name="form5" action="http://localhost/picolan/cardapio/wideimage_ajax/" method="post" enctype="multipart/form-data" >
		<input type="file" name="files[]"  multiple="multiple" >
		<input type="submit">
	</form> -->
	 
	<input type="hidden" name="action_post" id="action_post" value="<?php echo $this->method_upload; ?>">
	<input type="file" name="files[]" id="filer_input2" multiple="multiple">

	<div id="output-files">
	<ul class="jFiler-items-list jFiler-items-grid" style="padding: 0">
	
		<?php if( $this->path != '' ) { ?>
		<?php foreach ( Data::getImgPost( 'cardapio/' . $this->path, true ) as $img ) { ?>
		<li class="jFiler-item">
			<div class="jFiler-item-container">
				<div class="jFiler-item-inner">
					<div class="jFiler-item-thumb"><img alt="" src="<?=URL.$img?>" ></div>
					<div class="jFiler-item-assets jFiler-row">
						
						<ul class="list-inline pull-right">
							<?php $link_img = str_replace('/thumb/', '/', $img);?>
							<li>
								<button class="bt-copy btn btn-info btn-xs" data-clipboard-action="copy" data-clipboard-text="<?='../../'.$link_img?>"><i class="glyphicon glyphicon-link"></i></button>
								<a href="<?php echo URL?>cardapio/delete_img/<?php echo base64_encode($img);?>"  class="btn btn-danger btn-xs"><i class="icon-jfi-trash jFiler-item-trash-action"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</li>
		<?php } // end foreach?>
		<?php } // end if ?>
	</ul>
	</div>

</div><!-- col-md-4 -->

</div>


</div>
</div>
</div>
<!-- /.row -->
<script src="<?php echo URL?>public/js/input_mask/jquery.inputmask.js"></script>
<script src="<?php echo URL?>public/js/input_mask/jquery.maskMoney.min.js"></script>
<script>
  var clipboard = new Clipboard('.bt-copy');
  $(function() {
    $('#preco').maskMoney({prefix:'R$ ', thousands:'.', decimal:','});
  })
</script>
