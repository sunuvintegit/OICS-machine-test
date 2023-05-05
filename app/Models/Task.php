<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Employee;
class Task extends Model
{
    use HasFactory;
   
    protected $table = "task";
    protected $fillable = ['title','description','status','assigned_to'];

    public function employee()
    {
        
        return $this->belongsTo(Employee::class,'assigned_to');
    }
}
