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
 * Class AttributeValue
 * 
 * @property int $id
 * @property int $attribute_id
 * @property string $value
 * @property string $slug
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Attribute $attribute
 * @property Collection|ProductVariation[] $product_variations
 *
 * @package App\Models
 */
class AttributeValue extends Model
{
	use  HasFactory;
	protected $table = 'attribute_values';

	protected $casts = [
		'attribute_id' => 'int'
	];

	protected $fillable = [
		'attribute_id',
		'value',
		'slug'
	];

	public function attribute()
	{
		return $this->belongsTo(Attribute::class);
	}

	public function product_variations()
	{
		return $this->belongsToMany(ProductVariation::class)
					->withTimestamps();
	}
}
