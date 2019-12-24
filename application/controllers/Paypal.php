<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paypal extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('cliente_model');
		$this->load->model('paypal_model');
		$this->load->model('fatura_model');
	}
	public function plus()
	{
		$this->load->view('paypal/plus');
	}
	public function checkout()
	{
		$this->load->view('paypal/checkout');
	}
	public function index()
	{
		$data['cliente'] = $this->cliente_model->get(1);
		$this->load->view('paypal/index', $data);
	}
	public function success()
	{
		$this->load->view('paypal/success');
		// $data = array(
		// 	'tx'=>$_GET['tx'],
		// 	'item'=>$_GET['item_number'],
		// 	'amt'=>$_GET['amt'],
		// 	'cc'=>$_GET['cc'],
		// 	'st'=>$_GET['st'],
		// );
		// $this->paypal_model->insert($data);
	}
	public function cancel()
	{
		$this->load->view('paypal/cancel');
	}
	public function notify()
	{
		$this->load->view('paypal/notify');
	}
}