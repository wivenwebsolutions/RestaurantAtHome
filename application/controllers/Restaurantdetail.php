<?php
/**
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurantdetail extends CI_Controller {

    /**
     * Index Page for this controller.
     * MARK: This page is set as the main controller!
     */
    public function index() {
        $data_header = array(
            'page_title' => ' - Restaurant',
            'additional_styles' => "<link rel='stylesheet' href='".public_url()."css/client_styles.css'>"
        );

        $data_footer = array(
            'additional_scripts' => "<script src='http://maps.google.com/maps/api/js?sensor=false' type='text/javascript'></script>
        <script src='".public_url()."js/restaurantdetail.js'></script>"
        );

        $this->load->view('/common/header', $data_header);
        $this->load->view('/common/top_menu_clients');
        $this->load->view('restaurantdetail');
        $this->load->view('/common/footer_clients', $data_footer);
    }
}

/* EOF */
