<?php 

/** 
 * Classe Status_pedido
 * @author __ 
 *
 * Data: 11/10/2016
 */ 


class Status_pedido_Model extends Model
{
	/** 
	* Atributos Private 
	*/
	private $id_status_pedido;
	private $status;

	public function __construct()
	{
		parent::__construct();

		$this->id_status_pedido = '';
		$this->status = '';
	}

	/** 
	* Metodos set's
	*/
	public function setId_status_pedido( $id_status_pedido )
	{
		$this->id_status_pedido = $id_status_pedido;
	}

	public function setStatus( $status )
	{
		$this->status = $status;
	}

	/** 
	* Metodos get's
	*/
	public function getId_status_pedido()
	{
		return $this->id_status_pedido;
	}

	public function getStatus()
	{
		return $this->status;
	}


	/** 
	* Metodo create
	*/
	public function create( $data )
	{
		$this->db->beginTransaction();

		if( !$id = $this->db->insert( "status_pedido", $data ) ){
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

		if( !$update = $this->db->update("status_pedido", $data, "id_status_pedido = {$id} ") ){
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

		if( !$delete = $this->db->delete("status_pedido", "id_status_pedido = {$id} ") ){ 
			$this->db->rollBack();
			return false;
		}

		$this->db->commit();
		return $delete;
	}

	/** 
	* Metodo obterStatus_pedido
	*/
	public function obterStatus_pedido( $id_status_pedido )
	{
		$sql  = "select * ";
		$sql .= "from status_pedido ";
		$sql .= "where id_status_pedido = :id ";

		$result = $this->db->select( $sql, array("id" => $id_status_pedido) );
		return $this->montarObjeto( $result[0] );
	}

	/** 
	* Metodo listarStatus_pedido
	*/
	public function listarStatus_pedido()
	{
		$sql  = "select * ";
		$sql .= "from status_pedido ";

		if ( isset( $_POST["like"] ) )
		{
			$sql .= "where id_status_pedido like :id "; // Configurar o like com o campo necessario da tabela 
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
		$this->setId_status_pedido( $row["id_status_pedido"] );
		$this->setStatus( $row["status"] );

		return $this;
	}
}
?>