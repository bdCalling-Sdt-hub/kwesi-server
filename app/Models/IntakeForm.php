<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntakeForm extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'dateOfBirth',
        'address',
        'phoneNumber',
        'email',
        'contactBy',
        'mailAddWithUser',
        'occupation',
        'reasonOfVisit',
        'allergies',
        'presentMedication',
        'prefarableTime'

      ];
}
