<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAssetsHistoriesTable extends Migration
{
    public function up()
    {
        Schema::table('assets_histories', function (Blueprint $table) {
            $table->unsignedInteger('asset_id')->nullable();
            $table->foreign('asset_id', 'asset_fk_292485')->references('id')->on('assets');
            $table->unsignedInteger('assigned_user_id')->nullable();
            $table->foreign('assigned_user_id', 'assigned_user_fk_292488')->references('id')->on('users');
        });
    }
}
