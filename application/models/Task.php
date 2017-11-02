<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Task extends Entity {
    
    private $task;
    private $priority;
    private $size;
    private $group;
    
     // Setter method for the property task
    public function setTask($task) {
        $this->task = $task;
    }
    // Setter method for the property priority
    public function setPriority($priority) {
        $this->priority = $priority;
    }
    // Setter method for the property size
    public function setSize($size) {
        $this->size = $size;
    }
    // Setter method for the property group
    public function setGroup($group) {
        $this->group = $group;
    }
}

