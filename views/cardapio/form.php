<!-- Styles -->
<link href="<?php echo URL?>util/jqueryfiler/css/jquery.filer.css" rel="stylesheet">
<link href="<?php echo URL?>util/jqueryfiler/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet">
<link href="<?php echo URL?>public/js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

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
<div id="wizard" class="form_wizard wizard_horizontal">
<ul class="wizard_steps">
  <li>
	<a href="#step-1">
	  <span class="step_no">1</span>
	  <span class="step_descr">Detalhes do Cardápio</span>
	</a>
  </li>
  <li>
	<a href="#step-2">
	  <span class="step_no">2</span>
	  <span class="step_descr">Complementos</span>
	</a>
  </li>
  <li>
	<a href="#step-3">
	  <span class="step_no">3</span>
	  <span class="step_descr">Disponibilidade</span>
	</a>
  </li>
</ul>

<div id="step-1">

<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">

<form id="form-item" name="form1" method="post" action="<?php echo URL;?>cardapio/<?php echo $this->action;?>/"
	data-parsley-validate class="form-horizontal">
<input type="hidden" name="idCardapio" value="<?=$this->obj->getId_cardapio()?>" />

<div class="form-group">
	<label for="item" class="col-md-2 col-sm-2 col-xs-12 control-label">Item</label>
	<div class="col-md-9 col-sm-9 col-xs-12">
		<input type="text" name="item" id="item"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getItem()?>" />
	</div>
</div>

<div class="form-group">
	<label for="descricao" class="col-md-2 col-sm-2 col-xs-12 control-label">Descrição</label>
	<div class="col-md-9 col-sm-9 col-xs-12">
		<input type="text" name="descricao" id="descricao"  class="form-control col-md-7 col-xs-12" required="required" value="<?=$this->obj->getDescricao()?>" />
	</div>
</div>

<div class="form-group">
	<label for="preco" class="col-md-2 col-sm-2 col-xs-12 control-label">Preço</label>
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
<!--
<div class="form-group">
	<label for="imagem" class="col-md-2 col-sm-2 col-xs-12 control-label">Imagem</label>
	<div class="col-md-9 col-sm-9 col-xs-12">
		<input type="text" name="imagem" id="imagem"  class="form-control col-md-7 col-xs-12" value="<?=$this->obj->getImagem()?>" />
	</div>
</div>
-->
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
<!--
<div class="form-group">
	<div class="col-sm-10  col-sm-offset-2">
		<input type="submit" name="salvar" id="salvar" value="Salvar" class="btn btn-success" />
		<a href="<?php echo URL; ?>cardapio" class="btn btn-primary">Cancelar</a>
	</div>
</div>
-->
</div>
</form>

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
								<button class="bt-copy btn btn-info btn-xs"
									data-clipboard-action="copy"
									data-clipboard-text="<?='../../'.$link_img?>">
									<i class="glyphicon glyphicon-link"></i>
								</button>
								<a href="<?php echo URL?>cardapio/delete_img/<?php echo base64_encode($img);?>"
									class="btn btn-danger btn-xs">
									<i class="icon-jfi-trash jFiler-item-trash-action"></i>
								</a>
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
</div><!-- step-1 -->
<div id="step-2">
	<div class="row">
		<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
			<div class="modal-content">

			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Complementos</h4>
			  </div>
			  <div class="modal-body">
				  <table id="datatable-responsive" class="table table-striped" cellspacing="0" width="100%">
					<thead>
					<tr>
						<th>Complemento </th>
						<th>Descrição </th>
						<th>Preço </th>
						<th>Categoria </th>
						<th></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach( $this->listarComplemento as $complemento ) { ?>
					<tr>
						<td><?php echo $complemento->getComplemento(); ?></td>
						<td><?php echo $complemento->getDescricao(); ?></td>
						<td><?php echo Data::formataMoeda($complemento->getPreco()); ?></td>
						<td><?php echo $complemento->getCategoria()->getCategoria(); ?></td>
						<td align="right">
							<a  class="btn btn-dark btn-sm" style="cursor: pointer;"
								onclick="addDataSet([
									<?php echo $complemento->getId_complemento(); ?>,
									'<?php echo $complemento->getComplemento(); ?>',
									'<?php echo $complemento->getDescricao(); ?>',
									'<?php echo Data::formataMoeda($complemento->getPreco()); ?>',
									'<?php echo $complemento->getCategoria()->getCategoria(); ?>',
									'Remover'
								])">
								<i class="glyphicon glyphicon-plus"></i>
							</a>
						</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			  </div>
			  <div class="modal-footer">
				  <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			  </div>

			</div>
		  </div>
		</div>
	</div>
	<!-- Large modal -->
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">
		<i class="fa fa-plus"></i>
		Adicionar
	</button>
	<br />
	<table id="datatable-complemento" class="table table-striped" cellspacing="0" width="100%">
		<thead>
		<tr>
			<th>Cod </th>
			<th>Complemento </th>
			<th>Descrição </th>
			<th>Preço </th>
			<th>Categoria </th>
			<th></th>
		</tr>
		</thead>
		<tbody></tbody>
	</table>
</div><!-- step-2 -->
<div id="step-3">
	<div class="row">
		<div class="col-md-12 text-center">
			<h4>Dias em que o item estará disponível</h4>
			<br  />
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center">
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">Segunda</th>
						<th class="text-center">Terça</th>
						<th class="text-center">Quarta</th>
						<th class="text-center">Quinta</th>
						<th class="text-center">Sexta</th>
						<th class="text-center">Sábado</th>
						<th class="text-center">Domingo</th>
					</tr>
				</thead>
				<tbody>
					<td>
						<input type="checkbox" name="segunda" id="segunda" value="1" checked  />
					</td>
					<td>
						<input type="checkbox" name="terca" id="terca" value="1" checked />
					</td>
					<td>
						<input type="checkbox" name="quarta" id="quarta" value="1" checked />
					</td>
					<td>
						<input type="checkbox" name="quinta" id="quinta" value="1" checked />
					</td>
					<td>
						<input type="checkbox" name="sexta" id="sexta" value="1" checked />
					</td>
					<td>
						<input type="checkbox" name="sabado" id="sabado" value="1" checked />
					</td>
					<td>
						<input type="checkbox" name="domingo" id="domingo" value="1" checked />
					</td>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<table class="table">
			<thead>
				<tr>
					<th>Horário em que o item estara disponível</th>
					<th>
						Período 1<br  />
						Inicio
					</th>
					<th>Fim</th>
					<th>
						Período 2<br  />
						Inicio
					</th>
					<th>Fim</th>
				</tr>
			</thead>
			<tbody>
				<td>
					<select id="hrDisponivel">
						<option>Sempre Disponível</option>
					</select>
				</td>
				<td>
					<select id="hrInicio1">
						<?php
						for ($i = 0; $i < 24;$i++) {
							echo '<option value="'.str_pad($i, 2, "0", STR_PAD_LEFT).':00">'
								.str_pad($i, 2, "0", STR_PAD_LEFT) . ':00</option>';
						}
						?>
					</select>
				</td>
				<td>
					<select id="hrFim1">
						<?php
						for ($i = 0; $i < 24;$i++) {
							echo '<option value="'.str_pad($i, 2, "0", STR_PAD_LEFT).':00">'
								.str_pad($i, 2, "0", STR_PAD_LEFT) . ':00</option>';
						}
						?>
					</select>
				</td>
				<td>
					<select id="hrInicio2">
						<?php
						for ($i = 0; $i < 24;$i++) {
							echo '<option value="'.str_pad($i, 2, "0", STR_PAD_LEFT).':00">'
								.str_pad($i, 2, "0", STR_PAD_LEFT) . ':00</option>';
						}
						?>
					</select>
				</td>
				<td>
					<select id="hrFim2">
						<?php
						for ($i = 0; $i < 24;$i++) {
							echo '<option value="'.str_pad($i, 2, "0", STR_PAD_LEFT).':00">'
								.str_pad($i, 2, "0", STR_PAD_LEFT) . ':00</option>';
						}
						?>
					</select>
				</td>
			</tbody>
		</table>
	</div>
</div><!-- step-3 -->
</div><!-- form wizard -->
</div><!-- row -->


</div>
</div>
</div>
<!-- /.row -->

<div class="modal fade in" id="myModal" role="dialog">
	<div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          <p>Aguarge...</p>
        </div>
      </div>
    </div>
</div>
<!-- bootstrap progress js -->
<script src="<?php echo URL?>public/js/progressbar/bootstrap-progressbar.min.js"></script>
<script src="<?php echo URL?>public/js/nicescroll/jquery.nicescroll.min.js"></script>
<!-- icheck -->
<script src="<?php echo URL?>public/js/icheck/icheck.min.js"></script>

<script src="<?php echo URL?>public/js/custom.js"></script>
<!-- form wizard -->
<script type="text/javascript" src="<?php echo URL?>public/js/wizard/jquery.smartWizard.js"></script>
<!-- pace -->
<script src="<?php echo URL?>public/js/pace/pace.min.js"></script>
<script src="<?php echo URL?>public/js/input_mask/jquery.inputmask.js"></script>
<script src="<?php echo URL?>public/js/input_mask/jquery.maskMoney.min.js"></script>
<!-- form validation -->
<script src="<?php echo URL?>public/js/parsley/parsley.min.js"></script>
<!-- DataTable-->
<script src="<?php echo URL?>public/js/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	var table;
	var complementos = [];

	function addDataSet(obj) {
		complementos.push(obj);
		table.row.add(obj).draw();
	}

	$('#datatable-complemento tbody').on( 'click', 'button', function () {
		var data = table.row( $(this).parents('tr') ).data();
		for (var i = 0; i < complementos.length; i++) {
			if (complementos[i][0] == data[0]) {
				complementos.splice(i, 1);
			}
		}
		table
			.row( $(this).parents('tr') )
			.remove()
			.draw();
	} );

	$(document).ready(function() {
		// Smart Wizard
		$('#wizard').smartWizard({
			labelNext: 'Próximo',
			labelPrevious: 'Anterior',
			labelFinish: 'Finalizar',
			onFinish:onFinishCallback,
			onLeaveStep: onLeaveStepCallback

		});

		function onLeaveStepCallback(obj, context) {
			if (context.fromStep == 1) {
				var validate = $('#form-item').parsley().validate();
				console.log("Forma valido: " + validate);
		  	  	validateFront();
				return validate;
			} else {
				return true;
			}
		}

		function onFinishCallback() {
			$('#myModal').modal('show');
			var objPost = {
				item: $("#item").val(),
				descricao: $("#descricao").val(),
				preco: $("#preco").val(),
				ativo: $("#ativo").is(":checked") ? 1 : 0,
				promocao: $("#promocao").is(":checked") ? 1 : 0,
				id_categoria: $("#id_categoria").val(),
				imagem: "",
				complementos: complementos,
				hrInicio1: $("#hrInicio1").val(),
				hrFim1: $("#hrFim1").val(),
				hrInicio2: $("#hrInicio2").val(),
				hrFim2: $("#hrFim2").val(),
				segunda: $("#segunda").is(":checked") ? 1 : 0,
				terca: $("#terca").is(":checked") ? 1 : 0,
				quarta: $("#quarta").is(":checked") ? 1 : 0,
				quinta: $("#quinta").is(":checked") ? 1 : 0,
				sexta: $("#sexta").is(":checked") ? 1 : 0,
				sabado: $("#sabado").is(":checked") ? 1 : 0,
				domingo: $("#domingo").is(":checked") ? 1 : 0
			};
			console.log("Objeto to post: " + objPost);
		  	$.post('<?php echo URL . 'cardapio/create/';?>', objPost, function(result){
            	window.location.href = '<?php echo URL . 'cardapio/index/?st=';?>' + result.msg;
				$('#myModal').modal('hide');
        	});
		}

		$.listen('parsley:field:validate', function() {
		  validateFront();
		});

		var validateFront = function() {
		  if (true === $('#form-item').parsley().isValid()) {
			$('.bs-callout-info').removeClass('hidden');
			$('.bs-callout-warning').addClass('hidden');
		  } else {
			$('.bs-callout-info').addClass('hidden');
			$('.bs-callout-warning').removeClass('hidden');
		  }
		};

		table = $('#datatable-complemento').DataTable({
			  "columnDefs": [ {
			    "targets": 5,
			    "data": function ( row, type, val, meta ) {
			      if (type === 'display' || type == 'sorting' || type ==  'filtering') {
					  row[5] = '<button id="btnExcluir" class="btn btn-danger btn-xs">Remover</button>'
			    	  return row[5];
			      }
			      return row;
			    }
			  } ]
			} );
	  });

	  var clipboard = new Clipboard('.bt-copy');
	  $(function() {
	    $('#preco').maskMoney({prefix:'R$ ', thousands:'.', decimal:','});
	  })
</script>
