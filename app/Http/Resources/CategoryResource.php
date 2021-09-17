<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return array
	 */
	public function toArray($request)
	{
		if (!isset($this->id)) {
			return [];
		}
		
		$entity = [
			'id' => $this->id,
		];
		$columns = $this->getFillable();
		foreach ($columns as $column) {
			$entity[$column] = $this->{$column};
		}
		
		$embed = explode(',', request()->get('embed'));
		
		if (in_array('parent', $embed)) {
			$entity['parent'] = new static($this->whenLoaded('parent'));
		} else {
			$entity['parentClosure'] = new static($this->whenLoaded('parentClosure'));
		}
		if (in_array('children', $embed)) {
			$entity['children'] = static::collection($this->whenLoaded('children'));
		}
		
		return $entity;
	}
}
