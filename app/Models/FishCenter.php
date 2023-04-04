<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FishCenter extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'fish_centers';

    public const STATUS_SELECT = [
        'Functional' => 'Functional',
        'Broken'     => 'Broken',
        'Lost'       => 'Lost',
    ];

    public const OPERATED_BY_SELECT = [
        'Council'                => 'Council',
        'Fishermen Cooperatives' => 'Fishermen Cooperatives',
    ];

    protected $dates = [
        'date_of_recieval',
        'date_of_monitoring',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'island',
        'operated_by',
        'date_of_recieval',
        'item',
        'quantity',
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

    public function getDateOfRecievalAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfRecievalAttribute($value)
    {
        $this->attributes['date_of_recieval'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
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
