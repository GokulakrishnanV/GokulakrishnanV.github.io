<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id')) {
            redirect('private_area');
        }
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->model('register_model');
    }

    function index()
    {
        $this->load->view('register');
    }

    function validation()
    {
        $this->form_validation->set_rules('user_name', 'Name', 'required|trim');
        $this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('user_password', 'Password', 'required');
        if ($this->form_validation->run()) {
            $verification_key = md5(rand());
            $hashed_password = password_hash($this->input->post('user_password'),PASSWORD_DEFAULT);
            $data = array(
                'name'  => $this->input->post('user_name'),
                'email'  => $this->input->post('user_email'),
                'password' => $hashed_password,
                'verification_key' => $verification_key
            );
            $id = $this->register_model->insert($data);
            if ($id > 0) {
                $subject = "Please verify email for login";
                $message = "
                                <p>Hi " . $this->input->post('user_name') . "</p>
                                <p>This is email verification mail from Warx Flutter team. Kindly verify you email by click this <a href='" . base_url() . "index.php/register/verify_email/" . $verification_key . "'>link</a>.</p>
                                <p>Regards,</p>
                                <p>Warx Flutter team</p>
                                ";
                $config = array(
                    'protocol'  => 'smtp',
                    'smtp_host' => 'smtp.gmail.com',
                    'smtp_port' => 465,
                    'smtp_user'  => 'flutterdev.warx@gmail.com',
                    'smtp_pass'  => 'slcolzrcwwmlifuy',
                    'mailtype'  => 'html',
                    'charset'    => 'iso-8859-1',
                    'wordwrap'   => TRUE,
                    'smtp_crypto' => 'ssl'
                );
                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $this->email->from('flutterdev.warx@gmail.com');
                $this->email->to($this->input->post('user_email'));
                $this->email->subject($subject);
                $this->email->message($message);
                if ($this->email->send()) {
                    $this->session->set_flashdata('message', 'Verification email has been sent. Kindly verify it to login');
                    redirect('login');
                }
            }
        } else {
            $this->index();
        }
    }

    function verify_email()
    {
        if ($this->uri->segment(3)) {
            $verification_key = $this->uri->segment(3);
            if ($this->register_model->verify_email($verification_key)) {
                $data['message'] = '<h1 align="center">Your Email has been successfully verified, now you can login from <a href="' . base_url() . 'index.php/login">here</a></h1>';
            } else {
                $data['message'] = '<h1 align="center">Invalid Link</h1>';
            }
            $this->load->view('email_verification', $data);
        }
    }
}
