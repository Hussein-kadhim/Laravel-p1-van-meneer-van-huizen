<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property-read Order $order
 * @property-read Product $product
 *
 * @mixin Builder
 *
 * @method static \App\Models\Orderrow create(array $attributes = [])
 * @method static \App\Models\Orderrow findOrFail(mixed $id)
 */
class Orderrow extends Model
{
    public $timestamps = false;

    protected $table = 'orderrow';

    protected $fillable = [
        'order_id',
        'product_id',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}

if (! class_exists('App\Models\OrderRow', false)) {
    class_alias(Orderrow::class, 'App\Models\OrderRow');
}
