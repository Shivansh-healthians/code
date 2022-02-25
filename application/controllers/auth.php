<?php

class auth extends CI_Controller
{
    //register page
    public function register()
    {

        $this->load->library('form_validation');


        //SQL table name "employee"

        // CREATE TABLE employee 
        // (id int auto_increment PRIMARY KEY,
        // first_name varchar(50),
        // last_name varchar(50),
        // email varchar(50),
        // username varchar(50),
        // phone varchar(10),
        // password varchar(50),
        // created_at datetime,
        // updated_at datetime);

        $this->form_validation->set_message('is_unique','Email address already exist, please try another.');
        $this->form_validation->set_rules('first_name','First Name','trim|required');//1
        $this->form_validation->set_rules('last_name','Last Name','trim|required');//2
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[employee.email]');//3
        $this->form_validation->set_rules('username','Username','trim|required|min_length[3]');//4
        $this->form_validation->set_rules('phone','Phone','required||matches[phone]|min_length[10]|max_length[10]|');//5
        $this->form_validation->set_rules('password', 'Password', 'required');//6
        // $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');//7

        // if(strlen($this->input->post('phone')) != 10 ){
        //     echo "incorrect mobile";die;
        // }
        if($this->form_validation->run() == false)
        {

            $this->load->view('register');

        } 
        else 
        {
            $this->load->model('auth_model');
            $formArray=array();
            $formArray['first_name'] = $this->input->post('first_name');//1
            $formArray['last_name'] = $this->input->post('last_name');//2
            $formArray['email'] = $this->input->post('email');//3
            $formArray['username'] = $this->input->post('username');//4
            $formArray['phone'] = $this->input->post('phone');//5
            $formArray['password'] = $this->input->post('password');//6
            //confirm password (no idea for now)
            $formArray['created_at'] = date('Y-m-d H:i:s');//8
            

            $this->auth_model->create($formArray);
            
            $this->session->set_flashdata('msg','Your account has been created successfully.');
            redirect(base_url().'auth/login');//path
        }


        //  $this->load->view('register');
        // echo "Hello";
    }

    //login page

    public function login()
    {
        $this->load->model('auth_model');
        $this->load->library('form_validation');$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        //callback_username_check
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == TRUE) 
        {
            $email = $this->input->post('email');
            $user = $this->auth_model->checkUser($email);
            // print_r($user);
            // die;
            if (!empty($user)) 
            {
                $password = $this->input->post('password');
                        
                if ($password == $user['password'])
                {
                    $sessArray['id'] = $user['id'];
                    $sessArray['first_name'] = $user['first_name'];
                    $sessArray['last_name'] = $user['last_name'];
                    $sessArray['email'] = $user['email'];
                    $this->session->set_userdata('user',$sessArray);
                    redirect(base_url().'auth/home');
                }
                    else
                    {
                        $this->session->set_flashdata('msg','Either username or password is incorrect, please try again.');
                        redirect(base_url().'auth/login');
                    }
            }    
                else
                {
                    $this->session->set_flashdata('msg','Either username or password is incorrect, please try again.');
                    redirect(base_url().'auth/login');
                }
        }
        else
        {
            // $this->session->set_flashdata('msg','Your account has been created successfully.');
            $this->load->view('login');
        }
    }

    //home page

    function home() {
        
        $user = $this->session->userdata('user');
        $data['user'] = $user;
        $this->load->view('home',$data);
    }

    //logout page

    function logout() {
        $this->session->unset_userdata('user');
        redirect(base_url().'auth/login');
    }

    

        
    



}

   







    


        
    
        // public function index()  
        // {  
        //     $this->login();  
        // }  
      
        // public function login()  
        // {  
        //     $this->load->view('login_view');  
        // }  
      
        // public function signin()  
        // {  
        //     $this->load->view('signin');  
        // }  
      
        // public function data()  
        // {  
        //     if ($this->session->userdata('currently_logged_in'))   
        //     {  
        //         $this->load->view('data');  
        //     } else {  
        //         redirect('Main/invalid');  
        //     }  
        // }  
      
        // public function invalid()  
        // {  
        //     $this->load->view('invalid');  
        // }  
      
        // public function login_action()  
        // {  
        //     $this->load->helper('security');  
        //     $this->load->library('form_validation');  
      
        //     $this->form_validation->set_rules('username', 'Username:', 'required|trim|xss_clean|callback_validation');  
        //     $this->form_validation->set_rules('password', 'Password:', 'required|trim');  
      
        //     if ($this->form_validation->run())   
        //     {  
        //         $data = array(  
        //             'username' => $this->input->post('username'),  
        //             'currently_logged_in' => 1  
        //             );    
        //                 $this->session->set_userdata($data);  
        //             redirect('Main/data');  
        //     }   
        //     else {  
        //         $this->load->view('login_view');  
        //     }  
        // }  
      
        // public function signin_validation()  
        // {  
        //     $this->load->library('form_validation');  
      
        //     $this->form_validation->set_rules('username', 'Username', 'trim|xss_clean|is_unique[signup.username]');  
      
        //     $this->form_validation->set_rules('password', 'Password', 'required|trim');  
      
        //     $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');  
      
        //     $this->form_validation->set_message('is_unique', 'username already exists');  
      
        // if ($this->form_validation->run())  
        //     {  
        //         echo "Welcome, you are logged in.";  
        //      }   
        //         else {  
                  
        //         $this->load->view('signin');  
        //     }  
        // }  
      
        // public function validation()  
        // {  
        //     $this->load->model('login_model');  
      
        //     if ($this->login_model->log_in_correctly())  
        //     {  
      
        //         return true;  
        //     } else {  
        //         $this->form_validation->set_message('validation', 'Incorrect username/password.');  
        //         return false;  
        //     }  
        // }  
      
        // public function logout()  
        // {  
        //     $this->session->sess_destroy();  
        //     redirect('Main/login');  
        // }  
      
      

        
         
   
    
