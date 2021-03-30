<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Newsletter
 *
 * @property int $id
 * @property string $email
 * @property \Illuminate\Support\Carbon $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter query()
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter whereId($value)
 * @mixin \Eloquent
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Newsletter whereUpdatedAt($value)
 */
class Newsletter extends Model
{
    use HasFactory;
}
