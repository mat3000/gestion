<?php

namespace Table;

class Status extends Table{

	private $allStatus;


	/**
	 * get task status
	 * @param $id -> string/number : status id 
	 * @return string label
	 */
	public function getStatusById($id){

		$label = self::query("SELECT label FROM task_status WHERE id=?", [$id], true);

		return $label->label;

	}

	/**
	 * get task status
	 * @param $id -> string/number : task id 
	 * @return string label
	 */
	public function getStatusByTaskId($id){

		$label = self::query("SELECT task_status.label 
							FROM task
							INNER JOIN task_status ON task_status.id = task.status_id
							WHERE task.id=?", 
							[$id], true);

		return $label->label;

	}

	/**
	 * get all status
	 * @return array
	 */
	public function getAllStatus(){

		return self::query("SELECT * FROM task_status");

	}

	/**
	 * get task status in html
	 * @param $id -> string/number : task id
	 * @return html
	 */
	public function getStatusByTaskIdHTML($id){

		$status = $this->getStatusByTaskId($id);
		if($this->allStatus === null){
			$this->allStatus = $this->getAllStatus();
		}

		$allStatus = '';
	    foreach ($this->allStatus as $v) {
			$allStatus .= "<li class=\"status-task-li\" data-status-id=\"{$v->id}\" data-status-label=\"{$v->label}\" ><div class=\"status-task\" data-status-label=\"{$v->label}\" ></div><span class=\"status-task-name\">{$v->name}</span></li>";
		}

		$html = "<div class=\"status-task-module\" data-status-id=\"{$v->id}\" data-task-id=\"{$id}\" >
	            	<div class=\"status-task\" data-status-label=\"$status\"></div>
	            	<ul class=\"status-task-list\">$allStatus</ul>
	        	</div>";

	    return $html;

	}


}