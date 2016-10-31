<?php 

/** 
 * Classe Tipo_categoria
 * @author __ 
 *
 * Data: 11/10/2016
 */ 


class Tipo_categoria_Model extends Model
{
	/** 
	* Atributos Private 
	*/
	private $id_tipo_categoria;
	private $tipo_categoria;

	public function __construct()
	{
		parent::__construct();

		$this->id_tipo_categoria = '';
		$this->tipo_categoria = '';
	}

	/** 
	* Metodos set's
	*/
	public function setId_tipo_categoria( $id_tipo_categoria )
	{
		$this->id_tipo_categoria = $id_tipo_categoria;
	}

	public function setTipo_categoria( $tipo_categoria )
	{
		$this->tipo_categoria = $tipo_categoria;
	}

	/** 
	* Metodos get's
	*/
	public function getId_tipo_categoria()
	{
		return $this->id_tipo_categoria;
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

		if( !$id = $this->db->insert( "tipo_categoria", $data ) ){
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

		if( !$update = $this->db->update("tipo_categoria", $data, "id_tipo_categoria = {$id} ") ){
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

		if( !$delete = $this->db->delete("tipo_categoria", "id_tipo_categoria = {$id} ") ){ 
			$this->db->rollBack();
			return false;
		}

		$this->db->commit();
		return $delete;
	}

	/** 
	* Metodo obterTipo_categoria
	*/
	public function obterTipo_categoria( $id_tipo_categoria )
	{
		$sql  = "select * ";
		$sql .= "from tipo_categoria ";
		$sql .= "where id_tipo_categoria = :id ";

		$result = $this->db->select( $sql, array("id" => $id_tipo_categoria) );
		return $this->montarObjeto( $result[0] );
	}

	public function obterTipo_categoriaPorDescricao( $ds_tipo_categoria )
	{
		$sql  = "select * ";
		$sql .= "from tipo_categoria ";
		$sql .= "where tipo_categoria = :tipo_categoria ";

		$result = $this->db->select( $sql, array("tipo_categoria" => "{$ds_tipo_categoria}") );
		return $this->montarObjeto( $result[0] );
	}

	/** 
	* Metodo listarTipo_categoria
	*/
	public function listarTipo_categoria()
	{
		$sql  = "select * ";
		$sql .= "from tipo_categoria ";

		if ( isset( $_POST["like"] ) )
		{
			$sql .= "where id_tipo_categoria like :id "; // Configurar o like com o campo necessario da tabela 
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
		$this->setId_tipo_categoria( $row["id_tipo_categoria"] );
		$this->setTipo_categoria( $row["tipo_categoria"] );

		return $this;
	}
}
?>