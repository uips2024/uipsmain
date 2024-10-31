<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'category';

    public $timestamps=false;

    protected $primaryKey = 'cat_id';

    protected $fillable = [
        'cat_id',
        'cat_desc'
    ];
   
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Category was {$eventName}";
    }
}
