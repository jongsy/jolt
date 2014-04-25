<?php

class UserTableSeeder extends Seeder 
{
	public function run () 
	{
		DB::table('users')->delete();
		User::create(array(
			'name'     => 'Jon Burgess',
			'username' => 'jon.burgess',
			'email'    => 'jon@indulgemedia.com',
			'password' => Hash::make('wefwef'),
		));
		User::create(array(
			'name'     => 'Luke Oliver',
			'username' => 'luke.oliver',
			'email'    => 'luke@indulgemedia.com',
			'password' => Hash::make('wefwef'),
		));
	}
}