<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RatingRoom
 *
 * @property int $id
 * @property int $room_id
 * @property int $user_id
 * @property int $value
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RatingRoom newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RatingRoom newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RatingRoom query()
 * @method static \Illuminate\Database\Eloquent\Builder|RatingRoom whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingRoom whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingRoom whereRoomId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingRoom whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingRoom whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RatingRoom whereValue($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Room $room
 * @property-read \App\Models\User $user
 */
class RatingRoom extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function room(){
        return $this->belongsTo(Room::class);
    }


}
