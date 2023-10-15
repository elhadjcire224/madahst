<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Particulier
 *
 * @property int $id
 * @property string $nom
 * @property string $genre
 * @property string $telephone
 * @property string $email
 * @property int $BP
 * @property string $profession
 * @property string $adressse
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ParticulierFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Particulier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Particulier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Particulier query()
 * @method static \Illuminate\Database\Eloquent\Builder|Particulier whereAdressse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Particulier whereBP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Particulier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Particulier whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Particulier whereGenre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Particulier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Particulier whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Particulier whereProfession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Particulier whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Particulier whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Particulier extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'genre',
        'telephone',
        'email',
        'BP',
        'profession',
        'adressse',
    ];
}
