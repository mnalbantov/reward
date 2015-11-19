<?php

/**
 * This model will retrieve, insert and delete information from database in my application.
 */
class User extends CI_Model
{


    public  function checkLogin($username,$password)
    {

        $this->db->where('username',$username);
        $query = $this->db->get('users');
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
                $data[] = $row;
                $hash = $row->password;
            }

           if(password_verify($password,$hash))
           {

               return $data;
           }
            else
            {
                return false;
            }

        }
        else
        {
            return false;
        }
    }

    public function register($username,$password,$email,$f_name,$l_name)
    {
        die('here');
       $query = $this->db->get_where('users',array('username' => $username,'email'=>$email));
        if($query->num_rows() > 0)
        {

        }
        else
        {
           $data =array(
               'username' =>$username,
               'password' =>password_hash($password,PASSWORD_DEFAULT),
               'email'=>$email,
               'first_name'=>$f_name,
               'last_name'=>$l_name
           );
             $this->db->insert('users',$data);
                return true;
        }



    }

}