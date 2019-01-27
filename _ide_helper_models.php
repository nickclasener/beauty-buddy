<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Customer
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $intake_id
 * @property string $naam
 * @property string $slug
 * @property string|null $straatnaam
 * @property string|null $huisnummer
 * @property string|null $postcode
 * @property string|null $plaats
 * @property string|null $telefoon
 * @property string|null $mobiel
 * @property string|null $email
 * @property string|null $geboortedatum
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $creator
 * @property-read \App\DailyAdvice $dailyAdvice
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Huidanalyse[] $huidanalyses
 * @property-read \App\Intake $intake
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Note[] $notes
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereGeboortedatum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereHuisnummer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereIntakeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereMobiel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereNaam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer wherePlaats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereStraatnaam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereTelefoon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereUserId($value)
 */
	class Customer extends \Eloquent {}
}

namespace App{
/**
 * App\DailyAdvice
 *
 * @property-read \App\Customer $customer
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DailyAdvice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DailyAdvice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DailyAdvice query()
 */
	class DailyAdvice extends \Eloquent {}
}

namespace App{
/**
 * App\Note
 *
 * @property int $id
 * @property int $customer_id
 * @property int $user_id
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $creator
 * @property-read \App\Customer $customer
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note whereUserId($value)
 */
	class Note extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customer[] $customers
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Huidanalyse
 *
 * @property int $id
 * @property int $customer_id
 * @property int $user_id
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $creator
 * @property-read \App\Customer $customer
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Huidanalyse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Huidanalyse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Huidanalyse query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Huidanalyse whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Huidanalyse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Huidanalyse whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Huidanalyse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Huidanalyse whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Huidanalyse whereUserId($value)
 */
	class Huidanalyse extends \Eloquent {}
}

namespace App{
/**
 * App\Intake
 *
 * @property int $id
 * @property int $user_id
 * @property int $customer_id
 * @property string|null $behandeling
 * @property string|null $huidverbetering
 * @property string|null $allergieen
 * @property string|null $bijzonderheden
 * @property string|null $bloeddruk
 * @property string|null $chemisch
 * @property string|null $cosmetisch
 * @property string|null $diabetes
 * @property string|null $eczeem
 * @property string|null $huidkanker
 * @property string|null $huidschimmel
 * @property string|null $ipl
 * @property string|null $kanker
 * @property int|null $bestraling
 * @property int|null $chemo
 * @property int|null $immunotherapie
 * @property string|null $laser
 * @property string|null $medicatie
 * @property string|null $operaties
 * @property string|null $zon
 * @property int|null $koortslip
 * @property int|null $roken
 * @property int|null $overgang
 * @property int|null $psoriasis
 * @property int|null $vitrigilo
 * @property int|null $zwanger
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Customer $customer
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereAllergieen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereBehandeling($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereBestraling($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereBijzonderheden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereBloeddruk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereChemisch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereChemo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereCosmetisch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereDiabetes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereEczeem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereHuidkanker($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereHuidschimmel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereHuidverbetering($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereImmunotherapie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereIpl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereKanker($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereKoortslip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereLaser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereMedicatie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereOperaties($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereOvergang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake wherePsoriasis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereRoken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereVitrigilo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereZon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Intake whereZwanger($value)
 */
	class Intake extends \Eloquent {}
}

