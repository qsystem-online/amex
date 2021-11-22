<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sales_model extends MY_Model {
	public $tableName = "tbsales";
	public $pkey = "fst_sales_code";
	
	public function  __construct(){
		parent::__construct();
	}

	
	public function getRules($mode="ADD",$id=0){
		$rules = [];
		return $rules;		
    }
    
    public function get_select2(){
		$user = $this->aauth->user();
        $companyActive = $user->fst_company_code;
		if ($companyActive !="" || $companyActive != null){
			$ssql = "select fst_sales_code, fst_sales_name from " . $this->tableName . " where fst_company_code= '$companyActive' and fst_active = 'A'";
		}else{
			$ssql = "select fst_sales_code, fst_sales_name from " . $this->tableName . " where fst_active = 'A'";
		}
        $qr = $this->db->query($ssql,[]);
        $rs = $qr->result();
        return $rs;
    }
}
