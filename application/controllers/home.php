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
        
        $this->load->model("content_model","content");

//        // Check whether admin is logged in
//        $admin_logged_in = $this->session->userdata('admin_logged_in');
//        if (!isset($admin_logged_in) || $admin_logged_in == false) {
//            redirect('admin/login');
//        }
    }

    public function index() {

        $this->load->view('welcome_message');
    }

}
