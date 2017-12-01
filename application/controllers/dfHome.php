<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();

        $this->load->model("content_model", "content");

//        // Check whether admin is logged in
//        $admin_logged_in = $this->session->userdata('admin_logged_in');
//        if (!isset($admin_logged_in) || $admin_logged_in == false) {
//            redirect('admin/login');
//        }
    }

    public function index() {

//         $string = file_get_contents("./site/index.html");
//        
//        echo $string;

        $this->view("index");
    }
    
    
    

    public function view($u1, $u2 = "", $u3 = "", $u4 = "") {

        $nceadminmode = $this->input->get("nceadminmode");

        $string = file_get_contents("./site/$u1.html");


        $admin_logged_in = $this->session->userdata('admin_logged_in');

        /**
         * WYSYWYG Wrapper 
         */
        if ($admin_logged_in == FALSE || $nceadminmode == "f") {

            echo $string;
        } else {
            $html = str_get_html($string);


            // $html->find('body', 0)->innertext ="blah blah blah bli bli bli";

            $oldhtmlbody = $html->find('body', 0)->innertext;

            $scrpt = '<script class="hmsadmin" type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js" ></script>';
            $scrpt .= $this->load->view("admin/wysiwyg/nicinit", array(), true);
            $scrpt .= $this->load->view("admin/wysiwyg/nicpanel", array(), true);


            $scrpt .= "<div data-vw1='$u1' id='hmsbdy'>$oldhtmlbody</div>";


            $scrpt.= "<script class='hmsadmin' type='text/javascript'>
                            //<![CDATA[
                           bkLib.onDomLoaded(function() {
                               myNicEditor.addInstance('hmsbdy');
                           });
                           //]]>
                       </script>";
            
            

            $html->find('body', 0)->innertext = $scrpt;
            
            echo $html;
        }
    }

}
