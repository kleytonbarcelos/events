<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Paypal_model extends MY_Model
	{
		public $_table = 'paypal_transacoes';
		public $primary_key = 'id';
	}