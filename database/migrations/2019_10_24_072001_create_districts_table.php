<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer("place_id");
            $table->timestamps();
            $table->softDeletes();
        });
        
        // Переносим данные
        $districts = [
            'Karasunskiy' => '1',
            'Prikubanskiy' => '1',
            'Zavetnyi selskii okrug' => '2',
            'Centralniy' => '3',
            'Voroshilovskiy' => '4',
            'Leninskiy' => '5',
        ];
        foreach ($districts as $district=>$place) {
            DB::table('districts')->insert(
                array(
                    'name' => $district,
                    'place_id' => $place,
                )
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('districts');
    }
}
