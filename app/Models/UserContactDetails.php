<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class UserContactDetails extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'user_contact_details';

    public $timestamps=false;

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_master_id',
        'email_address',
         'add_email_address',
          'address'
    ];
   
    
}
