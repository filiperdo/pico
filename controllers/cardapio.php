<?php 

require 'models/categoria_model.php';

class Cardapio extends Controller {

	public function __construct() {
		parent::__construct();
		//Auth::handleLogin();
	}

	/** 
	* Metodo index
	*/
	public function index()
	{
		$this->view->title = "Cardapio";
		$this->view->listarCardapio = $this->model->listarCardapio();

		$this->view->render( "header" );
		$this->view->render( "cardapio/index" );
		$this->view->render( "footer" );
	}

	/** 
	* Metodo editForm
	*/
	public function form( $id = NULL )
	{
		Session::init();
		
		$this->view->title = "Cadastrar Cardapio";
		$this->view->action = "create";

		$this->view->js[] = 'clipboard.min.js';
		$this->view->method_upload = URL . 'cardapio/wideimage_ajax/';

		$this->view->obj = $this->model;
		$this->view->path = '';

		$categoriaModel = new Categoria_Model();
		$this->view->listaCategoria = $categoriaModel->listarCategoriaPorTipo('Cardapio');

		if( $id == NULL )
		{
			if( !Session::get('path_cardapio') )
			{
				Session::set( 'path_cardapio', 'img_cardapio_' . date('Ymd_his') );
			}
			Session::set('act_cardapio', 'create');
			$this->view->path = Session::get('path_cardapio');
		}
		else
		{
			$this->view->title = "Editar Cardapio";
			$this->view->action = "edit/".$id;
			$this->view->obj = $this->model->obterCardapio( $id );


			$this->view->path = $this->model->getImagem();

			Session::set('act_cardapio', 'edit');
			Session::set('path_edit_cardapio', $this->model->getImagem());

			if ( empty( $this->view->obj ) ) {
				die( "Valor invalido!" );
			}
		}

		$this->view->render( "header" );
		$this->view->render( "cardapio/form" );
		$this->view->render( "footer" );
	}

	/** 
	* Metodo create
	*/
	public function create()
	{
		$data = array(
			'item' => $_POST["item"], 
			'descricao' => $_POST["descricao"], 
			'preco' => Data::formataMoedaBD(str_replace('R$', '', $_POST["preco"])), 
			'ativo' => isset($_POST["ativo"]) ? $_POST["ativo"] : 0, 
			'promocao' => isset($_POST["promocao"]) ? $_POST["promocao"] : 0, 
			'imagem' => $_POST["imagem"], 
			'id_categoria' => $_POST["id_categoria"], 
		);
		
		$this->model->create( $data ) ? $msg = base64_encode( "OPERACAO_SUCESSO" ) : $msg = base64_encode( "OPERACAO_ERRO" );

		header("location: " . URL . "cardapio?st=".$msg);
	}

	/** 
	* Metodo edit
	*/
	public function edit( $id )
	{
		$data = array(
			'item' => $_POST["item"], 
			'descricao' => $_POST["descricao"], 
			'preco' => Data::formataMoedaBD($_POST["preco"]), 
			'ativo' => $_POST["ativo"], 
			'promocao' => $_POST["promocao"], 
			'imagem' => $_POST["imagem"], 
			'id_categoria' => $_POST["id_categoria"], 
		);

		$this->model->edit( $data, $id ) ? $msg = base64_encode( "OPERACAO_SUCESSO" ) : $msg = base64_encode( "OPERACAO_ERRO" );

		header("location: " . URL . "cardapio?st=".$msg);
	}

	/** 
	* Metodo delete
	*/
	public function delete( $id )
	{
		$this->model->delete( $id ) ? $msg = base64_encode( "OPERACAO_SUCESSO" ) : $msg = base64_encode( "OPERACAO_ERRO" );

		header("location: " . URL . "cardapio?st=".$msg);
	}

	/**
	 * Faz o upload das imagens recebidas de um form
	 */
	public function wideimage_ajax()
	{
		Session::init();
		
		require_once 'util/wideimage/WideImage.php';
		
		date_default_timezone_set("Brazil/East");
		
		$name 	= $_FILES['files']['name'];
		$tmp_name = $_FILES['files']['tmp_name'];
		
		$allowedExts = array(".gif", ".jpeg", ".jpg", ".png");
		
		// Verifica a acao para pegar a variavel do path correta
		Session::get('act_cardapio') == 'create' ? $var_path = Session::get('path_cardapio') : $var_path = Session::get('path_edit_cardapio');
		
		$dir = 'public/img/cardapio/'. $var_path .'/';
		
		for($i = 0; $i < count($tmp_name); $i++)
		{
			$ext = strtolower(substr($name[$i],-4));
			
			if(in_array($ext, $allowedExts))
			{
				$new_name = strtolower( PREFIX_SESSION ).date('Ymd_his').'_'.$name[$i];
				
				// cria a img default =========================================
				$image = WideImage::load( $tmp_name[$i] );
				
				$image = $image->resize(800, 600, 'inside');
				//$image = $image->crop('center', 'center', 170, 180);
		
				// verifica so o diretorio existe
				// caso contrario, criamos o diretorio com permissao para escrita
				if( !is_dir( $dir ) )
					mkdir( $dir, 0777, true);
				
				$image->saveToFile( $dir . $new_name );
				
				// cria a img thumb ==========================================
				$image_thumb = WideImage::load( $tmp_name[$i] );
				$image_thumb = $image_thumb->resize(170, 150, 'outside');
				$image_thumb = $image_thumb->crop('center', 'center', 170, 150);
				
				$dir_thumb = $dir.'thumb/';
				// verifica so o diretorio existe
				// caso contrario, criamos o diretorio com permissao para escrita
				if( !is_dir( $dir_thumb ) )
					mkdir( $dir_thumb, 0777, true);
				
				$image_thumb->saveToFile( $dir_thumb . $new_name );
			}
		}
		
		echo json_encode($new_name);
		
	}
}
