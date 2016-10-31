<?php 

/** 
 * Classe Complemento
 * @author __ 
 *
 * Data: 11/10/2016
 */ 

include_once 'categoria_model.php';

class Complemento_Model extends Model
{
	/** 
	* Atributos Private 
	*/
	private $id_complemento;
	private $complemento;
	private $descricao;
	private $preco;
	private $ativo;
	private $categoria;

	public function __construct()
	{
		parent::__construct();

		$this->id_complemento = '';
		$this->complemento = '';
		$this->descricao = '';
		$this->preco = '';
		$this->ativo = '';
		$this->categoria = new Categoria_Model();
	}

	/** 
	* Metodos set's
	*/
	public function setId_complemento( $id_complemento )
	{
		$this->id_complemento = $id_complemento;
	}

	public function setComplemento( $complemento )
	{
		$this->complemento = $complemento;
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

	public function setCategoria( Categoria_Model $categoria )
	{
		$this->categoria = $categoria;
	}

	/** 
	* Metodos get's
	*/
	public function getId_complemento()
	{
		return $this->id_complemento;
	}

	public function getComplemento()
	{
		return $this->complemento;
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

		if( !$id = $this->db->insert( "complemento", $data ) ){
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

		if( !$update = $this->db->update("complemento", $data, "id_complemento = {$id} ") ){
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

		if( !$delete = $this->db->delete("complemento", "id_complemento = {$id} ") ){ 
			$this->db->rollBack();
			return false;
		}

		$this->db->commit();
		return $delete;
	}

	/** 
	* Metodo obterComplemento
	*/
	public function obterComplemento( $id_complemento )
	{
		$sql  = "select * ";
		$sql .= "from complemento ";
		$sql .= "where id_complemento = :id ";

		$result = $this->db->select( $sql, array("id" => $id_complemento) );
		return $this->montarObjeto( $result[0] );
	}

	/** 
	* Metodo listarComplemento
	*/
	public function listarComplemento()
	{
		$sql  = "select * ";
		$sql .= "from complemento ";

		if ( isset( $_POST["like"] ) )
		{
			$sql .= "where id_complemento like :id "; // Configurar o like com o campo necessario da tabela 
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
		$this->setId_complemento( $row["id_complemento"] );
		$this->setComplemento( $row["complemento"] );
		$this->setDescricao( $row["descricao"] );
		$this->setPreco( $row["preco"] );
		$this->setAtivo( $row["ativo"] );

		$objCategoria = new Categoria_Model();
		$objCategoria->obterCategoria( $row["id_categoria"] );
		$this->setCategoria( $objCategoria );

		return $this;
	}
}
?>