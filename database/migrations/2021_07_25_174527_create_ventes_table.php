<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produit_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('factName')->nullable();
            $table->double('qtt')->unsigned()->nullable();
            $table->double('pu')->unsigned()->nullable();
            $table->double('mttPayer')->unsigned()->nullable();
            $table->double('mtt')->storedAs('qtt * pu');
            $table->double('restePayer')->storedAs('mtt - mttPayer');
            $table->foreignId('client_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('facture_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->date('dateVente')->nullable();
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
        Schema::dropIfExists('ventes');
    }
}
