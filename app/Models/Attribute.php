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
 * Class Attribute
 * 
 * @property int $id
 * @property string $name
 * @property string|null $slug
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|AttributeValue[] $attribute_values
 *
 * @package App\Models
 */
class Attribute extends Model
{
	use HasFactory;
	protected $table = 'attributes';

	protected $fillable = [
		'name',
		'slug'
	];

	public function attribute_values()
	{
		return $this->hasMany(AttributeValue::class);
	}
}
