<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('task_model'); 
    }

    public function index() 
    {
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(['message' => 'Welcome to the API!']));
    }

    public function get_tasks() 
    {
        $tasks = $this->task_model->get_tasks();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($tasks));
    }

    public function get_task($id) 
    {
        $task = $this->task_model->get_task($id);
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($task));
    }

    public function create_task() 
    {
        $data = $this->input->post(); 
        $new_task_id = $this->task_model->create_task($data);
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(['task_id' => $new_task_id]));
    }

    public function update_task($id) 
    {
        $data = $this->input->post(); 
        $success = $this->task_model->update_task($id, $data);
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(['success' => $success]));
    }

    public function delete_task($id) 
    {
        $success = $this->task_model->delete_task($id);
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(['success' => $success]));
    }
}
