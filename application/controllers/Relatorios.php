<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorios extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('fatura_model');
		$this->load->model('evento_model');
		$this->load->model('cliente_model');
	}
	public function index()
	{
		$data['eventos'] = $this->evento_model->select('id, nome, url')->get( array('produtor_id'=>$this->session->dados_usuario->id) );
		$this->template->load('produtor/index', 'relatorios/index', $data);
	}
	public function inscritos($evento_id)
	{
		$data['dados'] = array();
		$evento = $this->evento_model->select('id,nome')->get($evento_id);
		$data['evento'] = $evento;
		if($evento)
		{
			$evento = array_to_row($evento);

			$faturas =  $this->fatura_model->get( array('evento_id'=>$evento->id) );
			if($faturas)
			{
				//$fatura = array_to_row($fatura);
				foreach ($faturas as $fatura)
				{
					$cliente = $this->cliente_model->get($fatura->cliente_id);
					if($cliente)
					{
						$cliente = array_to_row($cliente);

						$cliente->{'dados_fatura'} = $fatura;
						array_push($data['dados'], $cliente);
					}
				}
			}
		}
		$this->template->load('produtor/index', 'relatorios/inscritos', $data);
	}
	public function pagantes($evento_id)
	{
		$data['dados'] = array();
		$evento = $this->evento_model->select('id,nome')->get($evento_id);
		$data['evento'] = $evento;
		if($evento)
		{
			$evento = array_to_row($evento);

			$faturas =  $this->fatura_model->get( array('evento_id'=>$evento->id, 'status'=>'regular') );
			if($faturas)
			{
				foreach ($faturas as $fatura)
				{
					$cliente = $this->cliente_model->get($fatura->cliente_id);
					if($cliente)
					{
						$cliente = array_to_row($cliente);

						$cliente->{'dados_fatura'} = $fatura;
						array_push($data['dados'], $cliente);
					}
				}
			}
		}
		$this->template->load('produtor/index', 'relatorios/pagantes', $data);
	}
	public function naopagantes($evento_id)
	{
		$data['dados'] = array();
		$evento = $this->evento_model->select('id,nome')->get($evento_id);
		$data['evento'] = $evento;
		if($evento)
		{
			$evento = array_to_row($evento);

			$faturas =  $this->fatura_model->get( array('evento_id'=>$evento->id, 'status'=>'pendente') );
			if($faturas)
			{
				foreach ($faturas as $fatura)
				{
					$cliente = $this->cliente_model->get($fatura->cliente_id);
					if($cliente)
					{
						$cliente = array_to_row($cliente);

						$cliente->{'dados_fatura'} = $fatura;
						array_push($data['dados'], $cliente);
					}
				}
			}
		}
		$this->template->load('produtor/index', 'relatorios/naopagantes', $data);
	}
	public function fichascadastrais($evento_id)
	{
		$data['evento'] = $this->evento_model->get($evento_id);
		if($data['evento'])
		{
			$clientes = $this->db->query('
				SELECT
					clientes.*, faturas.id as "inscricao"
				FROM
					clientes
				INNER JOIN faturas
					ON clientes.id=faturas.cliente_id
				WHERE
					faturas.evento_id='.$evento_id.' AND faturas.status="regular"
				ORDER BY
					clientes.nome ASC;
			')->result();
			$data['dados'] = $clientes;
		}
		$this->template->load('produtor/index', 'relatorios/fichascadastrais', $data);
	}
	public function termosdeuso($evento_id)
	{
		$data['evento'] = $this->evento_model->get($evento_id);
		if($data['evento'])
		{
			$clientes = $this->db->query('
				SELECT
					clientes.*, faturas.id as "inscricao"
				FROM
					clientes
				INNER JOIN faturas
					ON clientes.id=faturas.cliente_id
				WHERE
					faturas.evento_id='.$evento_id.' AND faturas.status="regular"
				ORDER BY
					clientes.nome ASC;
			')->result();
			$data['dados'] = $clientes;
		}
		$this->template->load('produtor/index', 'relatorios/termosdeuso', $data);
	}
	public function evento($evento_id)
	{
		$data['evento'] = $this->evento_model->get($evento_id);
		$this->template->load('produtor/index', 'relatorios/index', $data);
	}
}