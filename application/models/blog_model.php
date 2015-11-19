<?php

/**
 * Created by PhpStorm.
 * User: meto
 * Date: 15-11-18
 * Time: 18:32
 */
class Blog_Model extends  CI_Model
{

    /**
     * return @bool;
     * @param $title
     * @param $post
     * @param $user_id
     */
    public function add_post($title,$post,$user_id,$picture)
    {
        $data = array(
            'blog_title'=>$title,
            'short_description'=>$post,
            'post'=>$post,
            'author_id'=>$user_id,
            'picture'=>$picture
        );
        $q = $this->db->insert('blog',$data);



    }

    /**
     * @return bool
     * @param $id
     */
    public function get_post($id)
    {
        $this->db->join('users','users.id=blog.author_id');
        $q = $this->db->get_where('blog',array('blog_id'=>$id));
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        else
        {
            return false;
        }


    }
    public function get_posts()
    {
        $this->db->join('users','users.id = blog.author_id');
        $this->db->order_by('date_published','DESC');
         $query = $this->db->get('blog');
        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    function get_images() {

        $files = scandir('./uploads/blog_images');
        $files = array_diff($files, array('.', '..', 'thumbs'));

        $images = array();

        foreach ($files as $file) {
            $images[] = array(
                'url' => base_url() . 'uploads/blog_images' . '/' . $file,
                'thumb_url' => base_url() . 'uploads/thumbs' . '/' . $file,
            );
        }
        return $images;
    }
}