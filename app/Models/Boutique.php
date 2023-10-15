<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Boutique
 *
 * @property int $id
 * @property string $nom
 * @property string $address
 * @property string $tel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Employe> $employes
 * @property-read int|null $employes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Stock> $stocks
 * @property-read int|null $stocks_count
 * @method static \Database\Factories\BoutiqueFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Boutique newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Boutique newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Boutique query()
 * @method static \Illuminate\Database\Eloquent\Builder|Boutique whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boutique whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boutique whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boutique whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boutique whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boutique whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Boutique extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'address',
        'tel',
    ];

    public function employes(): HasMany
    {
        return $this->hasMany(Employe::class);
    }

    public function stocks(): HasMany
    {
        return $this->hasMany(Stock::class);
    }
}
