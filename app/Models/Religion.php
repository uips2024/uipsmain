<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Religion extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'religion';

    public $timestamps=false;

    protected $primaryKey = 'rel_id';

    protected $fillable = [
        'rel_id',
        'rel_desc'
    ];
   
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Religion was {$eventName}";
    }
}
