<?php

namespace Larapen\Admin\PanelTraits\Buttons;

class Button
{
	public $stack;
	public $name;
	public $type = 'view';
	public $content;
	
	public function __construct($stack, $name, $type, $content)
	{
		$this->stack = $stack;
		$this->name = $name;
		$this->type = $type;
		$this->content = $content;
	}
}
