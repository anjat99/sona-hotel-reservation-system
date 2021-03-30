<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SocialMedia
 *
 * @property int $id
 * @property string $path
 * @property string $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|SocialMedia newModelQuery()
 * @method static Builder|SocialMedia newQuery()
 * @method static Builder|SocialMedia query()
 * @method static Builder|SocialMedia whereCreatedAt($value)
 * @method static Builder|SocialMedia whereIcon($value)
 * @method static Builder|SocialMedia whereId($value)
 * @method static Builder|SocialMedia wherePath($value)
 * @method static Builder|SocialMedia whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SocialMedia extends Model
{
    use HasFactory;

    public static function getSocialMedia(){
        return self::all();
    }
}
