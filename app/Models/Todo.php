<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

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
        $locale = Session::get('locale', app()->getLocale());

        $languageId = 0;

        $language = Language::query()->where('code', $locale)->first();

        if (!is_null($language)) {
            $languageId = $language->id;
        }

        return $this->hasOne(TodoTranslation::class)
            ->where('language_id', $languageId);  // Or any other condition;
    }
}
