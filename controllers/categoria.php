<?php 

require 'models/tipo_categoria_model.php';

class Categoria extends Controller {

	public function __construct() {
		parent::__construct();
		//Auth::handleLogin();
	}

	/** 
	* Metodo index
	*/
	public function index()
	{
		$this->view->title = "Categoria";
		$this->view->listarCategoria = $this->model->listarCategoria();

		$this->view->render( "header" );
		$this->view->render( "categoria/index" );
		$this->view->render( "footer" );
	}

	/** 
	* Metodo editForm
	*/
	public function form( $id = NULL )
	{
		$this->view->title = "Cadastrar Categoria";
		$this->view->action = "create";
		$this->view->obj = $this->model;

		$tipoCategoriaModel = new Tipo_categoria_Model();
		$this->view->listaTipoCategoria = $tipoCategoriaModel->listarTipo_categoria();

		if( $id ) 
		{
			$this->view->title = "Editar Categoria";
			$this->view->action = "edit/".$id;
			$this->view->obj = $this->model->obterCategoria( $id );

			if ( empty( $this->view->obj ) ) {
				die( "Valor invalido!" );
			}
		}

		$this->view->render( "header" );
		$this->view->render( "categoria/form" );
		$this->view->render( "footer" );
	}

	/** 
	* Metodo create
	*/
	public function create()
	{
		$data = array(
			'categoria' => $_POST["categoria"], 
			'id_tipo_categoria' => $_POST["id_tipo_categoria"], 
		);

		$this->model->create( $data ) ? $msg = base64_encode( "OPERACAO_SUCESSO" ) : $msg = base64_encode( "OPERACAO_ERRO" );

		header("location: " . URL . "categoria?st=".$msg);
	}

	/** 
	* Metodo edit
	*/
	public function edit( $id )
	{
		$data = array(
			'categoria' => $_POST["categoria"], 
			'id_tipo_categoria' => $_POST["id_tipo_categoria"], 
		);

		$this->model->edit( $data, $id ) ? $msg = base64_encode( "OPERACAO_SUCESSO" ) : $msg = base64_encode( "OPERACAO_ERRO" );

		header("location: " . URL . "categoria?st=".$msg);
	}

	/** 
	* Metodo delete
	*/
	public function delete( $id )
	{
		$this->model->delete( $id ) ? $msg = base64_encode( "OPERACAO_SUCESSO" ) : $msg = base64_encode( "OPERACAO_ERRO" );

		header("location: " . URL . "categoria?st=".$msg);
	}
}
