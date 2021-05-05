<?php

use App\Models\Agency;
use App\Models\Business;
use App\Models\PermissionGroup;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owner =  User::create([
            'name_en'  => 'owner',
            'name_ar'  => 'owner',
            'email'    => 'hamed@onetecgroup.com',
            'password' => '$2y$10$aMk3ZOJVZVajuDgY3RFpDOpqeVOBlGex7G2IlPaKMgXc0meZJXHXy',
            'type'     => 'owner',
            'business_id' => Business::findorfail(1)->id
        ]);

        $agency1 = Agency::create([
            'company_name_en' => 'otg',
            'company_name_ar' => 'otg',
            'company_email'   => 'otg@onetecgroup.com',
            'owner_id'        => $owner->id,
            'business_id' => Business::findorfail(1)->id

        ]);

        $agency2 = Agency::create([
            'company_name_en' => 'pcasa',
            'company_name_ar' => 'pcasa',
            'company_email'   => 'pcasa@onetecgroup.com',
            'owner_id'        => $owner->id,
            'business_id' => Business::findorfail(1)->id

        ]);

        User::create([
            'name_en'  => 'staffotg1',
            'name_ar'  => 'staffotg1',
            'email'    => 'staffotg1@onetecgroup.com',
            'password' => '$2y$10$aMk3ZOJVZVajuDgY3RFpDOpqeVOBlGex7G2IlPaKMgXc0meZJXHXy',
            'agency_id' => $agency1->id,
            'business_id' => Business::findorfail(1)->id

        ]);


        User::create([
            'name_en'  => 'staffpcasa1',
            'name_ar'  => 'staffpcasa1',
            'email'    => 'staffpcasa1@onetecgroup.com',
            'password' => '$2y$10$aMk3ZOJVZVajuDgY3RFpDOpqeVOBlGex7G2IlPaKMgXc0meZJXHXy',
            'agency_id' => $agency2->id,
            'business_id' => Business::findorfail(1)->id

        ]);
    }
}
