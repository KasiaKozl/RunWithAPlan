<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
  
class UserSeeder extends Seeder
{
      //Create fake inserts to db authomatically
    public function run()
    {
        $users = [
            [
               'name'    =>'Coach',
               'email'   =>'coach@gmail.com',
               'phone'   => '555555555',
               'type'    => 1,
               'password'=> bcrypt('coach123'),
            ],
            [
               'name'    =>'Runner',
               'email'   =>'runner@gmail.com',
               'phone'   => '444444444',
               'type'    => 2,
               'password'=> bcrypt('runner123'),
            ],
            [
               'name'    =>'Guest',
               'email'   =>'guest@gmail.com',
               'phone'   => '666666666',
               'type'    => 0,
               'password'=> bcrypt('123456'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}