<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class MotherLanguage extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'mother_language';

    public $timestamps=false;

    protected $primaryKey = 'lang_id';

    protected $fillable = [
        'lang_id',
        'lang_desc'
    ];
   
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Language was {$eventName}";
    }
}
