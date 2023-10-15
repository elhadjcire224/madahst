<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Boutique
 *
 * @property string $id
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
 */
	class Boutique extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property string $id
 * @property string $libelle
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Produit> $produits
 * @property-read int|null $produits_count
 * @method static \Database\Factories\CategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereLibelle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Client
 *
 * @property string $id
 * @property string $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\ClientFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUserId($value)
 */
	class Client extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Commande
 *
 * @property string $id
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
 */
	class Commande extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Detail
 *
 * @property string $id
 * @property string $commande_id
 * @property int $quantite
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Commande|null $commande
 * @method static \Database\Factories\DetailFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Detail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Detail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Detail query()
 * @method static \Illuminate\Database\Eloquent\Builder|Detail whereCommandeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detail whereQuantite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detail whereUpdatedAt($value)
 */
	class Detail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Developpeur
 *
 * @property string $id
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
 */
	class Developpeur extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Document
 *
 * @property string $id
 * @property string $projet_id
 * @property string $type
 * @property string $file_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Projet $projet
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Projet> $projets
 * @property-read int|null $projets_count
 * @method static \Database\Factories\DocumentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Document newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document query()
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereFileUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereProjetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereUpdatedAt($value)
 */
	class Document extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Employe
 *
 * @property string $id
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
 */
	class Employe extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Entrepise
 *
 * @property string $id
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
 */
	class Entrepise extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Formation
 *
 * @property string $id
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
 */
	class Formation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Module
 *
 * @property string $id
 * @property string $description
 * @property string $nom
 * @property \Illuminate\Support\Carbon $date_debut
 * @property \Illuminate\Support\Carbon $date_fin
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Formation> $formations
 * @property-read int|null $formations_count
 * @method static \Database\Factories\ModuleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Module newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Module newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Module query()
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereDateDebut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereDateFin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereUpdatedAt($value)
 */
	class Module extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Particulier
 *
 * @property string $id
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
 */
	class Particulier extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Produit
 *
 * @property string $id
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
 */
	class Produit extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Projet
 *
 * @property string $id
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
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $owner
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
 */
	class Projet extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Stock
 *
 * @property string $id
 * @property string $boutique_id
 * @property int $quantite
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Boutique $boutique
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Produit> $produits
 * @property-read int|null $produits_count
 * @method static \Database\Factories\StockFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Stock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stock query()
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereBoutiqueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereQuantite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereUpdatedAt($value)
 */
	class Stock extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string $id
 * @property string $nom
 * @property string $prenom
 * @property string $addresse
 * @property string $tel
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
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $userable
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
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereVerified($value)
 */
	class User extends \Eloquent {}
}

