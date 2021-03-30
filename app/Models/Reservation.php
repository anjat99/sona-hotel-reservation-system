<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Reservation
 *
 * @property int $id
 * @property string $sum_price
 * @property int $user_id
 * @property int $room_service_id
 * @property string $check_in
 * @property string $check_out
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereCheckIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereCheckOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereRoomServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereSumPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereUserId($value)
 * @mixin \Eloquent
 */
class Reservation extends Model
{
    use HasFactory;

    protected $table = "reservations";

    protected $fillable = [
        'name',
        'phone',
        'sum_price',
        'user_id',
        'room_id',
        'check_in',
        'check_out'
    ];

    protected $dates = ['check_in', 'check_out'];

    protected $casts = [
        'phone' => 'int'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function room(){
        return $this->belongsTo(Room::class);
    }



}
