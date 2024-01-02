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

            $condition = "phone = '".$mobile."' AND status = 1";
            $user = $this->common->get("service_item", $condition,"array");


            if($user){

                $user_id = $user['id'];
                $name = ucfirst($user['name']);
                $otp = rand(100000,999999);
                $message = 'Dear '.$name.', '.$otp.' is your OTP for DRYERBOOK Login. Please enter the OTP to proceed. - HORTEC';


                $param = [
                    'mobile' => $mobile,
                    'message' => $message,
                ];

                $response = send_single_sms($param);

//                echo $response; exit;

                if($response){

                    $data_arr = [

                        'id'=>$user['id'],
                        'name'=>$user['name'],
                        'dryer_name'=>$user['dryer_name'],
                        'address'=>$user['address'],
                        'phone'=>$user['phone'],
                        'type'=>$user['type'],
                        'app_id'=>$user['app_id'],
                        'otp'=>$otp,
                    ];

                    $response = [
                        'status'=>'success',
                        'data'=>$data_arr,
                        'message' =>'Your login is successfull',
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


    public function add_customer(){


        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $email = '';
        $password = '';

        $data = json_decode(file_get_contents("php://input"));

//        echo json_encode($data);exit;

        if($data ){

            $name = $data->name;
            $app_id = $data->app_id;
            $phone = $data->phone;
            $address = $data->address;
            $default_charge = $data->default_charge;
            $opening_balance = $data->opening_balance;
            $stock_balance = $data->stock_balance;


            $param = [
                'name' => $name,
                'app_id' => $app_id,
                'phone' => $phone,
                'address' => $address,
                'default_charge' => $default_charge,
                'opening_balance' => $opening_balance,
                'stock_balance' => $stock_balance,
            ];


            $condition = "phone = ".$phone." AND app_id =".$app_id;
            $customer = $this->common->get("customer", $condition,"array");


            if(!$customer){

                $customer_id = $this->common->insert('customer', $param);

                $param['customer_id'] = $customer_id;

                $response = [
                    'status'=>'success',
                    'data'=>$param,
                    'message' =>'Customer created successfully',
                ];

                http_response_code(200);
                echo json_encode($response);

            }else{

                $response = [
                    'status'=>'error',
                    'data'=>[],
                    'message' =>'Customer already registerd with same phone number',
                ];

                http_response_code(401);
                echo json_encode($response);

            }

        }else{

            $response = [
                'status'=>'error',
                'data'=>[],
                'message' =>'Data provioded is wrong',
            ];

            http_response_code(401);
            echo json_encode($response);
        }

    }

    public function add_stock(){


        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $email = '';
        $password = '';

        $data = json_decode(file_get_contents("php://input"));

//        echo json_encode($data);exit;

        if($data ){

            $customer_id = $data->customer_id;
            $date = $data->date;
            $wight_kg = $data->wight_kg;
            $no_bags = $data->no_bags;



            $dateTime = DateTime::createFromFormat('d/m/Y', $date);
            $date =  $dateTime->format('Y-m-d');

//            $date = date('Y-m-d', strtotime(str_replace('-', '/', $date)));


            $param = [
                'customer_id' => $customer_id,
                'date' => $date,
                'wight_kg' => $wight_kg,
                'no_bags' => $no_bags
            ];




            if( $customer_id ){

                $insert_id = $this->common->insert('tbl_stock', $param);

                $param['insert_id'] = $insert_id;

                $response = [
                    'status'=>'success',
                    'data'=>$param,
                    'message' =>'Stock added successfully',
                ];

                http_response_code(200);
                echo json_encode($response);

            }else{

                $response = [
                    'status'=>'error',
                    'data'=>[],
                    'message' =>'Customer ID is required',
                ];

                http_response_code(401);
                echo json_encode($response);

            }

        }else{

            $response = [
                'status'=>'error',
                'data'=>[],
                'message' =>'Data provioded is wrong',
            ];

            http_response_code(401);
            echo json_encode($response);
        }

    }

    public function drying_list(){


        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



        $data = json_decode(file_get_contents("php://input"));

//        echo json_encode($data);exit;

        if($data ){


            $app_id = $data->app_id;

            $date = $data->date;

            $left_join = [
                'customer c'=>'c.id = s.customer_id'
            ];


            $condition = "c.app_id = ".$app_id." AND app_id =".$app_id;

            if( $date != '' ){

                $dateTime = DateTime::createFromFormat('d/m/Y', $date);
                $date =  $dateTime->format('Y-m-d');

                $condition = "c.app_id = ".$app_id." AND s.date ='".$date."'";

            }

            $list = $this->common->get_all('tbl_stock s', $condition,
                'c.name customer_name,s.id,s.wight_kg,s.dryed_kg,s.date','','','',$left_join);


            if(count($list)>0){



                $response = [
                    'status'=>'success',
                    'data'=>$list,
                    'message' =>'List is available',
                ];

                http_response_code(200);
                echo json_encode($response);

            }else{

                $response = [
                    'status'=>'error',
                    'data'=>[],
                    'message' =>'There is no list found',
                ];

                http_response_code(401);
                echo json_encode($response);

            }

        }else{

            $response = [
                'status'=>'error',
                'data'=>[],
                'message' =>'Data provioded is wrong',
            ];

            http_response_code(401);
            echo json_encode($response);
        }

    }

    public function update_dried(){


        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


        $data = json_decode(file_get_contents("php://input"));

//        echo json_encode($data);exit;

        if($data ){

            $id = $data->id;
            $dryed_kg = $data->dryed_kg;


            $param = [
                'dryed_kg' => $dryed_kg,
            ];




            if( $id ){

                $this->common->update('tbl_stock', $param, ['id'=>$id] );

                $param['updated_id'] = $id;

                $response = [
                    'status'=>'success',
                    'data'=>$param,
                    'message' =>'Dried quantity updated successfully',
                ];

                http_response_code(200);
                echo json_encode($response);

            }else{

                $response = [
                    'status'=>'error',
                    'data'=>[],
                    'message' =>'ID is required',
                ];

                http_response_code(401);
                echo json_encode($response);

            }

        }else{

            $response = [
                'status'=>'error',
                'data'=>[],
                'message' =>'Data provioded is wrong',
            ];

            http_response_code(401);
            echo json_encode($response);
        }

    }

    public function list_customers(){


        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



        $data = json_decode(file_get_contents("php://input"));

//        echo json_encode($data);exit;

        if($data ){


            $app_id = $data->app_id;
            $keyword = $data->keyword;




            $condition = 'c.app_id = '.$app_id;

            if( $keyword != ''){
                $condition = 'c.app_id = '.$app_id.' AND name LIKE "%'.$keyword.'%"';
            }

            $list = $this->common->get_all('customer c', $condition,'c.*');


            if(count($list)>0){



                $response = [
                    'status'=>'success',
                    'data'=>$list,
                    'message' =>'List is available',
                ];

                http_response_code(200);
                echo json_encode($response);

            }else{

                $response = [
                    'status'=>'error',
                    'data'=>[],
                    'message' =>'There is no list found',
                ];

                http_response_code(401);
                echo json_encode($response);

            }

        }else{

            $response = [
                'status'=>'error',
                'data'=>[],
                'message' =>'Data provioded is wrong',
            ];

            http_response_code(401);
            echo json_encode($response);
        }

    }

    public function view_customer(){

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $email = '';
        $password = '';

        $data = json_decode(file_get_contents("php://input"));

//        echo json_encode($data);exit;

        if($data ){

            $id = $data->id;

            $condition = "id = ".$id;
            $customer = $this->common->get("customer", $condition,"array");


            if(!$customer){

                $response = [
                    'status'=>'error',
                    'data'=>[],
                    'message' =>'Customer not found',
                ];


                http_response_code(401);
                echo json_encode($response);

            }else{

                $response = [
                    'status'=>'success',
                    'data'=>$customer,
                    'message' =>'Customer fetched successfully',
                ];

                http_response_code(200);
                echo json_encode($response);

            }

        }else{

            $response = [
                'status'=>'error',
                'data'=>[],
                'message' =>'Data provioded is wrong',
            ];

            http_response_code(401);
            echo json_encode($response);
        }

    }

}