<?php

namespace Larapen\Admin\PanelTraits;

trait AutoFocus
{
	public $autoFocusOnFirstField = true;
	
	/**
	 * @return bool
	 */
	public function getAutoFocusOnFirstField()
	{
		return $this->autoFocusOnFirstField;
	}
	
	/**
	 * @param $value
	 * @return bool
	 */
	public function setAutoFocusOnFirstField($value)
	{
		return $this->autoFocusOnFirstField = (bool)$value;
	}
	
	/**
	 * @return bool
	 */
	public function enableAutoFocus()
	{
		return $this->setAutoFocusOnFirstField(true);
	}
	
	/**
	 * @return bool
	 */
	public function disableAutoFocus()
	{
		return $this->setAutoFocusOnFirstField(false);
	}
}
