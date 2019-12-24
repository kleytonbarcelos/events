<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('evento_model');
		$this->load->model('Lote_model');
	}
	public function index()
	{
		$this->template->load('produtor/index', 'eventos/index');
	}
	public function cadastrar()
	{
		$data['dados'] = (object) $this->evento_model->desc_table(); //Preenche as variáveis com valores em branco
		$this->template->load('produtor/index', 'eventos/formulario', $data);
	}
	public function editar($id)
	{
		$data['dados'] = $this->evento_model->get($id);
		$this->template->load('produtor/index', 'eventos/formulario', $data);
	}
	public function excluir_arquivo()
	{
		$field = $this->input->post('field');
		$data = (object) $this->evento_model->get($this->input->post('id'));
		@unlink('assets/uploads/'.$data->$field);
		$this->evento_model->update($this->input->post('id'), array($field=>NULL));
		$response['status'] = 1;
		$response['msg'] = 'Operação realizada com sucesso!';
		echo json_encode($response);
	}
	public function salvar()
	{
		$this->form_validation->set_rules('txtNome', strong('Nome'), 'trim|required');
		$this->form_validation->set_rules('txtData', strong('Data'), 'trim|required');
		$this->form_validation->set_rules('txtResumo', strong('Resumo'), 'trim|required');
		$this->form_validation->set_rules('txtDescricao', strong('Descrição'), 'trim|required');
		$this->form_validation->set_rules('txtUrl', strong('Url'), 'trim|required|is_unique[eventos.url.id.'.$this->input->post('id').']', array('is_unique'=>'O campo %s já existe em nossa base, tente outro valor.'));

		if( $this->form_validation->run() == true )
		{
			$data = array(
				'produtor_id'=>$this->session->dados_usuario->id,
				'status'=>$this->input->post('txtStatus'),
				'nome'=>$this->input->post('txtNome'),
				'url'=>$this->input->post('txtUrl'),
				'data'=>date_to_us($this->input->post('txtData')),
				'local'=>$this->input->post('txtLocal'),
				'valor'=>br_to_decimal($this->input->post('txtValor')),
				'resumo'=>$this->input->post('txtResumo'),
				'descricao'=>$this->input->post('txtDescricao'),
				'termos'=>$this->input->post('txtTermos'),
				'comprovanteinscricao'=>$this->input->post('txtComprovanteInscricao'),
			);
			//#############################################################################################################
			//#############################################################################################################
			if ( !empty($_FILES['txtBanner']['name']) )
			{
				if( $this->input->post('id') )
				{
					$data_upload = (object) $this->evento_model->get($this->input->post('id'));
					@unlink('assets/uploads/'.$data_upload->banner);
				}
				//#####################################################################################
				$dir_uploads = './assets/uploads/';
				$config['upload_path']	= $dir_uploads;
				if( !is_dir($config['upload_path']) ){ mkdir($config['upload_path']); } // Criar pasta se não existir
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']= 2000;
				$config['min_width']= 800;
				//$config['min_height']= 600;
				$config['max_width']= 1920;
				//$config['max_height'] = 300;
				$config['file_ext_tolower'] = true;
				$config['encrypt_name']  = true;
				$this->load->library('upload', $config);

				if( !$this->upload->do_upload('txtBanner') )
				{
					$erros = array();
					$erros['txtBanner'] = $this->upload->display_errors();
					$response['erros'] = array_filter($erros);
					$response['status'] = 0;
					echo json_encode($response);
					exit;
				}
				else
				{
					$upload = $this->upload->data();
					$config['image_library'] = 'gd2';
					$config['source_image'] = $dir_uploads.$upload['file_name'];
					$config['maintain_ratio'] = true;
					$config['width'] = 800;
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					$tmp = array('banner'=>$upload['file_name']);
					$data = array_merge($data, $tmp);
				}
			}
			//#############################################################################################################
			//#############################################################################################################
			//#############################################################################################################
			if ( !empty($_FILES['txtLogo']['name']) )
			{
				if( $this->input->post('id') )
				{
					$data_upload = (object) $this->evento_model->get($this->input->post('id'));
					@unlink('assets/uploads/'.$data_upload->logo);
				}
				//#####################################################################################
				$dir_uploads = './assets/uploads/';
				$config['upload_path']	= $dir_uploads;
				if( !is_dir($config['upload_path']) ){ mkdir($config['upload_path']); } // Criar pasta se não existir
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']= 2000;
				//$config['min_width']= 800;
				//$config['min_height']= 600;
				//$config['max_width']= 300;
				//$config['max_height'] = 300;
				$config['file_ext_tolower'] = true;
				$config['encrypt_name']  = true;
				$this->load->library('upload', $config);

				if( !$this->upload->do_upload('txtLogo') )
				{
					$erros = array();
					$erros['txtLogo'] = $this->upload->display_errors();
					$response['erros'] = array_filter($erros);
					$response['status'] = 0;
					echo json_encode($response);
					exit;
				}
				else
				{
					$upload = $this->upload->data();
					$config['image_library'] = 'gd2';
					$config['source_image'] = $dir_uploads.$upload['file_name'];
					$config['maintain_ratio'] = true;
					$config['width'] = 200;
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					$tmp = array('logo'=>$upload['file_name']);
					$data = array_merge($data, $tmp);
				}
			}
			//#############################################################################################################
			//#############################################################################################################
			//#############################################################################################################
			if ( !empty($_FILES['txtFundo']['name']) )
			{
				if( $this->input->post('id') )
				{
					$data_upload = (object) $this->evento_model->get($this->input->post('id'));
					@unlink('assets/uploads/'.$data_upload->fundo);
				}
				//#####################################################################################
				$dir_uploads = './assets/uploads/';
				$config['upload_path']	= $dir_uploads;
				if( !is_dir($config['upload_path']) ){ mkdir($config['upload_path']); } // Criar pasta se não existir
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']= 2000;
				$config['min_width']= 800;
				$config['min_height']= 1131;
				//$config['max_width']= 300;
				//$config['max_height'] = 300;
				$config['file_ext_tolower'] = true;
				$config['encrypt_name']  = true;
				$this->load->library('upload', $config);

				if( !$this->upload->do_upload('txtFundo') )
				{
					$erros = array();
					$erros['txtFundo'] = $this->upload->display_errors();
					$response['erros'] = array_filter($erros);
					$response['status'] = 0;
					echo json_encode($response);
					exit;
				}
				else
				{
					$upload = $this->upload->data();
					$config['image_library'] = 'gd2';
					$config['source_image'] = $dir_uploads.$upload['file_name'];
					$config['maintain_ratio'] = true;
					$config['width'] = 800;
					$config['height'] = 1131;
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					$tmp = array('fundo'=>$upload['file_name']);
					$data = array_merge($data, $tmp);
				}
			}
			//#############################################################################################################
			//#############################################################################################################
			//#############################################################################################################
			if(!$this->input->post('id'))
			{
				$evento_id = $this->evento_model->insert($data);
				//######################################################################
				//######################################################################
				// $data_lotes = array();

				// $lote_nome = $this->input->post('txtNomeLote');
				// $lote_valor = $this->input->post('txtValorLote');
				// $lote_quantidade = $this->input->post('txtQuantidadeLote');
				// $lote_data_inicio = $this->input->post('txtDataInicioLote');
				// $lote_data_fim = $this->input->post('txtDataFimLote');
				// for($i=0; $i<sizeof($lote_nome); $i++)
				// {
				// 	$data_lotes[] = array(
				// 					'evento_id'=>$evento_id,
				// 					'nome'=>$lote_nome[$i],
				// 					'valor' => FormatoRealParaMysql($lote_valor[$i]),
				// 					'quantidade' => $lote_quantidade[$i],
				// 					'data_inicio' => $lote_data_inicio[$i],
				// 					'data_fim' => $lote_data_fim[$i],
				// 				);
				// }
				// $this->Lote_model->insert_many($data_lotes);
				//######################################################################
				//######################################################################
				$response['acao'] = 'cadastrar';
				$response['status'] = 1;
				$response['msg'] = 'Registro adicionado com sucesso!';
			}
			else
			{
				$this->evento_model->update($this->input->post('id'), $data);

				$response['acao'] = 'editar';
				$response['status'] = 1;
				$response['msg'] = 'Registro atualizado com sucesso!';
			}
		}
		else
		{
			$erros = array();
			foreach ($this->input->post() as $key => $value)
			{
				$erros[$key] = form_error($key);
			}
			$response['erros'] = array_filter($erros);
			$response['status'] = 0;
		}
		echo json_encode($response);
	}
	public function excluir()
	{
		$ids = explode(',', $this->input->post('id'));
		foreach ($ids as $key => $value)
		{
			$return = $this->evento_model->delete($value);
		}
		if($return)
		{
			$response['status'] = 1;
			$response['msg'] = 'Registro(s) excluído(s) com sucesso!';
		}
		else
		{
			$response['status'] = 0;
			$response['msg'] = 'Erro ocorrido na operação!';
		}
		echo json_encode($response);
	}
	public function getvaluesinputs()
	{
		$data_temp = null;
		$data['inputs'] = $this->evento_model->get($this->input->post('id'));
		foreach ($data['inputs'] as $key => $value)
		{
			$data_temp[sha1($this->evento_model->table().'.'.$key)] = $value;
		}
		$data['inputs'] = $data_temp;
		echo json_encode($data);
	}
	public function verifica_url()
	{
		$data['url'] = $this->evento_model->get( array('url'=>$this->input->post('url')) );
		$data['status'] = ($data['url']) ? 1 : 0;
		echo json_encode($data);
	}
	public function get()
	{
		$data['evento'] = $this->evento_model->get($this->input->post('id'));
		echo json_encode($data);
	}
	public function Eventos()
	{
		$data['Eventos'] = $this->evento_model->get();
		echo json_encode($data);
	}
	public function typeahead()
	{
		$data['Eventos'] = $this->evento_model->like( array('nome'=>$this->input->post('query')) )->get();
		$data['status'] = ($data['Eventos']) ? 1 : 0;
		echo json_encode($data);
	}
	public function bootstrap_table()
	{
		$limit  = (isset($_GET['limit']))  ? $_GET['limit']  : 10;
		$offset = (isset($_GET['offset'])) ? $_GET['offset'] : 0;
		$sort   = (isset($_GET['sort']))   ? $_GET['sort']   : '';
		$order  = (isset($_GET['order']))  ? $_GET['order']  : "asc";
		$search = (isset($_GET['search'])) ? $_GET['search'] : "";

		$customers = array();
		if ($search == "")
		{
			$customers = $this->evento_model->order_by($sort, $order)->get( array('produtor_id'=>$this->session->dados_usuario->id) );
		}
		else
		{
			if( $_GET['like_search'] == 'all' )
			{
				$campos = $this->db->query('DESC '.$this->evento_model->order_by($sort, $order)->_table)->result();
	            foreach ($campos as $campo)
	            {
	            	$arraySearch[$campo->Field] = "".$search."";
	            }
	        }
	        else
	        {
	        	$campos = explode('|', $_GET['like_search']);
	        	foreach ($campos as $campo)
	        	{
					$arraySearch[$campo] = "".$search."";
	        	}
	        }
			$customers = $this->evento_model->order_by($sort, $order)->like($arraySearch)->get(array('produtor_id'=>$this->session->dados_usuario->id));
		}
		
		$count = sizeof($customers);
		$customers = array_slice($customers, $offset, $limit);

		echo "{";
			echo '"total": ' . $count . ',';
			echo '"rows": ';
			echo json_encode($customers);
		echo "}";
	}
}
/* End of file Eventos.php */
/* Location: ./application/controllers/Eventos.php */