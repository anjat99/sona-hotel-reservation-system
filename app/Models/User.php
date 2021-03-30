<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $username
 * @property string $password
 * @property int $role_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\Role|null $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Testimonial[] $testimonials
 * @property-read int|null $testimonials_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\RatingRoom[] $ratingRooms
 * @property-read int|null $rating_rooms_count
 * @property-read \App\Models\UserReview|null $userReview
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Review[] $reviews
 * @property-read int|null $reviews_count
 * @property-read \App\Models\Role $role
 */
class User extends Model
{
    use HasFactory;


    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function activities(){
        return $this->hasMany(Activity::class);
    }

    public function testimonials(){
        return $this->hasMany(Testimonial::class);
    }

    public function ratingRooms(){
        return $this->hasMany(RatingRoom::class);
    }

    public function reviews(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

    /** user with id, firstname, lastname, username, email, created_at ; role: name; number of reviews; number of testimonials */

    public static function userWithReviewsTest(){
        return self::with('role')->with('testimonials')->with('reviews')->orderByDesc('created_at')->paginate(4);

    }

    public static function latestFiveRegisteredUsers(){
        return self::with('role')->where('role_id','=','2')->orderByDesc('created_at')->take(5)->get();

    }


}
