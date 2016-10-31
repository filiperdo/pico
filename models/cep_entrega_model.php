<?php 

/** 
 * Classe Cep_entrega
 * @author __ 
 *
 * Data: 17/10/2016
 */ 


class Cep_entrega_Model extends Model
{
	/** 
	* Atributos Private 
	*/
	private $id_cep_entrega;
	private $cep;

	public function __construct()
	{
		parent::__construct();

		$this->id_cep_entrega = '';
		$this->cep = '';
	}

	/** 
	* Metodos set's
	*/
	public function setId_cep_entrega( $id_cep_entrega )
	{
		$this->id_cep_entrega = $id_cep_entrega;
	}

	public function setCep( $cep )
	{
		$this->cep = $cep;
	}

	/** 
	* Metodos get's
	*/
	public function getId_cep_entrega()
	{
		return $this->id_cep_entrega;
	}

	public function getCep()
	{
		return $this->cep;
	}


	/** 
	* Metodo create
	*/
	public function create( $data )
	{
		$this->db->beginTransaction();

		if( !$id = $this->db->insert( "cep_entrega", $data ) ){
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

		if( !$update = $this->db->update("cep_entrega", $data, "id_cep_entrega = {$id} ") ){
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

		if( !$delete = $this->db->delete("cep_entrega", "id_cep_entrega = {$id} ") ){ 
			$this->db->rollBack();
			return false;
		}

		$this->db->commit();
		return $delete;
	}

	/** 
	* Metodo obterCep_entrega
	*/
	public function obterCep_entrega( $id_cep_entrega )
	{
		$sql  = "select * ";
		$sql .= "from cep_entrega ";
		$sql .= "where id_cep_entrega = :id ";

		$result = $this->db->select( $sql, array("id" => $id_cep_entrega) );
		return $this->montarObjeto( $result[0] );
	}

	/** 
	* Metodo listarCep_entrega
	*/
	public function listarCep_entrega()
	{
		$sql  = "select * ";
		$sql .= "from cep_entrega ";

		if ( isset( $_POST["like"] ) )
		{
			$sql .= "where id_cep_entrega like :id "; // Configurar o like com o campo necessario da tabela 
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
		$this->setId_cep_entrega( $row["id_cep_entrega"] );
		$this->setCep( $row["cep"] );

		return $this;
	}
}
?>