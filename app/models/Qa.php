<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qa extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		
	}

    function get($table, $where) {
        $this->db->select('*');
        $this->db->from($table);
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field=>$value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where($where);
            }
        }
        $result = $this->db->get()->result();
        if ($result) {
            if ($where !== NULL) {
                return array_shift($result);
            } else {
                return $result;
            }
        } else {
            return FALSE;
        }
    }

    function insert($table, $data) {
        if ($this->db->insert($table, $data)) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }

    function update($table, $data, $where) {
            if (!is_array($where)) {
                $where = array($where);
            }
        $this->db->update($table, $data, $where);
        return $this->db->affected_rows();
    }

    function delete($table, $where) {
        if (!is_array()) {
            $where = array($where);
        }
        $this->db->delete($table, $where);
        return $this->db->affected_rows();
    }
}