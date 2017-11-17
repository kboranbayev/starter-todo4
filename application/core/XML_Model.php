<?php

/**
 * XML-persisted collection.
 * ------------------------------------------------------------------------
 */
class XML_Model extends Memory_Model
{
//---------------------------------------------------------------------------
//  Housekeeping methods
//---------------------------------------------------------------------------

	/**
	 * Constructor.
	 * @param string $origin Filename of the CSV file
	 * @param string $keyfield  Name of the primary key field
	 * @param string $entity	Entity name meaningful to the persistence
	 */
	function __construct($origin = null, $keyfield = 'id', $entity = null)
	{
		parent::__construct();

		// guess at persistent name if not specified
		if ($origin == null)
			$this->_origin = get_class($this);
		else
			$this->_origin = $origin;

		// remember the other constructor fields
		$this->_keyfield = $keyfield;
		$this->_entity = $entity;

		// start with an empty collection
		$this->_data = array(); // an array of objects
		$this->fields = array(); // an array of strings
		// and populate the collection
		$this->load();
	}

	/**
	 * Load the collection state appropriately, depending on persistence choice.
	 * OVER-RIDE THIS METHOD in persistence choice implementations
	 */
	protected function load()
	{
    if (file_exists($this->_origin)) 
    {
      // open xml file
      $xml = simplexml_load_file($this->_origin);
      // gather all elements
      $data = (array)$xml->children();

      // foreach elements as root
      foreach($data as $entry)
      {
        $tasks = (array)$entry;
        // foreach root as entry
        foreach($tasks as $task)
        { 
          $task = (array)$task;
          $task_keys = array_keys($task);
          $this->_fields = $task_keys;
          $record = new stdClass();
          // foreach entry as id, task, priority, etc
          foreach($task_keys as $task_key)
          {
            $record->{$task_key} = $task[$task_key];
          }
          $key = $record->{$this->_keyfield};
          $this->_data[$key] = $record;
        } 
      }
    }
    // --------------------
		// rebuild the keys table
    $this->reindex();
	}

	/**
	 * Store the collection state appropriately, depending on persistence choice.
	 * OVER-RIDE THIS METHOD in persistence choice implementations
	 */
	protected function store()
	{
    $xml = '<?xml version="1.0" encoding="UTF-8"?>
            <root>
            </root>
            ';
		// rebuild the keys table
    $this->reindex();
    // --------------------
    if (file_exists($this->_origin)) 
    {
      $tasks = new SimpleXMLElement($xml);
      
      foreach($this->_data as $key => $record)
      {
        $task = $tasks->addChild('entry');
        $task_ = (array)$record;
        
        $task_keys = array_keys($task_);
        foreach($task_keys as $task_key)
        {
          $task->addChild((string)$task_key, (string)$task_[$task_key]);
        }
      }
      $tasks->asXML($this->_origin);
    }
    // --------------------
  }
}


