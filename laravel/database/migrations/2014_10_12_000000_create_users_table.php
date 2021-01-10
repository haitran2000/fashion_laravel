<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->Increments('id')->unsigned();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('image');
            $table->string('phone');
            $table->string('address');
            $table->string('sub_district');
            $table->string('city');
            $table->string('district');
            $table->timestamps();
        });
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'image'=>'null',
            'address'=>'null',
            'sub_district'=>'null',
            'city'=>'null',
            'district'=>'null',
            'password' => Hash::Make('123456'),
            'phone' => '0905434234'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
