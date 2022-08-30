<?php

namespace App\Models;

use App\Enums\TableLocation;
use App\Enums\TableStatus;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Table
 *
 * @property int $id
 * @property string $name
 * @property int $guest_number
 * @property TableStatus $status
 * @property TableLocation $location
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Table newModelQuery()
 * @method static Builder|Table newQuery()
 * @method static Builder|Table query()
 * @method static Builder|Table whereCreatedAt($value)
 * @method static Builder|Table whereGuestNumber($value)
 * @method static Builder|Table whereId($value)
 * @method static Builder|Table whereLocation($value)
 * @method static Builder|Table whereName($value)
 * @method static Builder|Table whereStatus($value)
 * @method static Builder|Table whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Reservation[] $reservations
 * @property-read int|null $reservations_count
 */
class Table extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'guest_number', 'status', 'location'];

    protected $casts = [
        'status' => TableStatus::class,
        'location' => TableLocation::class
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
