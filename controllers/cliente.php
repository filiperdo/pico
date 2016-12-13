<?php 

class Cliente extends Controller {

	public function __construct() {
		parent::__construct();
		//Auth::handleLogin();
	}

	/** 
	* Metodo index
	*/
	public function index()
	{
		$this->view->title = "Cliente";
		$this->view->listarCliente = $this->model->listarCliente();

		$this->view->render( "header" );
		$this->view->render( "cliente/index" );
		$this->view->render( "footer" );
	}

	/** 
	* Metodo editForm
	*/
	public function form( $id = NULL )
	{
		$this->view->title = "Cadastrar Cliente";
		$this->view->action = "create";
		$this->view->obj = $this->model;

		if( $id ) 
		{
			$this->view->title = "Editar Cliente";
			$this->view->action = "edit/".$id;
			$this->view->obj = $this->model->obterCliente( $id );

			if ( empty( $this->view->obj ) ) {
				die( "Valor invalido!" );
			}
		}

		$this->view->render( "header" );
		$this->view->render( "cliente/form" );
		$this->view->render( "footer" );
	}

	/** 
	* Metodo create
	*/
	public function create()
	{
		$data = array(
			'cliente' => $_POST["cliente"], 
			'telefone' => $_POST["telefone"], 
			'celular' => $_POST["celular"], 
			'endereco' => $_POST["endereco"], 
			'numero' => $_POST["numero"], 
			'bairro' => $_POST["bairro"], 
			'cidade' => $_POST["cidade"], 
			'estado' => $_POST["estado"], 
			'complemento' => $_POST["complemento"], 
			'num_cep' => $_POST["num_cep"], 
		);

		$this->model->create( $data ) ? $msg = base64_encode( "OPERACAO_SUCESSO" ) : $msg = base64_encode( "OPERACAO_ERRO" );

		header("location: " . URL . "cliente?st=".$msg);
	}

	/** 
	* Metodo edit
	*/
	public function edit( $id )
	{
		$data = array(
			'cliente' => $_POST["cliente"], 
			'telefone' => Data::limpaFormatacao($_POST["telefone"]),
			'celular' => Data::limpaFormatacao($_POST["celular"]),
			'endereco' => $_POST["endereco"], 
			'numero' => $_POST["numero"], 
			'bairro' => $_POST["bairro"], 
			'cidade' => $_POST["cidade"], 
			'estado' => $_POST["estado"], 
			'complemento' => $_POST["complemento"], 
			'num_cep' => Data::limpaFormatacao($_POST["num_cep"]),
		);

		$this->model->edit( $data, $id ) ? $msg = base64_encode( "OPERACAO_SUCESSO" ) : $msg = base64_encode( "OPERACAO_ERRO" );

		header("location: " . URL . "cliente?st=".$msg);
	}

	/** 
	* Metodo delete
	*/
	public function delete( $id )
	{
		$this->model->delete( $id ) ? $msg = base64_encode( "OPERACAO_SUCESSO" ) : $msg = base64_encode( "OPERACAO_ERRO" );

		header("location: " . URL . "cliente?st=".$msg);
	}
}
