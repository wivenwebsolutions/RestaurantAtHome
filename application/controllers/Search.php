<?php
/**
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	/**
	 * Index Page for this controller.
		 * MARK: This page is set as the main controller!
	 */
	public function index() {
		$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

		switch ($lang){
			case "nl":
				$data_header = array(
					'page_title' => ' - Zoeken',
					'additional_styles' => "<link rel='stylesheet' href='".public_url()."css/min/client_styles.min.css'>
					<link rel='stylesheet' href='".public_url()."css/min/sweetalert.min.css'>"
				);

				$data_footer = array(
					'additional_scripts' => "<script src='".public_url()."js/min/search.min.js'></script>
					<script src='http://maps.google.com/maps/api/js?sensor=false' type='text/javascript'></script>
					<script src='".public_url()."js/min/sweetalert.min.js'></script>"
				);

				$this->load->view('/common/header', $data_header);
				$this->load->view('/common/top_menu_clients');
				$this->load->view('search');
				$this->load->view('/common/footer_clients', $data_footer);

				break;
			case "fr":
				$data_header = array(
					'page_title' => ' - Chercher',
					'additional_styles' => "<link rel='stylesheet' href='".public_url()."css/min/client_styles.min.css'>"
				);

				$data_footer = array(
					'additional_scripts' => "<script src='".public_url()."js/min/search.min.js'></script>
					<script src='http://maps.google.com/maps/api/js?sensor=false' type='text/javascript'></script>"
				);

				$this->load->view('/common/header', $data_header);
				$this->load->view('/common/top_menu_clients');
				$this->load->view('search');
				$this->load->view('/common/footer_clients', $data_footer);

				break;
			case "en":
				$data_header = array(
					'page_title' => ' - Search',
					'additional_styles' => "<link rel='stylesheet' href='".public_url()."css/min/client_styles..mincss'>"
				);

				$data_footer = array(
					'additional_scripts' => "<script src='".public_url()."js/search.js'></script>
					<script src='http://maps.google.com/maps/api/js?sensor=false' type='text/javascript'></script>
<!--<script src='".public_url()."js/pace.min.js'></script><script src='//fast.eager.io/r8wePleTBw.js'></script>-->"
				);

				$this->load->view('/common/header', $data_header);
				$this->load->view('/common/top_menu_clients');
				$this->load->view('search');
				$this->load->view('/common/footer_clients', $data_footer);

				break;
			default:
				$data_header = array(
					'page_title' => ' - Search',
					'additional_styles' => "<link rel='stylesheet' href='".public_url()."css/min/client_styles.min.css'>"
				);

				$data_footer = array(
					'additional_scripts' => "<script src='".public_url()."js/min/search.min.js'></script>
					<script src='http://maps.google.com/maps/api/js?sensor=false' type='text/javascript'></script>"
				);

				$this->load->view('/common/header', $data_header);
				$this->load->view('/common/top_menu_clients');
				$this->load->view('search');
				$this->load->view('/common/footer_clients', $data_footer);

				break;
		}

		/*
		$data_header = array(
			'page_title' => ' - Zoeken'
			//'language_test' => lang('hello')
		);

		$this->load->view('/common/header', $data_header);
		$this->load->view('/common/top_menu_clients');
		$this->load->view('search');
		$this->load->view('/common/footer_clients');
		*/
	}

	public function restaurantdetail() {
		$data_header = array(
			'page_title' => ' - Restaurant',
			'additional_styles' => "<link rel='stylesheet' href='".public_url()."css/min/client_styles.min.css'>"
		);

		$data_footer = array(
			'additional_scripts' => "<script src='http://maps.google.com/maps/api/js?sensor=false' type='text/javascript'></script>
		<script src='".public_url()."js/min/restaurantdetail.min.js'></script>"
		);

		$this->load->view('/common/header', $data_header);
		$this->load->view('/common/top_menu_clients');
		$this->load->view('restaurantdetail');
		$this->load->view('/common/footer_clients', $data_footer);
	}
}

/* EOF */
