<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UJob extends Model
{
    use HasFactory;
    public static array $experience = ['entry','indermediate','senior'];
    public static array $category = ['IT','Finance','Sales', 'Marketing'];
}
