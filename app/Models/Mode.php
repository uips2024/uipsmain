<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Mode extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'mode';

    public $timestamps=false;

    protected $primaryKey = 'mod_id';

    protected $fillable = [
        'mod_id',
        'mod_desc'
    ];
   
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Mode was {$eventName}";
    }
}
