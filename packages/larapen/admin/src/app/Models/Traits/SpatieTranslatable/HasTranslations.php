<?php

namespace Larapen\Admin\app\Models\Traits\SpatieTranslatable;

use App\Helpers\DBTool;
use App\Models\Language;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations as OriginalHasTranslations;

trait HasTranslations
{
	use OriginalHasTranslations;
	
	/**
	 * @var bool
	 */
	public $locale = false;
	
	/**
	 * Automatically display the right translation when displaying model
	 * Convert the model instance to an array.
	 *
	 * More information: https://github.com/spatie/laravel-translatable
	 *
	 * @return array
	 */
	public function toArray()
	{
		$attributes = parent::toArray();
		
		if (config()->has('country.name')) { // Only when the right locale can be handled
			foreach ($this->getTranslatableAttributes() as $field) {
				$attributes[$field] = $this->getTranslation($field, app()->getLocale());
			}
		}
		
		return $attributes;
	}
	
	/*
	|--------------------------------------------------------------------------
	| SPATIE/LARAVEL-TRANSLATABLE OVERWRITES
	|--------------------------------------------------------------------------
	*/
	
	/**
	 * Use the forced locale if present.
	 *
	 * @param string $key
	 *
	 * @return mixed
	 */
	public function getAttributeValue($key)
	{
		if (!$this->isTranslatableAttribute($key)) {
			return parent::getAttributeValue($key);
		}
		
		$translation = $this->getTranslation($key, $this->locale ?: config('app.locale'));
		
		// if it's a fake field, json_encode it
		if (is_array($translation)) {
			return json_encode($translation, JSON_UNESCAPED_UNICODE);
		}
		
		return $translation;
	}
	
	public function getTranslation(string $key, string $locale, bool $useFallbackLocale = true)
	{
		$locale = $this->normalizeLocale($key, $locale, $useFallbackLocale);
		
		$translations = $this->getTranslations($key);
		
		$translation = $translations[$locale] ?? '';
		
		if ($this->hasGetMutator($key)) {
			return $this->mutateAttribute($key, $translation);
		}
		
		return $translation;
	}
	
	/*
	|--------------------------------------------------------------------------
	| ELOQUENT OVERWRITES
	|--------------------------------------------------------------------------
	*/
	
	/**
	 * Create translated items as json.
	 *
	 * @param array $attributes
	 *
	 * @return static
	 */
	public static function create(array $attributes = [])
	{
		$locale = $attributes['locale'] ?? app()->getLocale();
		$attributes = Arr::except($attributes, ['locale']);
		$non_translatable = [];
		
		$model = new static();
		
		// do the actual saving
		foreach ($attributes as $attribute => $value) {
			if ($model->isTranslatableAttribute($attribute)) { // the attribute is translatable
				$model->setTranslation($attribute, $locale, $value);
			} else { // the attribute is NOT translatable
				$non_translatable[$attribute] = $value;
			}
		}
		$model->fill($non_translatable)->save();
		
		return $model;
	}
	
	/**
	 * Update translated items as json.
	 *
	 * @param array $attributes
	 * @param array $options
	 *
	 * @return bool
	 */
	public function update(array $attributes = [], array $options = [])
	{
		if (!$this->exists) {
			return false;
		}
		
		$locale = $attributes['locale'] ?? app()->getLocale();
		$attributes = Arr::except($attributes, ['locale']);
		$non_translatable = [];
		
		// do the actual saving
		foreach ($attributes as $attribute => $value) {
			if ($this->isTranslatableAttribute($attribute)) { // the attribute is translatable
				$this->setTranslation($attribute, $locale, $value);
			} else { // the attribute is NOT translatable
				$non_translatable[$attribute] = $value;
			}
		}
		
		return $this->fill($non_translatable)->save($options);
	}
	
	/*
	|--------------------------------------------------------------------------
	| CUSTOM METHODS
	|--------------------------------------------------------------------------
	*/
	
	/**
	 * Check if a model is translatable, by the adapter's standards.
	 *
	 * @return bool
	 */
	public function translationEnabledForModel()
	{
		return property_exists($this, 'translatable');
	}
	
	/**
	 * Get all locales the admin is allowed to use.
	 *
	 * @return array
	 */
	public function getAvailableLocales()
	{
		$activeLanguages = Language::getActiveLanguagesArray();
		
		$activeLanguages = collect($activeLanguages)->mapWithKeys(function ($item, $key) {
			return [$key => $item['name'] ?? $key];
		})->toArray();
		
		return $activeLanguages;
	}
	
	/**
	 * Set the locale property. Used in normalizeLocale() to force the translation
	 * to a different language that the one set in app()->getLocale();.
	 *
	 * @param string
	 */
	public function setLocale($locale)
	{
		$this->locale = $locale;
	}
	
	/**
	 * Get the locale property. Used in SpatieTranslatableSluggableService
	 * to save the slug for the appropriate language.
	 *
	 * @param string
	 */
	public function getLocale()
	{
		if ($this->locale) {
			return $this->locale;
		}
		
		return request()->input('locale', app()->getLocale());
	}
	
	/**
	 * Magic method to get the db entries already translated in the wanted locale.
	 *
	 * @param string $method
	 * @param array $parameters
	 *
	 * @return
	 */
	public function __call($method, $parameters)
	{
		switch ($method) {
			// translate all find methods
			case 'find':
			case 'findOrFail':
			case 'findMany':
			case 'findBySlug':
			case 'findBySlugOrFail':
				
				$translationLocale = request()->input('locale', app()->getLocale());
				
				if ($translationLocale) {
					$item = parent::__call($method, $parameters);
					
					if ($item instanceof \Traversable) {
						foreach ($item as $instance) {
							$instance->setLocale($translationLocale);
						}
					} else if ($item) {
						$item->setLocale($translationLocale);
					}
					
					return $item;
				}
				
				return parent::__call($method, $parameters);
				break;
			
			// do not translate any other methods
			default:
				return parent::__call($method, $parameters);
				break;
		}
	}
	
	/**
	 * Encode the given value as JSON.
	 *
	 * @param  mixed  $value
	 * @return string
	 */
	protected function asJson($value)
	{
		return json_encode($value, JSON_UNESCAPED_UNICODE);
	}
}
