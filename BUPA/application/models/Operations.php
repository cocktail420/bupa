<?php
/**
 * 
 */
    class Operations extends CI_model
    {

        public function Create($table,$data)
        {
            return $this->db->insert($table, $data);
        }

        
        public function UpdateData($table,$condition,$data)
        {
            $this->db->where($condition);
            $details = $this->db->update($table,$data);
            return $details;
        }

        public function Delete($table,$id)
        {
            $this->db->where('id',$id);
            $delete = $this->db->delete($table);
            return $delete;
        }


        public function Search($table)
        {
        $this->db->select('*');
        $this->db->order_by('id','DESC');
        return $this->db->get($table)->result_array();
        }

        //Count
        public function Count($table)
        {
            $this->db->select('*');
        return $this->db->get($table)->num_rows();
        }

        public function CountByCondition($table,$condition)
        {
            $this->db->select('*');
            $this->db->where($condition);
        return $this->db->get($table)->num_rows();
        }

        //delete all from table
        public function DeleteThem($table)
        {
            return $this->db->empty_table($table);
        }


        public function SearchChart()
        {
        // 	$query = $this->db->query("SELECT SUM(value) as count FROM rewards 
        // 	GROUP BY MONTH(created_on) ORDER BY created_on"); 
        // $data = json_encode(array_column($query->result(), 'count'),JSON_NUMERIC_CHECK);
        $theYear = date('Y');
        // $select = "
        //     SELECT 
        //       COUNT(*) AS start_count,
        //       MONTH(created_on) as month
        //     FROM
        //        rewards
        //     WHERE 
        //        YEAR(created_on)='$theYear'
        //     GROUP BY
        //        MONTH(created_on)
        // ";
        // $query = $this->db->query($select);
        // $data = json_encode(array_column($query->result(), 'count'),JSON_NUMERIC_CHECK);
        // return $data;
        $query = $this->db->query('SELECT SUM(value) as "Value", (DATE_FORMAT(created_on,"%M")) AS "Month" FROM rewards  WHERE year(created_on)= ' . $theYear . ' GROUP BY (DATE_FORMAT(created_on,"%M")) ORDER BY "Month" ASC');

        if($query->num_rows() > 0){
            return $query->result_array();
        }else
            return false;


        }



    //multiple conditions
        public function SearchByCondition($table,$condition)
        {
            $this->db->select('*');
            $this->db->from($table);	
            $this->db->where($condition);
        $get = $this->db->get();
            return $get->result_array();
        }


        public function JoinedTabled($table,$table2)
        {
            $this->db->select('a.*,b.*');
        $this->db->from(''.$table.' a'); 
        $this->db->join(''.$table2.' b', 'b.id =a.customerid');
        $this->db->where('a.status = 0');        
        $query = $this->db->get(); 
        if($query->num_rows() != 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
        }

        public function JoinsTabled($table,$table2)
        {
            $this->db->select('a.*,b.phone,b.names,b.email,b.gender');
        $this->db->from(''.$table.' a'); 
        $this->db->join(''.$table2.' b', 'b.id =a.customer_id');       
        $query = $this->db->get(); 
        if($query->num_rows() != 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
        }




    public function JoinedTable($table,$table2)
    {
        $this->db->select('a.*,b.*');
        $this->db->from(''.$table.' a'); 
        $this->db->join(''.$table2.' b', 'b.customer_id =a.customer_id');
        // $this->db->where('b.customer_id = a.customer_id');        
        $query = $this->db->get(); 
        if($query->num_rows() != 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }


        public function resolve_user_login($email, $password, $table) {
            
            $this->db->select('password');
            $this->db->from($table);
            $this->db->where('email', $email);
            $hash = $this->db->get()->row('password');
            
            return $this->verify_password_hash($password, $hash);
            
        }


        public function resolve_admin_login($email,$password,$table)
        {
            $this->db->select('password');
            $this->db->from($table);
            $this->db->where('email', $email);
            $hash = $this->db->get()->row('password');
            
            return $this->verify_password_hash($password, $hash);
        }
        
        
        public function get_user_id_from_username($email,$table) {
            
            $this->db->select('id');
            $this->db->from($table);
            $this->db->where('email', $email);

            return $this->db->get()->row('id');
            
        }

        public function get_admin_id_from_username($email,$table) {
            
            $this->db->select('id');
            $this->db->from($table);
            $this->db->where('email', $email);

            return $this->db->get()->row('id');
            
        }

        public function get_user_id_from_email($email,$table) {
            
            $this->db->select('id');
            $this->db->from($table);
            $this->db->where('email', $email);

            return $this->db->get()->row('id');
            
        }

        public function get_user_id_from_phone($phone,$table) {
            
            $this->db->select('id');
            $this->db->from($table);
            $this->db->where('telephone', $phone);

            return $this->db->get()->row('id');
            
        }

        public function get_user($user_id,$table) {
            
            $this->db->from($table);
            $this->db->where('id', $user_id);
            return $this->db->get()->row();
            
        }

        public function hash_password($password) {
            
            return password_hash($password, PASSWORD_BCRYPT);
            
        }
        

        public function verify_password_hash($password, $hash) {
            
            return password_verify($password, $hash);
            
        }

        public function SendEmail($email,$subject,$message)
        {
                 $protocol = 'smtp'; 
            $smtp_host = 'ssl://mail.taifatech.co.ke';
            $smtp_port = '465';
            $smtp_user = 'info@taifatech.co.ke';
            $smtp_pass = 'Sam200010';
            $mailtype = 'Html';

            $config = array(
                'protocol' => $protocol,
                'smtp_host' => $smtp_host,
                'smtp_port' => $smtp_port,
                'smtp_user' => $smtp_user,
                'smtp_pass' => $smtp_pass,
                'mailtype' => $mailtype,
                'charset' => 'utf-8',
                'newline'   => "\r\n"
            );

            $this->load->library('email');
            $this->email->initialize($config);

            $this->email->from($smtp_user);
            $this->email->to($email);
            $this->email->subject($subject);
            $this->email->message($message);

            if ($this->email->send()) {
                $data = array(
                    'receiver' => $email,
                    'message' => $message,
                    'created_on' => date('Y-m-d H:i:s'),

                );
            $this->db->insert('outbox', $data);
            return true;
            } else {
            return false;
            }
        }





    public function Password_Generator($length)
    {
    $string = "";
    $chars = "abcdefghijklmanopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $size = strlen($chars);
    for ($i = 0; $i < $length; $i++) {
        $string .= $chars[rand(0, $size - 1)];
    }
    return $string; 
    }




    
    }
