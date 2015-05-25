<?php
/**
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    /**
     * Index Page for this controller.
     * MARK: This page is set as the main controller!
     */
    public function index()
    {

        $data_header = array(
            'page_title' => ' - Contact'
        );

        $this->load->view('/common/header', $data_header);
        $this->load->view('/common/top_menu');
        $this->load->view('contact');
        $this->load->view('/common/footer');
    }
}

/* EOF */
