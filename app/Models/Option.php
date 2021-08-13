<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'unite', 'user_id'];
    
    
    /**
     * achats
     *
     * @return HasMany
     */
    public function achats(): HasMany
    {
        return $this->hasMany(Achat::class);
    }
    
    /**
     * depense
     *
     * @return HasMany
     */
    public function depense(): HasMany
    {
        return $this->hasMany(Depense::class);
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
}
