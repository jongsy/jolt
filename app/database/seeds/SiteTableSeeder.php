	
<?php

class SiteTableSeeder extends Seeder 
{

	public function run()
	{
		DB::table('sites')->delete();

		Site::create(array(
			'title' => 'test site 1',
			'user_id' => 1
		));

		Site::create(array(
			'title' => 'testsite',
			'user_id' => 1
		));
	}

}