<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RoomService
 *
 * @method static \Illuminate\Database\Eloquent\Builder|RoomService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoomService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoomService query()
 * @mixin \Eloquent
 */
class RoomService extends Model
{
    use HasFactory;

    protected $table = "room_service";

}
