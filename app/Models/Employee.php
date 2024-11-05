<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = [ 'name', 'email', 'phone', 'profile', 'company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
