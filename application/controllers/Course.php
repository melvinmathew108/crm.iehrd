<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Course extends My_Controller {



	public function __construct() {


		parent::__construct();
		if( !$this->session->userdata('logged_in') ) {
			redirect('login');
		}
		$this->common->check_user_exists();
	}

	public function index() {



		$this->data['page_title'] = 'Course';
		$this->data['menu'] = 'masters';
		$this->data['submenu'] = 'course';

		$condition = 'c.status = 1';

        $left = [
            'categories ct' =>'ct.id = c.university_id'
        ];

        $this->data["result"] = $this->common->get_all('course c', $condition,'c.*,ct.name university', '','','',$left);


		$this->load->view('templates/header',$this->data);
		$this->load->view('templates/sidebar',$this->data);
		$this->load->view('course/index',$this->data);
		$this->load->view('templates/footer',$this->data);

	}


	

	public function create() {


		if( !in_array( $this->session->userdata('group_id'), array(1)) ) {

			redirect('dashboard');

		}

		$this->data['page_title'] = 'New course';
		$this->data['menu'] = 'masters';
		$this->data['submenu'] = 'course';
		$this->data['action'] = 'add';


		$this->data['row'] = array(

			'name'=>'',
			'university_id'=>'',

		);

        $this->data["arr_university"] = $this->common->get_all('categories', ['status'=>1]);


     $this->form_validation->set_message('required', '%s is required.');

        $this->form_validation->set_rules('name', 'Course Name', 'trim|required');
        $this->form_validation->set_rules('university_id', 'University Name', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');


        if($_POST) {



            if( $this->form_validation->run() == false ){



                $this->data['row'] = array_merge( $this->data['row'], $_POST );

            } else {


                $data_arr = array(
                    'name'=>trim($this->input->post('name')),
                    'university_id'=>trim($this->input->post('university_id')),
                    'status' =>1,


                );



                $id = $this->common->insert( 'course', $data_arr );



                $this->session->set_flashdata('msg','Saved!');

                redirect('course');

            }

        }

//        $this->data['arr_location'] = get_location();


		$this->load->view('templates/header',$this->data);
		$this->load->view('templates/sidebar',$this->data);
		$this->load->view('course/form',$this->data);
		$this->load->view('templates/footer',$this->data);

	}



	function edit( $id = 0) {


        if( !in_array( $this->session->userdata('group_id'), array(1)) ) {
            redirect('dashboard');
        }

        if( $id == '0' ) {

            redirect('dashboard');

        }

        $this->data["arr_university"] = $this->common->get_all('categories', ['status'=>1]);

        $id = decrypt($id)*1;

        if( !is_int($id) || !$id ) {

            redirect('dashboard');

        }


        $row = $this->common->get('course', array( 'id' => $id ), 'array');

        if( is_array($row) && count($row) == 0 ) {

            redirect('dashboard');

        }

        $this->data['row'] = $row;


		$this->data['page_title'] = 'Edit course';

		$this->data['menu'] = 'masters';

		$this->data['submenu'] = 'course';

		$this->data['action'] = 'edit';


       $this->form_validation->set_message('required', '%s is required.');

        $this->form_validation->set_rules('name', 'Course Name', 'trim|required');
        $this->form_validation->set_rules('university_id', 'University Name', 'trim|required');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');


        if($_POST) {

            if( $this->form_validation->run() == false ){

                $this->data['row'] = array_merge( $this->data['row'], $_POST );

            } else {


                $data_arr = array(
                    'name'=>trim($this->input->post('name')),
                    'university_id'=>trim($this->input->post('university_id')),


                );



                $id = $this->common->update( 'course', $data_arr, ['id'=>$id] );



                $this->session->set_flashdata('msg','Updated!');

                redirect('course');

            }

        }

//        $this->data['arr_location'] = get_location();


		$this->load->view('templates/header',$this->data);
		$this->load->view('templates/sidebar',$this->data);
		$this->load->view('course/edit_form',$this->data);
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

		$this->common->update( 'course' ,$is_delete,[ 'id' =>  $id ] );

		$this->session->set_flashdata('msg','Course deleted successfully');

		redirect('course');

	}





}