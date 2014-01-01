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

		// $this->call('UserTableSeeder');
		$this->call('RolesTableSeeder');
		$this->call('CitiesTableSeeder');
		$this->call('CompaniesTableSeeder');
		$this->call('TagsTableSeeder');
		$this->call('OffersTableSeeder');
		$this->call('CommentsTableSeeder');
	}

}