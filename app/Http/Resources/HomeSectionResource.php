<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HomeSectionResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return array
	 */
	public function toArray($request)
	{
		$entity = [
			'data'     => $this['data'],
			'view'     => $this['view'],
			'settings' => $this['settings'],
			'lft'      => $this['lft'],
		];
		
		return $entity;
	}
}
