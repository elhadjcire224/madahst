<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;



/**
 * App\Models\Developpeur
 *
 * @property int $id
 * @property string $specialite
 * @property string $user_id
 * @property bool $is_instructor
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Formation> $formations
 * @property-read int|null $formations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Projet> $projets
 * @property-read int|null $projets_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\DeveloppeurFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Developpeur newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Developpeur newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Developpeur query()
 * @method static \Illuminate\Database\Eloquent\Builder|Developpeur whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developpeur whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developpeur whereIsInstructor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developpeur whereSpecialite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developpeur whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developpeur whereUserId($value)
 * @mixin \Eloquent
 */
class Developpeur extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'specialite',
        'user_id',
        'is_instructor',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_instructor' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function formations(): BelongsToMany
    {
        return $this->belongsToMany(Formation::class);
    }

    public function projets(): HasMany
    {
        return $this->hasMany(Projet::class);
    }

    public function image(): MorphOne
    {
        return $this->morphOne(User::class,"",'userable_type','userable_id');
    }
}
