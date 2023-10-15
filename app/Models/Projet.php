<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * App\Models\Projet
 *
 * @property int $id
 * @property string $nom
 * @property \Illuminate\Support\Carbon $date_debut
 * @property \Illuminate\Support\Carbon $date_fin
 * @property int $cout_global
 * @property int $bilan
 * @property string $status
 * @property string $owner_type
 * @property string $owner_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Developpeur> $developpeurs
 * @property-read int|null $developpeurs_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Document> $documents
 * @property-read int|null $documents_count
 * @property-read Model|\Eloquent $owner
 * @method static \Database\Factories\ProjetFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Projet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Projet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Projet query()
 * @method static \Illuminate\Database\Eloquent\Builder|Projet whereBilan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projet whereCoutGlobal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projet whereDateDebut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projet whereDateFin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projet whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projet whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projet whereOwnerType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projet whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Projet whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Projet extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'date_debut',
        'date_fin',
        'cout_global',
        'bilan',
        'status',
        'owner_type',
        'owner_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
    ];

    public function developpeurs(): BelongsToMany
    {
        return $this->belongsToMany(Developpeur::class);
    }

    public function owner(): MorphTo
    {
        return $this->morphTo();
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }


}
