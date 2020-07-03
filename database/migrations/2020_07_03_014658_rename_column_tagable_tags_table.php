<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnTagableTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'tags', function (Blueprint $table) {
                $table->renameColumn('tagable_id', 'taggable_id');
                $table->renameColumn('tabable_type', 'taggable_type');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(
            'tags', function (Blueprint $table) {
                $table->renameColumn('taggable_id', 'tagable_id');
                $table->renameColumn('taggable_type', 'tabable_type');
            }
        );
    }
}
