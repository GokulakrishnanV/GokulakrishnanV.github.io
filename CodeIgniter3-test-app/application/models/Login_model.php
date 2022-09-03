<?php
class Login_model extends CI_Model
{
 function can_login($email, $password)
 {
  $this->db->where('email', $email);
  $query = $this->db->get('users');
  if($query->num_rows() > 0)
  {
   foreach($query->result() as $row)
   {
    if($row->is_email_verified == 'yes')
    {
    $hashed_password = $row->password;
     $store_password = password_verify($password, $hashed_password);
     if($password == $store_password)
     {
      $this->session->set_userdata('id', $row->id);
     }
     else
     {
      return 'Invalid password';
     }
    }
    else
    {
     return 'Kindly verify your email and try logging in again';
    }
   }
  }
  else
  {
   return 'Email address not found';
  }
 }
}

?>