<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListOfMinistryProject extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'list_of_ministry_projects';

    protected $dates = [
        'date_of_implementation',
        'date_of_monitoring',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name_of_the_project',
        'island',
        'date_of_implementation',
        'budget',
        'location_village',
        'recipients',
        'status',
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

    public function getDateOfImplementationAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfImplementationAttribute($value)
    {
        $this->attributes['date_of_implementation'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
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
