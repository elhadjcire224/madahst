<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Formation
 *
 * @property int $id
 * @property string $libelle
 * @property int $montant_inscription
 * @property int $montant_frais
 * @property \Illuminate\Support\Carbon $date_debut
 * @property \Illuminate\Support\Carbon $date_fin
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Developpeur> $developpeurs
 * @property-read int|null $developpeurs_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Module> $modules
 * @property-read int|null $modules_count
 * @method static \Database\Factories\FormationFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Formation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Formation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Formation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereDateDebut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereDateFin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereLibelle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereMontantFrais($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereMontantInscription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Formation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'libelle',
        'montant_inscription',
        'montant_frais',
        'date_debut',
        'date_fin',
        'description',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date_debut' => 'datetime',
        'date_fin' => 'datetime',
    ];

    public function developpeurs(): BelongsToMany
    {
        return $this->belongsToMany(Developpeur::class);
    }

    public function modules(): BelongsToMany
    {
        return $this->belongsToMany(Module::class);
    }
}
