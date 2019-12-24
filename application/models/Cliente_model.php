<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Cliente_model extends MY_Model
	{
		public $_table = 'clientes';
		public $primary_key = 'id';

		public function teste()
		{
			$this->db->join('boletos', 'boletos.cliente_id = clientes.id');
			return $this;
		}		
	}