<?php  defined('BASEPATH') OR exit('No direct script access allowed');

//require APPPATH ."../vendor/autoload.php";
//use \Firebase\JWT\JWT;


class User_api extends My_Controller {
    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Calcutta");
//        JWT::$leeway = 10;

    }


    public function get_otp(){

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $email = '';
        $password = '';

        $data = json_decode(file_get_contents("php://input"));

//        echo json_encode($data);exit;

        $mobile = $data->mobile;

        if($mobile ){

            $condition = "phone = '".$mobile."' AND is_active = 1";
            $user = $this->common->get("users", $condition,"array");

            if($user){

                $user_id = $user['id'];
                $name = ucfirst($user['first_name']);
                $otp = rand(100000,999999);
                $message = $otp.' is your OTP for login at Parrot Realty, your first choice in Real estate - PARROT';


                $param = [
                    'mobile' => $mobile,
                    'message' => $message,
                ];

                $response = send_single_sms($param);

//                echo $response; exit;
                if($response){

                    $data_arr = [

                        'id'=>$user['id'],
                        'name'=>$user['first_name'],
                        'last_name'=>$user['last_name'],
                        'email'=>$user['email'],
                        'phone'=>$user['phone'],
                        'group_id'=>$user['group_id'],
                        'otp'=>$otp,
                        'response'=>$response,
                    ];

                    $response = [
                        'status'=>'success',
                        'data'=>$data_arr,
                        'message' =>'OTP send successfully',
                    ];

                    http_response_code(200);
                    echo json_encode($response);

                }else{

                    $response = [
                        'status'=>'error',
                        'data'=>[],
                        'message' =>'OTP is not send',
                    ];

                    http_response_code(401);
                    echo json_encode($response);

                }

            }else{


                $response = [
                    'status'=>'error',
                    'data'=>[],
                    'message' =>'User not found or disabled',
                ];

                http_response_code(401);
                echo json_encode($response);

            }

        }else{

            $response = [
                'status'=>'error',
                'data'=>[],
                'message' =>'Mobile number is missing',
            ];

            http_response_code(401);
            echo json_encode($response);
        }

    }

    public function login_pin(){


        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



        $data = json_decode(file_get_contents("php://input"));

//        echo json_encode($data);exit;

        $mobile = $data->mobile;
        $pin = $data->pin;

        if($mobile){

            $condition = "phone = '".$mobile."' AND pin = '".$pin."' AND is_active = 1";
            $user = $this->common->get("users", $condition,"array");

            if($user){



                $data_arr = [

                    'id'=>$user['id'],
                    'name'=>$user['first_name'],
                    'last_name'=>$user['last_name'],
                    'email'=>$user['email'],
                    'phone'=>$user['phone'],
                    'group_id'=>$user['group_id'],

                ];

                $response = [
                    'status'=>'success',
                    'data'=>$data_arr,
                    'message' =>'Login Success',
                ];

                http_response_code(200);
                echo json_encode($response);



            }else{


                $response = [
                    'status'=>'error',
                    'data'=>[],
                    'message' =>'Phone number not registered or  PIN is incorrect',
                ];

                http_response_code(401);
                echo json_encode($response);

            }



        }else{

            $response = [
                'status'=>'error',
                'data'=>[],
                'message' =>'Mobile number is missing',
            ];

            http_response_code(401);
            echo json_encode($response);
        }

    }

    public function update_pin(){


        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



        $data = json_decode(file_get_contents("php://input"));

//        echo json_encode($data);exit;

        $mobile = $data->mobile;
        $pin = $data->pin;

        if($mobile){

            $condition = "phone = '".$mobile."'  AND is_active = 1";
            $user = $this->common->get("users", $condition,"array");


            if($user){

                $user_id = $user['id'];

                $data_arr = [

                    'pin'=>$pin,

                ];

                $this->common->update('users',$data_arr, ['id'=>$user_id] );

                $data_arr = [

                    'id'=>$user['id'],
                    'name'=>$user['first_name'],
                    'last_name'=>$user['last_name'],
                    'email'=>$user['email'],
                    'phone'=>$user['phone'],
                    'group_id'=>$user['group_id'],

                ];

                $response = [
                    'status'=>'success',
                    'data'=>$data_arr,
                    'message' =>'Pin updated successfully',
                ];

                http_response_code(200);
                echo json_encode($response);




            }else{


                $response = [
                    'status'=>'error',
                    'data'=>[],
                    'message' =>'Phone number not registered',
                ];

                http_response_code(401);
                echo json_encode($response);

            }



        }else{

            $response = [
                'status'=>'error',
                'data'=>[],
                'message' =>'Mobile number is missing',
            ];

            http_response_code(401);
            echo json_encode($response);
        }

    }

    public function get_otp_by_email(){

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $email = '';
        $password = '';

        $data = json_decode(file_get_contents("php://input"));

//        echo json_encode($data);exit;

        $email = $data->email;

        if($email ){

            $condition = "email = '".$email."' AND is_active = 1";
            $user = $this->common->get("users", $condition,"array");

            if($user){

                $user_id = $user['id'];
                $name = ucfirst($user['first_name']);
                $otp = rand(100000,999999);
                $message = $otp.' is your OTP for login at Lead App - Lead App';


                $param = [
                    'otpmessage' => $message,
                    'name' => $name,
                ];

                send_mail('email-otp', $email, $param);

                $data_arr = [

                    'id'=>$user['id'],
                    'name'=>$user['first_name'],
                    'last_name'=>$user['last_name'],
                    'email'=>$user['email'],
                    'phone'=>$user['phone'],
                    'group_id'=>$user['group_id'],
                    'otp'=>$otp,
                    'response'=>'',
                ];

                $response = [
                    'status'=>'success',
                    'data'=>$data_arr,
                    'message' =>'OTP send successfully',
                ];

                http_response_code(200);
                echo json_encode($response);



            }else{


                $response = [
                    'status'=>'error',
                    'message' =>'User not found or disabled',
                ];

                http_response_code(200);
                echo json_encode($response);

            }

        }else{

            $response = [
                'status'=>'error',
                'message' =>'Email is missing',
            ];

            http_response_code(200);
            echo json_encode($response);
        }

    }

    public function update_pin_by_email(){


        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



        $data = json_decode(file_get_contents("php://input"));

//        echo json_encode($data);exit;

        $email = $data->email;
        $pin = $data->pin;

        if($email){

            $condition = "email = '".$email."'  AND is_active = 1";
            $user = $this->common->get("users", $condition,"array");


            if($user){

                $user_id = $user['id'];

                $data_arr = [

                    'pin'=>$pin,

                ];

                $this->common->update('users',$data_arr, ['id'=>$user_id] );

                $data_arr = [

                    'id'=>$user['id'],
                    'name'=>$user['first_name'],
                    'last_name'=>$user['last_name'],
                    'email'=>$user['email'],
                    'phone'=>$user['phone'],
                    'group_id'=>$user['group_id'],

                ];

                $response = [
                    'status'=>'success',
                    'data'=>$data_arr,
                    'message' =>'Pin updated successfully',
                ];

                http_response_code(200);
                echo json_encode($response);




            }else{


                $response = [
                    'status'=>'error',
                    'message' =>'Email not registered or active, please contact admin',
                ];

                http_response_code(200);
                echo json_encode($response);

            }



        }else{

            $response = [
                'status'=>'error',
                'message' =>'Email is missing',
            ];

            http_response_code(200);
            echo json_encode($response);
        }

    }

    public function login(){


        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



        $data = json_decode(file_get_contents("php://input"));

//        echo json_encode($data);exit;

        $email = $data->email;
        $pin = $data->pin;

        if($email){

            $condition = "email = '".$email."' AND pin = '".$pin."' AND is_active = 1";
            $user = $this->common->get("users", $condition,"array");

            if($user){



                $data_arr = [

                    'id'=>$user['id'],
                    'name'=>$user['first_name'],
                    'last_name'=>$user['last_name'],
                    'email'=>$user['email'],
                    'phone'=>$user['phone'],
                    'group_id'=>$user['group_id'],

                ];

                $response = [
                    'status'=>'success',
                    'data'=>$data_arr,
                    'message' =>'Login Success',
                ];

                http_response_code(200);
                echo json_encode($response);



            }else{


                $response = [
                    'status'=>'error',
                    'message' =>'Email not registered or  PIN is incorrect',
                ];

                http_response_code(200);
                echo json_encode($response);

            }



        }else{

            $response = [
                'status'=>'error',
                'message' =>'Email is missing',
            ];

            http_response_code(200);
            echo json_encode($response);
        }

    }

    public function get_statistics(){

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $sales_id = '';

        $data = json_decode(file_get_contents("php://input"));

//        echo json_encode($data);exit;

        $sales_id = $data->sales_id;

        if($sales_id ){


            $left = [
                'contacts c' => 'c.id = cf.contact_id'
            ];

            $condition_today_follow = "DATE(followup_date) = DATE(NOW()) AND c.id != ''
        AND c.status_id != 2 AND cf.reply IS NULL ";
            $condition_today_follow .= " AND c.user_id = ".$sales_id;
            $followups_today = $this->common->get_total_count( 'contacts_followups cf',
                $condition_today_follow,$left  );


            $condition_total = "status_id != 2 AND user_id = ".$sales_id;
            $total_leads  = $this->common->get_total_count( 'contacts', $condition_total);


            $condition_closed_today = "DATE(a.created) = DATE(NOW()) AND a.status_id = 2";
            $condition_closed_today .= " AND a.user_id = ".$sales_id;
            $total_leads_closed_today  = $this->common->get_total_count( 'activitylogs a', $condition_closed_today);

            $left_today_converted = [
                'contacts c'=>'c.id=a.lead_id'
            ];

            $arr_value_closed_today  = $this->common->get_all( 'activitylogs a', $condition_closed_today,'c.invoice_value','','','',$left_today_converted);
            $arr_value_closed_today = array_column($arr_value_closed_today, 'invoice_value');
            $total_leads_closed_today_value  = array_sum($arr_value_closed_today);

            $condition_created_today = "DATE(created) = DATE(NOW()) ";
            $condition_created_today .= " AND user_id = ".$sales_id;
            $total_leads_created_today  = $this->common->get_total_count( 'contacts', $condition_created_today);

            $condition_closed = "a.status_id = 2";
            $condition_closed .= " AND a.user_id = ".$sales_id;

            $arr_value_closed_all  = $this->common->get_all( 'activitylogs a', $condition_closed,'c.invoice_value','','','',$left_today_converted);
            $arr_value_closed_all = array_column($arr_value_closed_all, 'invoice_value');
            $total_leads_closed_all_value  = array_sum($arr_value_closed_all);


            $con_target = "month = MONTH(CURDATE()) AND year = YEAR(CURDATE()) AND  sales_id = ".$sales_id;
            $row_target = $this->common->get('target', $con_target);
            $closed_month_value = 0;
            $target = 0;
            $target_month = '';
            $achieved = 0;
            $pending = 0;
            $target_set = 0;

            if($row_target ) {


                $condition_closed_today = "MONTH(a.created) = ".$row_target->month." AND
                YEAR(a.created) = ".$row_target->year." AND a.status_id = 2
                                    AND a.user_id = ".$sales_id;

                $left_today_converted = [
                    'contacts c'=>'c.id=a.lead_id'
                ];

                $arr_value_closed_today  = $this->common->get_all( 'activitylogs a', $condition_closed_today,'c.invoice_value','','','',$left_today_converted);
                $arr_value_closed_today = array_column($arr_value_closed_today, 'invoice_value');
                $closed_month_value = array_sum($arr_value_closed_today);

                $target = $row_target->amount;
                $target_month = $row_target->month;
                $achieved = $closed_month_value;
                $pending = $row_target->amount - $closed_month_value;

            }


            $data_arr = [
                'total_leads'=>$total_leads,
                'leads_closed_today'=>$total_leads_closed_today,
                'leads_closed_value_today'=>$total_leads_closed_today_value,
                'followups_today'=>$followups_today,
                'total_closed_value'=>$total_leads_closed_all_value,
                'total_leads_created_today'=>$total_leads_created_today,
                'target_month'=>get_month($target_month),
                'target'=>$target,
                'target_achieved'=>$achieved,
                'target_pending'=>$pending,
            ];

            $response = [
                'status'=>'success',
                'data'=>$data_arr,
                'message' =>'data fetched successfully',
            ];

            http_response_code(200);
            echo json_encode($response);


        }else{

            $response = [
                'status'=>'error',
                'message' =>'Sales ID is missing',
            ];

            http_response_code(200);
            echo json_encode($response);
        }

    }

    public function demo_fn(){

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $sales_id = '';

        $data = json_decode(file_get_contents("php://input"));

//        echo json_encode($data);exit;

        $sales_id = $data->sales_id;

        if($sales_id ){









            $data_arr = [

            ];

            $response = [
                'status'=>'success',
                'data'=>$data_arr,
                'message' =>'data fetched successfully',
            ];

            http_response_code(200);
            echo json_encode($response);


        }else{

            $response = [
                'status'=>'error',
                'data'=>[],
                'message' =>'Sales ID is missing',
            ];

            http_response_code(401);
            echo json_encode($response);
        }

    }

    public function get_upcoming_followups(){

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $sales_id = '';

        $data = json_decode(file_get_contents("php://input"));

//        echo json_encode($data);exit;

        $follow_up_type = $data->type;

        $sales_id = $data->sales_id;

        $page_no = $data->page_no;
        $limit = 10;
        $offset = $limit*($page_no-1);

        if($sales_id ){


            $join_arr_left = [

                'contacts t' =>'t.id = c.contact_id',
                'statuses s' =>'s.id = t.status_id',
                'users u' =>'u.id = t.user_id',
                'categories cp' =>'cp.id = t.product_id'
            ];

            if( $follow_up_type == 0 ){

                $condition = "t.id != '' AND DATE(followup_date) >= DATE(NOW()) AND t.status_id != 2 AND c.reply IS NULL";

            }else{

                $condition = "t.id != '' AND DATE(followup_date) = DATE(NOW()) AND t.status_id != 2 AND c.reply IS NULL";
            }




            $condition .= " AND user_id = ".$sales_id;


            $arr_followups = $this->common->get_all('contacts_followups c',
                $condition,'c.*,u.group_id,t.first_name, t.last_name,t.email,t.phone,
                s.name status_name,s.color,cp.name product,t.id lead_id',
                'followup_date asc',$limit,$offset,$join_arr_left);

            $data_arr = [];

            foreach($arr_followups as $row_follow ){

                $followup_date = $row_follow->followup_date;

                $followup_date = new DateTime($followup_date);
                $followup_date = $followup_date = $followup_date->format('F j, Y, g:i a');

                $row_f = [];

                $row_f['follow_up_id'] = $row_follow->id;
                $row_f['product'] = $row_follow->product;
                $row_f['lead_id'] = $row_follow->lead_id;
                $row_f['client'] = $row_follow->first_name;
                $row_f['phone'] = $row_follow->phone;
                $row_f['email'] = $row_follow->email;
                $row_f['followup_date'] = $followup_date;
                $row_f['followup_type'] = get_follow_type($row_follow->type);
                $row_f['status'] = $row_follow->status_name;
                $row_f['is_completed'] = is_null($row_follow->reply)?'Not Completed':'Completed';

                $data_arr[]=$row_f;
            }

            $response = [
                'status'=>'success',
                'data'=>$data_arr,
                'message' =>'data fetched successfully',
            ];

            http_response_code(200);
            echo json_encode($response);


        }else{

            $response = [
                'status'=>'error',
                'message' =>'Sales ID is missing',
            ];

            http_response_code(200);
            echo json_encode($response);
        }

    }

    public function missed_followups(){

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $sales_id = '';

        $data = json_decode(file_get_contents("php://input"));

//        echo json_encode($data);exit;

        $sales_id = $data->sales_id;

        $page_no = $data->page_no;
        $limit = 10;
        $offset = $limit*($page_no-1);

        if($sales_id ){


            $join_arr_left = [

                'contacts t' =>'t.id = c.contact_id',
                'statuses s' =>'s.id = t.status_id',
                'users u' =>'u.id = t.user_id',
                'categories cp' =>'cp.id = t.product_id'
            ];

            $condition = "t.id != '' AND DATE(followup_date) < DATE(NOW()) AND c.reply IS NULL AND t.status_id != 2";

            $condition .= " AND user_id = ".$sales_id;


            $arr_followups = $this->common->get_all('contacts_followups c',
                $condition,'c.*,u.group_id,t.first_name, t.last_name,t.email,t.phone,
                s.name status_name,s.color,cp.name product,t.id lead_id',
                'followup_date asc',$limit,$offset,$join_arr_left);

            $data_arr = [];

            foreach($arr_followups as $row_follow ){

                $followup_date = $row_follow->followup_date;

                $followup_date = new DateTime($followup_date);
                $followup_date = $followup_date = $followup_date->format('F j, Y, g:i a');

                $row_f = [];

                $row_f['follow_up_id'] = $row_follow->id;
                $row_f['lead_id'] = $row_follow->lead_id;
                $row_f['product'] = $row_follow->product;
                $row_f['client'] = $row_follow->first_name;
                $row_f['phone'] = $row_follow->phone;
                $row_f['email'] = $row_follow->email;
                $row_f['followup_date'] = $followup_date;
                $row_f['followup_type'] = get_follow_type($row_follow->type);
                $row_f['status'] = $row_follow->status_name;
                $row_f['is_completed'] = is_null($row_follow->reply)?'Not Completed':'Completed';

                $data_arr[]=$row_f;
            }

            $response = [
                'status'=>'success',
                'data'=>$data_arr,
                'message' =>'data fetched successfully',
            ];

            http_response_code(200);
            echo json_encode($response);


        }else{

            $response = [
                'status'=>'error',
                'message' =>'Sales ID is missing',
            ];

            http_response_code(200);
            echo json_encode($response);
        }

    }


    public function leads(){

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $sales_id = '';

        $data = json_decode(file_get_contents("php://input"));

//        echo json_encode($data);exit;

        $sales_id = $data->sales_id;
        $status_id = $data->status_id;
        $customer_category = $data->customer_category;

        $keyword = $data->keyword;

        $page_no = $data->page_no;
        $limit = 10;
        $offset = $limit*($page_no-1);



        if($sales_id ){


            $join_arr_left = [
                'statuses s' =>'s.id = c.status_id',
                'users u' =>'u.id = c.user_id',
                'types tp' =>'tp.id = c.type_id',
                'categories cp' =>'cp.id = c.product_id'
            ];

            $condition = '1=1 AND c.status_id != 2';
            $condition .= ' AND c.user_id ='.$sales_id;

            if( $keyword != '' ) {
                $condition .= ' AND (c.first_name LIKE "%'.$keyword.'%" OR c.phone LIKE "%'.$keyword.'%")';
            }

            if( $status_id != '' ) {
                $condition .= ' AND c.status_id = '.$status_id;
            }

            if( $customer_category != '' ) {
                $condition .= ' AND c.type_id = '.$customer_category;
            }


            $result = $this->common->get_all( 'contacts c', $condition,
                'c.*,u.group_id,s.name status_name,s.color,tp.name customer_cat, cp.name product',
                'c.id desc', $limit,$offset,$join_arr_left  );


            $data_arr = [];

            foreach($result as $row_follow ){

                $followup_date = $row_follow->touch_date;

                $followup_date = new DateTime($followup_date);
                $followup_date = $followup_date = $followup_date->format('F j, Y');

                $row_f = [];

                $row_f['lead_id'] = $row_follow->id;
                $row_f['product'] = $row_follow->product;
                $row_f['client'] = $row_follow->first_name;
                $row_f['phone'] = $row_follow->phone;
                $row_f['email'] = $row_follow->email;
                $row_f['customer_category'] = $row_follow->customer_cat;
                $row_f['touch_date'] = $followup_date;
                $row_f['status'] = $row_follow->status_name;

                $data_arr[]=$row_f;
            }

            $response = [
                'status'=>'success',
                'data'=>$data_arr,
                'message' =>'data fetched successfully',
            ];

            http_response_code(200);
            echo json_encode($response);


        }else{

            $response = [
                'status'=>'error',
                'message' =>'Sales ID is missing',
            ];

            http_response_code(200);
            echo json_encode($response);
        }

    }

    public function get_status_list(){

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



        $data = json_decode(file_get_contents("php://input"));

        $result = $this->common->get_all('statuses',['status'=>1]);

        $arr_final_status = get_final_status();
        $arr_follow_type = array(
            1 => 'Call',
            2 => 'Email',
            3 => 'Meeting',
            4 => 'WhatsApp',
        );

        $data_arr = [];

        foreach($result as $row_status ){

            $row_f = [];

            $row_f['id'] = $row_status->id;
            $row_f['name'] = $row_status->name;
            $data_arr[]=$row_f;
        }

        $data_status['status'] =$data_arr;

        $data_arr = [];
        foreach($arr_final_status as $key => $row_status ){

            $row_f = [];

            $row_f['id'] = $key;
            $row_f['name'] = $row_status;
            $data_arr[]=$row_f;
        }

        $data_status['final_status'] =$data_arr;


        $data_arr = [];
        foreach($arr_follow_type as $key => $row_type ){

            $row_f = [];

            $row_f['id'] = $key;
            $row_f['name'] = $row_type;
            $data_arr[]=$row_f;
        }

        $data_status['follow_type'] =$data_arr;


        $response = [
            'status'=>'success',
            'data'=>$data_status,
            'message' =>'data fetched successfully',
        ];

        http_response_code(200);
        echo json_encode($response);

    }


    public function change_status(){


        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



        $data = json_decode(file_get_contents("php://input"));

//        echo json_encode($data);exit;

        $sales_id = $data->sales_id;
        $contact_id = $data->lead_id;
        $status_id = $data->status_id;
        $final_status = $data->final_status;
        $invoice_no = $data->invoice_no;
        $models = $data->models;
        $invoice_value = $data->invoice_value;
        $brand_name = $data->brand_name;
        $reason = $data->reason;

        if($contact_id){

            if($status_id == 2 ){

                $data_arr = [
                    'status_id' => $status_id,
                    'final_status' => $final_status,

                ];

                if($final_status == 1 ){
                    $data_arr['invoice_no']=$invoice_no;
                    $data_arr['models']=$models;
                    $data_arr['invoice_value']=$invoice_value;

                }elseif($final_status==2){

                    $data_arr['brand_name']=$brand_name;
                    $data_arr['reason']=$reason;

                }elseif($final_status == 3 || $final_status == 4 ){

                    $data_arr['reason']=$reason;
                }


            }else{

                $data_arr = [
                    'status_id' => $status_id,

                ];


            }

            $this->common->update( 'contacts', $data_arr, ['id'=>$contact_id] );

            $row_status = $this->common->get('statuses',['id'=>$status_id]);

            $row_user = $this->common->get( 'users', array( 'id' => $sales_id));

            $message = "<b>".$row_user->first_name." ".$row_user->last_name."</b> Changed lead status to <b>
        ".$row_status->name."
        </b>";

            $activity_log_data = [
                'user_id' => $sales_id,
                'message' => $message,
                'lead_id' => $contact_id,
                'status_id' => $status_id,
                'created' => date('Y-m-d H:i:s'),
            ];
            $this->common->insert( 'activitylogs', $activity_log_data );

            $response = [
                'status'=>'success',
                'data'=>$data_arr,
                'message' =>'status updated successfully',
            ];

            http_response_code(200);
            echo json_encode($response);

        }else{

            $response = [
                'status'=>'error',
                'message' =>'Lead id is missing',
            ];

            http_response_code(200);
            echo json_encode($response);
        }

    }


    public function add_followup(){


        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



        $data = json_decode(file_get_contents("php://input"));

//        echo json_encode($data);exit;

        $followup_date = $data->followup_date;
        $followup_date_new = $data->followup_date;
        $type = $data->type;
        $contact_id = $data->lead_id;
        $remark = $data->remark;
        $sales_id = $data->sales_id;


        if($contact_id){


            $followup_date = new DateTime($followup_date);
            $followup_date = $followup_date->format('Y-m-d H:i:s');

            $data_contact_follow = [
                'contact_id'=>$contact_id,
                'remark'=>$remark,
                'type'=>$type,
                'followup_date'=>$followup_date,
            ];

            $this->common->insert( 'contacts_followups', $data_contact_follow );

            $row_user = $this->common->get( 'users', array( 'id' => $sales_id));


            $followup_date_new = $this->input->post('followup_date');
            $followup_date_obj = new DateTime($followup_date_new);
            $flo = $followup_date_obj->format('F j, Y, g:i a');


            $message = "<b>".$row_user->first_name." ".$row_user->last_name."</b> added new follow Up Via <b>
        ".get_follow_type($type)."
        on ".$flo."</b>";

            $activity_log_data = [
                'user_id' => $sales_id,
                'message' => $message,
                'lead_id' => $contact_id,
                'followup' => $followup_date,
                'created' => date('Y-m-d H:i:s'),
            ];
            $this->common->insert( 'activitylogs', $activity_log_data );

            $data_arr = [
                'contact_id'=>$contact_id,
                'remark'=>$remark,
                'type'=>$type,
                'followup_date'=>$followup_date,
                'user_id' => $sales_id,
            ];


            $response = [
                'status'=>'success',
                'data'=>$data_arr,
                'message' =>'Follow-up added successfully',
            ];

            http_response_code(200);
            echo json_encode($response);

        }else{

            $response = [
                'status'=>'error',
                'message' =>'Lead id is missing',
            ];

            http_response_code(200);
            echo json_encode($response);
        }

    }


    public function mark_completed(){


        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $data = json_decode(file_get_contents("php://input"));

//        echo json_encode($data);exit;

        $followup_id = $data->followup_id;

        if($followup_id){

            $id = $followup_id;

            $left = [
                'contacts c'=>'c.id = cf.contact_id',
                'users u'=>'u.id = c.user_id',
            ];

            $row_follow = $this->common->get('contacts_followups cf', ['cf.id'=>$id],'object',
                'cf.*,u.first_name,u.last_name,c.user_id',$left);

            if( is_null($row_follow->reply) ){

                $this->common->update('contacts_followups',['reply'=>1], ['id'=>$id]);

                $message = "<b>".$row_follow->first_name." ".$row_follow->last_name."</b> marked follow up as COMPLETED";

                $activity_log_data = [
                    'user_id' => $row_follow->user_id,
                    'message' => $message,
                    'lead_id' => $row_follow->contact_id,
                    'created' => date('Y-m-d H:i:s'),
                ];

                $this->common->insert( 'activitylogs', $activity_log_data );

            }


            $data_arr =[
                'follow_up_id'=>$id
            ];

            $response = [
                'status'=>'success',
                'data'=>$data_arr,
                'message' =>'Follow-up marked completed successfully',
            ];

            http_response_code(200);
            echo json_encode($response);

        }else{

            $response = [
                'status'=>'error',
                'message' =>'Follow-up id is missing',
            ];

            http_response_code(200);
            echo json_encode($response);
        }

    }


    public function get_agent_list(){

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $data = json_decode(file_get_contents("php://input"));

        $result = $this->common->get_all('users',['group_id !='=>1]);

        $data_arr = [];

        foreach($result as $row_user ){

            $row_f = [];

            $row_f['id'] = $row_user->id;
            $row_f['name'] = $row_user->first_name.' '.$row_user->last_name;
            $data_arr[]=$row_f;
        }

        $response = [
            'status'=>'success',
            'data'=>$data_arr,
            'message' =>'data fetched successfully',
        ];

        http_response_code(200);
        echo json_encode($response);

    }


    public function change_agent(){


        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



        $data = json_decode(file_get_contents("php://input"));

//        echo json_encode($data);exit;

        $sales_id = $data->sales_id;
        $contact_id = $data->lead_id;


        if($contact_id){

            $data_arr = [
                'user_id' => $sales_id,

            ];

            $this->common->update( 'contacts', $data_arr, ['id'=>$contact_id] );

            $response = [
                'status'=>'success',
                'data'=>$data_arr,
                'message' =>'Agent updated successfully',
            ];

            http_response_code(200);
            echo json_encode($response);

        }else{

            $response = [
                'status'=>'error',
                'message' =>'Lead id is missing',
            ];

            http_response_code(200);
            echo json_encode($response);
        }

    }

    public function get_time_line(){

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $data = json_decode(file_get_contents("php://input"));

        $contact_id = $data->lead_id;

        $join_arr_left = [
            'users u' =>'u.id = c.user_id'
        ];


        $arr_logs = $this->common->get_all('activitylogs c',
            ['c.lead_id'=>$contact_id],'c.*,u.group_id, u.first_name nameFirst, u.last_name nameLast',
            'id desc','','',$join_arr_left);

        $data_arr = [];

        foreach($arr_logs as $log ){

            $created_date = $log->created;
            $created_date = new DateTime($created_date);
            $created_date = $created_date->format('F j, Y, g:i a');

            $row_f = [];

            $row_f['date'] = $created_date;
            $row_f['group_name'] = get_role_name($log->group_id);
            $row_f['message'] = $log->message;
            $data_arr[]=$row_f;
        }

        $response = [
            'status'=>'success',
            'data'=>$data_arr,
            'message' =>'data fetched successfully',
        ];

        http_response_code(200);
        echo json_encode($response);

    }


    public function view_lead_details(){

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $data = json_decode(file_get_contents("php://input"));

        $contact_id = $data->lead_id;

        $join_arr_left = [
            'statuses s' =>'s.id = c.status_id',
            'sources ss' =>'ss.id = c.source_id',
            'types t' =>'t.id = c.type_id',
            'country ct' =>'ct.id = c.country_id',
            'state st' =>'st.id = c.state_id',
            'city cty' =>'cty.id = c.city_id',
            'categories cto' =>'cto.id = c.product_id',
            'cgroups cg' =>'cg.id = c.cgroup_id',
        ];

        $row_contacts = $this->common->get('contacts c',['c.id'=>$contact_id],
            'object','c.*,s.name statusName,ss.name source,t.name type,ct.name country,
            st.name state,cty.name city,cto.name product,cg.name feed_back',$join_arr_left);

        $arr_follow = $this->common->get_all('contacts_followups',['contact_id'=>$contact_id]);


        $list_follow = [];
        foreach($arr_follow as $follo){


            $followup_date = $follo->followup_date;
            $followup_date = new DateTime($followup_date);
            $followup_date = $followup_date->format('F j, Y, g:i a');

            $row_follo = [
                'date'=>$followup_date,
                'type'=>get_follow_type($follo->type),
                'remark' =>$follo->remark
            ];

            $list_follow[] = $row_follo;
        }

        $contact_details = [
            'client_name'=>$row_contacts->first_name,
            'client_email'=>$row_contacts->email,
            'client_phone'=>$row_contacts->phone,
            'source'=>$row_contacts->source,
            'type'=>$row_contacts->type,
            'status'=>$row_contacts->statusName,
            'feed_back'=>$row_contacts->feed_back,
            'country'=>$row_contacts->country,
            'state'=>$row_contacts->state,
            'city'=>$row_contacts->city,
            'product'=>$row_contacts->product,
            'cost'=>$row_contacts->cost,
            'brand_name'=>$row_contacts->brand_name,
            'invoice_no'=>$row_contacts->invoice_no,
            'invoice_value'=>$row_contacts->invoice_value,
            'models'=>$row_contacts->models,
            'reason'=>$row_contacts->reason,
            'final_status'=>($row_contacts->final_status!=0)? get_final_status($row_contacts->final_status):'',
        ];

        $data_arr = [
            'contact_details'=>$contact_details,
            'follow_up_list'=>$list_follow,
        ];


        $response = [
            'status'=>'success',
            'data'=>$data_arr,
            'message' =>'data fetched successfully',
        ];

        http_response_code(200);
        echo json_encode($response);

    }


    public function add_lead(){


        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



        $data = json_decode(file_get_contents("php://input"));

//        echo json_encode($data);exit;

        $followup_date = $data->followup_date;
        $first_name = $data->name;
        $phone = $data->phone;
        $email = $data->email;
        $product_id = $data->product_id;
        $user_id = $data->sales_id;
        $cost = $data->cost;
        $touch_date = $data->touch_date;
        $source_id = $data->source_id;
        $type_id = $data->customer_category;
        $cgroup_id = $data->feed_back;
        $city_name = $data->city;
        $country_id = $data->country_id;
        $state_id = $data->state_id;
        $city_id = $data->city_id;

        $touch_date = DateTime::createFromFormat('d/m/Y',$touch_date );
        $touch_date =  $touch_date->format("Y-m-d");


        if($user_id){


            $followup_date = new DateTime($followup_date);
            $followup_date = $followup_date->format('Y-m-d H:i:s');

            $data_contact= [
                'first_name'=>$first_name,
                'phone'=>$phone,
                'email'=>$email,
                'product_id'=>$product_id,
                'user_id'=>$user_id,
                'cost'=>$cost,
                'touch_date'=>$touch_date,
                'source_id'=>$source_id,
                'type_id'=>$type_id,
                'cgroup_id'=>$cgroup_id,
                'city_name'=>$city_name,
                'country_id'=>$country_id,
                'state_id'=>$state_id,
                'city_id'=>$city_id,
                'status_id'=>1,
                'created' => date('Y-m-d H:i:s'),
            ];

            $contact_id = $this->common->insert( 'contacts', $data_contact );

            $data_contact_follow = [
                'contact_id'=>$contact_id,
                'remark'=>"new follow-up",
                'type'=>1,
                'followup_date'=>$followup_date,
            ];

            $this->common->insert( 'contacts_followups', $data_contact_follow );


            $row_user = $this->common->get( 'users', array( 'id' => $user_id));


            $message = "<b>".$row_user->first_name." ".$row_user->last_name."</b> created new lead";


            $activity_log_data = [
                'user_id' => $row_user->id,
                'message' => $message,
                'lead_id' => $contact_id,
                'created' => date('Y-m-d H:i:s'),
            ];
            $this->common->insert( 'activitylogs', $activity_log_data );


            $response = [
                'status'=>'success',
                'data'=>$data_contact,
                'message' =>'Lead added successfully',
            ];

            http_response_code(200);
            echo json_encode($response);

        }else{

            $response = [
                'status'=>'error',
                'message' =>'Sales id is missing',
            ];

            http_response_code(200);
            echo json_encode($response);
        }

    }

    public function get_array_list(){

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



        $data = json_decode(file_get_contents("php://input"));


        $arr_country = $this->common->get_all( 'country');
        $arr_type = $this->common->get_all( 'types',['status'=>1]);
        $arr_source = $this->common->get_all( 'sources');
        $arr_cgroups = $this->common->get_all( 'cgroups',['status'=>1]);

        $arr_categories = $this->common->get_all( 'categories',['status'=>1]);




        $data_arr = [];

        foreach($arr_country as $row_status ){

            $row_f = [];

            $row_f['id'] = $row_status->id;
            $row_f['name'] = $row_status->name;
            $data_arr[]=$row_f;
        }

        $data_status['country'] =$data_arr;

        $data_arr = [];

        foreach($arr_type as $key => $row_status ){

            $row_f = [];

            $row_f['id'] = $row_status->id;
            $row_f['name'] = $row_status->name;
            $data_arr[]=$row_f;
        }

        $data_status['customer_type'] =$data_arr;


        $data_arr = [];
        foreach($arr_source as $key => $row_type ){

            $row_f = [];

            $row_f['id'] = $row_type->id;
            $row_f['name'] = $row_type->name;
            $data_arr[]=$row_f;
        }

        $data_status['source'] =$data_arr;

        $data_arr = [];
        foreach($arr_cgroups as $key => $row_type ){

            $row_f = [];

            $row_f['id'] = $row_type->id;
            $row_f['name'] = $row_type->name;
            $data_arr[]=$row_f;
        }

        $data_status['feed_back'] =$data_arr;

        $data_arr = [];
        foreach($arr_categories as $key => $row_type ){

            $row_f = [];

            $row_f['id'] = $row_type->id;
            $row_f['name'] = $row_type->name;
            $data_arr[]=$row_f;
        }

        $data_status['products'] =$data_arr;


        $response = [
            'status'=>'success',
            'data'=>$data_status,
            'message' =>'data fetched successfully',
        ];

        http_response_code(200);
        echo json_encode($response);

    }

    public function get_state(){

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $data = json_decode(file_get_contents("php://input"));


    $country_id  = $data->country_id;;

    $condition = "country_id = '".$country_id."' ";

    $result = $this->common->get_all('state', $condition );

    $data_arr = [];

    foreach($result as $row_user ){

        $row_f = [];

        $row_f['id'] = $row_user->id;
        $row_f['name'] = $row_user->name;
        $data_arr[]=$row_f;
    }

    $response = [
        'status'=>'success',
        'data'=>$data_arr,
        'message' =>'data fetched successfully',
    ];

    http_response_code(200);
    echo json_encode($response);

}

    public function get_district(){

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $data = json_decode(file_get_contents("php://input"));


        $state_id  = $data->state_id;;

        $condition = "state_id = '".$state_id."' ";

        $result = $this->common->get_all('city', $condition );

        $data_arr = [];

        foreach($result as $row_user ){

            $row_f = [];

            $row_f['id'] = $row_user->id;
            $row_f['name'] = $row_user->name;
            $data_arr[]=$row_f;
        }

        $response = [
            'status'=>'success',
            'data'=>$data_arr,
            'message' =>'data fetched successfully',
        ];

        http_response_code(200);
        echo json_encode($response);

    }

    public function closed_leads(){

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $sales_id = '';

        $data = json_decode(file_get_contents("php://input"));

//        echo json_encode($data);exit;

        $sales_id = $data->sales_id;
        $status_id = $data->status_id;
        $customer_category = $data->customer_category;

        $keyword = $data->keyword;

        $page_no = $data->page_no;
        $limit = 10;
        $offset = $limit*($page_no-1);



        if($sales_id ){


            $join_arr_left = [
                'statuses s' =>'s.id = c.status_id',
                'users u' =>'u.id = c.user_id',
                'types tp' =>'tp.id = c.type_id',
                'categories cp' =>'cp.id = c.product_id'
            ];

            $condition = '1=1 AND c.status_id = 2';
            $condition .= ' AND c.user_id ='.$sales_id;

            if( $keyword != '' ) {
                $condition .= ' AND (c.first_name LIKE "%'.$keyword.'%" OR c.phone LIKE "%'.$keyword.'%")';
            }

            if( $status_id != '' ) {
                $condition .= ' AND c.status_id = '.$status_id;
            }

            if( $customer_category != '' ) {
                $condition .= ' AND c.type_id = '.$customer_category;
            }


            $result = $this->common->get_all( 'contacts c', $condition,
                'c.*,u.group_id,s.name status_name,s.color,tp.name customer_cat, cp.name product',
                'c.id desc', $limit,$offset,$join_arr_left  );


            $data_arr = [];

            foreach($result as $row_follow ){

                $followup_date = $row_follow->touch_date;

                $followup_date = new DateTime($followup_date);
                $followup_date = $followup_date = $followup_date->format('F j, Y, g:i a');

                $row_f = [];

                $row_f['lead_id'] = $row_follow->id;
                $row_f['product'] = $row_follow->product;
                $row_f['client'] = $row_follow->first_name;
                $row_f['phone'] = $row_follow->phone;
                $row_f['email'] = $row_follow->email;
                $row_f['customer_category'] = $row_follow->customer_cat;
                $row_f['touch_date'] = $followup_date;
                $row_f['status'] = $row_follow->status_name;

                $data_arr[]=$row_f;
            }

            $response = [
                'status'=>'success',
                'data'=>$data_arr,
                'message' =>'data fetched successfully',
            ];

            http_response_code(200);
            echo json_encode($response);


        }else{

            $response = [
                'status'=>'error',
                'message' =>'Sales ID is missing',
            ];

            http_response_code(200);
            echo json_encode($response);
        }

    }


    public function todays_followups(){

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $sales_id = '';

        $data = json_decode(file_get_contents("php://input"));

//        echo json_encode($data);exit;

        $sales_id = $data->sales_id;

        $page_no = $data->page_no;
        $limit = 10;
        $offset = $limit*($page_no-1);

        if($sales_id ){


            $join_arr_left = [

                'contacts t' =>'t.id = c.contact_id',
                'statuses s' =>'s.id = t.status_id',
                'users u' =>'u.id = t.user_id',
                'categories cp' =>'cp.id = t.product_id'
            ];

            $condition = "t.id != '' AND DATE(followup_date) = DATE(NOW()) AND t.status_id != 2 AND c.reply IS NULL";
            $condition .= " AND user_id = ".$sales_id;


            $arr_followups = $this->common->get_all('contacts_followups c',
                $condition,'c.*,u.group_id,t.first_name, t.last_name,t.email,t.phone,
                s.name status_name,s.color,cp.name product,t.id lead_id',
                'followup_date asc',$limit,$offset,$join_arr_left);

            $data_arr = [];

            foreach($arr_followups as $row_follow ){

                $followup_date = $row_follow->followup_date;

                $followup_date = new DateTime($followup_date);
                $followup_date = $followup_date = $followup_date->format('F j, Y, g:i a');

                $row_f = [];

                $row_f['follow_up_id'] = $row_follow->id;
                $row_f['product'] = $row_follow->product;
                $row_f['lead_id'] = $row_follow->lead_id;
                $row_f['client'] = $row_follow->first_name;
                $row_f['phone'] = $row_follow->phone;
                $row_f['email'] = $row_follow->email;
                $row_f['followup_date'] = $followup_date;
                $row_f['followup_type'] = get_follow_type($row_follow->type);
                $row_f['status'] = $row_follow->status_name;
                $row_f['is_completed'] = is_null($row_follow->reply)?'Not Completed':'Completed';

                $data_arr[]=$row_f;
            }

            $response = [
                'status'=>'success',
                'data'=>$data_arr,
                'message' =>'data fetched successfully',
            ];

            http_response_code(200);
            echo json_encode($response);


        }else{

            $response = [
                'status'=>'error',
                'message' =>'Sales ID is missing',
            ];

            http_response_code(200);
            echo json_encode($response);
        }

    }


}