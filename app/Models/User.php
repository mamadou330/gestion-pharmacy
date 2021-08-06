<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
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
     * categories
     *
     * @return HasMany
     */
    public function categories(): HasMany
    {
        return $this->hasMany(Categorie::class);
    }
    
    /**
     * clients
     *
     * @return HasMany
     */
    public function clients(): HasMany
    {
        return $this->hasMany(Client::class);
    }
    
    /**
     * commandes
     *
     * @return HasMany
     */
    public function commandes(): HasMany
    {
        return $this->hasMany(Commande::class);
    }

    
    /**
     * depenses
     *
     * @return HasMany
     */
    public function depenses(): HasMany
    {
        return $this->hasMany(Depense::class);
    }
    
    /**
     * factures
     *
     * @return HasMany
     */
    public function factures(): HasMany
    {
        return $this->hasMany(Facture::class);
    }

    /**
     * familles
     *
     * @return HasMany
     */
    public function familles(): HasMany
    {
        return $this->hasMany(Famille::class);
    }
    
    /**
     * fournisseurs
     *
     * @return HasMany
     */
    public function fournisseurs(): HasMany
    {
        return $this->hasMany(Fournisseur::class);
    }
    
    /**
     * options
     *
     * @return HasMany
     */
    public function options(): HasMany
    {
        return $this->hasMany(Option::class);
    }

    /**
     * produits
     *
     * @return HasMany
     */
    public function produits(): HasMany
    {
        return $this->hasMany(Produit::class);
    }
    
    /**
     * ventes
     *
     * @return HasMany
     */
    public function ventes(): HasMany
    {
        return $this->hasMany(Vente::class);
    }

}
