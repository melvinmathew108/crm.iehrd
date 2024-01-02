<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class State extends My_Controller {

	public function __construct() {
		parent::__construct();
		if( !$this->session->userdata('logged_in') ) {
			redirect('login');
		}
		$this->common->check_user_exists();
	}

	public function index() {
		if( !in_array( $this->session->userdata('group_id'), array(1)) ) {
			redirect('dashboard');
		}

		$this->data['page_title'] = 'State';
		$this->data['menu'] = 'masters';
		$this->data['submenu'] = 'state';

        $condition = '';
        $search["country_id"] = '';

        $this->data['arr_country'] = $this->common->get_all('country');
		
        $left_join = [
            'country c' => 'c.id = s.country_id'
        ];

        if( $_POST  ) {
            if( $this->input->post("country_id") != "" ){

                $search["country_id"] = $this->input->post("country_id");

            }

            $this->session->set_userdata(array("search" => $search));



        } else if($this->uri->segment(3) !="page") {

            $this->session->set_userdata(array("search" => array()));

        } else if(is_array($this->session->userdata("search")) && count($this->session->userdata("search"))) {

            $search = $this->session->userdata("search");

        }



        if( $search["country_id"] != '' ) {

            if( $condition != '' ) {

                $condition = ' AND country_id = '.$search["country_id"];

            } else {

                $condition = ' country_id = '.$search["country_id"];

            }

        }

        $this->data['search'] = $search;


		$this->data["result"] = $this->common->get_all('state s', $condition, 'SQL_CALC_FOUND_ROWS *,s.*,c.name countryName','',50,$this->uri->segment(4),$left_join);



        $total = $this->common->get_search_count();

        $config['base_url'] = site_url('state/index/page/');

        $config['total_rows'] = $total;

        $config['per_page'] = 50;

        $config['num_links'] = 2;

        $config['uri_segment'] = 4;



        $config['anchor_class'] = '';

        $config['next_link'] = '<i class="fa fa-angle-double-right"></i>';

        $config['prev_link'] = '<i class="fa fa-angle-double-left"></i>';

        $config['next_tag_open'] = '<li>';

        $config['next_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li>';

        $config['prev_tag_close'] = '</li>';

        $config['prev_link_not_exists'] = '';

        $config['num_tag_open'] = '<li>';

        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="">';

        $config['cur_tag_close'] = '</a></li> ';

        $config['first_tag_open'] = '<li>';

        $config['first_tag_close'] = '</li>';

        $config['last_tag_open'] = '<li>';

        $config['last_tag_close'] = '</li>';



        $this->pagination->initialize($config);

        $this->data["pagination"] = $this->pagination->create_links();

		$this->load->view('templates/header',$this->data);
		$this->load->view('templates/sidebar',$this->data);
		$this->load->view('state/index',$this->data);
		$this->load->view('templates/footer',$this->data);

	}

	

	public function create() {

		

		if( !in_array( $this->session->userdata('group_id'), array(1)) ) {

			redirect('dashboard');

		}



		$this->data['page_title'] = 'New State';
		$this->data['menu'] = 'masters';
		$this->data['submenu'] = 'state';
		$this->data['action'] = 'add';


		$this->data['arr_country'] = $this->common->get_all('country');

		

		$this->data['row'] = array(

			'name'=>'',
			'country_id'=>'',

		);

		

		$this->form_validation->set_message('required', '%s is required.');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('country_id', 'Country', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		

		if($_POST) {

			if( $this->form_validation->run() == false ){

				$this->data['row'] = array_merge( $this->data['row'], $_POST );

			} else {

				$data_arr = array(

					'name' => trim($this->input->post('name')),
					'country_id' => trim($this->input->post('country_id')),

				);

				$id = $this->common->insert( 'state', $data_arr );

				$this->session->set_flashdata('msg','Saved!');

				redirect('state/');

			}

		}

		

		$this->load->view('templates/header',$this->data);
		$this->load->view('templates/sidebar',$this->data);
		$this->load->view('state/form',$this->data);
		$this->load->view('templates/footer',$this->data);

	}



	function edit( $state_id = 0) {

		

		if( !in_array( $this->session->userdata('group_id'), array(1)) ) {

			redirect('dashboard');

		}

		

		if( $state_id == '0' ) {

			redirect('dashboard');

		}

		

		$id = decrypt($state_id)*1;

		if( !is_int($id) || !$id ) {

			redirect('dashboard');

		}

        $this->data['arr_country'] = $this->common->get_all('country');

		$this->data['page_title'] = 'Edit State';
		$this->data['menu'] = 'masters';
		$this->data['submenu'] = 'state';
		$this->data['action'] = 'edit';

		$row = $this->common->get('state', array( 'id' => $id ), 'array');

		if( is_array($row) && count($row) == 0 ) {

			redirect('dashboard');

		}

		$this->data['row'] = $row;

		$this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('country_id', 'Country', 'trim|required');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');


		if($_POST) {

			if( $this->form_validation->run() == false ){

				$this->data['row'] = array_merge( $this->data['row'], $_POST );

			} else {

				

				$data_arr = array(

					'name'=> trim($this->input->post('name')),
					'country_id'=> trim($this->input->post('country_id')),

				);

				

				$this->common->update('state',$data_arr, array('id' => $id ));

				$this->session->set_flashdata('msg','Saved!');

				redirect('state/');

			}

		}



		$this->load->view('templates/header',$this->data);
		$this->load->view('templates/sidebar',$this->data);
		$this->load->view('state/edit_form',$this->data);
		$this->load->view('templates/footer',$this->data);

	}



	public function delete( $state_salt_id = 0 ) {

		

		if( $state_salt_id == '0' ) {

			redirect('dashboard');

		}

		$state_id = decrypt($state_salt_id)*1;

		if( !is_int($state_id) || !$state_id ) {

			redirect('dashboard');

		}

		

		$this->common->delete( 'state', array( 'id' =>  $state_id ) );

		$this->session->set_flashdata('msg','State deleted successfully');

		redirect('state');

	}
	

	

}