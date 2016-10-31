<?php 

/** 
 * Classe Disponibilidade
 * @author __ 
 *
 * Data: 11/10/2016
 */ 

include_once 'cardapio_model.php';

class Disponibilidade_Model extends Model
{
	/** 
	* Atributos Private 
	*/
	private $id_disponibilidade;
	private $segunda;
	private $terca;
	private $quarta;
	private $quinta;
	private $sexta;
	private $sabado;
	private $domingo;
	private $hora_inicio1;
	private $hora_fim1;
	private $hora_inicio2;
	private $hora_fim2;
	private $cardapio;

	public function __construct()
	{
		parent::__construct();

		$this->id_disponibilidade = '';
		$this->segunda = '';
		$this->terca = '';
		$this->quarta = '';
		$this->quinta = '';
		$this->sexta = '';
		$this->sabado = '';
		$this->domingo = '';
		$this->hora_inicio1 = '';
		$this->hora_fim1 = '';
		$this->hora_inicio2 = '';
		$this->hora_fim2 = '';
		$this->cardapio = new Cardapio_Model();
	}

	/** 
	* Metodos set's
	*/
	public function setId_disponibilidade( $id_disponibilidade )
	{
		$this->id_disponibilidade = $id_disponibilidade;
	}

	public function setSegunda( $segunda )
	{
		$this->segunda = $segunda;
	}

	public function setTerca( $terca )
	{
		$this->terca = $terca;
	}

	public function setQuarta( $quarta )
	{
		$this->quarta = $quarta;
	}

	public function setQuinta( $quinta )
	{
		$this->quinta = $quinta;
	}

	public function setSexta( $sexta )
	{
		$this->sexta = $sexta;
	}

	public function setSabado( $sabado )
	{
		$this->sabado = $sabado;
	}

	public function setDomingo( $domingo )
	{
		$this->domingo = $domingo;
	}

	public function setHora_inicio1( $hora_inicio1 )
	{
		$this->hora_inicio1 = $hora_inicio1;
	}

	public function setHora_fim1( $hora_fim1 )
	{
		$this->hora_fim1 = $hora_fim1;
	}

	public function setHora_inicio2( $hora_inicio2 )
	{
		$this->hora_inicio2 = $hora_inicio2;
	}

	public function setHora_fim2( $hora_fim2 )
	{
		$this->hora_fim2 = $hora_fim2;
	}

	public function setCardapio( Cardapio_Model $cardapio )
	{
		$this->cardapio = $cardapio;
	}

	/** 
	* Metodos get's
	*/
	public function getId_disponibilidade()
	{
		return $this->id_disponibilidade;
	}

	public function getSegunda()
	{
		return $this->segunda;
	}

	public function getTerca()
	{
		return $this->terca;
	}

	public function getQuarta()
	{
		return $this->quarta;
	}

	public function getQuinta()
	{
		return $this->quinta;
	}

	public function getSexta()
	{
		return $this->sexta;
	}

	public function getSabado()
	{
		return $this->sabado;
	}

	public function getDomingo()
	{
		return $this->domingo;
	}

	public function getHora_inicio1()
	{
		return $this->hora_inicio1;
	}

	public function getHora_fim1()
	{
		return $this->hora_fim1;
	}

	public function getHora_inicio2()
	{
		return $this->hora_inicio2;
	}

	public function getHora_fim2()
	{
		return $this->hora_fim2;
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

		if( !$id = $this->db->insert( "disponibilidade", $data ) ){
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

		if( !$update = $this->db->update("disponibilidade", $data, "id_disponibilidade = {$id} ") ){
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

		if( !$delete = $this->db->delete("disponibilidade", "id_disponibilidade = {$id} ") ){ 
			$this->db->rollBack();
			return false;
		}

		$this->db->commit();
		return $delete;
	}

	/** 
	* Metodo obterDisponibilidade
	*/
	public function obterDisponibilidade( $id_disponibilidade )
	{
		$sql  = "select * ";
		$sql .= "from disponibilidade ";
		$sql .= "where id_disponibilidade = :id ";

		$result = $this->db->select( $sql, array("id" => $id_disponibilidade) );
		return $this->montarObjeto( $result[0] );
	}

	/** 
	* Metodo listarDisponibilidade
	*/
	public function listarDisponibilidade()
	{
		$sql  = "select * ";
		$sql .= "from disponibilidade ";

		if ( isset( $_POST["like"] ) )
		{
			$sql .= "where id_disponibilidade like :id "; // Configurar o like com o campo necessario da tabela 
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
		$this->setId_disponibilidade( $row["id_disponibilidade"] );
		$this->setSegunda( $row["segunda"] );
		$this->setTerca( $row["terca"] );
		$this->setQuarta( $row["quarta"] );
		$this->setQuinta( $row["quinta"] );
		$this->setSexta( $row["sexta"] );
		$this->setSabado( $row["sabado"] );
		$this->setDomingo( $row["domingo"] );
		$this->setHora_inicio1( $row["hora_inicio1"] );
		$this->setHora_fim1( $row["hora_fim1"] );
		$this->setHora_inicio2( $row["hora_inicio2"] );
		$this->setHora_fim2( $row["hora_fim2"] );

		$objCardapio = new Cardapio_Model();
		$objCardapio->obterCardapio( $row["id_cardapio"] );
		$this->setCardapio( $objCardapio );

		return $this;
	}
}
?>