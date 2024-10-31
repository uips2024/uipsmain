<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Status extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'status';

    public $timestamps=false;

    protected $primaryKey = 'stat_id';

    protected $fillable = [
        'stat_id',
        'stat_desc'
    ];
   
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Status was {$eventName}";
    }
}
