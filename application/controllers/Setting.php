<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Setting extends MY_Controller {

	function index(){
		$this->load->library("menus");
		//$this->load->model("groups_model");

		if($this->input->post("submit") != "" ){
			$this->add_save();
		}

        $main_header = $this->parser->parse('inc/main_header',[],true);
		$main_sidebar = $this->parser->parse('inc/main_sidebar',[],true);

		//$data["mode"] = $mode;
		$data["title"] ="System Setting";
		//$data["fin_user_id"] = $fin_user_id;

		$page_content = $this->parser->parse('pages/setting',$data,true);
		$main_footer = $this->parser->parse('inc/main_footer',[],true);
			
		$control_sidebar = NULL;
		$this->data["MAIN_HEADER"] = $main_header;
		$this->data["MAIN_SIDEBAR"] = $main_sidebar;
		$this->data["PAGE_CONTENT"] = $page_content;
		$this->data["MAIN_FOOTER"] = $main_footer;
		$this->data["CONTROL_SIDEBAR"] = $control_sidebar;
		$this->parser->parse('template/main',$this->data);
	}

	function set_sidebar_collapse($value){		
		$this->session->set_userdata('sidebar_collapse', $value);	
		//$this->session->userdata('sidebar_collapse');
	}

	function ajxChangeValue(){
		$name = $this->input->get("name");
		$value = $this->input->get("value");

		if ($name == "min_order"){
			$ssql = "update config set fst_value = ? where fst_key ='min_order'";
			$this->db->query($ssql,[$value]);			
		}
		$this->json_output([
			"status"=>"SUCCESS",
			"messages"=>"",
			"data"=>[]
		]);
		
	}

	
}
