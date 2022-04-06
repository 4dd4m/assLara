<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSructureTable extends Migration{

    public function up(){
        Schema::create('sructures', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('sructure');
    }
}
