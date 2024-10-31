<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use Notifiable;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
       
        'id_number',
        'password_char',
        'email ',
        'signature',
        'first_name',
        'middle_name',
        'last_name',
        'user_id',
        'username',
        'dob',
        'gen_id',
        'nat_id',
        'birth_id',
        'rel_id',
        'cat_id',
        'stat_id',
        'lrn',
        'pic_emp',
        'cont_additional_email_address',
        'cont_address',
        'cont_email_address',
        'parent_additional_email',
        'parent_additional_phone',
        'parent_address',
        'parent_email',
        'parent_name',
        'parent_phone',
        'updated_at',
        'created_at',
        'deleted_at'

    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * roles relationship
     *
     * @var array
     */
    public function religion()
    {
        return $this->belongsTo(Religion::class,'rel_id','rel_id')->withTrashed();
    }
    public function status()
    {
        return $this->belongsTo(Status::class,'stat_id','stat_id')->withTrashed();
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'cat_id','cat_id')->withTrashed();
    }
    public function birthcountry()
    {
        return $this->belongsTo(BirthCountry::class,'birth_id','birth_id')->withTrashed();
    }
    public function nationality()
    {
        return $this->belongsTo(Nationality::class,'nat_id','nat_id')->withTrashed();
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class,'gen_id','gen_id')->withTrashed();
    }
    public function roles()
    {
        return $this->hasMany(UserRole::class,'user_id','id');
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        return "User was {$eventName}";
    }

  
}
