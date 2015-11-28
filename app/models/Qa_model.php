<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package     Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author      Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version     1.0
 * @license     MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
 */
class Qa_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		
	}

    function all($table, $order)
    {
        $this->db->from($table);
        $this->db->order_by($order);
        $query = $this->db->get();
        if ($query->num_rows() == 0){
            return FALSE;
        } else {
            return $query->result();
        }
    }

    function get($table, $where)
    {
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() == 0){
            return FALSE;
        } else {
            return $query->result();
        }
    }

    function get_array($table, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field => $value) {
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

    function join_where($table1, $table2, $join, $where, $order)
    {
        $this->db->from($table1);
        $this->db->join($table2, $join);
        $this->db->where($where);
        $this->db->order_by($order);
        $query = $this->db->get();
        if ($query->num_rows() == 0){
            return FALSE;
        } else {
            return $query->result();
        }
    }

    function join2_where($table1, $table2, $table3, $join1, $join2, $where, $order)
    {
        $this->db->from($table1);
        $this->db->join($table2, $join1);
        $this->db->join($table3, $join2);
        $this->db->where($where);
        $this->db->order_by($order);
        $query = $this->db->get();
        if ($query->num_rows() == 0){
            return FALSE;
        } else {
            return $query->result();
        }
    }

    function join3_where($table1, $table2, $table3, $table4, $join1, $join2, $join3, $where, $order)
    {
        $this->db->from($table1);
        $this->db->join($table2, $join1);
        $this->db->join($table3, $join2);
        $this->db->join($table4, $join3);
        $this->db->where($where);
        $this->db->order_by($order);
        $query = $this->db->get();
        if ($query->num_rows() == 0){
            return FALSE;
        } else {
            return $query->result();
        }
    }

    function join4_where($table1, $table2, $table3, $table4, $table5, $join1, $join2, $join3, $join4, $where, $order)
    {
        $this->db->from($table1);
        $this->db->join($table2, $join1);
        $this->db->join($table3, $join2);
        $this->db->join($table4, $join3);
        $this->db->join($table5, $join4);
        $this->db->where($where);
        $this->db->order_by($order);
        $query = $this->db->get();
        if ($query->num_rows() == 0){
            return FALSE;
        } else {
            return $query->result();
        }
    }

    function insert($table, $data)
    {
        if ($this->db->insert($table, $data)) {
            $this->db->insert_id();
            return $this->db->affected_rows();
        } else {
            return FALSE;
        }
    }

    function update($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
        return $this->db->affected_rows();
    }

    function delete($table, $where) {
        $this->db->delete($table, $where);
        return $this->db->affected_rows();
    }

    function count($table)
    {
        $this->db->from($table);
        $count = $this->db->count_all_results();
        if ($count == 0) {
            return FALSE;
        } else {
            return $count;
        }
    }

    function count_where($table, $where)
    {
        $this->db->from($table);
        $this->db->where($where);
        $count = $this->db->count_all_results();
        if ($count == 0) {
            return FALSE;
        } else {
            return $count;
        }
    }
}