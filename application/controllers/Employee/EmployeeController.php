<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeController extends CI_Controller {

	public function index()
	{
        $this->load->view('template/header');
        $this->load->model('EmployeeModel','emp');
        
        $data['employee'] = $this->emp->getEmployee();
		
        $this->load->view('Employee/index', $data);
        $this->load->view('template/footer');
	}

    public function create()
	{
        $this->load->view('template/header');
		$this->load->view('Employee/create');
        $this->load->view('template/footer');
	}

    public function store()
	{
        $this->form_validation->set_rules('first_name','First Name','required');
        $this->form_validation->set_rules('last_name','Last Name','required');
        $this->form_validation->set_rules('phone','Phone','required');
        $this->form_validation->set_rules('email','Email','required');

        if($this->form_validation->run()){
            $data = [
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email')
            ];

            $this->load->model('EmployeeModel','emp');
            $this->emp->insertEmployee($data);
            redirect(base_url('employee'));
        }
        else{
            $this->create();
            //redirect(base_url('employee/add'));
        }
        

        //print_r($data);
	}
}
