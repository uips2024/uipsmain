<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Nationality extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'nationality';

    public $timestamps=false;

    protected $primaryKey = 'nat_id';

    protected $fillable = [
        'nat_id',
        'nat_desc'
    ];
   
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Nationality was {$eventName}";
    }
}
