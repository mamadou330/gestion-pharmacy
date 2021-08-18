<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Famille extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['familleName'];

    /**
     * produits
     *
     * @return HasMany
     */
    public function produits(): HasMany
    {
        return $this->hasMany(Produit::class);
    }
    
        
    // /**
    //  * categories
    //  *
    //  * @return BelongsToMany
    //  */
    // public function categories(): BelongsToMany
    // {
    //     return $this->belongsToMany(Famille::class);
    // }

    /**
     * user
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
