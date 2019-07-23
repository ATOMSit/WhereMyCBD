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
 * @property string $first_name
 * @property string $last_name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $birthdate
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $url_facebook
 * @property string|null $url_instagram
 * @property string|null $url_twitter
 * @property string|null $url_linkedin
 * @property string|null $url_website
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Website[] $Websites
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereBirthdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereUrlFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereUrlInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereUrlLinkedin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereUrlTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereUrlWebsite($value)
 */
	class Customer extends \Eloquent {}
}

namespace App{
/**
 * App\Hostname
 *
 * @property int $id
 * @property string $fqdn
 * @property string|null $redirect_to
 * @property bool $force_https
 * @property \Illuminate\Support\Carbon|null $under_maintenance_since
 * @property int|null $website_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Website|null $website
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hostname newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hostname newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Hostname onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hostname query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hostname whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hostname whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hostname whereForceHttps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hostname whereFqdn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hostname whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hostname whereRedirectTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hostname whereUnderMaintenanceSince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hostname whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hostname whereWebsiteId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Hostname withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Hostname withoutTrashed()
 */
	class Hostname extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $birthdate
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $url_facebook
 * @property string|null $url_instagram
 * @property string|null $url_twitter
 * @property string|null $url_linkedin
 * @property string|null $url_website
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereBirthdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUrlFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUrlInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUrlLinkedin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUrlTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUrlWebsite($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Website
 *
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string|null $description
 * @property string|null $managed_by_database_connection
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $customer_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Hostname[] $hostnames
 * @property-read \App\Customer $owner
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Website newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Website newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Website onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Website query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Website whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Website whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Website whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Website whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Website whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Website whereManagedByDatabaseConnection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Website whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Website whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Website whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Website withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Website withoutTrashed()
 */
	class Website extends \Eloquent {}
}

