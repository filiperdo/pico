<?php 

require 'models/categoria_model.php';

class Complemento extends Controller {

	public function __construct() {
		parent::__construct();
		//Auth::handleLogin();
	}

	/** 
	* Metodo index
	*/
	public function index()
	{
		$this->view->title = "Complemento";
		$this->view->listarComplemento = $this->model->listarComplemento();

		$this->view->render( "header" );
		$this->view->render( "complemento/index" );
		$this->view->render( "footer" );
	}

	/** 
	* Metodo editForm
	*/
	public function form( $id = NULL )
	{
		$this->view->title = "Cadastrar Complemento";
		$this->view->action = "create";
		$this->view->obj = $this->model;

		$categoriaModel = new Categoria_Model();
		$this->view->listaCategoria = $categoriaModel->listarCategoriaPorTipo('Complemento');

		if( $id ) 
		{
			$this->view->title = "Editar Complemento";
			$this->view->action = "edit/".$id;
			$this->view->obj = $this->model->obterComplemento( $id );

			if ( empty( $this->view->obj ) ) {
				die( "Valor invalido!" );
			}
		}

		$this->view->render( "header" );
		$this->view->render( "complemento/form" );
		$this->view->render( "footer" );
	}

	/** 
	* Metodo create
	*/
	public function create()
	{
		$data = array(
			'complemento' => $_POST["complemento"], 
			'descricao' => $_POST["descricao"], 
			'preco' => Data::formataMoedaBD(str_replace('R$', '', $_POST["preco"])), 
			'ativo' => isset($_POST["ativo"]) ? $_POST["ativo"] : 0, 
			'id_categoria' => $_POST["id_categoria"], 
		);

		$this->model->create( $data ) ? $msg = base64_encode( "OPERACAO_SUCESSO" ) : $msg = base64_encode( "OPERACAO_ERRO" );

		header("location: " . URL . "complemento?st=".$msg);
	}

	/** 
	* Metodo edit
	*/
	public function edit( $id )
	{
		$data = array(
			'complemento' => $_POST["complemento"], 
			'descricao' => $_POST["descricao"], 
			'preco' => Data::formataMoedaBD($_POST["preco"]),  
			'ativo' => $_POST["ativo"], 
			'id_categoria' => $_POST["id_categoria"], 
		);

		$this->model->edit( $data, $id ) ? $msg = base64_encode( "OPERACAO_SUCESSO" ) : $msg = base64_encode( "OPERACAO_ERRO" );

		header("location: " . URL . "complemento?st=".$msg);
	}

	/** 
	* Metodo delete
	*/
	public function delete( $id )
	{
		$this->model->delete( $id ) ? $msg = base64_encode( "OPERACAO_SUCESSO" ) : $msg = base64_encode( "OPERACAO_ERRO" );

		header("location: " . URL . "complemento?st=".$msg);
	}
}
