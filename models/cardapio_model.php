<?php 

/** 
 * Classe Cardapio
 * @author __ 
 *
 * Data: 11/10/2016
 */ 

include_once 'categoria_model.php';

class Cardapio_Model extends Model
{
	/** 
	* Atributos Private 
	*/
	private $id_cardapio;
	private $item;
	private $descricao;
	private $preco;
	private $ativo;
	private $promocao;
	private $imagem;
	private $categoria;

	public function __construct()
	{
		parent::__construct();

		$this->id_cardapio = '';
		$this->item = '';
		$this->descricao = '';
		$this->preco = '';
		$this->ativo = '';
		$this->promocao = '';
		$this->imagem = '';
		$this->categoria = new Categoria_Model();
	}

	/** 
	* Metodos set's
	*/
	public function setId_cardapio( $id_cardapio )
	{
		$this->id_cardapio = $id_cardapio;
	}

	public function setItem( $item )
	{
		$this->item = $item;
	}

	public function setDescricao( $descricao )
	{
		$this->descricao = $descricao;
	}

	public function setPreco( $preco )
	{
		$this->preco = $preco;
	}

	public function setAtivo( $ativo )
	{
		$this->ativo = $ativo;
	}

	public function setPromocao( $promocao )
	{
		$this->promocao = $promocao;
	}

	public function setImagem( $imagem )
	{
		$this->imagem = $imagem;
	}

	public function setCategoria( Categoria_Model $categoria )
	{
		$this->categoria = $categoria;
	}

	/** 
	* Metodos get's
	*/
	public function getId_cardapio()
	{
		return $this->id_cardapio;
	}

	public function getItem()
	{
		return $this->item;
	}

	public function getDescricao()
	{
		return $this->descricao;
	}

	public function getPreco()
	{
		return $this->preco;
	}

	public function getAtivo()
	{
		return $this->ativo;
	}

	public function getPromocao()
	{
		return $this->promocao;
	}

	public function getImagem()
	{
		return $this->imagem;
	}

	public function getCategoria()
	{
		return $this->categoria;
	}


	/** 
	* Metodo create
	*/
	public function create( $data )
	{
		$this->db->beginTransaction();

		if( !$id = $this->db->insert( "cardapio", $data ) ){
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

		if( !$update = $this->db->update("cardapio", $data, "id_cardapio = {$id} ") ){
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

		if( !$delete = $this->db->delete("cardapio", "id_cardapio = {$id} ") ){ 
			$this->db->rollBack();
			return false;
		}

		$this->db->commit();
		return $delete;
	}

	/** 
	* Metodo obterCardapio
	*/
	public function obterCardapio( $id_cardapio )
	{
		$sql  = "select * ";
		$sql .= "from cardapio ";
		$sql .= "where id_cardapio = :id ";

		$result = $this->db->select( $sql, array("id" => $id_cardapio) );
		return $this->montarObjeto( $result[0] );
	}

	/** 
	* Metodo listarCardapio
	*/
	public function listarCardapio()
	{
		$sql  = "select * ";
		$sql .= "from cardapio ";

		if ( isset( $_POST["like"] ) )
		{
			$sql .= "where id_cardapio like :id "; // Configurar o like com o campo necessario da tabela 
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
		$this->setId_cardapio( $row["id_cardapio"] );
		$this->setItem( $row["item"] );
		$this->setDescricao( $row["descricao"] );
		$this->setPreco( $row["preco"] );
		$this->setAtivo( $row["ativo"] );
		$this->setPromocao( $row["promocao"] );
		$this->setImagem( $row["imagem"] );

		$objCategoria = new Categoria_Model();
		$objCategoria->obterCategoria( $row["id_categoria"] );
		$this->setCategoria( $objCategoria );

		return $this;
	}
}
?>