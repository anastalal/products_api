<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use App\Enums\ProductType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Product
 * 
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $type
 * @property string|null $description
 * @property float|null $price
 * @property string|null $sku
 * @property int|null $stock_quantity
 * @property string|null $image
 * @property bool $is_featured
 * @property bool $is_active
 * @property bool $ai_suggested
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|ProductVariation[] $product_variations
 *
 * @package App\Models
 */
class Product extends Model
{
	use HasFactory;
	protected $table = 'products';

	protected $casts = [
		'price' => 'float',
		 'type' => ProductType::class,
		'stock_quantity' => 'int',
		'is_featured' => 'bool',
		'is_active' => 'bool',
		'ai_suggested' => 'bool'
	];

	protected $fillable = [
		'name',
		'slug',
		'type',
		'description',
		'price',
		'sku',
		'stock_quantity',
		'image',
		'is_featured',
		'is_active',
		'ai_suggested'
	];

	public function product_variations()
	{
		return $this->hasMany(ProductVariation::class);
	}
}
