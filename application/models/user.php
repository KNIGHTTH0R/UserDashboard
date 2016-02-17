<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

  function add_user($user_data)
  {
    $query="INSERT INTO users (email, first_name, last_name, password, created_at) VALUES(?,?,?,?,?)";
    $values=array($user_data['email'], $user_data['first_name'], $user_data['last_name'], $user_data['password'], date('Y-m-d, H:i:s'));
    $this->db->query($query, $values);
    $user_id = $this->db->insert_id();
    if($user_id == 1){
      $this->db->query("UPDATE users SET user_level=9 WHERE id={$user_id}");
    }else{
      $this->db->query("UPDATE users SET user_level=1 WHERE id={$user_id}");
    }
    return $user_id;
  }

  //removes user, all messages written by user, and comments of those messages
  function remove_user_by_id($profile_id){

    $remove_comments_by_user=("
      DELETE FROM comments
      JOIN messages
      ON comments.message_id = message.id
      JOIN users
      ON users.id = messages.user_id
      WHERE users.id = {$profile_id}
    ");
    $this->db->query($remove_comments_by_user);

    $remove_messages=("
      DELETE FROM messages
      JOIN users
      ON users.id = messages.user_id
      WHERE users.id = {$profile_id}
    ");
    $this->db->query($remove_messages);

    $query="DELETE FROM users WHERE id = {$profile_id}";
    $this->db->query($query);

    return ;
  }

  function get_all_users(){
    $query="SELECT * FROM users";
    return $this->db->query($query)->result_array();
  }

  function update_user_info($user_id, $user_data){
    $query="
      UPDATE users SET
      email = ?,
      first_name = ?,
      last_name = ?,
      user_level = ?
      WHERE id = ?
    ";

    $values = array(
      $user_data['email'],
      $user_data['first_name'],
      $user_data['last_name'],
      $user_data['user_level'],
      $user_id
    );
    return $this->db->query($query, $values);
  }

  function update_password($user_id, $password){
    $query="UPDATE users SET password = '{$password}' WHERE id={$user_id}";
    return $this->db->query($query);
  }

  public function get_user_data_by_id($user_id){
    $query="SELECT * FROM users WHERE id = {$user_id}";
    $result = $this->db->query($query)->row_array();
    return $result;
  }

  function check_login_credentials($credentials){
    $query="SELECT id FROM users WHERE email = ? AND password = ?";
    $values=array($credentials['email'], $credentials['password']);
    return $this->db->query($query, $values)->row_array();
  }

  public function get_user_level_by_id($user_id){
    $query="SELECT user_level FROM users WHERE id = {$user_id}";
    $result = $this->db->query($query)->row_array();
    return $result['user_level'];
  }

}
