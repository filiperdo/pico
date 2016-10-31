<?php 

/** 
 * Classe Categoria
 * @author __ 
 *
 * Data: 11/10/2016
 */ 

include_once 'tipo_categoria_model.php';

class Categoria_Model extends Model
{
	/** 
	* Atributos Private 
	*/
	private $id_categoria;
	private $categoria;
	private $tipo_categoria;

	public function __construct()
	{
		parent::__construct();

		$this->id_categoria = '';
		$this->categoria = '';
		$this->tipo_categoria = new Tipo_categoria_Model();
	}

	/** 
	* Metodos set's
	*/
	public function setId_categoria( $id_categoria )
	{
		$this->id_categoria = $id_categoria;
	}

	public function setCategoria( $categoria )
	{
		$this->categoria = $categoria;
	}

	public function setTipo_categoria( Tipo_categoria_Model $tipo_categoria )
	{
		$this->tipo_categoria = $tipo_categoria;
	}

	/** 
	* Metodos get's
	*/
	public function getId_categoria()
	{
		return $this->id_categoria;
	}

	public function getCategoria()
	{
		return $this->categoria;
	}

	public function getTipo_categoria()
	{
		return $this->tipo_categoria;
	}


	/** 
	* Metodo create
	*/
	public function create( $data )
	{
		$this->db->beginTransaction();

		if( !$id = $this->db->insert( "categoria", $data ) ){
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

		if( !$update = $this->db->update("categoria", $data, "id_categoria = {$id} ") ){
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

		if( !$delete = $this->db->delete("categoria", "id_categoria = {$id} ") ){ 
			$this->db->rollBack();
			return false;
		}

		$this->db->commit();
		return $delete;
	}

	/** 
	* Metodo obterCategoria
	*/
	public function obterCategoria( $id_categoria )
	{
		$sql  = "select * ";
		$sql .= "from categoria ";
		$sql .= "where id_categoria = :id ";

		$result = $this->db->select( $sql, array("id" => $id_categoria) );
		return $this->montarObjeto( $result[0] );
	}

	/** 
	* Metodo listarCategoria
	*/
	public function listarCategoria()
	{
		$sql  = "select * ";
		$sql .= "from categoria ";

		if ( isset( $_POST["like"] ) )
		{
			$sql .= "where id_categoria like :id "; // Configurar o like com o campo necessario da tabela 
			$result = $this->db->select( $sql, array("id" => "%{$_POST["like"]}%") );
		}
		else
			$result = $this->db->select( $sql );

		return $this->montarLista($result);
	}

	/** 
	* Metodo listarCategoria
	*/
	public function listarCategoriaPorTipo($tipoCategoria)
	{
		$objTipo_categoria = new Tipo_categoria_Model();

		$objTipo_categoria->obterTipo_categoriaPorDescricao( $tipoCategoria );

		$sql  = "select * ";
		$sql .= "from categoria ";
		$sql .= "where id_tipo_categoria = :id_tipo_categoria "; // Configurar o like com o campo necessario da tabela 
		$result = $this->db->select( $sql, array("id_tipo_categoria" => $objTipo_categoria->getId_tipo_categoria()) );

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
		$this->setId_categoria( $row["id_categoria"] );
		$this->setCategoria( $row["categoria"] );

		$objTipo_categoria = new Tipo_categoria_Model();
		$objTipo_categoria->obterTipo_categoria( $row["id_tipo_categoria"] );
		$this->setTipo_categoria( $objTipo_categoria );

		return $this;
	}
}
?>