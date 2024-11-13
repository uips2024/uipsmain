<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Grade extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'grade';

    public $timestamps=false;

    protected $primaryKey = 'grd_id';

    protected $fillable = [
        'grd_id',
        'grd_desc'
    ];
   
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Grade was {$eventName}";
    }
}
