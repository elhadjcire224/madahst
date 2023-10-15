<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Produit
 *
 * @property int $id
 * @property string $nom
 * @property string $category_id
 * @property string $stock_id
 * @property int $pau
 * @property int $pvu
 * @property int $remise
 * @property string $img_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category|null $category
 * @property-read \App\Models\Stock $stock
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Stock> $stocks
 * @property-read int|null $stocks_count
 * @method static \Database\Factories\ProduitFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Produit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Produit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Produit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Produit whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produit whereImgUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produit whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produit wherePau($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produit wherePvu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produit whereRemise($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produit whereStockId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produit whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Produit extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'category_id',
        'stock_id',
        'pau',
        'pvu',
        'remise',
        'img_url',
    ];

    public function category(): HasOne
    {
        return $this->hasOne(Category::class);
    }

    public function stocks(): BelongsToMany
    {
        return $this->belongsToMany(Stock::class);
    }



    public function stock(): BelongsTo
    {
        return $this->belongsTo(Stock::class);
    }
}
