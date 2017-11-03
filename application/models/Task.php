<?php
include('Entity.php');

class Task extends Entity {
    
    private $task;
    private $priority;
    private $size;
    private $group;
    
     // Setter method for the property task
    public function setTask($task) {
        // Check if the string is lesser than 64 characters
        // Any character is allowed along with whitespace
        if (strlen($task) <= 64) {
            $this->task = $task;
        }
    }
    // Getter method for task property
    public function getTask() { return $this->task; }
    
    // Setter method for the property priority
    public function setPriority($priority) {
        if ((!preg_match("/[a-z]/i", $priority)) && strlen($priority) <= 4)
            $this->priority = $priority;
    }
    // Getter method for priority property
    public function getPriority() { return $this->priority; }
    
    // Setter method for the property size
    public function setSize($size) {
        if ((!preg_match("/[a-z]/i", $size)) && strlen($size) <= 4)
            $this->size = $size;
    }
    // Getter method for the size property
    public function getSize() { return $this->size; }
    
    // Setter method for the property group
    public function setGroup($group) {
        if ((!preg_match("/[a-z]/i", $group)) && strlen($group) <= 5)
            $this->group = $group;
    }
    // Getter method for the group property
    public function getGroup() { return $this->group; }
}

