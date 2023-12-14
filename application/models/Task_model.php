<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task_model extends CI_Model {

    public function get_tasks() {
        return $this->db->get('tasks')->result();
    }

    public function get_task($id) {
        return $this->db->get_where('tasks', ['id' => $id])->row();
    }

    public function create_task($data) {
        $this->db->insert('tasks', $data); 
        return $this->db->insert_id();
    }

    public function update_task($id, $data) {
        $this->db->update('tasks', $data, ['id' => $id]); 
        return $this->db->affected_rows() > 0;
    }

    public function delete_task($id) {
        $this->db->delete('tasks', ['id' => $id]); 
        return $this->db->affected_rows() > 0;
    }
}
