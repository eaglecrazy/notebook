<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UserContact
 *
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property int $contact_id
 * @property int $favorite_contact
 * @method static \Illuminate\Database\Eloquent\Builder|UserContact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserContact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserContact query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserContact whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserContact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserContact whereFavoriteContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserContact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserContact whereUserId($value)
 * @mixin \Eloquent
 */
class UserContact extends Model
{
    //
}
