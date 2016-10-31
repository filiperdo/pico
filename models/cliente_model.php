<?php 

/** 
 * Classe Cliente
 * @author __ 
 *
 * Data: 11/10/2016
 */ 


class Cliente_Model extends Model
{
	/** 
	* Atributos Private 
	*/
	private $id_cliente;
	private $cliente;
	private $telefone;
	private $celular;
	private $endereco;
	private $numero;
	private $bairro;
	private $cidade;
	private $estado;
	private $complemento;
	private $num_cep;

	public function __construct()
	{
		parent::__construct();

		$this->id_cliente = '';
		$this->cliente = '';
		$this->telefone = '';
		$this->celular = '';
		$this->endereco = '';
		$this->numero = '';
		$this->bairro = '';
		$this->cidade = '';
		$this->estado = '';
		$this->complemento = '';
		$this->num_cep = '';
	}

	/** 
	* Metodos set's
	*/
	public function setId_cliente( $id_cliente )
	{
		$this->id_cliente = $id_cliente;
	}

	public function setCliente( $cliente )
	{
		$this->cliente = $cliente;
	}

	public function setTelefone( $telefone )
	{
		$this->telefone = $telefone;
	}

	public function setCelular( $celular )
	{
		$this->celular = $celular;
	}

	public function setEndereco( $endereco )
	{
		$this->endereco = $endereco;
	}

	public function setNumero( $numero )
	{
		$this->numero = $numero;
	}

	public function setBairro( $bairro )
	{
		$this->bairro = $bairro;
	}

	public function setCidade( $cidade )
	{
		$this->cidade = $cidade;
	}

	public function setEstado( $estado )
	{
		$this->estado = $estado;
	}

	public function setComplemento( $complemento )
	{
		$this->complemento = $complemento;
	}

	public function setNum_cep( $num_cep )
	{
		$this->num_cep = $num_cep;
	}

	/** 
	* Metodos get's
	*/
	public function getId_cliente()
	{
		return $this->id_cliente;
	}

	public function getCliente()
	{
		return $this->cliente;
	}

	public function getTelefone()
	{
		return $this->telefone;
	}

	public function getCelular()
	{
		return $this->celular;
	}

	public function getEndereco()
	{
		return $this->endereco;
	}

	public function getNumero()
	{
		return $this->numero;
	}

	public function getBairro()
	{
		return $this->bairro;
	}

	public function getCidade()
	{
		return $this->cidade;
	}

	public function getEstado()
	{
		return $this->estado;
	}

	public function getComplemento()
	{
		return $this->complemento;
	}

	public function getNum_cep()
	{
		return $this->num_cep;
	}


	/** 
	* Metodo create
	*/
	public function create( $data )
	{
		$this->db->beginTransaction();

		if( !$id = $this->db->insert( "cliente", $data ) ){
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

		if( !$update = $this->db->update("cliente", $data, "id_cliente = {$id} ") ){
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

		if( !$delete = $this->db->delete("cliente", "id_cliente = {$id} ") ){ 
			$this->db->rollBack();
			return false;
		}

		$this->db->commit();
		return $delete;
	}

	/** 
	* Metodo obterCliente
	*/
	public function obterCliente( $id_cliente )
	{
		$sql  = "select * ";
		$sql .= "from cliente ";
		$sql .= "where id_cliente = :id ";

		$result = $this->db->select( $sql, array("id" => $id_cliente) );
		return $this->montarObjeto( $result[0] );
	}

	/** 
	* Metodo listarCliente
	*/
	public function listarCliente()
	{
		$sql  = "select * ";
		$sql .= "from cliente ";

		if ( isset( $_POST["like"] ) )
		{
			$sql .= "where id_cliente like :id "; // Configurar o like com o campo necessario da tabela 
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
		$this->setId_cliente( $row["id_cliente"] );
		$this->setCliente( $row["cliente"] );
		$this->setTelefone( $row["telefone"] );
		$this->setCelular( $row["celular"] );
		$this->setEndereco( $row["endereco"] );
		$this->setNumero( $row["numero"] );
		$this->setBairro( $row["bairro"] );
		$this->setCidade( $row["cidade"] );
		$this->setEstado( $row["estado"] );
		$this->setComplemento( $row["complemento"] );
		$this->setNum_cep( $row["num_cep"] );

		return $this;
	}
}
?>