<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Api extends REST_Controller
{
	function __construct()
    {
        // Construct our parent class
        parent::__construct();
        
    }
	
	// get all users if no parameter supplied
	public function users_get()
	{
		if(! $this->get('id'))
		{
			// get all record
			$tasks = $this->task_model->get_all();
		} else {
			// get a record based on ID
			$tasks = $this->task_model->get_task($this->get('id'));
		}
		
		if($tasks)
		{
			$this->response($tasks, 200); // 200 being the HTTP response code
		} else {
			$this->response([], 404);
		}
	}
	
//	public function tasks_post()
//	{
//		if(! $this->post('title'))
//		{
//			$this->response(array('error' => 'Missing post data: title'), 400);
//		}
//		else{
//			$data = array(
//				'title' => $this->post('title'),
//				'position' => $this->post('position')
//			);
//		}
//		$this->db->insert('task',$data);
//		if($this->db->insert_id() > 0)
//		{
//			$message = array('id' => $this->db->insert_id(), 'title' => $this->post('title'),'position' => $this->post('position'));
//			$this->response($message, 200); // 200 being the HTTP response code
//		}
//	}

	public function users_post()
	{
		if(! $this->post('fname'))
		{
			$this->response(array('error' => 'Missing post data: fname'), 400);
		}
		else{
			$data = array(
				'fname' => $this->post('fname'),
				'email' => $this->post('email'),
				'password' => '123',
				'lname' => 'Last Name',
				'phone' => '123456',
				'gender' => 1,
				'is_active' => 1,
				'type' => 1
			);
			//var_dump($data);
		}
		$this->db->insert('user',$data);
		if($this->db->insert_id() > 0)
		{
			$message = array('user_id' => $this->db->insert_id(), 'fname' => $this->post('fname'),'email' => $this->post('email'));
			$this->response($message, 200); // 200 being the HTTP response code
		}
	}
	
	public function users_delete($id=NULL)
	{
		if($id == NULL)
		{
			$message = array('error' => 'Missing delete data: id');
			$this->response($message, 400);
		} else {
			$this->task_model->delete_task($id);
			$message = array('id' => $id, 'message' => 'DELETED!');
			$this->response($message, 200); // 200 being the HTTP response code
		}
	}
	
	public function users_put()
	{
		//perform validation
		if(! $this->put('title'))
		{
			$this->response(array('error' => 'Task title is required'), 400);
		}
		
		$data = array(
			'title'		=> $this->put('title'),
			'position'	=> $this->put('position')
		);
		$this->task_model->update_task($this->put('id'), $data);
		$message = array('success' => $this->put('title').' Updated!');
		$this->response($message, 200);
	}

}