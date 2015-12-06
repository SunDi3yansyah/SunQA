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

    function all_where($table, $where, $order)
    {
        $this->db->from($table);
        $this->db->where($where);
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

    function get_two($table, $where1, $where2)
    {
        $this->db->from($table);
        $this->db->where($where1);
        $this->db->where($where2);
        $query = $this->db->get();
        if ($query->num_rows() == 0){
            return FALSE;
        } else {
            return $query->result();
        }
    }

    function get_result_array($table, $field)
    {
        $this->db->from($table);
        $this->db->where($field);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        } else {
            return FALSE;
        } 
    }

    function get_array($table, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        if ($where !== NULL)
        {
            if (is_array($where))
            {
                foreach ($where as $field => $value)
                {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where($where);
            }
        }
        $result = $this->db->get()->result();
        if ($result)
        {
            if ($where !== NULL)
            {
                return array_shift($result);
            }
            else
            {
                return $result;
            }
        }
        else
        {
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

    function join2($table1, $table2, $table3, $join1, $join2, $order)
    {
        $this->db->from($table1);
        $this->db->join($table2, $join1);
        $this->db->join($table3, $join2);
        $this->db->order_by($order);
        $query = $this->db->get();
        if ($query->num_rows() == 0){
            return FALSE;
        } else {
            return $query->result();
        }
    }

    function join2_ajax($table1, $table2, $table3, $join1, $join2, $order, $limit, $offset)
    {
        $this->db->from($table1);
        $this->db->join($table2, $join1);
        $this->db->join($table3, $join2);
        $this->db->limit($limit, $offset);
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
        if ($this->db->insert($table, $data))
        {
            $this->db->insert_id();
            return $this->db->affected_rows();
        }
        else
        {
            return FALSE;
        }
    }

    function update($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
        return $this->db->affected_rows();
    }

    function delete($table, $where)
    {
        $this->db->delete($table, $where);
        return $this->db->affected_rows();
    }

    function count($table)
    {
        $this->db->from($table);
        $count = $this->db->count_all_results();
        if ($count == 0)
        {
            return FALSE;
        }
        else
        {
            return $count;
        }
    }

    function count_where($table, $where)
    {
        $this->db->from($table);
        $this->db->where($where);
        $count = $this->db->count_all_results();
        if ($count == 0)
        {
            return FALSE;
        }
        else
        {
            return $count;
        }
    }

    function count_where2($table, $where1, $where2)
    {
        $this->db->from($table);
        $this->db->where($where1);
        $this->db->where($where2);
        $count = $this->db->count_all_results();
        if ($count == 0)
        {
            return FALSE;
        }
        else
        {
            return $count;
        }
    }

    function count_join_where($table1, $table2, $join, $where)
    {
        $this->db->from($table1);
        $this->db->join($table2, $join);
        $this->db->where($where);
        $count = $this->db->count_all_results();
        if ($count == 0)
        {
            return FALSE;
        }
        else
        {
            return $count;
        }
    }

    function viewers($table, $field, $where)
    {
        $this->db->from($table);
        $this->db->set($field, "$field+1", FALSE);
        $this->db->where($where);
        $query = $this->db->update();
        if ($query == 0){
            return FALSE;
        } else {
            return $query;
        }
    }
}