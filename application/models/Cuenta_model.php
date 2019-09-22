<?php
class Cuenta_model extends CI_Model {

	var $mssql;
    function __construct() {
		parent::__construct();
		$this->load->dbforge();
		$this->mssql = $this->load->database('default', TRUE );
	}
	
    function welcome_check(){
		//use $this->mssql instead of $this->db
		/*$query = $this->mssql->query('SELECT * FROM PERSONAL');
		echo print_r($query);*/
		//...

		$query=$this->mssql
        ->select("COD,NOMBRE,TIPO_PERSONAL")
        ->from("PERSONAL")
        ->order_by("NOMBRE","desc")
        ->get();
        return $query->result();

	 }

	 function Contar_Registros_DetalleCuenta($vop, $vcod, $vcod_cliente, $vtd, $vemini, $vemifin, $vtbl){
		$query = " EXECUTE SP_HISTORICO_DEUDA_DETALLE_XXX ?,?,?,?,?,? ";
		$data = array(
			'op' 			=> $vop, 
			'cod' 			=> $vcod, 
			'cod_cliente' 	=> $vcod_cliente, 
			'td' 			=> $vtd,
			'emini' 		=> $vemini,
			'emifin' 		=> $vemifin
			//'tbl' 			=> $vtbl
		);
		$result = $this->mssql->query($query,$data);
		return $result->result_array();
	 }
 
	function Listar_Registros_DetalleCuenta($vop, $vcod, $vcod_cliente, $vtd, $vemini, $vemifin, $vtbl, $cant ){

		// $query = " EXECUTE SP_HISTORICO_DEUDA_DETALLE_XXX ?,?,?,?,?,?,? ";
		// $data = array(
		// 	'op' 			=> $vop, 
		// 	'cod' 			=> $vcod, 
		// 	'cod_cliente' 	=> $vcod_cliente, 
		// 	'td' 			=> $vtd,
		// 	'emini' 		=> $vemini,
		// 	'emifin' 		=> $vemifin,
		// 	'tbl' 			=> $vtbl
		// );
		// $result = $this->mssql->query($query,$data);
		// return $result->result_array();

		// $query1 = " CREATE TABLE ". $vtbl 
		// 			. "("
		// 			. "[COD] CHAR(4),"
		// 			. "[EMPRESA] VARCHAR(10),"
		// 			. "[ZONA] VARCHAR(200), "
		// 			. "[COD_VEN] VARCHAR(10),"
		// 			. "[VENDEDOR] VARCHAR(200) "
		// 			. ");";

		// $resultado = $this->mssql->query($query1);

		$this->dbforge->add_field(array(
			//COD
			'COD' => array(
				'type' => 'CHAR',
				'constraint' => 4,
				'NULL' => TRUE
			),
			//EMPRESA
			'EMPRESA' => array(
				'type' => 'VARCHAR',
				'constraint' => '10',
				'NULL' => TRUE
			),
			//ZONA
			'ZONA' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				'NULL' => TRUE
			),
			//COD_VEN
			'COD_VEN' => array(
				'type' => 'VARCHAR',
				'constraint' => 10,
				'NULL' => TRUE
			),
			//VENDEDOR
			'VENDEDOR' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				'NULL' => TRUE
			),
			//COD_CLIENTE
			'COD_CLIENTE' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'NULL' => TRUE
			),
			//CLIENTE
			'CLIENTE' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'NULL' => TRUE
			),
			//TD
			'TD' => array(
				'type' => 'CHAR',
				'constraint' => 2,
				'NULL' => TRUE
			), 
			//DOCUMENTO
			'DOCUMENTO' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'NULL' => TRUE
			), 
			//FECHA_EMISION
			'FECHA_EMISION' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'NULL' => TRUE
			),
			//FECHA_VENCIMIENTO
			'FECHA_VENCIMIENTO' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'NULL' => TRUE
			),
			//MES_EMI
			'MES_EMI' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'NULL' => TRUE
			),
			//ANIO_EMI
			'ANIO_EMI' => array(
				'type' => 'CHAR',
				'constraint' => 4,
				'NULL' => TRUE
			),
			//DIAS_PLAZO
			'DIAS_PLAZO' => array(
				'type' => 'INT',
				'NULL' => TRUE
			),
			//MON
			'MON' => array(
				'type' => 'CHAR',
				'constraint' => 2,
				'NULL' => TRUE
			), 
			//TIPCAMV
			'TIPCAMV' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,3',
				'NULL' => TRUE
			),
			//TIPCAMC
			'TIPCAMC' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,3',
				'NULL' => TRUE
			),
			//IMPORTEDOC
			'IMPORTEDOC' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,2',
				'NULL' => TRUE
			), 
			//CODAGE
			'CODAGE' => array(
				'type' => 'CHAR',
				'constraint' => '4',
				'NULL' => TRUE
			), 
			//AGENCIA
			'AGENCIA' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'NULL' => TRUE
			),
			//ITEM
			'ITEM' => array(
				'type' => 'CHAR',
				'constraint' => '4',
				'NULL' => TRUE
			),
			//PRODUCTO
			'PRODUCTO' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'NULL' => TRUE
			),
			//PRESENTACION
			'PRESENTACION' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,3',
				'NULL' => TRUE
			),
			//UNID_KG_LT
			'UNID_KG_LT' => array(
				'type' => 'VARCHAR',
				'constraint' => '5',
				'NULL' => TRUE
			), 
			//TOT_VOLUMEN
			'TOT_VOLUMEN' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,3',
				'NULL' => TRUE
			),
			//CODIGO
			'CODIGO' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
				'NULL' => TRUE
			),
			//DESCRI
			'DESCRI' => array(
				'type' => 'VARCHAR',
				'constraint' => '500',
				'NULL' => TRUE
			),
			//CANTI
			'CANTI' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,3',
				'NULL' => TRUE
			),
			//PRECIO
			'PRECIO' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,2',
				'NULL' => TRUE
			),
			//UNID
			'UNID' => array(
				'type' => 'VARCHAR',
				'constraint' => '5',
				'NULL' => TRUE
			),
			//VALORVTA
			'VALORVTA' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,2',
				'NULL' => TRUE
			),
			//IGV
			'IGV' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,2',
				'NULL' => TRUE
			),
			//PRECIOVTA
			'PRECIOVTA' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,2',
				'NULL' => TRUE
			),
			//VALORVTA_US
			'VALORVTA_US' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,3',
				'NULL' => TRUE
			),
			//VALORVTA_MN
			'VALORVTA_MN' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,3',
				'NULL' => TRUE
			),
			//PRECIOVTA_US
			'PRECIOVTA_US' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,3',
				'NULL' => TRUE
			),
			//PRECIOVTA_MN
			'PRECIOVTA_MN' => array(
				'type' => 'DECIMAL',
				'constraint' => '16,3',
				'NULL' => TRUE
			),
			'ID' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			),
			'AVANCE' => array(
				'type' => 'INT',
				'NULL' => TRUE
			)
		));
	
		$this->dbforge->create_table($vtbl);

		# ES LA FORMA QUE ENCONTRE PARA INSERTAR DE UN STORED PROCEDURE A UNA TABLA
		$inserttbl = "	INSERT INTO $vtbl (
						COD,
						EMPRESA,
						ZONA,
						COD_VEN,
						VENDEDOR,
						COD_CLIENTE,
						CLIENTE,
						TD,
						DOCUMENTO,
						FECHA_EMISION,
						FECHA_VENCIMIENTO,
						MES_EMI,
						ANIO_EMI,
						DIAS_PLAZO,
						MON,
						TIPCAMV,
						TIPCAMC,
						IMPORTEDOC,
						CODAGE,
						AGENCIA,
						ITEM,
						PRODUCTO,
						PRESENTACION,
						UNID_KG_LT,
						TOT_VOLUMEN,
						CODIGO,
						DESCRI,
						CANTI,
						PRECIO,
						UNID,
						VALORVTA,
						IGV,
						PRECIOVTA,
						VALORVTA_US,
						VALORVTA_MN,
						PRECIOVTA_US,
						PRECIOVTA_MN
						)
						SELECT * FROM OPENROWSET ('SQLOLEDB','Server=(local);TRUSTED_CONNECTION=YES;','set fmtonly off EXEC [RSFACCAR].dbo.[SP_HISTORICO_DEUDA_DETALLE_XXX] $vop,''$vcod'',''$vcod_cliente'',''$vtd'',''$vemini'',''$vemifin'' ') ";

		$resultado = $this->mssql->query($inserttbl);

	echo json_encode(array('rst' => true, 'msg' => 'Se Proceso Exitosamente', 'cant'=>$cant ));

	}

	public function ResetProgressBar($id){
		$RPgBar = " 	UPDATE 
						PROGRESSBAR SET 
						EXECUTED=0,
						TOTAL=0, 
						PERCENTAGE=0,
						EXECUTE_TIME='',
						DATE_ADD= NULL
						WHERE 
						ID_PROCESS = $id";
		$resulRPgBar = $this->mssql->query($RPgBar);
		echo json_encode(array('rst' => true, 'msg' => 'Se Reseteo ProgressBar'));

	}

	public function DeleteTableTMP($vtbl){
		$deteletbl = " 	DROP TABLE $vtbl";
		$resuldeteletbl = $this->mssql->query($deteletbl);
		echo json_encode(array('rst' => true, 'msg' => 'Se DeleteO Table '.$vtbl));

	}

	public function ObtenerCliente($filtro){

		$query = "	SELECT 
					COD_CLIENTE +' - '+ CLIENTE AS NOMBRE
					FROM 
					VIEW_ALL_CLIENT_ACTIVE 
					WHERE
					RTRIM(LTRIM(COD_CLIENTE)) LIKE '%$filtro%' OR RTRIM(LTRIM(CLIENTE)) LIKE '%$filtro%'
					GROUP BY COD_CLIENTE,CLIENTE";
		$rstquery = $this->mssql->query($query);
		//echo json_encode(array('rst' => true, 'msg' => 'Se DeleteO Table '.$vtbl));

		//$rstquery->result_array();

		foreach($rstquery->result_array() as $row){
			$json[] = $row['NOMBRE'];
		}

		echo json_encode($json);

	}

	public function Consultar_Historico_Detalle( $vcod, $vcod_cliente, $vtd, $vemini, $vemifin){
		$query = " EXECUTE SP_HISTORICO_DEUDA_DETALLE_XXX ?,?,?,?,?,? ";
		$data = array(
			'op' 			=> 1, 
			'cod' 			=> $vcod, 
			'cod_cliente' 	=> $vcod_cliente, 
			'td' 			=> $vtd,
			'emini' 		=> $vemini,
			'emifin' 		=> $vemifin
			//'tbl' 			=> $vtbl
		);
		$result = $this->mssql->query($query,$data);
		//return $result->result_array();
		echo(json_encode($result->result_array()));

	}



   
}
