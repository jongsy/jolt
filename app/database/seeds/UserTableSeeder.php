<?php

class UserTableSeeder extends Seeder 
{
	public function run () 
	{
		DB::table('users')->delete();
		User::create(array(
			'name'     => 'Jon Burgess',
			'username' => 'jonburgess',
			'email'    => 'jon@indulgemedia.com',
			'password' => Hash::make('wefwef'),
		));
		User::create(array(
			'name'     => 'Luke Oliver',
			'username' => 'lukeoliver',
			'email'    => 'luke@indulgemedia.com',
			'password' => Hash::make('wefwef'),
		));
	}
}