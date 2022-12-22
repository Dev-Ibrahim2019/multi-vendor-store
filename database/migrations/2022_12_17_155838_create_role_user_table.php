<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            // $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            // case I have more that user type--> (user, admin, ...) --> make morph relation
            $table->morphs('authorizable'); // authorizable_id-->id of the users || authorizabel_type-->type of the users
            $table->foreignId('role_id')->constrained('roles')->cascadeOnDelete();

            $table->primary(['authorizable_id', 'authorizable_type', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user');
    }
};
