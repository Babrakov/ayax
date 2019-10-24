<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer("region_id");
            $table->timestamps();
            $table->softDeletes();
        });
        
        // Переносим данные
        $places = [
            'Krasnodar' => '1',
            'Armavir' => '1',
            'Sochi' => '1',
            'Rostov-na-Donu' => '2',
            'Stavropol' => '3',
        ];
        foreach ($places as $place=>$region) {
            DB::table('places')->insert(
                array(
                    'name' => $place,
                    'region_id' => $region,
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
        Schema::dropIfExists('places');
    }
}
