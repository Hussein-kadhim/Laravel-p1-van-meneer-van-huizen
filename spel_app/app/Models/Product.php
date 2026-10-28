<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
 
/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $category_id
 *
 * @property-read Category $category
 * @property-read Collection<int, Review> $reviews
 * @property-read Collection<int, Price> $prices
 * @property-read Collection<int, Orderrow> $orderRows
 */
class Product extends Model
{
    public $timestamps = false;
 
    protected $fillable = [
        'name',
        'description',
        'category_id',
    ];
 
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
 
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
 
    public function prices(): HasMany
    {
        return $this->hasMany(Price::class);
    }
 
    public function orderRows(): HasMany
    {
        return $this->hasMany(Orderrow::class);
    }

    /**
     * Controleer of het product verwijderd mag worden.
     * Kan niet verwijderd worden als er nog bestellingen aan gekoppeld zijn.
     */
    public function canDelete(): bool
    {
        if (isset($this->order_rows_count)) {
            return $this->order_rows_count === 0;
        }

        return !$this->orderRows()->exists();
    }
}