<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Commande
 *
 * @property int $id
 * @property string $employe_id
 * @property string $client_id
 * @property \Illuminate\Support\Carbon $emmission_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client $client
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Detail> $details
 * @property-read int|null $details_count
 * @property-read \App\Models\Employe $employe
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\CommandeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Commande newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commande newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commande query()
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereEmmissionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereEmployeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Commande extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employe_id',
        'client_id',
        'emmission_date',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'emmission_date' => 'datetime',
    ];

    public function details(): BelongsToMany
    {
        return $this->belongsToMany(Detail::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function employe(): BelongsTo
    {
        return $this->belongsTo(Employe::class);
    }


    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
