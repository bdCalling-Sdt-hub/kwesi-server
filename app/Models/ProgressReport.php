<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        "changePharmecyInformation",
        "startWeight",
        'currentWeight',
        "goalWeight",
        "bloodPressure",
        "otherPrescribedMedication",
        "refill",
        "symptomsWithWeightLossMedication",
        "enterThePharmacyName",
        "prefarableTime",
        "knowledge"
      ];
}
