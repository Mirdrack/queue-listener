<?php
namespace Mirdrack\QueueListener;

/**
* 
*/
class Queue
{
    private $queueName;

    public function __construct($queueName)
    {
        $this->queueName = $queueName
    }
}
