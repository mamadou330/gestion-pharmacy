<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produit_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('numCmd')->nullable();
            $table->double('qtt')->unsigned()->nullable();
            $table->integer('seuil')->unsigned()->nullable();
            $table->double('mntpayer')->unsigned()->nullable();
            $table->double('priceOfPurchase')->unsigned()->nullable(); // prix d'achat
            $table->double('sellingPrice')->unsigned()->nullable(); // prix de vente
            $table->double('mntTotalAchat')->storedAs('qtt * priceOfPurchase');
            $table->double('mntTotalVent')->storedAs('qtt * sellingPrice');
            $table->double('dette')->storedAs('mntTotalAchat - mntpayer');
            $table->double('montantPaye')->unsigned()->nullable();
            $table->foreignId('fournisseur_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('commande_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->date('dateFab')->nullable();
            $table->date('dateExp')->nullable();
            $table->date('dateCmd')->nullable();
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
        Schema::dropIfExists('achats');
    }
}
