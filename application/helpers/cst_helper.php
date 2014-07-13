<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('permissionLogin')){
	function permissionLogin()
	{
		$CI =& get_instance();
		if(!$CI->session->userdata("user_id_group")){
			redirect(base_url()."index.php/security/gate");
		}		
		return $CI->session->userdata("user_id_group");
	}
}

if (!function_exists('pre')){	
	function pre($data)
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}
}

if (!function_exists('GetValue')){
	function GetValue($field,$table,$filter=array(),$order=NULL)
	{
		$CI =& get_instance();
		$CI->db->select($field);
		foreach($filter as $key=> $value)
		{
			$exp = explode("/",$value);
			if(isset($exp[1]))
			{
				if($exp[0] == "where") $CI->db->where($key, $exp[1]);
				else if($exp[0] == "like") $CI->db->like($key, $exp[1]);
				else if($exp[0] == "order") $CI->db->order_by($key, $exp[1]);
				else if($key == "limit") $CI->db->limit($exp[1], $exp[0]);
			}
			
			if($exp[0] == "group") $CI->db->group_by($key);
		}
		
		if($order) $CI->db->order_by($order);
		$q = $CI->db->get($table);
		foreach($q->result_array() as $r)
		{
			return $r[$field];
		}
		return 0;
	}
}

if (!function_exists('GetValue')){
	function GetValue($field,$table,$filter=array(),$order=NULL)
	{
		$CI =& get_instance();
		$CI->db->select($field);
		foreach($filter as $key=> $value)
		{
			$exp = explode("/",$value);
			if(isset($exp[1]))
			{
				if($exp[0] == "where") $CI->db->where($key, $exp[1]);
				else if($exp[0] == "like") $CI->db->like($key, $exp[1]);
				else if($exp[0] == "order") $CI->db->order_by($key, $exp[1]);
				else if($key == "limit") $CI->db->limit($exp[1], $exp[0]);
			}
			
			if($exp[0] == "group") $CI->db->group_by($key);
		}
		
		if($order) $CI->db->order_by($order);
		$q = $CI->db->get($table);
		foreach($q->result_array() as $r)
		{
			return $r[$field];
		}
		return 0;
	}
}

if (!function_exists('GetManyValue')){
	function GetManyValue($field,$table,$filter=array(),$order=NULL)
	{
		$CI =& get_instance();
		$CI->db->select($field);
		foreach($filter as $key=> $value)
		{
			$exp = explode("/",$value);
			if(isset($exp[1]))
			{
				if($exp[0] == "where") $CI->db->where($key, $exp[1]);
				else if($exp[0] == "like") $CI->db->like($key, $exp[1]);
				else if($exp[0] == "order") $CI->db->order_by($key, $exp[1]);
				else if($key == "limit") $CI->db->limit($exp[1], $exp[0]);
			}
			
			if($exp[0] == "group") $CI->db->group_by($key);
		}
		
		if($order) $CI->db->order_by($order);
		$q = $CI->db->get($table);
		return $q;
	}
}

if (!function_exists('GetQuery')){
	function GetQuery($field,$table,$where='',$order='',$group='')
	{
		$CI =& get_instance();
		$where = !empty($where) ? "WHERE ".$where : "";
		$order = !empty($order) ? "ORDER BY ".$order : "";
		$group = !empty($group) ? "GROUP BY ".$group : "";
		
		$q = $CI->db->query("SELECT $field FROM $table $where $order $group");
		
		return $q;
	}
}

if (!function_exists('Insert')){	
	function Insert($table, $data)
	{
		$CI =& get_instance();
		$CI->db->insert($table, $data);
	}
}

if (!function_exists('Update')){	
	function Update($table,$data,$filter=array(),$order=NULL)
	{
		$CI =& get_instance();
		foreach($filter as $key=> $value)
		{
			$exp = explode("/",$value);
			if(isset($exp[1]))
			{
				if($exp[0] == "where") $CI->db->where($key, $exp[1]);
			}
		}
		$CI->db->update($table, $data);
	}
}

if (!function_exists('Delete')){	
	function Delete($table,$filter=array())
	{
		$CI =& get_instance();
		foreach($filter as $key=> $value)
		{
			$exp = explode("/",$value);
			if(isset($exp[1]))
			{
				if($exp[0] == "where") $CI->db->where($key, $exp[1]);
			}
		}
		$CI->db->delete($table);
	}
}

if (!function_exists('GetAllCount')){
	function GetAllCount($table,$field)
	{
		$CI =& get_instance();
		$CI->db->select("$field as label, COUNT($field) as total");
		$q = $CI->db->get($table);
		
		return $q;
	}
}

if (!function_exists('GetCount')){
	function GetCount($table,$field,$filter=array())
	{
		$CI =& get_instance();
		$CI->db->select("$field as label, COUNT($field) as total");
		foreach($filter as $key=> $value)
		{
			$exp = explode("/",$value);
			if(isset($exp[1]))
			{
				if($exp[0] == "where") $CI->db->where($key, $exp[1]);
				else if($exp[0] == "like") $CI->db->like($key, $exp[1]);
				else if($exp[0] == "order") $CI->db->order_by($key, $exp[1]);
				else if($key == "limit") $CI->db->limit($exp[1], $exp[0]);
			}
			
			if($exp[0] == "group") $CI->db->group_by($key);
		}
		$q = $CI->db->get($table);
		
		return $q;
	}
}
?>