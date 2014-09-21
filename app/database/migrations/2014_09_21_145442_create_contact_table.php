<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contact', function ($table) {
            $table->renameColumn('contact_modified', 'updated_at');
            $table->renameColumn('contact_created', 'created_at');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact', function ($table) {
            $table->renameColumn('updated_at', 'contact_modified');
            $table->renameColumn('created_at', 'contact_created');
        });
    }

}
