<?php

namespace App\Models;

use App\Enums\UserType;
use Eloquent;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Developpeur;
use App\Models\Client;
use App\Models\Employe;
use Illuminate\Support\Collection;

use function Laravel\Prompts\table;

/**
 * App\Models\User
 *
 * @property string $id
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string $nom
 * @property string $prenom
 * @property string $addresse
 * @property string $telephone
 * @property string $img_url
 * @property string $genre
 * @property string $nationalite
 * @property bool $verified
 * @property \Illuminate\Support\Carbon|null $dob
 * @property string $userable_type
 * @property string $userable_id
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Model|\Eloquent $userable
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddresse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGenre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImgUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNationalite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePrenom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereVerified($value)
 * @mixin \Eloquent
 * @mixin Eloquent
 */
class User extends Model implements Authenticatable
{
    use HasFactory;
    use HasUuids;
    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public $incrementing = false;

    protected $keyType = 'string';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nom',
        'prenom',
        'password',
        'addresse',
        'telephone',
        'img_url',
        'genre',
        'nationalite',
        'email',
        'verified',
        'dob',
        'userable_type',
        'userable_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'verified' => 'boolean',
        'dob' => 'date',
    ];

    public function userable()
    {
        $userable = null;
        if($this->userable_type == UserType::Developpeur->value){
            $userable = Developpeur::whereId($this->userable_id)->get();
        }else if($this->userable_type == UserType::Client->value){
            $userable = Client::find($this->userable_id);
        }else if($this->userable_type == UserType::Employe->value){
            $userable = Employe::find($this->userable_id);
        }

        $this->able = $userable->toArray()[0];
        return $this;
    }



    

}
