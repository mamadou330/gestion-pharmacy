<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('unite')->default(false);
            $table->boolean('motif')->default(false);
            $table->boolean('versemFournisseur')->default(false);
            $table->boolean('creditFournisseur')->default(false);
            $table->boolean('versemClient')->default(false);
            $table->boolean('creditClient')->default(false);
            $table->integer('client_id')->nullable();
            $table->integer('fournisseur_id')->nullable();
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('archived')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options');
    }
}
