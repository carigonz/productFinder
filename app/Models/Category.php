<?php

namespace App\Models;

use App\Models\Section;
use App\Models\Discount;
use App\Models\Classification;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Classification 
 * 
 * @property string $name
 * @property string|null $description
 * @property Collection $sections
 * @property Classification $classification
 */
class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
        'classification_id'
    ];

    protected $hidden = ['id', 'classification', 'sections'];

    protected $with = [];

    public function discounts()
    {
        return $this->morphMany(Discount::class, 'discountable');
    }

    public function classification()
    {
        return $this->belongsTo(Classification::class, 'classification_id');
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}