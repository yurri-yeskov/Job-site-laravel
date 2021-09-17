<?php

namespace Database\Seeders;

use App\Models\MetaTag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetaTagSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$entries = [
			[
				'page'        => 'home',
				'title'       => [
					'en' => '{app_name} - Geolocalized Job Board Script',
					'fr' => '{app_name} - Geolocalized Job Board Script',
				],
				'description' => [
					'en' => 'Welcome to {app_name} : 100% Job Board. Find a job near you. Simple, fast and efficient - {country}',
					'fr' => 'Bienvenue sur {app_name} : Site d\'emplois 100% gratuit. Trouvez un travail près de chez vous. Simple, rapide et efficace - {country}',
				],
				'keywords'    => [
					'en' => '{app_name}, {country}, jobs ads, jobs, ads, script, app, premium jobs',
					'fr' => '{app_name}, {country}, offres d\'emploi, emplois, annonces, script, app, premium jobs',
				],
				'active'      => '1',
			],
			[
				'page'        => 'register',
				'title'       => [
					'en' => 'Sign Up - {app_name}',
					'fr' => 'S\'inscrire - {app_name}',
				],
				'description' => [
					'en' => 'Sign Up on {app_name}',
					'fr' => 'S\'inscrire sur {app_name}',
				],
				'keywords'    => ['en' => '{app_name}, {country}, jobs ads, jobs, ads, script, app, premium jobs'],
				'active'      => '1',
			],
			[
				'page'        => 'login',
				'title'       => [
					'en' => 'Login - {app_name}',
					'fr' => 'S\'identifier - {app_name}',
				],
				'description' => [
					'en' => 'Log in to {app_name}',
					'fr' => 'S\'identifier sur {app_name}',
				],
				'keywords'    => ['en' => '{app_name}, {country}, jobs ads, jobs, ads, script, app, premium jobs'],
				'active'      => '1',
			],
			[
				'page'        => 'create',
				'title'       => [
					'en' => 'Post a Job',
					'fr' => 'Publier une offre d\'emploi',
				],
				'description' => [
					'en' => 'Post a Job - {country}.',
					'fr' => 'Publier une offre d\'emploi - {country}.',
				],
				'keywords'    => ['en' => '{app_name}, {country}, jobs ads, jobs, ads, script, app, premium jobs'],
				'active'      => '1',
			],
			[
				'page'        => 'countries',
				'title'       => [
					'en' => 'Jobs in the World',
					'fr' => 'Emplois dans le monde',
				],
				'description' => [
					'en' => 'Welcome to {app_name} : 100% Job Board. Find a job near you. Simple, fast and efficient.',
					'fr' => 'Bienvenue sur {app_name} : Site d\'emplois 100% gratuit. Trouvez un travail près de chez vous. Simple, rapide et efficace.',
				],
				'keywords'    => ['en' => '{app_name}, {country}, jobs ads, jobs, ads, script, app, premium jobs'],
				'active'      => '1',
			],
			[
				'page'        => 'contact',
				'title'       => [
					'en' => 'Contact Us - {app_name}',
					'fr' => 'Nous contacter - {app_name}',
				],
				'description' => [
					'en' => 'Contact Us - {app_name}',
					'fr' => 'Nous contacter - {app_name}',
				],
				'keywords'    => ['en' => '{app_name}, {country}, jobs ads, jobs, ads, script, app, premium jobs'],
				'active'      => '1',
			],
			[
				'page'        => 'sitemap',
				'title'       => [
					'en' => 'Sitemap {app_name} - {country}',
					'fr' => 'Plan du site {app_name} - {country}',
				],
				'description' => [
					'en' => 'Sitemap {app_name} - {country}. Job Bord.',
					'fr' => 'Plan du site {app_name} - {country}. Site d\'emplois.',
				],
				'keywords'    => ['en' => '{app_name}, {country}, jobs ads, jobs, ads, script, app, premium jobs'],
				'active'      => '1',
			],
			[
				'page'        => 'password',
				'title'       => [
					'en' => 'Lost your password? - {app_name}',
					'fr' => 'Mot de passe oublié? - {app_name}',
				],
				'description' => [
					'en' => 'Lost your password? - {app_name}',
					'fr' => 'Mot de passe oublié? - {app_name}',
				],
				'keywords'    => ['en' => '{app_name}, {country}, jobs ads, jobs, ads, script, app, premium jobs'],
				'active'      => '1',
			],
			[
				'page'        => 'pricing',
				'title'       => [
					'en' => 'Pricing - {app_name}',
					'fr' => 'Tarifs - {app_name}',
				],
				'description' => [
					'en' => 'Pricing - {app_name}',
					'fr' => 'Tarifs - {app_name}',
				],
				'keywords'    => ['en' => '{app_name}, {country}, pricing, free ads, classified, ads, script, app, premium ads'],
				'active'      => '1',
			],
		];
		
		$tableName = (new MetaTag())->getTable();
		foreach ($entries as $entry) {
			$entry = arrayTranslationsToJson($entry);
			$entryId = DB::table($tableName)->insertGetId($entry);
		}
	}
}
