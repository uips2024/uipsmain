<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class StudentType extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'student_type';

    public $timestamps=false;

    protected $primaryKey = 'stud_type_id';

    protected $fillable = [
        'stud_type_id',
        'stud_type_desc'
    ];
   
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Type fo Student was {$eventName}";
    }
}
