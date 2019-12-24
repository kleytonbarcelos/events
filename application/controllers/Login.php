<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Login extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('usuario_model');
			$this->load->model('cliente_model');
			$this->load->model('key_model');

			$config = array(
					'mailtype' => 'html',
					'charset' => 'utf-8',
					'protocol' => 'sendmail',
					'smtp_host' => 'srv194.prodns.com.br', //'srv194.prodns.com.br',
					'smtp_port' => 465,
					'smtp_user' => 'nao-responda@inscricaosegura.com',
					'smtp_pass' => 'x152535x',
					'charset'   => 'utf-8',
			);
			$this->load->library('email', $config);
		}
		//#######################################################
		public function index()
		{	
			$this->load->view('login/login');
		}
		public function recuperacaodesenha()
		{
			$this->load->view('login/recuperacaodesenha');
		}
		public function novasenha($key)
		{
			$dados_key = array_to_row( $this->key_model->get(array('key'=>$key, 'status'=>'pendente')) );
			if( $dados_key )
			{
				$data = array(
					'key'=>$dados_key->key,
					'email'=>$dados_key->email,
				);
				$this->load->view('login/novasenha', $data);
			}
			else
			{
				redirect('home','refresh');
			}
		}
		public function salvarnovasenha()
		{
			$this->form_validation->set_rules('txtSenha', strong('Senha'), 'trim|required');
			$this->form_validation->set_rules('txtRepetirSenha', strong('Repetir Senha'), 'trim|required|matches[txtSenha]');

			if( $this->form_validation->run() == true )
			{
				$data = array(
					'senha'=>$this->input->post('txtSenha'),
					'password'=>base64_encode($this->input->post('txtSenha')),
				);
				$this->cliente_model->update_by( array('email'=>$this->input->post('txtEmail')), $data );

				$data = '';
				$data = array(
					'status'=>'regular',
				);
				$this->key_model->update_by( array('key'=>$this->input->post('key')), $data );

				$response['status'] = 1;
				$response['msg'] = 'Sua senha foi atualizada com sucesso.';
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
		public function verifica_recuperacaodesenha()
		{
			$this->form_validation->set_rules('txtEmail', str_to_strong('E-mail'), 'trim|required');

			if( $this->form_validation->run() == true )
			{
				$login = $this->usuario_model->get( array('email'=>$this->input->post('txtEmail')) );
				if(!$login)
				{
					$login = $this->cliente_model->get( array('email'=>$this->input->post('txtEmail')) );
				}
				$login = array_to_row($login);
				//################################################################################################
				//################################################################################################
				if($login)
				{
					$key = rand_keys(50);
					$data = array(
						'key'=>$key,
						'email'=>$login->email,
						'data'=>now(),
						'ip'=>$this->input->ip_address(),
						'status'=>'pendente',
					);
					$this->key_model->update_by( array('email'=>$login->email, 'status'=>'pendente'), array('status'=>'expirado'));
					$this->key_model->insert($data);
					//############################################################################################
					$data = '';
					$data = array(
						'nome' => $login->nome,
						'email' => $login->email,
						'key' => $key,
					);
					$template = $this->load->view('templates/email/recuperacaodesenha', $data, true);
					$this->email->clear();
					$this->email->bcc('kleytonbarcelos@gmail.com, contatoecotrilhas@gmail.com');
					//$this->email->reply_to('you@example.com', 'Your Name');
					$this->email->to($login->email, $login->nome);
					$this->email->from('nao-responda@inscricaosegura.com', 'Inscrição Segura');
					$this->email->subject('Recuperação de senha');
					$this->email->message($template);
					$this->email->send();
					//############################################################################################
					$response['msg'] = 'Favor verificar seu <strong>e-mail</strong> para prosseguir na recuperação de sua senha.';
					$response['status'] = 1;
				}
				else
				{
					$response['msg'] = 'Este e-mail não está cadastrado';
					$response['status'] = 0;
				}
				echo json_encode($response);
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
				echo json_encode($response);
			}
		}
		public function verifica()
		{
			$this->form_validation->set_rules('txtUsuario', str_to_strong('Usuario'), 'trim|required');
			$this->form_validation->set_rules('txtSenha', str_to_strong('Senha'), 'trim|required');

			if( $this->form_validation->run() == true )
			{
				$login = $this->usuario_model->verifica_login($this->input->post('txtUsuario'), $this->input->post('txtSenha'));
				if($login)
				{
					$response['cliente_id'] = (property_exists($this->session->dados_usuario, 'id')) ? $this->session->dados_usuario->id : '';
					$response['cliente_nome'] = (property_exists($this->session->dados_usuario, 'nome')) ? $this->session->dados_usuario->nome : '';
					$response['cliente_primeironome'] = (property_exists($this->session->dados_usuario, 'primeironome')) ? $this->session->dados_usuario->primeironome : '';
					$response['cliente_sobrenome'] = (property_exists($this->session->dados_usuario, 'sobrenome')) ? $this->session->dados_usuario->sobrenome : '';
					$response['cliente_email'] = (property_exists($this->session->dados_usuario, 'email')) ? $this->session->dados_usuario->email : '';
					$response['cliente_endereco'] = (property_exists($this->session->dados_usuario, 'endereco')) ? $this->session->dados_usuario->endereco : '';
					$response['cliente_numero'] = (property_exists($this->session->dados_usuario, 'numero')) ? $this->session->dados_usuario->numero : '';
					$response['cliente_complemento'] = (property_exists($this->session->dados_usuario, 'complemento')) ? $this->session->dados_usuario->complemento : '';
					$response['cliente_bairro'] = (property_exists($this->session->dados_usuario, 'bairro')) ? $this->session->dados_usuario->bairro : '';
					$response['cliente_cidade'] = (property_exists($this->session->dados_usuario, 'cidade')) ? $this->session->dados_usuario->cidade : '';
					$response['cliente_uf'] = (property_exists($this->session->dados_usuario, 'uf')) ? $this->session->dados_usuario->uf : '';
					$response['cliente_cep'] = (property_exists($this->session->dados_usuario, 'cep')) ? $this->session->dados_usuario->cep : '';
					$response['cliente_celular'] = (property_exists($this->session->dados_usuario, 'celular')) ? $this->session->dados_usuario->celular : '';
					$response['cliente_telefone'] = (property_exists($this->session->dados_usuario, 'telefone')) ? $this->session->dados_usuario->telefone : '';
					$response['cliente_telefonetrabalho'] = (property_exists($this->session->dados_usuario, 'telefonetrabalho')) ? $this->session->dados_usuario->telefonetrabalho : '';
					$response['cliente_tipo'] = (property_exists($this->session->dados_usuario, 'tipo')) ? $this->session->dados_usuario->tipo : '';

					$response['url_redirect'] = ($this->session->url_redirect) ? $this->session->url_redirect : 'home';
					$response['status'] = 1;
				}
				else
				{
					$response['msg'] = str_to_strong('Usuário').' ou '.str_to_strong('Senha').' estão incorretos';
					$response['status'] = 0;
				}
				echo json_encode($response);
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
				echo json_encode($response);
			}
		}
		public function password()
		{
			$consulta = array_to_row( $this->db->query('SELECT password FROM clientes WHERE email="'.$this->input->post('txtUsuario').'"')->result() );
			if(!$consulta)
			{
				$consulta = array_to_row( $this->db->query('SELECT password FROM usuarios WHERE email="'.$this->input->post('txtUsuario').'"')->result() );
			}

			if( $consulta )
			{
				$data['status'] = 1;
				$data['password'] = $consulta->password;
				$data['msg'] = 'Operação realizado com sucesso!';
			}
			else
			{
				$data['status'] = 0;
				$data['password'] = '';
				$data['msg'] = 'erro ao detectar password';
			}
			echo json_encode($data);
		}
		public function logoff()
		{
			unset($_SESSION['dados_usuario']);
			redirect('home');
		}
	}