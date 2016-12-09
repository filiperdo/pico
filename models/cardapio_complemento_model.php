<?php

/**
 * Classe Cardapio_complemento
 * @author __
 *
 * Data: 11/10/2016
 */

include_once 'complemento_model.php';
include_once 'cardapio_model.php';

class Cardapio_complemento_Model extends Model
{
	/**
	* Atributos Private
	*/
	private $complemento;
	private $cardapio;

	public function __construct()
	{
		parent::__construct();

		$this->complemento = new Complemento_Model();
		$this->cardapio = new Cardapio_Model();
	}

	/**
	* Metodos set's
	*/
	public function setComplemento( Complemento_Model $complemento )
	{
		$this->complemento = $complemento;
	}

	public function setCardapio( Cardapio_Model $cardapio )
	{
		$this->cardapio = $cardapio;
	}

	/**
	* Metodos get's
	*/
	public function getComplemento()
	{
		return $this->complemento;
	}

	public function getCardapio()
	{
		return $this->cardapio;
	}


	/**
	* Metodo create
	*/
	public function create( $data )
	{
		$this->db->beginTransaction();
		
		if( !$id = $this->db->insert( "cardapio_complemento", $data, false ) ){
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

		if( !$update = $this->db->update("cardapio_complemento", $data, "id_cardapio_complemento = {$id} ") ){
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

		if( !$delete = $this->db->delete("cardapio_complemento", "id_cardapio_complemento = {$id} ") ){
			$this->db->rollBack();
			return false;
		}

		$this->db->commit();
		return $delete;
	}

	/**
	* Metodo obterCardapio_complemento
	*/
	public function obterCardapio_complemento( $id_cardapio_complemento )
	{
		$sql  = "select * ";
		$sql .= "from cardapio_complemento ";
		$sql .= "where id_cardapio_complemento = :id ";

		$result = $this->db->select( $sql, array("id" => $id_cardapio_complemento) );
		return $this->montarObjeto( $result[0] );
	}

	/**
	* Metodo listarCardapio_complemento
	*/
	public function listarCardapio_complemento()
	{
		$sql  = "select * ";
		$sql .= "from cardapio_complemento ";

		if ( isset( $_POST["like"] ) )
		{
			$sql .= "where id_cardapio_complemento like :id "; // Configurar o like com o campo necessario da tabela
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

		$objComplemento = new Complemento_Model();
		$objComplemento->obterComplemento( $row["id_complemento"] );
		$this->setComplemento( $objComplemento );

		$objCardapio = new Cardapio_Model();
		$objCardapio->obterCardapio( $row["id_cardapio"] );
		$this->setCardapio( $objCardapio );

		return $this;
	}
}
?>
