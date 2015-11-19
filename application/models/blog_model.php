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
    public function get_posts($limit,$start)
    {
        $this->db->join('users','users.id = blog.author_id');
        $this->db->order_by('date_published','DESC');
        $this->db->limit($limit,$start);
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

    public function count_views($id)
    {
        $this->db->select('views');
        $this->db->where('blog_id',$id);
        $q = $this->db->get('blog');
        if($q->num_rows() > 0)
        {
            foreach($q->result() as $row)
            {
                $views = $row->views;
            }
            return $views;
        }
        else
        {
            return false;
        }
    }
    public function update_post($id,$title,$post)
    {
        $updateWhere = array(
            'blog_id'=>$id
        );
        $data = array(
            'blog_title'=>$title,
            'short_description'=>$post,
            'post'=>$post,
            'date_published'=>null
        );

        $this->db->update('blog',$data,$updateWhere);
    }
    public function delete_post($post_id)
    {
        $this->db->where('blog_id',$post_id);
        $this->db->delete('blog');
    }

    public function update_view_count($post_id)
    {
        $this->db->set('views','views+1',FALSE);
        $this->db->where('blog_id',$post_id);
        $this->db->update('blog');
    }

    public function total_posts()
    {
       $q = $this->db->count_all('blog');
        return $q;


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