<?php 

/** 
 * Classe Pedido
 * @author __ 
 *
 * Data: 11/10/2016
 */ 

include_once 'forma_pagamento_model.php';
include_once 'cliente_model.php';
include_once 'status_pedido_model.php';

class Pedido_Model extends Model
{
	/** 
	* Atributos Private 
	*/
	private $id_pedido;
	private $forma_pagamento;
	private $cliente;
	private $data_pedido;
	private $observacao;
	private $total;
	private $status_pedido;

	public function __construct()
	{
		parent::__construct();

		$this->id_pedido = '';
		$this->forma_pagamento = new Forma_pagamento_Model();
		$this->cliente = new Cliente_Model();
		$this->data_pedido = '';
		$this->observacao = '';
		$this->total = '';
		$this->status_pedido = new Status_pedido_Model();
	}

	/** 
	* Metodos set's
	*/
	public function setId_pedido( $id_pedido )
	{
		$this->id_pedido = $id_pedido;
	}

	public function setForma_pagamento( Forma_pagamento_Model $forma_pagamento )
	{
		$this->forma_pagamento = $forma_pagamento;
	}

	public function setCliente( Cliente_Model $cliente )
	{
		$this->cliente = $cliente;
	}

	public function setData_pedido( $data_pedido )
	{
		$this->data_pedido = $data_pedido;
	}

	public function setObservacao( $observacao )
	{
		$this->observacao = $observacao;
	}

	public function setTotal( $total )
	{
		$this->total = $total;
	}

	public function setStatus_pedido( Status_pedido_Model $status_pedido )
	{
		$this->status_pedido = $status_pedido;
	}

	/** 
	* Metodos get's
	*/
	public function getId_pedido()
	{
		return $this->id_pedido;
	}

	public function getForma_pagamento()
	{
		return $this->forma_pagamento;
	}

	public function getCliente()
	{
		return $this->cliente;
	}

	public function getData_pedido()
	{
		return $this->data_pedido;
	}

	public function getObservacao()
	{
		return $this->observacao;
	}

	public function getTotal()
	{
		return $this->total;
	}

	public function getStatus_pedido()
	{
		return $this->status_pedido;
	}


	/** 
	* Metodo create
	*/
	public function create( $data )
	{
		$this->db->beginTransaction();

		if( !$id = $this->db->insert( "pedido", $data ) ){
			$this->db->rollBack();
			return false;
		}

		$this->db->commit();
		return true;
	}

	/** 
	* Metodo edit
	*/
	public function edit( $data, $id )
	{
		$this->db->beginTransaction();

		if( !$update = $this->db->update("pedido", $data, "id_pedido = {$id} ") ){
			$this->db->rollBack();
			return false;
		}

		$this->db->commit();
		return $update;
	}

	/** 
	* Metodo delete
	*/
	public function delete( $id )
	{
		$this->db->beginTransaction();

		if( !$delete = $this->db->delete("pedido", "id_pedido = {$id} ") ){ 
			$this->db->rollBack();
			return false;
		}

		$this->db->commit();
		return $delete;
	}

	/** 
	* Metodo obterPedido
	*/
	public function obterPedido( $id_pedido )
	{
		$sql  = "select * ";
		$sql .= "from pedido ";
		$sql .= "where id_pedido = :id ";

		$result = $this->db->select( $sql, array("id" => $id_pedido) );
		return $this->montarObjeto( $result[0] );
	}

	/** 
	* Metodo listarPedido
	*/
	public function listarPedido()
	{
		$sql  = "select * ";
		$sql .= "from pedido ";

		if ( isset( $_POST["like"] ) )
		{
			$sql .= "where id_pedido like :id "; // Configurar o like com o campo necessario da tabela 
			$result = $this->db->select( $sql, array("id" => "%{$_POST["like"]}%") );
		}
		else
			$result = $this->db->select( $sql );

		return $this->montarLista($result);
	}

	/** 
	* Metodo montarLista
	*/
	private function montarLista( $result )
	{
		$objs = array();
		if( !empty( $result ) )
		{
			foreach( $result as $row )
			{
				$obj = new self();
				$obj->montarObjeto( $row );
				$objs[] = $obj;
				$obj = null;
			}
		}
		return $objs;
	}

	/** 
	* Metodo montarObjeto
	*/
	private function montarObjeto( $row )
	{
		$this->setId_pedido( $row["id_pedido"] );

		$objForma_pagamento = new Forma_pagamento_Model();
		$objForma_pagamento->obterForma_pagamento( $row["id_forma_pagamento"] );
		$this->setForma_pagamento( $objForma_pagamento );

		$objCliente = new Cliente_Model();
		$objCliente->obterCliente( $row["id_cliente"] );
		$this->setCliente( $objCliente );
		$this->setData_pedido( $row["data_pedido"] );
		$this->setObservacao( $row["observacao"] );
		$this->setTotal( $row["total"] );

		$objStatus_pedido = new Status_pedido_Model();
		$objStatus_pedido->obterStatus_pedido( $row["id_status_pedido"] );
		$this->setStatus_pedido( $objStatus_pedido );

		return $this;
	}
}
?>