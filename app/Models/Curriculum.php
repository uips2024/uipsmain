<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Curriculum extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'curriculum';

    public $timestamps=false;

    protected $primaryKey = 'cur_id';

    protected $fillable = [
        'cur_id',
        'cur_desc'
    ];
   
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Curriculum was {$eventName}";
    }
}
