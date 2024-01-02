<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Products extends My_Controller {

	public function __construct() {
		parent::__construct();
		if( !$this->session->userdata('logged_in') ) {
			redirect('login');
		}
		$this->common->check_user_exists();
	}

    public function index() {


        $this->data['page_title'] = 'Products';
        $this->data['menu'] = 'masters';
        $this->data['submenu'] = 'products';

        $this->data['arr_category'] = $this->common->get_all( 'categories',['status'=>1]);

        $this->data['css_files'] = array(
            base_url('assets/global/plugins/datatables/datatables.min.css'),
            base_url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css'),
        );

        $this->data['js_files'] = array(
            base_url('assets/global/scripts/datatable.js'),
            base_url('assets/global/plugins/datatables/datatables.min.js'),
            base_url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'),
            base_url('assets/pages/js/product.js?ver=1.0.1'),
        );

        $this->data['arr_district'] = $this->common->get_all('district');

        $this->load->view('templates/header',$this->data);
        $this->load->view('templates/sidebar',$this->data);
        $this->load->view('products/index',$this->data);
        $this->load->view('templates/footer',$this->data);

    }

    function get_all(){

        $keyword = '';
        if( isset( $_REQUEST['search']['value'] ) && $_REQUEST['search']['value'] != '' ) {
            $keyword = $_REQUEST['search']['value'];
        }


        $join_arr_left = [
            'categories c' =>'c.id = p.category_id'
        ];

        $condition = '1=1';

        if( $keyword != '' ) {
            $condition .= ' AND (p.name LIKE "%'.$keyword.'%" OR c.name LIKE "%'.$keyword.'%" )';
        }

        if( isset($_REQUEST['category_name']) && $_REQUEST['category_name'] ) {
            $condition .= ' AND p.category_id = '.$_REQUEST['category_name'];
        }

        if( isset($_REQUEST['product']) && $_REQUEST['product'] ) {
            $condition .= ' AND ( p.name LIKE "%'.$_REQUEST['product'].'%")';
        }


        $iTotalRecords = $this->common->get_total_count( 'products p ', $condition ,$join_arr_left);

        $iDisplayLength = intval($_REQUEST['length']);
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = intval($_REQUEST['start']);
        $sEcho = intval($_REQUEST['draw']);

        $records = array();
        $records["data"] = array();

        $limit = $iDisplayLength;
        $offset = $iDisplayStart;

        $columns = array(
            0 => 'c.name',
            1 => 'p.name',
            2 => 'p.amount',
        );

        $order_by = $columns[$_REQUEST['order'][0]['column']];
        $order = $_REQUEST['order'][0]['dir'];
        $sort = $order_by.' '.$order;

        $result = $this->common->get_all( 'products p', $condition, 'p.*,c.name category',$sort, $limit,$offset,$join_arr_left  );


        foreach( $result as $row ) {


            $actions =  '
            <div class="center-block">


                <a class="btn btn-outline btn-circle btn-sm blue" href="'. site_url('products/edit/'.encrypt($row->id)).'">
                <i class="fa fa-edit"></i> Edit </a>

                <a class="btn btn-outline btn-circle btn-sm red" id="con_del" href="'. site_url('products/delete/'.encrypt($row->id)).'"
                 >
                <i class="fa fa-trash-o"></i> Delete </a>

           	</div>';



            $records["data"][] = [
                $row->category,
                $row->name,
                $row->amount,
                $actions,
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;

        header('Content-type: application/json');
        echo json_encode($records);
    }

	public function create() {


		if( !in_array( $this->session->userdata('group_id'), array(1)) ) {

			redirect('dashboard');

		}

		$this->data['page_title'] = 'New product';
		$this->data['menu'] = 'masters';
		$this->data['submenu'] = 'products';
		$this->data['action'] = 'add';


		$this->data['row'] = array(
           'category_id'=>'',
			'name'=>'',
			'amount'=>'',

		);

        $this->data['arr_category'] = $this->common->get_all( 'categories',['status'=>1]);


        $this->form_validation->set_message('required', '%s is required.');

        $this->form_validation->set_rules('category_id', 'Category', 'trim|required');
        $this->form_validation->set_rules('name', 'Product Name', 'trim|required');
        $this->form_validation->set_rules('amount', 'Cost', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');


        if($_POST) {

            if( $this->form_validation->run() == false ){

                $this->data['row'] = array_merge( $this->data['row'], $_POST );

            } else {

                $data_arr = [
                    'category_id'=>trim($this->input->post('category_id')),
                    'name'=>trim($this->input->post('name')),
                    'amount'=>trim($this->input->post('amount')),

                ];

                $this->common->insert( 'products', $data_arr );

                $this->session->set_flashdata('msg','Saved!');

                redirect('products');

            }

        }


		$this->load->view('templates/header',$this->data);
		$this->load->view('templates/sidebar',$this->data);
		$this->load->view('products/form',$this->data);
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

        $this->data['arr_category'] = $this->common->get_all( 'categories',['status'=>1]);

        $row = $this->common->get('products', ['id' => $id ], 'array');

        if( is_array($row) && count($row) == 0 ) {

            redirect('dashboard');

        }

        $this->data['row'] = $row;

		$this->data['page_title'] = 'Edit Product';

		$this->data['menu'] = 'masters';

		$this->data['submenu'] = 'products';

		$this->data['action'] = 'edit';

        $this->form_validation->set_message('required', '%s is required.');

        $this->form_validation->set_rules('category_id', 'Category', 'trim|required');
        $this->form_validation->set_rules('name', 'Product Name', 'trim|required');
        $this->form_validation->set_rules('amount', 'Cost', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');


        if($_POST) {

            if( $this->form_validation->run() == false ){

                $this->data['row'] = array_merge( $this->data['row'], $_POST );

            } else {


                $data_arr = [
                    'category_id'=>trim($this->input->post('category_id')),
                    'name'=>trim($this->input->post('name')),
                    'amount'=>trim($this->input->post('amount')),

                ];


                $this->common->update( 'products', $data_arr, ['id'=>$id] );

                $this->session->set_flashdata('msg','Updated!');

                redirect('products');
            }
        }


        $this->load->view('templates/header',$this->data);
		$this->load->view('templates/sidebar',$this->data);
		$this->load->view('products/edit_form',$this->data);
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

        $this->common->delete( 'products', [ 'id' =>  $id ] );

        $this->session->set_flashdata('msg',' Product deleted successfully');

        redirect('products');

	}








}