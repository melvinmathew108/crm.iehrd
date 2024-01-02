<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class City extends My_Controller {

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

		$this->data['page_title'] = 'City';
		$this->data['menu'] = 'masters';
		$this->data['submenu'] = 'city';

        $condition = '';
        $search["country_id"] = '';

        $this->data['arr_country'] = $this->common->get_all('country');
		
        $left_join = [
            'state s' => 's.id = ct.state_id',
            'country c' => 'c.id = s.country_id',

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

                $condition = ' AND s.country_id = '.$search["country_id"];

            } else {

                $condition = ' s.country_id = '.$search["country_id"];

            }

        }

        $this->data['search'] = $search;


		$this->data["result"] = $this->common->get_all('city ct', $condition, 'SQL_CALC_FOUND_ROWS *,ct.*,
		c.name countryName, s.name stateName,s.country_id','',50,$this->uri->segment(4),$left_join);



        $total = $this->common->get_search_count();

        $config['base_url'] = site_url('city/index/page/');

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
		$this->load->view('city/index',$this->data);
		$this->load->view('templates/footer',$this->data);

	}

	

	public function create() {

		

		if( !in_array( $this->session->userdata('group_id'), array(1)) ) {

			redirect('dashboard');

		}

        $this->data['js_files'] = array(

            base_url('assets/pages/js/city.js'),
        );



		$this->data['page_title'] = 'New City';
		$this->data['menu'] = 'masters';
		$this->data['submenu'] = 'city';
		$this->data['action'] = 'add';


		$this->data['arr_country'] = $this->common->get_all('country');


		

		$this->data['row'] = array(

			'name'=>'',
			'country_id'=>'',
			'state_id'=>'',

		);

        $this->data['arr_state'] = [];

		$this->form_validation->set_message('required', '%s is required.');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('country_id', 'Country', 'trim|required');
		$this->form_validation->set_rules('state_id', 'State', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		

		if($_POST) {

			if( $this->form_validation->run() == false ){

				$this->data['row'] = array_merge( $this->data['row'], $_POST );

                if($this->data['row']['country_id'] != '' ){
                    $country_id = $this->data['row']['country_id'];
                    $this->data['arr_state'] = $this->common->get_all('state', ['country_id'=>$country_id]);
                }

			} else {

				$data_arr = array(

					'name' => trim($this->input->post('name')),
					'state_id' => trim($this->input->post('state_id')),

				);

				$id = $this->common->insert( 'city', $data_arr );

				$this->session->set_flashdata('msg','Saved!');

				redirect('city/');

			}

		}

		

		$this->load->view('templates/header',$this->data);
		$this->load->view('templates/sidebar',$this->data);
		$this->load->view('city/form',$this->data);
		$this->load->view('templates/footer',$this->data);

	}



	function edit( $city_id = 0) {

		

		if( !in_array( $this->session->userdata('group_id'), array(1)) ) {

			redirect('dashboard');

		}

        $this->data['js_files'] = array(

            base_url('assets/pages/js/city.js'),
        );

		

		if( $city_id == '0' ) {

			redirect('dashboard');

		}

		

		$id = decrypt($city_id)*1;

		if( !is_int($id) || !$id ) {

			redirect('dashboard');

		}

        $this->data['page_title'] = 'Edit City';
        $this->data['menu'] = 'masters';
        $this->data['submenu'] = 'city';
        $this->data['action'] = 'edit';


        $this->data['arr_country'] = $this->common->get_all('country');



        $left_join = [
            'state s' => 's.id = ct.state_id'

        ];


		$row = $this->common->get('city ct', array( 'ct.id' => $id ), 'array','ct.*,s.country_id', $left_join);

        $this->data['arr_state'] = $this->common->get_all('state', [ 'country_id'=>$row['country_id'] ]);



        $this->data['arr_country'] = $this->common->get_all('country');

		if( is_array($row) && count($row) == 0 ) {

			redirect('dashboard');

		}

		$this->data['row'] = $row;

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('country_id', 'Country', 'trim|required');
        $this->form_validation->set_rules('state_id', 'State', 'trim|required');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');


		if($_POST) {

			if( $this->form_validation->run() == false ){

				$this->data['row'] = array_merge( $this->data['row'], $_POST );

                if($this->data['row']['country_id'] != '' ){
                    $country_id = $this->data['row']['country_id'];
                    $this->data['arr_state'] = $this->common->get_all('state', ['country_id'=>$country_id]);
                }


			} else {

				

				$data_arr = array(

					'name'=> trim($this->input->post('name')),
                    'state_id' => trim($this->input->post('state_id')),

				);

				

				$this->common->update('city',$data_arr, array('id' => $id ));

				$this->session->set_flashdata('msg','Saved!');

				redirect('city/');

			}

		}



		$this->load->view('templates/header',$this->data);
		$this->load->view('templates/sidebar',$this->data);
		$this->load->view('city/edit_form',$this->data);
		$this->load->view('templates/footer',$this->data);

	}



	public function delete( $city_salt_id = 0 ) {

		

		if( $city_salt_id == '0' ) {

			redirect('dashboard');

		}

		$city_id = decrypt($city_salt_id)*1;

		if( !is_int($city_id) || !$city_id ) {

			redirect('dashboard');

		}

		

		$this->common->delete( 'city', array( 'id' =>  $city_id ) );

		$this->session->set_flashdata('msg','City deleted successfully');

		redirect('city');

	}

    public function get_state(){

        $country_id = $this->input->post('country_id');
        $condition = "country_id = '".$country_id."' ";

        $result = $this->common->get_all('state', $condition );
        $html = '<option value="">Select</option>';

        foreach($result as $row) {
            $html .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        $result = [
            'html' => $html,

        ];

        header('Content-type: application/json');
        die(json_encode( $result ));

    }
	

	

}