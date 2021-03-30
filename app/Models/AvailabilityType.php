<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AvailabilityType
 *
 * @property int $id
 * @property int $quantity
 * @property int $type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AvailabilityType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AvailabilityType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AvailabilityType query()
 * @method static \Illuminate\Database\Eloquent\Builder|AvailabilityType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AvailabilityType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AvailabilityType whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AvailabilityType whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AvailabilityType whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Room[] $room
 * @property-read int|null $room_count
 * @property-read \App\Models\Type $type
 */
class AvailabilityType extends Model
{
    use HasFactory;

    protected $fillable = ["type_id","quantity"];
    public function room(){
        return $this->hasMany(Room::class);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }
}
