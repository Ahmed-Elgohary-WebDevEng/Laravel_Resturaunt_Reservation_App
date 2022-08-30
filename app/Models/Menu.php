<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Menu
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property string $price
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Category[] $categories
 * @property-read int|null $categories_count
 * @method static Builder|Menu newModelQuery()
 * @method static Builder|Menu newQuery()
 * @method static Builder|Menu query()
 * @method static Builder|Menu whereCreatedAt($value)
 * @method static Builder|Menu whereDescription($value)
 * @method static Builder|Menu whereId($value)
 * @method static Builder|Menu whereImage($value)
 * @method static Builder|Menu whereName($value)
 * @method static Builder|Menu wherePrice($value)
 * @method static Builder|Menu whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'price'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_menu');
    }
}
