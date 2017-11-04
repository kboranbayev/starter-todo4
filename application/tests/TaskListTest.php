<?php

/**
 * Contains unit test method that verifies collection of tasks has more uncompleted
 * than completed tasks.
 *
 * @author Michael Chen and Kuanysh Boranbayev
 */
class TaskListTest extends PHPUnit_Framework_TestCase {
    private $CI;

    public function setUp() {
      $this->CI = &get_instance();
    }

    public function test_task_collection() {
      $uncompleted = count($this->CI->load->Tasks->getUncompletedTasks());
      $completed = count($this->CI->load->Tasks->getCompletedTasks());

      $this->assertGreaterThan($uncompleted, $completed);    
    }
}
?>