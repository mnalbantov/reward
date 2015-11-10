<?php

/**
 * Created by PhpStorm.
 * User: meto
 * Date: 15-11-10
 * Time: 17:36
 */
class contact extends  CI_Model
{
    /**
     * @param $email
     * @param $name
     * @param $subject
     * @param $phone
     * @param $message
     * @return bool
     */
    public function insertContact($email,$name,$subject,$phone,$message)
    {
        /**
         * I stored the fields from parameters in array and insert in the DB.
         */
        $data = array(
            'email' => $email,
            'name' => $name,
            'subject'=>$subject,
            'phone'=>$phone,
            'message'=>$message

        );
        // If we have completely inserted data we return true

        $this->db->insert('contacts',$data);
        if($this->db->affected_rows() > 0)
        {
            return  true;
        }
        else
        {
            return false;
        }
    }

}