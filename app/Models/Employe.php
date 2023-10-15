<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * App\Models\Employe
 *
 * @property int $id
 * @property string $user_id
 * @property string|null $boutique_id
 * @property string $poste
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Boutique|null $boutique
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\EmployeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Employe newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employe newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employe query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employe whereBoutiqueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employe whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employe whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employe wherePoste($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employe whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employe whereUserId($value)
 * @mixin \Eloquent
 */
class Employe extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'boutique_id',
        'poste',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function boutique(): BelongsTo
    {
        return $this->belongsTo(Boutique::class);
    }

    public function image(): MorphOne
    {
        return $this->morphOne(User::class,"userable");
    }
}
