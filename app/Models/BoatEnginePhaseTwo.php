<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoatEnginePhaseTwo extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'boat_engine_phase_twos';

    protected $dates = [
        'date_of_receival',
        'date_of_monitoring',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const BOAT_STATUS_SELECT = [
        'Functional' => 'Functional',
        'Down'       => 'Down',
        'Broken'     => 'Broken',
        'Lost'       => 'Lost',
    ];

    public const ENGINE_STATUS_SELECT = [
        'Functional' => 'Functional',
        'Down'       => 'Down',
        'Broken'     => 'Broken',
        'Lost'       => 'Lost',
    ];

    protected $fillable = [
        'date_of_receival',
        'island',
        'no_of_share',
        'ward',
        'recipients',
        'boat_status',
        'engine_status',
        'date_of_monitoring',
        'remarks',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getDateOfReceivalAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfReceivalAttribute($value)
    {
        $this->attributes['date_of_receival'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateOfMonitoringAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfMonitoringAttribute($value)
    {
        $this->attributes['date_of_monitoring'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
