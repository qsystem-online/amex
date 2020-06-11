<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Return_detail extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        $this->load->library('PHP_AES_Cipher');
    }

    public function index(){
        $this->load->model("appid_model");

        $key = "com_armex_key";

        
        //APPID|fstReturnId|CustCode
        $token = $this->input->get("token");
        
        //$token = PHP_AES_Cipher::encrypt($key,"1234567890123456","JPU1|20200522201536121|_SSANT007");
        $strResult = PHP_AES_Cipher::decrypt($key,$token);
        
        $arrResult = explode("|",$strResult);
        if (sizeof($arrResult) == 3){
            
            $appId = $arrResult[0];
            $returnId = $arrResult[1];            
            $fstCustCode = $arrResult[2];            
            $rwSales = $this->appid_model->getSales($appId,null,$fstCustCode);
            if ($rwSales != null){
                $returnId .= "_" .$rwSales->fst_sales_code;
            }		


            $ssql ="SELECT a.*,b.fst_sales_name,c.fst_cust_name FROM tr_return a 
                inner join  tbsales b on a.fst_sales_code = b.fst_sales_code
                inner join  tbcustomers c on a.fst_cust_code = c.fst_cust_code
                where fst_return_id = ?";

            $qr = $this->db->query($ssql,[$returnId]);
            //var_dump($this->db->last_query());
            //die();
            $header = $qr->row_array();
            
            $data=[];
            if ($header != null){
                //echo $returnId;
                $ssql = "SELECT a.*,b.fst_item_name from tr_return_details a 
                    INNER JOIN tbitems b on a.fst_item_code = b.fst_item_code
                    WHERE fst_return_id = ?";

                $qr = $this->db->query($ssql,[$returnId]);

                $details = $qr->result();
                //var_dump($details);

                $data["header"]=$header;
                $data["details"]=$details;

                $this->parser->parse('pages/return/receipt',$data);
            }else{
                echo "Kode [$returnId] Return belum tersedia, coba beberapa saat lagi !";
            }
            

        }else{
            //Data Not ready;
            echo "Kode token tidak valid..!!, hubungi sales "; 
        }


        //var_dump($token);
        //var_dump($arrResult);
    }


}
