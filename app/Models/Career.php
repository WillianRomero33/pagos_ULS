<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Career extends Model
{
    //
    protected $table = 'careers';
    protected $primaryKey = 'id_career';
    
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(
            Student::class,
            'student_career', 
            'id_career', 
            'id_student' 
        )->withPivot(['inscription_date', 'graduation_date', 'is_active']);
    }
}
