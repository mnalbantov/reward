<?php

class Blog extends  MY_Controller
{
    /**
     * home page for blog
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('migration', 'ion_auth', 'form_validation'));
        $this->load->helper(array('form', 'url'));
        $this->migration->current();
        $this->load->model('blog_model');
    }

    public function index()
    {

        if ($this->ion_auth->logged_in()) {
            $user = $this->ion_auth->user()->row();
        }
        $this->load->library('pagination');

        $totalPosts = $this->blog_model->total_posts();
        $config['base_url'] = site_url() . 'blog/index';
        $config['total_rows'] = $totalPosts;
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);
        $data['title'] = 'Блог';
        $data['posts'] = $this->blog_model->get_posts($config['per_page'], $this->uri->segment(3));
        $data['links'] = $this->pagination->create_links();
        $this->load->view('layouts/header', $data);
        $this->load->view('blog/blog', $data);
        $this->load->view('layouts/footer', $data);
    }

    public function add_post()
    {

        if (!$this->ion_auth->logged_in()) {
            redirect('blog');
        }

        $title = $this->input->post('InputSubject');
        $post = $this->input->post('InputPost');
        $user_id = $this->input->post('user_id');


        if ($_POST) {
            $inputPic = $this->input->post('pic');

            $pic_name = explode(DIRECTORY_SEPARATOR, $inputPic);

            $picture = $pic_name[6];
            $this->form_validation->set_rules('InputSubject', 'Тема', 'required|trim|min_length[4]');
            $this->form_validation->set_rules('InputPost', 'Статия', 'required|trim|min_length[50]');
            $this->form_validation->set_rules('user_id', 'User_id', 'trim');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Блог';
                $data['images'] = $this->blog_model->get_images();
                $this->load->view('layouts/header', $data);
                $this->load->view('blog/add_post', array('error' => ''));
                $this->load->view('layouts/footer', $data);
            } else {

                $this->blog_model->add_post($title, $post, $user_id, $picture);
                redirect('blog');
            }
        }
        $data['title'] = 'Добавяне на статия';
        $data['images'] = $this->blog_model->get_images();
        $this->load->view('layouts/header', $data);
        $this->load->view('blog/add_post', array('error' => ''));
        $this->load->view('layouts/footer', $data);


    }

    public function post($id)
    {
        //set validation rules
        $this->form_validation->set_rules('commentor', 'Име', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_rules('comment', 'Коментар', 'required');

        if ($this->blog_model->get_post($id)) {
            $update_count = $this->blog_model->update_view_count($id);
            $counter = $this->blog_model->count_views($id);
            $data['views'] = $counter;
            $data['post'] = $this->blog_model->get_post($id);
            $data['comments'] = $this->blog_model->get_post_comments($id);
            $data['post_id'] = $id;
            $data['total_comments'] = $this->blog_model->total_comments($id);

            foreach ($this->blog_model->get_post($id) as $row) {
                $data['title'] = $row->blog_title;
            }


            if ($this->form_validation->run() == FALSE) {
                //if not valid
                $this->load->view('layouts/header', $data);
                $this->load->view('blog/post', $data);
                $this->load->view('layouts/footer');
            } else {
                //if valid
                $name = $this->input->post('commentor');
                $email = strtolower($this->input->post('email'));
                $comment = $this->input->post('comment');
                $post_id = $this->input->post('post_id');

                $this->blog_model->add_new_comment($post_id, $name, $email, $comment);
                $this->session->set_flashdata('message', 'Успешно добавен коментар!');
                redirect('blog/post/' . $id);
            }
        } else
            show_404();
    }

    public function edit_post($id)
    {
        if(! $this->ion_auth->is_admin())
        {
            redirect('blog');
        }
        foreach($this->blog_model->get_post($id) as $row)
        {
            $data['title'] = 'Редакция -'.$row->blog_title;
            break;
        }
        $data['post'] = $this->blog_model->get_post($id);
        $this->load->view('layouts/header',$data);
        $this->load->view('blog/edit_post',$data);
        $this->load->view('layouts/footer');



        if($_POST)
        {
            $this->form_validation->set_rules('InputSubject','Заглавие','required|trim|min_length[4]');
            $this->form_validation->set_rules('InputPost','Статия','required|trim|min_length[50]');
            $title = $this->input->post('InputSubject');
            $post = $this->input->post('InputPost');
            if($this->form_validation->run() == FALSE)
            {
                $data['post'] = $this->blog_model->get_post($id);
            }
            else
            {
                $this->blog_model->update_post($id,$title,$post);
                redirect('blog/post'.'/'.$id);
            }
        }
    }
    public function delete_post($id)
    {
        if(! $this->ion_auth->is_admin())
        {
            redirect('blog');
        }
        $data['title'] = 'Изтриване на публикация';
        $data['post'] = $this->blog_model->get_post($id);
        $this->load->view('layouts/header',$data);
        $this->load->view('blog/delete_post');
    }
    public  function confirm_delete($id)
    {
        if(! $this->ion_auth->is_admin())
        {
            redirect('blog');
        }
        $this->blog_model->delete_post($id);
        redirect('blog');
    }

    public function upload()
    {
        $data['title'] = 'Добавяне на снимка';
        $this->load->view('layouts/header',$data);
        $this->load->view('blog/upload',array('error'=>''));
        $this->load->view('layouts/footer',$data);
    }

    public function do_upload()
    {

        $config['upload_path'] = './uploads/blog_images';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '1000';
        $config['max_width']  = '';
        $config['max_height']  = '';
        $config['overwrite']  = TRUE;


        $this->load->library('upload', $config);

        if(! $this->upload->do_upload('pic_file'))
        {
            $data['title'] = 'Добавяне на снимка';
            // return the error message and kill the script
            $error = array('error'=>$this->upload->display_errors());
            $this->load->view('layouts/header',$data);
            $this->load->view('blog/upload',$error);
            $this->load->view('layouts/footer',$data);
        }
        else
        {
            $file_data =$this->upload->data();
            $file_name = $file_data['file_name'];
            $full_path = $file_data['full_path'];
            $config = array(
                'source_image' => $file_data['full_path'],
                'new_image' => './uploads/thumbs',
                'maintain_ratio' => TRUE,
                'width' => 200,
                'height' => 200
            );

            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $data['title'] = 'Успешно качен файл';
            $data['img'] = base_url() . 'uploads/thumbs/' . $file_data['file_name'];
            $this->load->view('layouts/header',$data);
            $this->load->view('upload_success',$file_data);
            $this->load->view('layouts/footer');
        }
    }



}