<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TaskTest
 *
 * @author Michael Chen
 */
class TaskTest extends PHPUnit_Framework_TestCase {
    //put your code here
    private $Task;
    
    public function setup() {
        $this->Task = &get_instance();
    }
}
