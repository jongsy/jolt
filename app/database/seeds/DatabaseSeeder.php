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
		$this->call('PageTableSeeder');
		$this->command->info('Page table seeded.');
		$this->call('SiteTableSeeder');
		$this->command->info('Site table seeded.');
	}

}