<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Stream extends My_Controller {

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

		$this->data['page_title'] = 'Stream';
		$this->data['menu'] = 'masters';
		$this->data['submenu'] = 'stream';

        $condition = '';
        $search["course_id"] = '';

        $this->data['arr_course'] = $this->common->get_all('course');
		
        $left_join = [
            'course c' => 'c.id = s.course_id',
            'categories u' => 'u.id = c.university_id',
        ];

        if( $_POST  ) {
            if( $this->input->post("course_id") != "" ){

                $search["course_id"] = $this->input->post("course_id");

            }

            $this->session->set_userdata(array("search" => $search));



        } else if($this->uri->segment(3) !="page") {

            $this->session->set_userdata(array("search" => array()));

        } else if(is_array($this->session->userdata("search")) && count($this->session->userdata("search"))) {

            $search = $this->session->userdata("search");

        }



        if( $search["course_id"] != '' ) {

            if( $condition != '' ) {

                $condition = ' AND course_id = '.$search["course_id"];

            } else {

                $condition = ' course_id = '.$search["course_id"];

            }

        }

        $this->data['search'] = $search;


		$this->data["result"] = $this->common->get_all('stream s', $condition,
            'SQL_CALC_FOUND_ROWS *,s.*,c.name countryName, u.name university','',50,$this->uri->segment(4),$left_join);



        $total = $this->common->get_search_count();

        $config['base_url'] = site_url('stream/index/page/');

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
		$this->load->view('stream/index',$this->data);
		$this->load->view('templates/footer',$this->data);

	}

	

	public function create() {

		

		if( !in_array( $this->session->userdata('group_id'), array(1)) ) {

			redirect('dashboard');

		}

        $this->data['js_files'] = array(
            base_url('assets/pages/js/stream.js?ver=1.0.1'),
        );



		$this->data['page_title'] = 'New Stream';
		$this->data['menu'] = 'masters';
		$this->data['submenu'] = 'stream';
		$this->data['action'] = 'add';


		$this->data['arr_country'] = $this->common->get_all('course');

		

		$this->data['row'] = array(

			'name'=>'',
			'course_id'=>'',
			'university_id'=>'',
			'min_price'=>'',
			'max_price'=>'',

		);

        $this->data["arr_university"] = $this->common->get_all('categories', ['status'=>1]);

		

		$this->form_validation->set_message('required', '%s is required.');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('course_id', 'Course', 'trim|required');
		$this->form_validation->set_rules('university_id', 'University', 'trim|required');
		$this->form_validation->set_rules('min_price', 'Min Price', 'trim|required');
		$this->form_validation->set_rules('max_price', 'Max Price', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		

		if($_POST) {

			if( $this->form_validation->run() == false ){

				$this->data['row'] = array_merge( $this->data['row'], $_POST );

			} else {

				$data_arr = array(

					'name' => trim($this->input->post('name')),
					'course_id' => trim($this->input->post('course_id')),
					'min_price' => trim($this->input->post('min_price')),
					'max_price' => trim($this->input->post('max_price')),

				);

				$id = $this->common->insert( 'stream', $data_arr );

				$this->session->set_flashdata('msg','Saved!');

				redirect('stream/');

			}

		}

		

		$this->load->view('templates/header',$this->data);
		$this->load->view('templates/sidebar',$this->data);
		$this->load->view('stream/form',$this->data);
		$this->load->view('templates/footer',$this->data);

	}

    public function get_course(){

        $university_id = $this->input->post('country_id');
        $condition = "university_id = '".$university_id."' ";

        $result = $this->common->get_all('course', $condition );
        $html = '<option value="">--Course--</option>';

        foreach($result as $row) {
            $html .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        $result = [
            'html' => $html,

        ];

        header('Content-type: application/json');
        die(json_encode( $result ));

    }



	function edit( $state_id = 0) {

		

		if( !in_array( $this->session->userdata('group_id'), array(1)) ) {

			redirect('dashboard');

		}

        $this->data['js_files'] = array(
            base_url('assets/pages/js/stream.js?ver=1.0.1'),
        );

		

		if( $state_id == '0' ) {

			redirect('dashboard');

		}

		

		$id = decrypt($state_id)*1;

		if( !is_int($id) || !$id ) {

			redirect('dashboard');

		}

        $this->data['arr_country'] = $this->common->get_all('course');

		$this->data['page_title'] = 'Edit Stream';
		$this->data['menu'] = 'masters';
		$this->data['submenu'] = 'stream';
		$this->data['action'] = 'edit';

		$row = $this->common->get('stream', array( 'id' => $id ), 'array');

		if( is_array($row) && count($row) == 0 ) {

			redirect('dashboard');

		}

		$this->data['row'] = $row;

		$this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('course_id', 'Course', 'trim|required');
        $this->form_validation->set_rules('min_price', 'Min Price', 'trim|required');
        $this->form_validation->set_rules('max_price', 'Max Price', 'trim|required');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');


		if($_POST) {

			if( $this->form_validation->run() == false ){

				$this->data['row'] = array_merge( $this->data['row'], $_POST );

			} else {

				

				$data_arr = array(

					'name'=> trim($this->input->post('name')),
					'course_id'=> trim($this->input->post('course_id')),
                    'min_price' => trim($this->input->post('min_price')),
                    'max_price' => trim($this->input->post('max_price')),

				);

				

				$this->common->update('stream',$data_arr, array('id' => $id ));

				$this->session->set_flashdata('msg','Saved!');

				redirect('stream/');

			}

		}



		$this->load->view('templates/header',$this->data);
		$this->load->view('templates/sidebar',$this->data);
		$this->load->view('stream/edit_form',$this->data);
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

		

		$this->common->delete( 'stream', array( 'id' =>  $state_id ) );

		$this->session->set_flashdata('msg','stream deleted successfully');

		redirect('stream');

	}
	

	

}