<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class NumberSibling extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'numbersibling';

    public $timestamps=false;

    protected $primaryKey = 'sib_id';

    protected $fillable = [
        'sib_id',
        'sib_desc'
    ];
   
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Sibling was {$eventName}";
    }
}
