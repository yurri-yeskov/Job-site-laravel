<?php

namespace Database\Seeders;

// Increase the server resources
$iniConfigFile = __DIR__ . '/../../app/Helpers/Functions/ini.php';
if (file_exists($iniConfigFile)) {
	include_once $iniConfigFile;
}

use App\Helpers\DBTool;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		
		// Get App's URL
		$appUrl = env('APP_URL');
		
		// Truncate all tables
		$tables = DBTool::getDatabaseTables(DB::getTablePrefix());
		if (is_array($tables) && count($tables) > 0) {
			foreach ($tables as $table) {
				DB::statement('ALTER TABLE ' . $table . ' AUTO_INCREMENT=1;');
				
				// Don't truncate some tables (eg. migrations, ...)
				if (
					Str::contains($table, 'migrations')
					|| Str::contains($table, 'users')
				) {
					continue;
				}
				
				if (Str::contains($table, 'blacklist')) {
					if (!Str::endsWith($appUrl, '.local')) {
						continue;
					}
				}
				
				DB::statement('TRUNCATE TABLE ' . $table . ';');
			}
		}
		
		// Run Default Seeders
		$this->call(LanguageSeeder::class);
		$this->call(AdvertisingSeeder::class);
		$this->call(CategorySeeder::class);
		$this->call(ContinentSeeder::class);
		$this->call(CurrencySeeder::class);
		$this->call(GenderSeeder::class);
		$this->call(HomeSectionSeeder::class);
		$this->call(MetaTagSeeder::class);
		$this->call(PackageSeeder::class);
		$this->call(PageSeeder::class);
		$this->call(PaymentMethodSeeder::class);
		$this->call(PostTypeSeeder::class);
		$this->call(ReportTypeSeeder::class);
		$this->call(SalaryTypeSeeder::class);
		$this->call(SettingSeeder::class);
		$this->call(UserTypeSeeder::class);
		$this->call(CountrySeeder::class);
		
		if (isDemoDomain($appUrl)) {
			$this->call('\Database\Seeders\Factories\ClearFilesSeeder');
			$this->call('\Database\Seeders\Factories\UserSeeder');
			$this->call('\Database\Seeders\Factories\PermissionDataSeeder');
			$this->call('\Database\Seeders\Factories\SettingDataSeeder');
			$this->call('\Database\Seeders\Factories\HomeDataSeeder');
			$this->call('\Database\Seeders\Factories\CountryDataSeeder');
			$this->call('\Database\Seeders\Factories\LanguageDataSeeder');
			$this->call('\Database\Seeders\Factories\PostSeeder');
			$this->call('\Database\Seeders\Factories\FakerSeeder');
			$this->call('\Database\Seeders\Factories\MessengerSeeder');
			if (Str::endsWith($appUrl, '.local')) {
				$this->call('\Database\Seeders\Factories\BlacklistSeeder');
			}
		}
		
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}
}
