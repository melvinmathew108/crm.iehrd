<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class District extends My_Controller {

	public function __construct() {
		parent::__construct();
		if( !$this->session->userdata('logged_in') ) {
			redirect('login');
		}
		$this->common->check_user_exists();
	}

	public function index() {


		$this->data['page_title'] = 'District';
		$this->data['menu'] = 'masters';
		$this->data['submenu'] = 'district';

        $this->data['js_files'] = [
            base_url('assets/pages/js/district.js?ver=1.0.1'),
        ];



        $this->data["result"] = $this->common->get_all('district');


		$this->load->view('templates/header',$this->data);
		$this->load->view('templates/sidebar',$this->data);
		$this->load->view('district/index',$this->data);
		$this->load->view('templates/footer',$this->data);

	}

	public function create() {


		if( !in_array( $this->session->userdata('group_id'), array(1)) ) {

			redirect('dashboard');

		}

		$this->data['page_title'] = 'New District';
		$this->data['menu'] = 'masters';
		$this->data['submenu'] = 'district';
		$this->data['action'] = 'add';


		$this->data['row'] = array(

			'name'=>'',

		);

        $this->form_validation->set_message('required', '%s is required.');

        $this->form_validation->set_rules('name', 'Academic Period', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');


        if($_POST) {

            if( $this->form_validation->run() == false ){

                $this->data['row'] = array_merge( $this->data['row'], $_POST );

            } else {

                $data_arr = array(
                    'name'=>trim($this->input->post('name')),

                );

                $this->common->insert( 'district', $data_arr );

                $this->session->set_flashdata('msg','Saved!');

                redirect('district');

            }

        }

		$this->load->view('templates/header',$this->data);

		$this->load->view('templates/sidebar',$this->data);

		$this->load->view('district/form',$this->data);

		$this->load->view('templates/footer',$this->data);

	}



	public function edit( $id = 0) {


        if( $id == '0' ) {

            redirect('dashboard');

        }

        $id = decrypt($id)*1;

        if( !is_int($id) || !$id ) {

            redirect('dashboard');

        }


        $this->data['row_district'] = $this->common->get('district',['id'=>$id]);

        $html = $this->load->view('district/edit_district',$this->data,true );

        header('Content-type: application/json');
        die(json_encode(
            ['html' => $html]
        ));


    }
    public  function save_district(){

        $district_id = $_POST['district_id'];
        $district = $_POST['name'];


        $data_arr = [
            'name'=>$district
        ];

        $this->common->update('district',$data_arr,['id'=>$district_id]);

        header('Content-type: application/json');
        die(json_encode(
            ['status' => 'success']
        ));
    }


	public function delete( $id = 0 ) {

		if( $id == '0' ) {

			redirect('dashboard');

		}

        $id = decrypt($id)*1;

		if( !is_int($id) || !$id ) {

			redirect('dashboard');

		}


        $this->common->delete( 'district', ['id' =>  $id ] );



        $this->session->set_flashdata('msg','District deleted successfully');

		redirect('district');

	}

}