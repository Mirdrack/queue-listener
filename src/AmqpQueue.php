<?php
namespace Mirdrack\QueueListener;
use PhpAmqpLib\Connection\AMQPStreamConnection;

/**
* 
*/
class AmqpQueue extends Queue
{   
    protected $connection;

    public function __construct($queueName)
    {
        parent::construct($queueName);

        $this->host = 'amqp://aaossqyy:O9vydguo_366JI5JazQdcFrem4wMDRKG@skunk.rmq.cloudamqp.com/aaossqyy';
        $this->port = 5672;
        $this->user = 'aaossqyy';
        $this->password = 'O9vydguo_366JI5JazQdcFrem4wMDRKG';
        
        $connection = new AMQPStreamConnection(
            $this->host,
            $this->port,
            $this->user,
            $this->password
        );
        $this->connection = $connection;
    }

    public function consume()
    {
        $channel = $this->connection->channel();
        $channel->queue_declare($this->queueName, false, false, false, false);
        $channel->basic_consume($this->queueName, '', false, true, false, false, $this->process);
    }

    public function test()
    {
        return 'Queue';
    }
}