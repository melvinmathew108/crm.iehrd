<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if( !function_exists('create_slug') ) {

	function create_slug($name, $table, $id=''){
	    $count = 0;
	    $name = url_title($name);
	    $slug_name = $name;
	    $slug_name = strtolower(trim($slug_name, '-'));
	    while(true)
	    {
	    	$ci = &get_instance();
	        $ci->db->select('id');
	        if($id !=''){
	        	$ci->db->where('id !=', $id);
	        }
	        $ci->db->where('slug', $slug_name);   // Test temp name
	        $query = $ci->db->get($table);
	        if ($query->num_rows() == 0) break;
	        $slug_name = $slug_name . '-' . (++$count);  // Recreate new temp name
	    }
	    return $slug_name;      // Return temp name
	}
}

// if( !function_exists('create_slug') ) {

// 	function create_slug( $title = '' ) {
// 		$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $title);
// 		$clean = strtolower(trim($clean, '-'));
// 		$clean = preg_replace("/[\/_|+ -]+/", '_', $clean);

// 		if ( slug_exists($clean, $id) ) {
// 			$clean = make_slug_unique($clean);
// 		}
// 		return $clean;
// 	}

// }
// if( !function_exists('slug_exists') ) {
// 	function slug_exists( $slug ) {
// 		$ci = &get_instance();
// 		$ci->db->from('processes');
// 		$ci->db->where('slug', $slug);
// 		return $ci->db->count_all_results();
// 	}
// }
// if( !function_exists('make_slug_unique') ) {
// 	function make_slug_unique( $slug ) {
// 		for ( $i=1; $i<100000; $i++ ) {
// 			$proposedslug = $slug .'-'. $i;
// 			if ( !slug_exists( $proposedslug ) ){
// 				return $proposedslug;
// 				break;
// 			}
// 		}
// 	}
// }


if( !function_exists('create_app_id') ) {

    function create_app_id() {

        $ci = &get_instance();

        $ci->db->where( 'type' , 0 );
        $ci->db->order_by('app_id desc');
        $ci->db->limit(1,0);
        $row = $ci->db->get('service_item')->row();

        if( $row ) {

            $last_app_id = $row->app_id;
            $new_app_id = $last_app_id+1;

            return $new_app_id;

        } else {
            return 200001;
        }
    }
}


if( !function_exists('random_string') ) {
	function random_string($stirng = 15){  //password_hash("rasmuslerdorf", PASSWORD_DEFAULT)

		$rnd_id = password_hash(uniqid(rand(),1), PASSWORD_DEFAULT);
		$rnd_id = strip_tags(stripslashes($rnd_id));
		$rnd_id = str_replace(".","",$rnd_id);
		$rnd_id = strrev(str_replace("/","",$rnd_id));
		$rnd_id = substr($rnd_id,0,$stirng);
		return $rnd_id;
	}
}

if ( !function_exists('username') ) {
	function username( $id = 0 ) {

		if( $id > 0 ) {
			$ci = &get_instance();
			$ci->db->select('username');
			$ci->db->where( 'id' , $id );
			$row = $ci->db->get('users')->row();
			if( is_array($row) && count($row) > 0 ) {
				return $row->username;
			} else {
				return '';
			}
		} else {
			return '';
		}
	}
}

if ( !function_exists('user_details') ) {
	function user_details( $id = 0 ) {
		$ci = &get_instance();
		$ci->db->where( 'id' , $id );
		$row = $ci->db->get('users')->row();
		return $row;
	}
}


if( !function_exists('get_settings_item') ) {

	function get_settings_item($key = '') {

		$ci = &get_instance();
		$ci->db->where('field', $key);
		$row = $ci->db->get('settings')->row();
		if( is_array($row) && count($row) > 0 ) {
			return $row->value;
		} else {
			return '';
		}
	}

}
if( !function_exists('get_role_name') ) {

	function get_role_name( $id = '' ) {

		$ci = &get_instance();
		$ci->db->where('id', $id);
		$row = $ci->db->get('groups')->row();

		if( $row ) {

  			return $row->title;

		} else {
			return '';
		}
	}

}

if( !function_exists('is_user_active') ) {
	function is_user_active( $id = 0 ) {
		$ci = &get_instance();
		$ci->db->where( 'id' , $id );
		$row = $ci->db->get('users')->row();

		if( is_array($row) && count($row) > 0 ) {

			if( $row->expire_date < time() ) {
				return false;
			} else {
				return true;
			}

		} else {
			return false;
		}
	}
}

if ( !function_exists('get_user_status') ) {
	function get_user_status( $key  = 0) {
		$st_arr = array(
			1 => 'Active',
			2 => 'Inactive',
			3 => 'Deleted',
		);
		return $st_arr[$key];
	}
}

if ( !function_exists('get_follow_type') ) {
    function get_follow_type( $key  = 0) {
        $st_arr = array(
            1 => 'Call',
            2 => 'Email',
            3 => 'Meeting',
            4 => 'WhatsApp',
        );


        return $st_arr[$key];
    }
}

if ( !function_exists('get_final_status') ) {
    function get_final_status( $key  = 0) {
        $st_arr = array(
            1 => 'Initial Payment Done',
            2 => 'Admission On Other College',
            3 => 'Junk',
            4 => 'Not Interested',
        );

        if( $key  == 0 ){
            return $st_arr;
        }else{
            return $st_arr[$key];
        }

    }
}

if ( !function_exists('get_month') ) {
    function get_month( $key  = 0) {
        $st_arr = array(
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December',
        );

        if( $key  == 0 ){
            return $st_arr;
        }else{
            return $st_arr[$key];
        }

    }
}


if ( !function_exists('get_user_status_class') ) {
	function get_user_status_class( $key  = 0) {
		$st_arr = array(
			1 => 'success',
			2 => 'warning',
			3 => 'danger',
			4 => 'danger',
		);
		return $st_arr[$key];
	}
}


if ( !function_exists('send_mail') ) {
	function send_mail( $name, $user_id = 0, $params = array() ){

		$ci = &get_instance();

		$settings = $ci->db->get('core')->row();

		$to_name = $to_email = '';
		if (false !== ($pos = strpos($user_id, '@'))) {
			$to_email = $user_id;
			if( $to_email == '' ) {
				return;
			}
		} else {

			$ci->db->where( 'id' , $user_id );
			$user = $ci->db->get('users')->row();

			if( is_array($user) && count($user) == 0 ){
				return;
			}
			$to_name = $user->first_name.' '.$user->last_name;
			$to_email = $user->email;
		}

		$ci->db->where( 'slug' , $name );
		$model = $ci->db->get('emails')->row();

		if( is_array($model) && count($model) == 0 ){
			return;
		}

		$template = $model->body;
		$subject = $model->subject;

		$template = str_replace(array_map(function($key) {
			return '[*' . $key . '*]';
		}, array_keys($params)), array_values($params), $template);

		$subject = str_replace(array_map(function($key) {
			return '[*' . $key . '*]';
		}, array_keys($params)), array_values($params), $subject);


		$ci->load->library('phpmailer');

		$ci->phpmailer->IsHTML(true);

		$is_smtp = $settings->is_smtp;

		if( $is_smtp == 1 ) {
			$ci->phpmailer->IsSMTP();
			$ci->phpmailer->SMTPSecure = $settings->connection_prefix;
			$ci->phpmailer->SMTPAuth   = true;
			$ci->phpmailer->Host       = $settings->smtp_host;
			$ci->phpmailer->Port       = $settings->smtp_port;
			$ci->phpmailer->Username   = $settings->smtp_username;
			$ci->phpmailer->Password   = $settings->smtp_password;
		}

		$ci->phpmailer->SetFrom( $settings->email, $settings->site_name );
		$ci->phpmailer->AddAddress( $to_email, $to_name );
		$ci->phpmailer->Subject = $subject;
		$ci->phpmailer->Body = $template;
		$ci->phpmailer->Send();
		$ci->phpmailer->ClearAddresses();
	}
}


if ( !function_exists('get_gst') ) {
    function get_gst( $key  = 0) {
        $st_arr = array(
            '1' => 0,
            '2' => 5,
            '3' => 12,
            '4' => 18,
            '5' => 28,
        );
        if( $key  == 0 ){
            return $st_arr;
        }else{
            return $st_arr[$key];
        }
    }
}


if ( !function_exists('get_unit') ) {

    function get_unit( $key  = 0) {

        $st_arr = array(
            '1' => 'piece',
            '2' => 'Liter',
            '3' => 'Kg',
        );

        if( $key  == 0 ){
            return $st_arr;
        }else{
            return $st_arr[$key];
        }

    }
}

if ( !function_exists('get_mop') ) {

    function get_mop( $key  = 0) {

        $st_arr = array(
            '1' => 'Cash',
            '2' => 'Credit',
            '3' => 'Card',
            '4' => 'Mixed',
        );

        if( $key  == 0 ){
            return $st_arr;
        }else{
            return $st_arr[$key];
        }

    }
}

if ( !function_exists('get_customer') ) {
    function get_customer( $key  = 0) {
        $st_arr = array(
            0 => 'Active',
            1 => 'InActive',

        );
        return $st_arr[$key];
    }
}


if( !function_exists('create_customer_id') ) {

    function create_customer_id() {

        $ci = &get_instance();

//        $ci->db->where( 'group_id' , 2 );
        $ci->db->order_by('customer_code desc');
        $ci->db->limit(1,0);
        $row = $ci->db->get('customer')->row();

        if( $row ) {

            $last_booking_id = $row->customer_code;

            $new_booking_id = $last_booking_id+1;

            return $new_booking_id;

        } else {
            return 1000;
        }
    }
}


if( !function_exists('create_invoice_no') ) {

    function create_invoice_no() {

        $ci = &get_instance();

        $settings = $ci->db->get('core')->row();
        $invoice_start = $settings->invoice_start;

//        $ci->db->where( 'group_id' , 2 );
        $ci->db->order_by('invoice_no desc');
        $ci->db->limit(1,0);
        $row = $ci->db->get('invoice')->row();

        if( $row ) {

            $last_invoice_no= $row->invoice_no;

            $new_invoice_no = $last_invoice_no+1;

            if($last_invoice_no < $invoice_start ){
                return $invoice_start;
            }else{
                $new_invoice_no = $last_invoice_no+1;
                return $new_invoice_no;
            }



        } else {
            return $invoice_start;
        }
    }
}


if( !function_exists('send_single_sms') ) {

    function send_single_sms( $parms = [] ) {

        $ci = &get_instance();

        $row = $ci->db->get('core')->row();

        if( true ) {

            $url_parms = [
                'user' => 'horizonlabs',
                'apikey' => 'LEyF9eK38pkOtqDmz4T0',
                'mobile' => $parms["mobile"],
                'message' => $parms["message"],
                'senderid' => 'HORTEC',
                'type' => 'txt',
                'tid' => '1207163152773485766',
            ];

            $url ='http://sms.horizonlabs.in/api/sendsms.php';

            $url = $url.'?'.http_build_query($url_parms);

            $options = array();
            $defaults = array(
                CURLOPT_URL => $url. (strpos($url, '?') === FALSE ? '?' : ''). http_build_query($url_parms),
                CURLOPT_HEADER => 0,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_TIMEOUT => 4
            );

            $ch = curl_init();
            curl_setopt_array($ch, ($options + $defaults));
            if( ! $result = curl_exec($ch))
            {
                trigger_error(curl_error($ch));
            }
            curl_close($ch);

            if($result){
                return $result;
            }else{
                return false;
            }


        } else {

            return false;
        }
    }

}




https://sms.horizonlabs.in/api/sendsms.php?user=horizonlabs&apikey=LEyF9eK38pkOtqDmz4T0&mobile=9074656202&message=Dear+Robin%2C+470445+is+your+OTP+for+DRYERBOOK+Login.+Please+enter+the+OTP+to+proceed.+-+HORTEC&senderid=HORTEC&type=txt&tid=1207163152773485766

