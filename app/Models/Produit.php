<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class Produit extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = ['produit', 'slug', 'description', 'unite', 'categorie_id', 'famille_id', 'date_production', 'date_peremption'];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_production' => 'datetime',
        'date_peremption' => 'datetime'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'produit'
            ]
        ];
    }
    
    /**
     * boot
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        self::creating(function ($produit) {
            $produit->categorie()->associate(request()->categorie);
            $produit->famille()->associate(request()->famille);
            // $produit->option()->associate(request()->unite);
        });

        self::updating(function ($produit) {
            $produit->categorie()->associate(request()->categorie);
            $produit->famille()->associate(request()->famille);
        });
    }
    
    /**
     * categorie
     *
     * @return BelongsTo
     */
    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }

    /**
     * famille
     *
     * @return BelongsTo
     */
    public function famille(): BelongsTo
    {
        return $this->belongsTo(Famille::class);
    }
    
    
    /**
     * achat
     *
     * @return HasMany
     */
    public function achats(): HasMany
    {
        return $this->hasMany(Achat::class);
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
     * user
     *
     * @return BelongsTo
     */
    public function option(): BelongsTo
    {
        return $this->belongsTo(Option::class);
    }

    
    /**
     * getProduitAttribute
     *
     * @param  mixed $value
     * @return void
     */
    public function getProduitAttribute($value)
    {
        return Str::title($value);
    }

    /**
     * getdateProductionAttribute
     *
     * @param  mixed $value
     * @return void
     */
    public function getdateProductionAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');;
    }


    /**
     * getdatePeremptionAttribute
     *
     * @param  mixed $value
     * @return void
     */
    public function getdatePeremptionAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');;
    }

    // public function getDateProductionAttribute($value)
    // {
    //     return ucfirst($value);
    // }

  
}
