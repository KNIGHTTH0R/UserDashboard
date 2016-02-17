<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Model {

  function get_messages_by_profile_id($profile_id){
    $query="SELECT * FROM messages JOIN users ON users.id = messages.user_id WHERE users.id='{$profile_id}'";
    return $this->db->query($query)->result_array();
  }

  function get_comments_by_message_id($message_id){
    $query="SELECT *, comments.content AS comment_content FROM comments JOIN messages ON comments.message_id = messages.id WHERE messages.id='{$message_id}'";
    return $this->db->query($query)->result_array();
  }

  function add_message_by_profile_id($user_id, $wall_id, $content){
    $query="INSERT INTO messages(content, created_at, user_id, wall_id) VALUES(?,NOW(),?,?)";
    $values=array($content, $user_id, $wall_id);
    return $this->db->query($query, $values);
  }

  function add_comment_by_message_id($user_id, $message_id, $content){
    $query="INSERT INTO comments(content, created_at, message_id, user_id) VALUES(?,NOW(),?,?)";
    $values=array($content, $message_id, $user_id);
    return $this->db->query($query, $values);
  }

}
