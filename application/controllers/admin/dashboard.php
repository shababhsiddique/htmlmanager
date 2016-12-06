<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of dashboard
 *
 * @author shabab
 */
class Dashboard extends CI_Controller {

    /**
     * Constructor
     * @author Shabab Haider Siddique
     */
    public function __construct() {
        parent::__construct();

        // Check whether admin is logged in
        $admin_logged_in = $this->session->userdata('admin_logged_in');
        if (!isset($admin_logged_in) || $admin_logged_in == false) {
            redirect('admin/login');
        }
    }

    public function index() {
        $url = $this->input->get("editurl");
        $this->load->view('admin/dash',array("url"=>$url));
    }
    
    

    public function ajaxWysiwygHandler() {

        $vw1 = $this->input->post("vw1");
        $content = $this->input->post('update');
        
        

        $string = file_get_contents("./site/$vw1.html");
        $html = str_get_html($string);


        $html->find('body', 0)->innertext = $content;
        
        $html = str_replace("> ", ">\r\n", $html);
        file_put_contents("./site/$vw1.html", $html);
        
    }

    /**
     * Log out and Remove Session values
     * @author Shabab Haider Siddique
     * @param --- none
     * @return --- none
     * date --- 10/11/2012 (mm/dd/yyyy  )
     */
    public function logout() {

        $this->session->sess_destroy();
        $this->session->unset_userdata('admin_user_name');
        $this->session->unset_userdata('admin_logged_in');
        $this->session->unset_userdata('admin_name');
        $this->session->unset_userdata('admin_privilage_level');
        $this->session->unset_userdata('admin_user_id');

        $sessionData = setmessage("Logged Out", "from admin ", "info");
        $this->session->set_userdata($sessionData);

//        session_destroy();

        redirect('admin', 'refresh');
    }

}