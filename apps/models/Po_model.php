<?php defined('BASEPATH') or exit('No direct script access allowed');

class Po_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getallppopadi($param){
        $where = 'WHERE 1=1';
        if($param['ponumber'] != ''){
            $where .= " AND a.ponumber LIKE '%".$param['ponumber']."%' ";
        }

        /*$query = "SELECT 
                        a.*, GROUP_CONCAT(b.namaunit) AS namaunit 
                    FROM tb_ppo AS a
                    LEFT JOIN tb_ppounit AS b ON b.id_ppo = a.id_ppo
                        ". $where ." 
                    ORDER BY a.id_ppo DESC";*/
		$query = "
					SELECT * FROM tb_ppo AS a
                    LEFT JOIN tb_ppounit AS b ON b.id_ppo = a.id_ppo
					". $where ." 
					GROUP BY a.id_ppo
                    ORDER BY a.id_ppo DESC";
        $sql = $this->db->query($query);
        $data = $sql->result_array();

        $this->db->close();
        return $data;
    }

    function getsingleditpo($id){
        $query = "SELECT * FROM tb_ppo WHERE id_ppo = ". $id ." ORDER BY id_ppo DESC";
        $sql = $this->db->query($query);
        $data = $sql->result_array();

        $this->db->close();
        return $data;
    }

    function getunit($id){
        $query = "SELECT * FROM tb_ppounit WHERE id_ppo = ". $id ." ORDER BY id_ppounit ASC";
        $sql = $this->db->query($query);
        $data = $sql->result_array();

        $this->db->close();
        return $data;
    }

    function getponumberpadi(){
        $query = "SELECT ponumber FROM tb_ppo ORDER BY id_ppo DESC LIMIT 1";
        $sql = $this->db->query($query);
        $data = $sql->result_array();

        $this->db->close();
        return $data;
    }

    function getnewid(){
        $query = "SELECT MAX(id_ppo) AS total FROM tb_ppo";
        $sql = $this->db->query($query);
        $data = $sql->result_array();
        $this->db->close();
        return $data[0]['total']+1;
    }

    function insertpadi($param){
        if(!empty($param)){
            $sql  = "INSERT INTO tb_ppo";
            $sql .= " (`".implode("`, `", array_keys($param))."`)";
            $sql .= " VALUES ('".implode("', '", $param)."') ";
            $this->db->query($sql);
        }
    }

    function updatepadi($param, $id, $custom=''){
        array_walk($param, function (&$value, $key) {
            $value = "`$key` = '$value'";
        });
        $set_update = implode(", ", array_values($param));

        if(!empty($custom)){
            array_walk($custom, function (&$value, $key) {
                $value = "`$key` $value";
            });
            $set_custom = implode(", ", array_values($custom));
            $set_update .= ", ".$set_custom;
        }

        $column_id = key($id);
        $value_id = current($id);

        $sql = "UPDATE tb_ppo SET ".$set_update." WHERE `".$column_id."` = '".$value_id."'";
        $this->db->query($sql);
        return TRUE;
    }

    function updatepadiunit($param, $id, $custom=''){
        array_walk($param, function (&$value, $key) {
            $value = "`$key` = '$value'";
        });
        $set_update = implode(", ", array_values($param));

        if(!empty($custom)){
            array_walk($custom, function (&$value, $key) {
                $value = "`$key` $value";
            });
            $set_custom = implode(", ", array_values($custom));
            $set_update .= ", ".$set_custom;
        }

        $column_id = key($id);
        $value_id = current($id);

        $sql = "UPDATE tb_ppounit SET ".$set_update." WHERE `".$column_id."` = '".$value_id."'";
        $this->db->query($sql);
        return TRUE;
    }
}