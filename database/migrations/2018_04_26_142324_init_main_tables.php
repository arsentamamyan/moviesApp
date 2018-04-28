<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitMainTables extends Migration
{
    CONST MOVIE_TABLE_NAME  = 'movies';
    CONST PERSON_TABLE_NAME = 'persons';
    CONST PIVOT_TABLE_NAME  = 'movie_person';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->createMoviesTable();
        $this->createPersonsTable();
        $this->createPivotTable();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop(self::PIVOT_TABLE_NAME);
        Schema::drop(self::MOVIE_TABLE_NAME);
        Schema::drop(self::PERSON_TABLE_NAME);
    }

    protected function createMoviesTable()
    {
        Schema::create(self::MOVIE_TABLE_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->timestamps();
        });
    }

    protected function createPersonsTable()
    {
        Schema::create(self::PERSON_TABLE_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 255)->nullable(false);
            $table->string('middle_name', 255)->nullable()->default(null);
            $table->string('last_name', 255)->nullable(false);
            $table->boolean('type')
                ->nullable(false)
                ->default(0)
                ->comment('Describes either person is actor or director. 0 is actor and 1 is director');
            $table->timestamps();
        });
    }

    protected function createPivotTable()
    {
        Schema::create(self::PIVOT_TABLE_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('movie_id')->unsigned();
            $table->integer('person_id')->unsigned();
        });

        Schema::table(self::PIVOT_TABLE_NAME, function (Blueprint $table) {
            $table->index(['movie_id', 'person_id']);

            # Commented out for testing purposes.
            //$table->foreign('movie_id')->references('id')->on(self::MOVIE_TABLE_NAME);
            //$table->foreign('person_id')->references('id')->on(self::PERSON_TABLE_NAME);
        });

    }
}
