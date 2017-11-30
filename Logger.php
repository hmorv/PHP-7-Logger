<?php

interface Logger
{
	public function log($message);
}

class TerminalLogger implements Logger
{
	public function log($message)
	{
		var_dump($message);
	}
}