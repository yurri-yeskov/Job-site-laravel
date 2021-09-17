<?php

try {
	
	/* FILES */
	\File::delete(app_path('Helpers/Lang/Traits/LangTablesTrait.php'));
	\File::delete(app_path('Models/Traits/TranslatedTrait.php'));
	\File::delete(app_path('Observers/TranslatedModelObserver.php'));
	\File::delete(base_path('packages/larapen/admin/src/app/Http/Controllers/Features/TranslateItem.php'));
	\File::delete(base_path('packages/larapen/admin/src/app/Models/Crud.php'));
	\File::delete(base_path('packages/larapen/admin/src/app/Models/LanguageFeatures.php'));
	\File::delete(base_path('packages/larapen/admin/src/app/Models/Translated.php'));
	
	
	/* DATABASE */
	$languages = \Illuminate\Support\Facades\DB::table('languages')->get();
	$mainLang = \Illuminate\Support\Facades\DB::table('languages')->where('default', 1)->first();
	
	// Set Db Fallback Locale
	if (!empty($mainLang)) {
		setDbFallbackLocale($mainLang->abbr);
	}
	
	// ========================================================================================
	// categories
	$tableName = 'categories';
	$columns = ['name', 'description'];
	$indexes = [];
	migrateTransSchema($languages, $mainLang, $tableName, $columns, $indexes);
	
	// ========================================================================================
	// gender
	$tableName = 'gender';
	$columns = ['name'];
	$indexes = [];
	migrateTransSchema($languages, $mainLang, $tableName, $columns, $indexes);
	
	// ========================================================================================
	// meta_tags
	$tableName = 'meta_tags';
	$columns = ['title', 'description', 'keywords'];
	$indexes = [];
	migrateTransSchema($languages, $mainLang, $tableName, $columns, $indexes);
	
	if (config('plugins.domainmapping.installed')) {
		// domain_meta_tags
		$tableName = 'domain_meta_tags';
		$columns = ['title', 'description', 'keywords'];
		$indexes = [];
		migrateTransSchema($languages, $mainLang, $tableName, $columns, $indexes);
	}
	
	// ========================================================================================
	// packages
	$tableName = 'packages';
	$columns = ['name', 'short_name', 'description'];
	$indexes = [];
	migrateTransSchema($languages, $mainLang, $tableName, $columns, $indexes);
	
	// ========================================================================================
	// pages
	$tableName = 'pages';
	$columns = ['name', 'title', 'content'];
	$indexes = [];
	migrateTransSchema($languages, $mainLang, $tableName, $columns, $indexes);
	
	// ========================================================================================
	// post_types
	$tableName = 'post_types';
	$columns = ['name'];
	$indexes = [];
	migrateTransSchema($languages, $mainLang, $tableName, $columns, $indexes);
	
	// ========================================================================================
	// report_types
	$tableName = 'report_types';
	$columns = ['name'];
	$indexes = [];
	migrateTransSchema($languages, $mainLang, $tableName, $columns, $indexes);
	
	// ========================================================================================
	// salary_types
	$tableName = 'salary_types';
	$columns = ['name'];
	$indexes = [];
	migrateTransSchema($languages, $mainLang, $tableName, $columns, $indexes);
	
	// ========================================================================================
	// cities
	$tableName = 'cities';
	$columns = ['name'];
	$indexes = ['name'];
	migrateTransSchema($languages, $mainLang, $tableName, $columns, $indexes);
	
	// ========================================================================================
	// countries
	$tableName = 'countries';
	$columns = ['name'];
	$indexes = [];
	migrateTransSchema($languages, $mainLang, $tableName, $columns, $indexes);
	
	// ========================================================================================
	// subadmin1
	$tableName = 'subadmin1';
	$columns = ['name'];
	$indexes = ['name'];
	migrateTransSchema($languages, $mainLang, $tableName, $columns, $indexes);
	
	// ========================================================================================
	// subadmin2
	$tableName = 'subadmin2';
	$columns = ['name'];
	$indexes = ['name'];
	migrateTransSchema($languages, $mainLang, $tableName, $columns, $indexes);
	
	
	//dd('STOP');
	
} catch (\Exception $e) {
	dump($e->getMessage());
	dd('in ' . str_replace(base_path(), '', __FILE__));
}


function migrateTransSchema($languages, $mainLang, string $tableName, array $columns, array $indexes = [])
{
	// Check & Drop Indexes
	if (is_array($indexes) && !empty($indexes)) {
		foreach ($indexes as $indexName) {
			// Check & Drop Index using MySQL
			$idxTable = \DB::getTablePrefix() . $tableName;
			$idxDb = \DB::connection()->getDatabaseName();
			$sql = [
				'Key_name'   => 'SHOW INDEX FROM ' . $idxTable . ' FROM ' . $idxDb,
				'INDEX_NAME' => 'SELECT DISTINCT INDEX_NAME FROM `INFORMATION_SCHEMA`.`STATISTICS` WHERE `TABLE_SCHEMA` = \'' . $idxDb . '\' AND `TABLE_NAME` = \'' . $idxTable . '\'',
			];
			$isMySql8OrGreater = (!\App\Helpers\DBTool::isMariaDB() && \App\Helpers\DBTool::isMySqlMinVersion('8.0'));
			$indexColumn = $isMySql8OrGreater ? 'INDEX_NAME' : 'Key_name';
			$results = \DB::select(\DB::raw($sql[$indexColumn]));
			if (is_array($results) && count($results) > 0) {
				$results = collect($results)->mapWithKeys(function ($item) use ($indexColumn) {
					$indexNameLocal = $item->{$indexColumn} ?? null;
					
					return [$indexNameLocal => $indexNameLocal];
				})->toArray();
				
				if (in_array($indexName, $results)) {
					$sql = "ALTER TABLE `" . $idxTable . "` DROP INDEX " . $indexName . ";" . "\n";
					\DB::unprepared($sql);
				}
			}
			
			// Check & Drop Index using Laravel
			\Schema::table($tableName, function ($table) use ($tableName, $indexName) {
				$sm = \Schema::getConnection()->getDoctrineSchemaManager();
				$indexesFound = $sm->listTableIndexes(\DB::getTablePrefix() . $tableName);
				
				$indexRawName = \DB::getTablePrefix() . $tableName . '_' . $indexName . '_index';
				if (array_key_exists($indexRawName, $indexesFound)) {
					$table->dropIndex([$indexName]);
				}
			});
		}
	}
	
	$columnsTypes = [];
	if (is_array($columns) && !empty($columns)) {
		foreach ($columns as $columnName) {
			if (\Schema::hasColumn($tableName, $columnName)) {
				\Schema::table($tableName, function ($table) use ($columnName) {
					$table->text($columnName)->change();
				});
			}
			$columnsTypes[$columnName] = \DB::getSchemaBuilder()->getColumnType($tableName, $columnName);
		}
	}
	
	$allColumnsTypesAreTheSame = (is_array($columnsTypes) && count(array_unique($columnsTypes)) === 1 && end($columnsTypes) == 'text');
	
	if ($allColumnsTypesAreTheSame) {
		migrateTransData($languages, $mainLang, $tableName, $columns);
	}
	
	if ($tableName == 'countries') {
		\App\Models\Country::autoTranslation(true);
	}
	
	if (in_array($tableName, ['countries', 'cities', 'subadmin1', 'subadmin2'])) {
		if (!empty($mainLang)) {
			\App\Helpers\DBTool::convertTranslatableDataToJson($tableName, $columns, $mainLang->abbr);
		}
		
		if (\Schema::hasColumn($tableName, 'asciiname')) {
			\Schema::table($tableName, function ($table) {
				$table->dropColumn('asciiname');
			});
		}
	}
	
	if (in_array($tableName, ['subadmin1', 'subadmin2'])) {
		if (\Schema::hasColumn($tableName, 'created_at')) {
			\Schema::table($tableName, function ($table) {
				$table->dropColumn('created_at');
			});
		}
		if (\Schema::hasColumn($tableName, 'updated_at')) {
			\Schema::table($tableName, function ($table) {
				$table->dropColumn('updated_at');
			});
		}
	}
}

function migrateTransData($languages, $mainLang, string $tableName, array $columns)
{
	$newEntries = [];
	if (\Schema::hasColumn($tableName, 'translation_lang') && \Schema::hasColumn($tableName, 'translation_of')) {
		
		if ($languages->count() > 0) {
			foreach ($languages as $language) {
				$oldEntries = \DB::table($tableName)->where('translation_lang', $language->abbr)->get();
				if ($oldEntries->count() > 0) {
					foreach ($oldEntries as $oldEntry) {
						if (!empty($oldEntry)) {
							
							if (is_array($columns) && !empty($columns)) {
								foreach ($columns as $columnName) {
									if (!empty($oldEntry->{$columnName})) {
										$newEntries[$oldEntry->translation_of][$columnName][$oldEntry->translation_lang] = $oldEntry->{$columnName};
									} else {
										if (!isset($newEntries[$oldEntry->translation_of][$columnName]) && empty($newEntries[$oldEntry->translation_of][$columnName])) {
											$newEntries[$oldEntry->translation_of][$columnName] = null;
										}
									}
								}
							}
							
						}
					}
				}
			}
		}
		
		if (!empty($mainLang) && !empty($newEntries)) {
			$mainLangEntries = collect();
			if (\Schema::hasColumn($tableName, 'translation_lang')) {
				$mainLangEntries = \DB::table($tableName)->where('translation_lang', $mainLang->abbr)->get();
			}
			if ($mainLangEntries->count() > 0) {
				foreach ($mainLangEntries as $mainLangEntry) {
					$newEntry = $newEntries[$mainLangEntry->id] ?? null;
					if (!empty($newEntry)) {
						
						if (!is_array($columns) && !empty($columns)) {
							foreach ($columns as $columnName) {
								$newEntry[$columnName] = (isset($newEntry[$columnName]) && !empty($newEntry[$columnName]))
									? json_encode($newEntry[$columnName], JSON_UNESCAPED_UNICODE)
									: null;
							}
						}
						
						$affected = \DB::table($tableName)->where('id', $mainLangEntry->id)->update($newEntry);
					}
				}
				
				if (\Schema::hasColumn($tableName, 'translation_lang')) {
					$affected = \DB::table($tableName)->where('translation_lang', '!=', $mainLang->abbr)->delete();
				}
				
				if (\Schema::hasColumn($tableName, 'translation_lang')) {
					\Schema::table($tableName, function ($table) {
						$table->dropColumn('translation_lang');
					});
				}
				if (\Schema::hasColumn($tableName, 'translation_of')) {
					\Schema::table($tableName, function ($table) {
						$table->dropColumn('translation_of');
					});
				}
			}
		}
		
	}
}



