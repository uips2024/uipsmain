<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Reservation extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'reservation';

    public $timestamps=false;

    protected $primaryKey = 'id';

    protected $fillable = [
        'rsvpid',
        'dtadd',
        'type',
        'kgsession',
        'acadtrack',
        'acadtrack2',
        'school_year',
        'reservationno',
        'gradelevel',
        'fname',
        'mname',
        'lname',
        'nsuffix',
        'gender',
        'bdate',
        'birthplace',
        'nationality',
        'mothertongue',
        'religion',
        'address',
        'addressarea',
        'emirates',
        'pobox',
        'makanino',
        'landmark',
        'telephone',
        'dadname',
        'dadjob',
        'dademployer',
        'dadmobile',
        'dadsms',
        'dademail',
        'momname',
        'momjob',
        'momemployer',
        'mommobile',
        'momsms',
        'momemail',
        'lastschool',
        'lastschoolcurriculum',
        'lastschoolaverage',
        'lastschoollocation',
        'reasonforleaving',
        'lastschoolidno',
        'transfereedubai',
        'regno',
        'kinno',
        'clientinfo',
        'tosync',
        'receiptno',
        'dtdeleted',
        'dtmodified',
        'assess_date',
        'assess_time',
        'assess_sched_for_email',
        'assess_result1',
        'assess_result_date1',
        'assess_result_remarks1',
        'assess_result2',
        'assess_result_date2',
        'assess_result_remarks2',
        'assess_result3',
        'assess_result_date3',
        'assess_result_remarks3',
        'summer',
        'summer_batch_code',
        'summer_note',
        'summer_payment_date',
        'summer_payment_receiptno',
        'cancelled',
        'dtcancelled',
        'onhold',
        'dtonhold',
        'remarks',
        'econtact',
        'eother_name',
        'eother_mobile',
        'eother_relationship',
        'specialneeds_remarks',
        'allergy_remarks',
        'sensitivity_remarks',
        'updatedfromheadstart',
        'passport_no',
        'passport_expdate',
        'visa_no',
        'visa_expdate',
        'eid_no',
        'eid_expdate',
        'dadpassport_no',
        'dadpassport_expdate',
        'dadvisa_no',
        'dadvisa_expdate',
        'dadeid_no',
        'dadeid_expdate',
        'mompassport_no',
        'mompassport_expdate',
        'momvisa_no',
        'momvisa_expdate',
        'momeid_no',
        'momeid_expdate',
        'visasponsor',
        'visasponsorother_name',
        'visasponsorother_mobile',
        'visasponsorother_relationship',
        'visaonprocess',
        'eidonprocess',
        'is_proceed',
        'dadvisaonprocess',
        'dadeidonprocess',
        'momvisaonprocess',
        'momeidonprocess',
        'dadtelephone',
        'momtelephone',
        'allowvaccination',
        'transportation',
        'dtadmissionform',
        'transpocontactperson',
        'transpocontactno',
        'latitude',
        'longitude',
        'gradelevel_id',
        'section',
        'section2',
        'buspickup',
        'busdropoff',
        'enrreceiptdate',
        'enrreceiptno',
        'enriscancelled',
        'enrdtcancelled',
        'enrcancelledreason',
        'enrolled',
        'pickup_bus_id',
        'pickup_area',
        'dropoff_bus_id',
        'dropoff_area',
        'lastdropoff',
        'type_id',
        'pu1_bus_id',
        'do1_bus_id',
        'pu2_bus_id',
        'do2_bus_id',
        'pu1_area',
        'pu2_area',
        'do2_area',
        'transpoencoded',
        'transpocanceldate',
        'transpocancelremarks',
        'reserve_session',
        'reserve_time',
        'mol',
        'LRN',
        'deleted_at',
        'updated_at',
        'created_at'

    ];
   
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Reservation was {$eventName}";
    }
    public function nationality()
    {
        return $this->belongsTo(Nationality::class,'nat_id','nat_id')->withTrashed();
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class,'gen_id','gen_id')->withTrashed();
    }
    public function studenttype()
    {
        return $this->belongsTo(StudentType::class,'type','stud_type_id')->withTrashed();
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class,'gradelevel','grd_id')->withTrashed();
    }
    public function mode()
    {
        return $this->belongsTo(Mode::class,'mod_id','mod_id')->withTrashed();
    }
    public function numbersibling()
    {
        return $this->belongsTo(NumberSibling::class,'sib_id','sib_id')->withTrashed();
    }
    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class,'cur_id','cur_id')->withTrashed();
    }
}
