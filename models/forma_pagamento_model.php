<?php 

/** 
 * Classe Forma_pagamento
 * @author __ 
 *
 * Data: 11/10/2016
 */ 


class Forma_pagamento_Model extends Model
{
	/** 
	* Atributos Private 
	*/
	private $id_forma_pagamento;
	private $forma_pagamento;
	private $ativo;

	public function __construct()
	{
		parent::__construct();

		$this->id_forma_pagamento = '';
		$this->forma_pagamento = '';
		$this->ativo = '';
	}

	/** 
	* Metodos set's
	*/
	public function setId_forma_pagamento( $id_forma_pagamento )
	{
		$this->id_forma_pagamento = $id_forma_pagamento;
	}

	public function setForma_pagamento( $forma_pagamento )
	{
		$this->forma_pagamento = $forma_pagamento;
	}

	public function setAtivo( $ativo )
	{
		$this->ativo = $ativo;
	}

	/** 
	* Metodos get's
	*/
	public function getId_forma_pagamento()
	{
		return $this->id_forma_pagamento;
	}

	public function getForma_pagamento()
	{
		return $this->forma_pagamento;
	}

	public function getAtivo()
	{
		return $this->ativo;
	}


	/** 
	* Metodo create
	*/
	public function create( $data )
	{
		$this->db->beginTransaction();

		if( !$id = $this->db->insert( "forma_pagamento", $data ) ){
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

		if( !$update = $this->db->update("forma_pagamento", $data, "id_forma_pagamento = {$id} ") ){
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

		if( !$delete = $this->db->delete("forma_pagamento", "id_forma_pagamento = {$id} ") ){ 
			$this->db->rollBack();
			return false;
		}

		$this->db->commit();
		return $delete;
	}

	/** 
	* Metodo obterForma_pagamento
	*/
	public function obterForma_pagamento( $id_forma_pagamento )
	{
		$sql  = "select * ";
		$sql .= "from forma_pagamento ";
		$sql .= "where id_forma_pagamento = :id ";

		$result = $this->db->select( $sql, array("id" => $id_forma_pagamento) );
		return $this->montarObjeto( $result[0] );
	}

	/** 
	* Metodo listarForma_pagamento
	*/
	public function listarForma_pagamento()
	{
		$sql  = "select * ";
		$sql .= "from forma_pagamento ";

		if ( isset( $_POST["like"] ) )
		{
			$sql .= "where id_forma_pagamento like :id "; // Configurar o like com o campo necessario da tabela 
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
		$this->setId_forma_pagamento( $row["id_forma_pagamento"] );
		$this->setForma_pagamento( $row["forma_pagamento"] );
		$this->setAtivo( $row["ativo"] );

		return $this;
	}
}
?>