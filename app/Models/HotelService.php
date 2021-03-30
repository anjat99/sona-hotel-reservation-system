<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * App\Models\HotelService
 *
 * @property int $id
 * @property string $img
 * @property string $title
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|HotelService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HotelService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HotelService query()
 * @method static \Illuminate\Database\Eloquent\Builder|HotelService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotelService whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotelService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotelService whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotelService whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HotelService whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class HotelService extends Model
{
    use HasFactory;

    public static function getHotelServices(){
        return self::all()->take(6);
    }
    public static function uploadImage($image){
        $path = Storage::disk('public')->putFile('assets/img/hotel-services', $image);
        $exploded = explode('/', $path);
        return $exploded[count($exploded) - 1];
    }

    public static function deleteImage($image){
        Storage::disk('public')->delete('assets/img/hotel-services' . $image);
    }
}
