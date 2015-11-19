<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: meto
 * Date: 15-11-10
 * Time: 11:37
 */
class homeController extends MY_Controller
{


    public function index()
    {
        $data['title'] = 'Welcome';
        $data['message'] = '';

        $this->load->view('layouts/header',$data);
        $this->load->view('welcome',$data);
        $this->load->view('layouts/footer',$data);
    }

    /**
     *  This is our method for sending emails
     */
    public function contact()
    {

        $this->load->library('form_validation');

        $email = $this->input->post('InputEmail');
        $name = $this->input->post('InputName');
        $subject = $this->input->post('InputSubject');
        $phone = $this->input->post('InputPhone');
        $message = $this->input->post('InputMessage');


        $secret = '6LdXwxATAAAAAAQN4ylLFOOntwuglINjWpbp_oEA';
        $captcha = $this->input->post('g-recaptcha-response');
        $url = 'https://www.google.com/recaptcha/api/siteverify';

        $rsp = file_get_contents($url.'?secret='.$secret.'&response='.$captcha);

        $arr = json_decode($rsp,true);



        $this->form_validation->set_rules('InputName', 'Име', 'required|min_length[3]|trim|xss_clean');
        $this->form_validation->set_rules('InputEmail', 'Email', 'required|valid_email|min_length[3]|trim|xss_clean');
        $this->form_validation->set_rules('InputSubject', 'Заглавие', 'required|min_length[3]|trim|xss_clean');
        $this->form_validation->set_rules('InputPhone', 'Телефон', 'is_natural|trim|xss_clean');
        $this->form_validation->set_rules('InputMessage', 'Съобщение', 'required|min_length[10]|trim|xss_clean');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_message('message','Невалиден телефонен номер');

        // We check if the validation is right
        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'Contact Form';
            $data['message'] = '';
            $this->load->view('layouts/header',$data);
            $this->load->view('welcome',$data);
            $this->load->view('layouts/footer',$data);

        }
        elseif($arr['success'] == FALSE){
            $data['title'] = 'Contact Form';
            $data['message'] = '<p class="alert alert-danger">Не сте попълнили captcha проверката!</p>';
            $this->load->view('layouts/header',$data);
            $this->load->view('welcome',$data);
            $this->load->view('layouts/footer',$data);
        }
        else
        {
            /*
             * If everything is all right, we call our model to insert the data and send email, and load the home page view again :)
             */
            $this->load->model('contact');
            $this->contact->insertContact($email,$name,$subject,$phone,$message);
            $this->_sendEmail($email,$name,$subject,$phone,$message);
            $data['message'] = '<p class="alert alert-info">Вашето съобщение е изпратено успешно!</p>';
            $data['title'] = 'Contact Form';
            $this->load->view('layouts/header',$data);
            $this->load->view('success_send',$data);
            $this->load->view('layouts/footer',$data);
        }
    }

    /**
     * @param $email
     * @param $name
     * @param $subject
     * @param $message
     */





    private function _sendEmail($email, $name, $subject,$phone, $message)
    {
        $this->load->library('email');

        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config);

        $this->email->set_newline("\r\n");

        $this->email->from(set_value('InputEmail'), set_value("InputName"));
        $this->email->to('mnalbantov@gmail.com');
        $this->email->subject(set_value('InputSubject'));
        $this->email->message(set_value('InputMessage'));

        $this->email->send();


    }


}