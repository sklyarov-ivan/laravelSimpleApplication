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

		// Вызовы на выполнение конкретных классов для наполнения БД
		$this->call('UsersTableSeeder');
		$this->call('RolesTableSeeder');
		$this->call('RoleUserTableSeeder');
	}

}