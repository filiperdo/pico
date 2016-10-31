<?php 

/** 
 * Classe Pedido_item
 * @author __ 
 *
 * Data: 11/10/2016
 */ 

include_once 'pedido_model.php';
include_once 'cardapio_model.php';

class Pedido_item_Model extends Model
{
	/** 
	* Atributos Private 
	*/
	private $id_pedido_item;
	private $pedido;
	private $quantidade;
	private $cardapio;

	public function __construct()
	{
		parent::__construct();

		$this->id_pedido_item = '';
		$this->pedido = new Pedido_Model();
		$this->quantidade = '';
		$this->cardapio = new Cardapio_Model();
	}

	/** 
	* Metodos set's
	*/
	public function setId_pedido_item( $id_pedido_item )
	{
		$this->id_pedido_item = $id_pedido_item;
	}

	public function setPedido( Pedido_Model $pedido )
	{
		$this->pedido = $pedido;
	}

	public function setQuantidade( $quantidade )
	{
		$this->quantidade = $quantidade;
	}

	public function setCardapio( Cardapio_Model $cardapio )
	{
		$this->cardapio = $cardapio;
	}

	/** 
	* Metodos get's
	*/
	public function getId_pedido_item()
	{
		return $this->id_pedido_item;
	}

	public function getPedido()
	{
		return $this->pedido;
	}

	public function getQuantidade()
	{
		return $this->quantidade;
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

		if( !$id = $this->db->insert( "pedido_item", $data ) ){
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

		if( !$update = $this->db->update("pedido_item", $data, "id_pedido_item = {$id} ") ){
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

		if( !$delete = $this->db->delete("pedido_item", "id_pedido_item = {$id} ") ){ 
			$this->db->rollBack();
			return false;
		}

		$this->db->commit();
		return $delete;
	}

	/** 
	* Metodo obterPedido_item
	*/
	public function obterPedido_item( $id_pedido_item )
	{
		$sql  = "select * ";
		$sql .= "from pedido_item ";
		$sql .= "where id_pedido_item = :id ";

		$result = $this->db->select( $sql, array("id" => $id_pedido_item) );
		return $this->montarObjeto( $result[0] );
	}

	/** 
	* Metodo listarPedido_item
	*/
	public function listarPedido_item()
	{
		$sql  = "select * ";
		$sql .= "from pedido_item ";

		if ( isset( $_POST["like"] ) )
		{
			$sql .= "where id_pedido_item like :id "; // Configurar o like com o campo necessario da tabela 
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
		$this->setId_pedido_item( $row["id_pedido_item"] );

		$objPedido = new Pedido_Model();
		$objPedido->obterPedido( $row["id_pedido"] );
		$this->setPedido( $objPedido );
		$this->setQuantidade( $row["quantidade"] );

		$objCardapio = new Cardapio_Model();
		$objCardapio->obterCardapio( $row["id_cardapio"] );
		$this->setCardapio( $objCardapio );

		return $this;
	}
}
?>