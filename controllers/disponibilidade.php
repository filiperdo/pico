<?php 

class Disponibilidade extends Controller {

	public function __construct() {
		parent::__construct();
		//Auth::handleLogin();
	}

	/** 
	* Metodo index
	*/
	public function index()
	{
		$this->view->title = "Disponibilidade";
		$this->view->listarDisponibilidade = $this->model->listarDisponibilidade();

		$this->view->render( "header" );
		$this->view->render( "disponibilidade/index" );
		$this->view->render( "footer" );
	}

	/** 
	* Metodo editForm
	*/
	public function form( $id = NULL )
	{
		$this->view->title = "Cadastrar Disponibilidade";
		$this->view->action = "create";
		$this->view->obj = $this->model;

		if( $id ) 
		{
			$this->view->title = "Editar Disponibilidade";
			$this->view->action = "edit/".$id;
			$this->view->obj = $this->model->obterDisponibilidade( $id );

			if ( empty( $this->view->obj ) ) {
				die( "Valor invalido!" );
			}
		}

		$this->view->render( "header" );
		$this->view->render( "disponibilidade/form" );
		$this->view->render( "footer" );
	}

	/** 
	* Metodo create
	*/
	public function create()
	{
		$data = array(
			'segunda' => $_POST["segunda"], 
			'terca' => $_POST["terca"], 
			'quarta' => $_POST["quarta"], 
			'quinta' => $_POST["quinta"], 
			'sexta' => $_POST["sexta"], 
			'sabado' => $_POST["sabado"], 
			'domingo' => $_POST["domingo"], 
			'hora_inicio1' => $_POST["hora_inicio1"], 
			'hora_fim1' => $_POST["hora_fim1"], 
			'hora_inicio2' => $_POST["hora_inicio2"], 
			'hora_fim2' => $_POST["hora_fim2"], 
			'id_cardapio' => $_POST["id_cardapio"], 
		);

		$this->model->create( $data ) ? $msg = base64_encode( "OPERACAO_SUCESSO" ) : $msg = base64_encode( "OPERACAO_ERRO" );

		header("location: " . URL . "disponibilidade?st=".$msg);
	}

	/** 
	* Metodo edit
	*/
	public function edit( $id )
	{
		$data = array(
			'segunda' => $_POST["segunda"], 
			'terca' => $_POST["terca"], 
			'quarta' => $_POST["quarta"], 
			'quinta' => $_POST["quinta"], 
			'sexta' => $_POST["sexta"], 
			'sabado' => $_POST["sabado"], 
			'domingo' => $_POST["domingo"], 
			'hora_inicio1' => $_POST["hora_inicio1"], 
			'hora_fim1' => $_POST["hora_fim1"], 
			'hora_inicio2' => $_POST["hora_inicio2"], 
			'hora_fim2' => $_POST["hora_fim2"], 
			'id_cardapio' => $_POST["id_cardapio"], 
		);

		$this->model->edit( $data, $id ) ? $msg = base64_encode( "OPERACAO_SUCESSO" ) : $msg = base64_encode( "OPERACAO_ERRO" );

		header("location: " . URL . "disponibilidade?st=".$msg);
	}

	/** 
	* Metodo delete
	*/
	public function delete( $id )
	{
		$this->model->delete( $id ) ? $msg = base64_encode( "OPERACAO_SUCESSO" ) : $msg = base64_encode( "OPERACAO_ERRO" );

		header("location: " . URL . "disponibilidade?st=".$msg);
	}
}
