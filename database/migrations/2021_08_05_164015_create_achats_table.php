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
            $table->foreignId('commande_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('categorie_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('famille_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('unite_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->boolean('inventaire')->default(false);
            $table->double('qtt')->unsigned()->nullable();
            $table->integer('seuil')->unsigned()->nullable();
            $table->double('priceOfPurchase')->unsigned()->nullable(); // prix d'achat
            $table->double('sellingPrice')->unsigned()->nullable(); // prix de vente
            $table->double('montantPaye')->unsigned()->nullable();  // montant payer
            $table->double('mntTotalAchat')->storedAs('qtt * priceOfPurchase'); //prix total d'achats
            $table->double('mntTotalVente')->storedAs('qtt * sellingPrice'); // prix total de vente
            $table->double('restePayer')->storedAs('mntTotalAchat - montantPaye'); // montant total qui reste a payer
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->date('dateFab')->nullable();
            $table->date('dateExp')->nullable();
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
