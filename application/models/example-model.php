<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {
     function get_all_products()
     {
         return $this->db->query("SELECT * FROM users")->result_array();
     }
     function get_user_by_id($user_id)
     {
         return $this->db->query("SELECT * FROM users WHERE id = ?", array($user_id))->row_array();
     }
     function get_user_by_email($email)
     {
         return $this->db->query("SELECT * FROM users WHERE email = ?", array($email))->row_array();
     }
     function add_user($user)
     {
         $query = "INSERT INTO users (first_name, last_name, email, password, created_at) VALUES (?,?,?,?,?)";
         $values = array($user['first_name'], $user['last_name'], $user['email'], $user['password'], date("Y-m-d, H:i:s"));
         return $this->db->query($query, $values);
     }
     function update_user($user)
     {
        $query = "UPDATE users SET first_name = ?, last_name=?, email=?, password=?, updated_at = ? WHERE id = ?";
        $values = array($user['first_name'], $user['last_name'], $user['email'], $user['password'], date('Y-m-d, H:i:s'), $user['id']);
        return $this->db->query($query, $values);
     }
     function remove_user($product)
     {
        $query = "DELETE FROM users WHERE id = ?";
        $values = array($user['id']);
        return $this->db->query($query, $values);
     }
}
