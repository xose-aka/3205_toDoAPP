<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property boolean is_completed
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Todo extends Model
{
    use HasFactory;
}
