<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $fillable = [ 'name', 'email', 'logo', 'website' ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
