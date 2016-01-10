<?php

namespace Table;

class Task extends Table{

	private $status;
	private $user;

	public function getTaskByClientId($id){

		return self::query("SELECT * FROM task WHERE client_id=? AND trash=0", [$id]);

	}

	public function getTaskById($id){

		return self::query("SELECT * FROM task WHERE id=?", [$id], true);

	}

	public function addTask($id){

		return self::exec('INSERT INTO task(client_id, description) VALUES(?,?)', [$id, 'Nouvelle tâche...']);

	}

	public function updateTask($id, $name, $val){

		$name = addslashes($name);
		return self::exec("UPDATE task SET $name=? WHERE id=?", [$val, $id]);

	}

	/**
	 * 
	 */
	public function generateHTMLTaskList($clientId){

		$allTasks = $this->getTaskByClientId($clientId);

		if($this->status===null) 
			$this->status = new Status();

		$html = '<ul class="taches">';
		foreach ($allTasks as $task){
			$status_label = $this->status->getStatusById($task->status_id);
			$status_html = $this->status->getStatusByTaskIdHTML($task->id);
			$html.= "<li class=\"task\" data-task-id=\"{$task->id}\" data-task-status=\"$status_label\" >
						$status_html
		            	<div class=\"description\">{$task->description}</div>
		            </li>";
		}
		$html .= '</ul>';

		return $html;

	}

	// magic method

	public function getUsers(){

		if($this->user===null) 
			$this->user = new User();
		
		// return $this->id;

		return $this->user->getUsersByTaskId( $this->id );

	}
	public function getAllUsers(){

		if($this->user===null) 
			$this->user = new User();

		return $this->user->getAllUsers();

	}

}