<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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

    /**
     * @return HasMany
     */
    public function translations(): HasMany
    {
        return $this->hasMany(TodoTranslation::class);
    }

    /**
     * @return HasOne
     */
    public function getTranslation()
    {
        /** @var Language $language */
        $languageId = session('language_id', 0);

        return $this->hasOne(TodoTranslation::class)
            ->where('language_id', $languageId);  // Or any other condition;
    }
}
