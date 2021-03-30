<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * App\Models\Room
 *
 * @property int $id
 * @property string $name
 * @property int $during
 * @property int $size
 * @property string $description
 * @property int $image_id
 * @property int $availability_type_id
 * @property int $price_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Room newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Room newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Room query()
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereAvailabilityTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereDuring($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room wherePriceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Room whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\AvailabilityType $availabilityType
 * @property-read \App\Models\Image $image
 * @property-read \App\Models\Price $price
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\RatingRoom[] $ratingRooms
 * @property-read int|null $rating_rooms_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Service[] $services
 * @property-read int|null $services_count
 * @property-read \App\Models\UserReview|null $userReview
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Review[] $reviews
 * @property-read int|null $reviews_count
 */

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['name','size','description','image_id','availability_type_id','price_id'];

    public static function getRooms()
    {
        return Room::with('image','price','availabilityType','services')->select('t.id as idType','at.id as idAt','t.name as typeName','t.capacity as capacity','rooms.id as id','rooms.name as roomName','rooms.*','p.price as price','at.quantity as quantity')->join('prices as p','rooms.price_id','=','p.id')->join('availability_types as at','rooms.availability_type_id','=','at.id')->join('types as t','at.type_id','=','t.id');
    }

    public static function getRoom($id)
    {
        /** vraca spbu sa detaljima + review-ovi +rating sobe sa userima i ocenom kojom su ocenili sobu **/
        return ['room'=>self::with('image','price','availabilityType','services','reviews')->select('t.id as idType','t.name as typeName','at.id as idAt','rooms.id as id','rooms.name as roomName','rooms.*','t.capacity as capacity')->join('availability_types as at','rooms.availability_type_id','=','at.id')->join('types as t','at.type_id','=','t.id')->find($id), 'reviews'=>Review::with('user')->with('rooms')->join('user_review as ur','reviews.id','=','ur.review_id')->where('ur.room_id','=',$id)->get() ,'ratings'=>RatingRoom::with('user','room')->where('room_id','=',$id)->avg('value')];
    }

    public function image(){
        return $this->belongsTo(Image::class);
    }

    public function price(){
        return $this->belongsTo(Price::class);
    }

    public function availabilityType(){
        return $this->belongsTo(AvailabilityType::class);
    }

    public function services(){
        return $this->belongsToMany(Service::class);
    }

    public function ratingRooms(){
        return $this->hasMany(RatingRoom::class);
    }

    public function reviews(){
        return $this->belongsToMany(Review::class, 'user_review');
    }

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }


    public static function uploadCoverImage($image){
        $path = Storage::disk('public')->putFile('assets/img/room', $image);
        $exploded = explode('/', $path);
        return $exploded[count($exploded) - 1];
    }

    public static function deleteCoverImage($image){
        Storage::disk('public')->delete('assets/img/room' . $image);
    }



    public static function getSortFilterSearchAndPage(Request $request){
        $queryRooms = self::getRooms();

        /** search */
        if($request->has('keyword') && $request->keyword != ""){
            $keyword = $request->keyword;
            $queryRooms = $queryRooms->where('rooms.name','LIKE','%'.$keyword."%");
        }

        /** sort */
        if($request->has('sort') && $request->sort != "0"){

            if($request->sort === "Name ASC"){
                $queryRooms = $queryRooms->orderBy('roomName');
            }elseif ($request->sort === "Name DESC"){
                $queryRooms = $queryRooms->orderByDesc('roomName');
            }
            elseif ($request->sort === "Price ASC"){
                $queryRooms = $queryRooms->orderBy('price');
            }elseif ($request->sort === "Price DESC"){
                $queryRooms = $queryRooms->orderByDesc('price');
            }

        }

        /** filter by services */
        if($request->has('services') && count($request->services) != 0){
            $queryRooms->with('services');
            $services = $request->services;
            if(is_array($services)){
                $queryRooms = $queryRooms->whereHas('services', function($query) use ($services){
                    return $query->whereIn('service_id', $services);
                });
            }
        }

        /** filter by type */
        if($request->has('types') && count($request->types) != 0){
            $queryRooms = $queryRooms->whereIn('t.id', $request->types);
        }

        /** is room available*/
        if($request->has('freeRooms') && $request->freeRooms != ""){
            $queryRooms = $queryRooms->whereHas('availabilityType', function($query){
                return $query->where('quantity', '>',0);
            });
        }

        return $queryRooms;

    }
}
