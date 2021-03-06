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

class BrowserLogger implements Logger
{
	public function log($message)
	{
		return '<pre>' . htmlentities($message) . '</pre>';
	}
}

class Application
{
	protected $logger;

	public function setLogger(Logger $logger)
	{
		$this->logger = $logger;

		return $this;
	}

	public function action()
	{
		$this->logger->log('Doing things');
	}
}

$app = new Application;
$app->setLogger(new TerminalLogger);
$app->action();

$appWeb = new Application;
$appWeb->setLogger(new BrowserLogger);
$appWeb->action();

function filterBy($filterType, $elements) {
	$filtered = [];

	foreach($elements->e as $element) {
		if ($element->type() == $filterType) {
			$filtered[] = $element;
		}
	}
}