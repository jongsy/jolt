<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('UserTableSeeder');
		$this->command->info('User table seeded.');
		$this->call('SiteFileTableSeeder');
		$this->command->info('File table seeded.');
		$this->call('SiteTableSeeder');
		$this->command->info('Site table seeded.');
	}

}