<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCommentsV342 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->softDeletes();
            $table->string('commenter_id')->change();
            $table->string('commenter_type')->nullable();

            DB::table('comments')->update([
                'commenter_type' => '\App\User'
            ]);

            $table->string('commentable_id')->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
