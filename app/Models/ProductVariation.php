<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductVariation
 * 
 * @property int $id
 * @property int $product_id
 * @property string $sku
 * @property float $price
 * @property int $stock_quantity
 * @property string|null $image
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Product $product
 * @property Collection|AttributeValue[] $attribute_values
 *
 * @package App\Models
 */
class ProductVariation extends Model
{
	use HasFactory;
	protected $table = 'product_variations';

	protected $casts = [
		'product_id' => 'int',
		'price' => 'float',
		'stock_quantity' => 'int'
	];

	protected $fillable = [
		'product_id',
		'sku',
		'price',
		'stock_quantity',
		'image'
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function attribute_values()
	{
		return $this->belongsToMany(AttributeValue::class)
					->withTimestamps();
	}
}
