<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        
    }
    

    function index()
    {
        $this->load->view('home');
    }

    function register_process() {
        $name = $this->input->post('fullname');
        $email = $this->input->post('email');
        $password = random_string('alnum',8);
        $userid = random_string('alnum', 8);

        $email_from = "th68640@gmail.com";
        $email_to = $email;

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'your-email@gmail.com',
            'smtp_pass' => 'your_password',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );

        $this->load->library('email',$config);
        $this->email->set_newline("\r\n");
        
        $this->email->from($email_from, 'no-reply-verification');
        $this->email->to($email_to);

        $this->email->subject('Your Login Information.');

        $message =  "

        <!DOCTYPE html>
        <html lang='en'>
        <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <style type='text/css'>
            .text-danger {
            color: red;
            }
            .text-center {
            text-align: center;
            }
            .jumbotron {
            background-color: grey;
            }   
        </style>
        </head>
        <body>
        <div class='jumbotron text-center'>
        <h2>Thankyou for Registering.</h2>
        <h4>BKK KARYA SAGA</h4>
        </div>
        <div class='container'>
            <div class='card-body text-center'>
                <p>Hi, <b> $name</b></p>
                <p><b>Here is your login information :</b></p>
            <br>
            <br>
                <p>Your ID : </p>
                <b> $userid</b>
            <br>
                <p>E-Mail : </p>
                <b> $email</b>
            <br>
                <p>Password : </p>
                <b> $password</b>
            <br>
                <p class='text-center text-danger'><b>Pastikan anda menyimpan informasi login ini dan jangan beritahu siapapun.<br> Anda bisa mengganti password setelah anda login.</b></p>
                <br>
                <b>© BKK KARYA SAGA </b>
            </div> 
        </div>
        </body>
        </html>
        ";

        $this->email->message($message);

        if ($this->email->send()) {
            // $this->m_register->save_user($name, $email, $password);
            $this->session->set_flashdata('msg', 'Please check your email for verify!.');
            $url = base_url().'Register';
            redirect($url);
        }else{
            $this->session->set_flashdata('ggl', 'Failed sent to your emai. Please check again!!');
            redirect(base_url().'Register');
            
        }
    }

}

/* End of file Controllername.php */



?>
