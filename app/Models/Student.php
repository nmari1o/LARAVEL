<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Smjer;

class Student extends Model
{


    protected $fillable = ['ime', 'prezime'];

    public function student_smjer() {
        return $this->belongsTo(Smjer::class, 'student_smjer');
    }

    use HasFactory;
}
