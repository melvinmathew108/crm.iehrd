<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sources extends My_Controller {



	public function __construct() {


		parent::__construct();
		if( !$this->session->userdata('logged_in') ) {
			redirect('login');
		}
		$this->common->check_user_exists();
	}

	public function index() {



		$this->data['page_title'] = 'Sources';
		$this->data['menu'] = 'masters';
		$this->data['submenu'] = 'sources';

		$condition = 'status = 1';

        $this->data["result"] = $this->common->get_all('sources', $condition);


		$this->load->view('templates/header',$this->data);
		$this->load->view('templates/sidebar',$this->data);
		$this->load->view('sources/index',$this->data);
		$this->load->view('templates/footer',$this->data);

	}


	

	public function create() {


		if( !in_array( $this->session->userdata('group_id'), array(1)) ) {

			redirect('dashboard');

		}

		$this->data['page_title'] = 'New Sources';
		$this->data['menu'] = 'masters';
		$this->data['submenu'] = 'sources';
		$this->data['action'] = 'add';


		$this->data['row'] = array(

			'name'=>'',

		);


     $this->form_validation->set_message('required', '%s is required.');

        $this->form_validation->set_rules('name', 'Sources Name', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');


        if($_POST) {



            if( $this->form_validation->run() == false ){



                $this->data['row'] = array_merge( $this->data['row'], $_POST );

            } else {


                $data_arr = array(
                    'name'=>trim($this->input->post('name')),
                    'status' =>1,


                );



                $id = $this->common->insert( 'sources', $data_arr );



                $this->session->set_flashdata('msg','Saved!');

                redirect('sources');

            }

        }

//        $this->data['arr_location'] = get_location();


		$this->load->view('templates/header',$this->data);

		$this->load->view('templates/sidebar',$this->data);

		$this->load->view('sources/form',$this->data);

		$this->load->view('templates/footer',$this->data);

	}



	function edit( $id = 0) {


        if( !in_array( $this->session->userdata('group_id'), array(1)) ) {
            redirect('dashboard');
        }

        if( $id == '0' ) {

            redirect('dashboard');

        }



        $id = decrypt($id)*1;

        if( !is_int($id) || !$id ) {

            redirect('dashboard');

        }


        $row = $this->common->get('sources', array( 'id' => $id ), 'array');

        if( is_array($row) && count($row) == 0 ) {

            redirect('dashboard');

        }

        $this->data['row'] = $row;


		$this->data['page_title'] = 'Edit Sources';

		$this->data['menu'] = 'masters';

		$this->data['submenu'] = 'sources';

		$this->data['action'] = 'edit';


       $this->form_validation->set_message('required', '%s is required.');

        $this->form_validation->set_rules('name', 'Sources Name', 'trim|required');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');


        if($_POST) {

            if( $this->form_validation->run() == false ){

                $this->data['row'] = array_merge( $this->data['row'], $_POST );

            } else {


                $data_arr = array(
                    'name'=>trim($this->input->post('name')),


                );



                $id = $this->common->update( 'sources', $data_arr, ['id'=>$id] );



                $this->session->set_flashdata('msg','Updated!');

                redirect('sources');

            }

        }

//        $this->data['arr_location'] = get_location();


		$this->load->view('templates/header',$this->data);
		$this->load->view('templates/sidebar',$this->data);
		$this->load->view('sources/edit_form',$this->data);
		$this->load->view('templates/footer',$this->data);

	}



	public function delete( $id = 0 ) {

		

		if( $id == '0' ) {

			redirect('dashboard');

		}

        $id = decrypt($id)*1;

		if( !is_int($id) || !$id ) {

			redirect('dashboard');

		}

        $is_delete = [
            'status' =>2,
        ];

		$this->common->update( 'sources' ,$is_delete,[ 'id' =>  $id ] );

		$this->session->set_flashdata('msg','Sources deleted successfully');

		redirect('sources');

	}





}