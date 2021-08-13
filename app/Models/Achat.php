<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Achat extends Model
{
    use HasFactory, SoftDeletes;

    
    /**
     * commande
     *
     * @return BelongsTo
     */
    public function commande(): BelongsTo
    {
        return $this->belongsTo(Commande::class);
    }
    
    /**
     * produit
     *
     * @return BelongsTo
     */
    public function produit(): BelongsTo
    {
        return $this->belongsTo(Produit::class);
    }
    
    /**
     * user
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * option
     *
     * @return BelongsTo
     */
    public function option(): BelongsTo 
    {
        return $this->belongsTo(Option::class);
    }
}
