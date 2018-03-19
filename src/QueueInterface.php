<?php
namespace Mirdrack\QueueListener;

interface QueueInterface
{
	public function getMessage();

	public function release($message);
}