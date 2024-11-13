<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Location extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'location';

    public $timestamps=false;

    protected $primaryKey = 'loc_id';

    protected $fillable = [
        'loc_id',
        'loc_desc'
    ];
   
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Location was {$eventName}";
    }
}
