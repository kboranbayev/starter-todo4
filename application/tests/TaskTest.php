<?php
include('../models/Task.php');

/**
 * Contains all unit test methods for four properties of
 * the class Task.
 * The four properties are: task, priority, size, and group.
 *
 * @author Michael Chen
 */
class TaskTest extends PHPUnit_Framework_TestCase {
    //put your code here
    private $CI;
    
    // Instantiate a new Task to use for the unit testing.
    public function setup() {
        $this->CI = new Task();
    }
    
    /* Starting tests with the property "task"
     * Task may contain all alphaneumeric characters
     * and length can go up to 64 characters.
     */
    public function test_correct_task() {
        $this->CI->__set("task", "hello");
        $this->assertEquals("hello", $this->CI->getTask());
    }
    
    /* Starting tests with the property "priority"
     * The correct format for priority is to be integer only
     * that means no alphabet and dots
     * Also needs to be within 4 characters.
     */
    
    // Test with a string that contains alphabet
    public function test_invalid_priority_with_alphabet() {
        $this->CI->__set("priority", "a111");
        $this->assertEquals("", $this->CI->getPriority());
    }
    
    // Test with a string that is too long
    public function test_invalid_priority_with_too_long() {
        $this->CI->__set("priority", "11111");
        $this->assertEquals("", $this->CI->getPriority());
    }
    
    // Test with a valid string
    public function test_valid_priority() {
        $this->CI->__set("priority", "111");
        $this->assertEquals("111", $this->CI->getPriority());
    }
    
    /* Starting tests with the "size" property
     * Format for size is the same with priority.
     * See above for details.
     */
    
    // Test with a stirng that contains an alphabet
    public function test_invalid_size_with_alphabet() {
        $this->CI->__set("size", "a111");
        $this->assertEquals("", $this->CI->getSize());
    }
    // Test with a string that is too long
    public function test_invalid_size_with_too_long() {
        $this->CI->__set("size", "115555511");
        $this->assertEquals("", $this->CI->getSize());
    }
    // Test with a valid string
    public function test_valid_size() {
        $this->CI->__set("size", "1235");
        $this->assertEquals("1235", $this->CI->getSize());
    }
    
    /* Starting tests with the "group" property 
     * Format is integer only and within 5 characters.
     */
    
    // Test with alphabet in value, should not be working
    public function test_invalid_group_with_alphabet() {
        $this->CI->__set("group", "abcde");
        $this->assertEquals("", $this->CI->getGroup());
    }
    // Test with a string that is too long
    public function test_invalid_group_with_too_long() {
        $this->CI->__set("group", "123456");
        $this->assertEquals("", $this->CI->getGroup());
    }
    // Test with a valid string
    public function test_valid() {
        $this->CI->__set("group", "12345");
        $this->assertEquals("12345", $this->CI->getGroup());
    }
}
