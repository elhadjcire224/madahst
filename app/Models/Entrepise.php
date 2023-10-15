<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Entrepise
 *
 * @property int $id
 * @property string $nom
 * @property string $website_url
 * @property string $telephone
 * @property string $email
 * @property int $BP
 * @property string $secteur_activite
 * @property string $siege
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\EntrepiseFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Entrepise newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Entrepise newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Entrepise query()
 * @method static \Illuminate\Database\Eloquent\Builder|Entrepise whereBP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrepise whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrepise whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrepise whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrepise whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrepise whereSecteurActivite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrepise whereSiege($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrepise whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrepise whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrepise whereWebsiteUrl($value)
 * @mixin \Eloquent
 */
class Entrepise extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'website_url',
        'telephone',
        'email',
        'BP',
        'secteur_activite',
        'siege',
    ];
}
