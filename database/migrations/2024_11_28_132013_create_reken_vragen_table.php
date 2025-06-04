<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reken_vragen', function (Blueprint $table) {
            $table->id('vraag_id');  // This creates the 'vraag_id' as an auto-incrementing primary key
            $table->string('vraag');  // This is the 'vraag' column (VARCHAR)
            $table->integer('antwoord');  // This is the 'antwoord' column (INT)
            $table->integer('niveau');  // This is the 'niveau' column (INT)
            $table->timestamps();  // This creates the 'created_at' and 'updated_at' columns
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('reken_vragen');
    }
    
};
