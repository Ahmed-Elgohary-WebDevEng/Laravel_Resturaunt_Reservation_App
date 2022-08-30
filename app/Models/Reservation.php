<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Reservation
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $tel_number
 * @property string $res_date
 * @property int $table_id
 * @property int $guest_number
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Reservation newModelQuery()
 * @method static Builder|Reservation newQuery()
 * @method static Builder|Reservation query()
 * @method static Builder|Reservation whereCreatedAt($value)
 * @method static Builder|Reservation whereEmail($value)
 * @method static Builder|Reservation whereFirstName($value)
 * @method static Builder|Reservation whereGuestNumber($value)
 * @method static Builder|Reservation whereId($value)
 * @method static Builder|Reservation whereLastName($value)
 * @method static Builder|Reservation whereResDate($value)
 * @method static Builder|Reservation whereTableId($value)
 * @method static Builder|Reservation whereTelNumber($value)
 * @method static Builder|Reservation whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read \App\Models\Table $table
 */
class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'tel_number', 'res_date', 'table_id', 'guest_number'];

    protected $dates = [
        'res_date'
    ];

    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}
