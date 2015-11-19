    <?php

    /**
     * Created by PhpStorm.
     * User: meto
     * Date: 15-11-17
     * Time: 17:20
     */
    class login extends MY_Controller
    {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('user');
            $this->load->library('form_validation');


        }

        public function index()
        {
            $loggedIn= $this->session->userdata('logged_in');
            if($loggedIn)
            {
                redirect('blog');
            }
            $data['title'] = 'Вход';
            $this->load->view('layouts/header', $data);
            $this->load->view('login', $data);
            $this->load->view('layouts/footer', $data);
        }

        public function register()
        {
            $data['title'] = 'Регистрация';
            $this->load->view('layouts/header', $data);
            $this->load->view('register', $data);
            $this->load->view('layouts/footer', $data);
        }
        public  function validate_reg()
        {
            if($_POST)
            {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $c_password = $this->input->post('confirm-password');
                $email = $this->input->post('email');
                $f_name = $this->input->post('f_name');
                $l_name = $this->input->post('l_name');

                $this->form_validation->set_rules('username', 'Потребителско име', 'required|trim');
                $this->form_validation->set_rules('password', 'Парола', 'required|trim');
                $this->form_validation->set_rules('confirm-password', 'Повторна парола', 'required|trim|matches[password]');
                $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
                $this->form_validation->set_rules('f_name', 'Име', 'required|trim|min_length[3]');
                $this->form_validation->set_rules('l_name', 'Фамилия', 'required|trim|min_length[3]');
                $this->form_validation->set_error_delimiters('<p class="alert alert-danger">','</p>');

                if($this->form_validation->run() != FALSE)
                {
                  $register =  $this->user->register($username,$password,$email,$f_name,$l_name);

                    if($register)
                    {
                        $this->session->set_flashdata('message','<p class="alert alert-succes">Успешна регистрация.Можете да влезете във вашият профил</p>');
                        redirect('login');
                    }
                    else
                    {
                        $this->form_validation->set_message('validate_user','Има такъв потребител');
                        return false;
                    }
                }
                else
                {
                    $data['title'] = 'Регистрация';
                    $this->load->view('layouts/header', $data);
                    $this->load->view('register', $data);
                    $this->load->view('layouts/footer', $data);
                }
            }
            else{
                redirect('login/register');
            }
        }

        public function validate()
        {


            if ($_POST) {
                $username = $this->input->post('username');
                $password = $this->input->post('user_password');

                $this->form_validation->set_rules('username', 'Потребителско име', 'required|trim');
                $this->form_validation->set_rules('user_password', 'Парола', 'required|trim');
                $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');


                if ($this->form_validation->run() != FALSE) {

                    $validLogin = $this->user->checkLogin($username,$password);
                    if($validLogin)
                    {

                        foreach ($validLogin as $row)
                        {
                            $sessionArr = array(
                                'user_id'=>$row->user_id,
                                'username'=>$row->username,
                                'first_name'=>$row->first_name,
                                'last_name'=>$row->last_name,
                                'email'=>$row->email,
                                'created_at'=>$row->created_at,

                            );
                        }
                        $this->session->set_userdata('logged_in',$sessionArr);
                        redirect('blog');
                    }
                    else
                    {
                        $this->session->set_flashdata('message','<p class="alert alert-danger">Грешен потребител/парола</p>');
                        $data['title'] = 'Вход';
                        $this->load->view('layouts/header', $data);
                        $this->load->view('login');
                        $this->load->view('layouts/footer');
                    }
                }
                else
                {
                    $data['title'] = 'Вход';
                    $this->load->view('layouts/header', $data);
                    $this->load->view('login');
                    $this->load->view('layouts/footer');
                }
            } else {
                redirect('login');
            }

        }
        public function logout()
        {
            $this->session->sess_destroy();
            redirect('login');
        }
    }