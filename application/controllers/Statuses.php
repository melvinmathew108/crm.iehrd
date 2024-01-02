<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Statuses extends My_Controller {



	public function __construct() {


		parent::__construct();
		if( !$this->session->userdata('logged_in') ) {
			redirect('login');
		}
		$this->common->check_user_exists();
	}

	public function index() {



		$this->data['page_title'] = 'Statuses';
		$this->data['menu'] = 'masters';
		$this->data['submenu'] = 'statuses';

		$condition = 'status = 1';

        $this->data["result"] = $this->common->get_all('statuses', $condition);


		$this->load->view('templates/header',$this->data);
		$this->load->view('templates/sidebar',$this->data);
		$this->load->view('statuses/index',$this->data);
		$this->load->view('templates/footer',$this->data);

	}


	

	public function create() {


		if( !in_array( $this->session->userdata('group_id'), array(1)) ) {

			redirect('dashboard');

		}

		$this->data['page_title'] = 'New statuses';
		$this->data['menu'] = 'masters';
		$this->data['submenu'] = 'statuses';
		$this->data['action'] = 'add';


		$this->data['row'] = array(

			'name'=>'',
			'color'=>'',

		);


     $this->form_validation->set_message('required', '%s is required.');

        $this->form_validation->set_rules('name', 'Category Name', 'trim|required');
        $this->form_validation->set_rules('color', 'Color Code', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');


        if($_POST) {



            if( $this->form_validation->run() == false ){



                $this->data['row'] = array_merge( $this->data['row'], $_POST );

            } else {


                $data_arr = array(
                    'name'=>trim($this->input->post('name')),
                    'color'=>trim($this->input->post('color')),
                    'status' =>1,


                );



                $id = $this->common->insert( 'statuses', $data_arr );



                $this->session->set_flashdata('msg','Saved!');

                redirect('statuses');

            }

        }

//        $this->data['arr_location'] = get_location();


		$this->load->view('templates/header',$this->data);

		$this->load->view('templates/sidebar',$this->data);

		$this->load->view('statuses/form',$this->data);

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


        $row = $this->common->get('statuses', array( 'id' => $id ), 'array');

        if( is_array($row) && count($row) == 0 ) {

            redirect('dashboard');

        }

        $this->data['row'] = $row;


		$this->data['page_title'] = 'Edit statuses';

		$this->data['menu'] = 'masters';

		$this->data['submenu'] = 'statuses';

		$this->data['action'] = 'edit';


       $this->form_validation->set_message('required', '%s is required.');

        $this->form_validation->set_rules('name', 'Category Name', 'trim|required');
        $this->form_validation->set_rules('color', 'Color Code', 'trim|required');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');


        if($_POST) {

            if( $this->form_validation->run() == false ){

                $this->data['row'] = array_merge( $this->data['row'], $_POST );

            } else {


                $data_arr = array(
                    'name'=>trim($this->input->post('name')),
                    'color'=>trim($this->input->post('color')),


                );



                $id = $this->common->update( 'statuses', $data_arr, ['id'=>$id] );



                $this->session->set_flashdata('msg','Updated!');

                redirect('statuses');

            }

        }

//        $this->data['arr_location'] = get_location();


		$this->load->view('templates/header',$this->data);
		$this->load->view('templates/sidebar',$this->data);
		$this->load->view('statuses/edit_form',$this->data);
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

		$this->common->update( 'statuses' ,$is_delete,[ 'id' =>  $id ] );

		$this->session->set_flashdata('msg','status deleted successfully');

		redirect('statuses');

	}





}