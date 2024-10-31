<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class BirthCountry extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'birth_country';

    public $timestamps=false;

    protected $primaryKey = 'birth_id';

    protected $fillable = [
        'birth_id',
        'birth_name'
    ];
   
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Birth Country was {$eventName}";
    }
}
