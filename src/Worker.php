<?php
namespace Mirdrack\QueueListener;

/**
* 
*/
class Worker
{   
    public function run()
    {
        while (true) {
            $message = $queue->getMessage();
            if ($message) {
                try {
                    $message->process();
                 } catch (Exception $e) {
                    $queue->release($message);
                    echo $e->getMessage();
                 }
            } else {
                echo 'Sleeping 10 seconds...';
                sleep(10);
            }
        }
    }
}