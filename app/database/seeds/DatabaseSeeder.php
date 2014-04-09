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

		$this->call('CategoriesTableSeeder');
        $this->command->info('Categories Table Seeded');

        $this->call('SubCategoriesTableSeeder');
        $this->command->info('Sub_Categories Table Seeded');

        $this->call('LocationsCountiesTableSeeder');
        $this->command->info('LocationsCounties Table Seeded');

        $this->call('LocationsStatesProvincesDivisionsTableSeeder');
        $this->command->info('LocationsStatesProvincesDivisions Table Seeded');

        $this->call('LocationsCitiesTableSeeder');
        $this->command->info('LocationsCities Table Seeded');

        $this->call('LocationsNeighborhoodTableSeeder');
        $this->command->info('LocationsNeighborhood Table Seeded');

        $this->call('ManufacturersTableSeeder');
        $this->command->info('Manufacturers Table Seeded');

        $this->call('AdsGenericTableSeeder');
        $this->command->info('AdsGeneric Table Seeded');

        $this->call('AdsExtendedCarsTableSeeder');
        $this->command->info('AdsExtendedCars Table Seeded');

        $this->call('AdsExtendedBikesTableSeeder');
        $this->command->info('AdsExtendedBikes Table Seeded');

        $this->call('AdsExtendedBusesTableSeeder');
        $this->command->info('AdsExtendedBuses Table Seeded');

        $this->call('AdsExtendedTrucksTableSeeder');
        $this->command->info('AdsExtendedTrucks Table Seeded');

        $this->call('AdsExtendedBoatsTableSeeder');
        $this->command->info('AdsExtendedBoats Table Seeded');

        $this->call('UsersTableSeeder');
        $this->command->info('UsersTable Table Seeded');
    }
}