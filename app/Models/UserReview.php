<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserReview
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserReview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserReview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserReview query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $room_id
 * @property int $user_id
 * @property int $review_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Review $review
 * @property-read \App\Models\Room $room
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserReview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserReview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserReview whereReviewId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserReview whereRoomId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserReview whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserReview whereUserId($value)
 */
class UserReview extends Model
{
    use HasFactory;

    protected $table = 'user_review';

    public function room(){
        return $this->belongsTo(Room::class);
    }

}
