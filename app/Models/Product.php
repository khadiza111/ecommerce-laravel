<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = [
		'id', 'title', 'description', 'slug', 'quantity', 'price'
	];

	public function images()
	{
		return $this->hasMany(ProductImage::class);
	}

	public function criterias()
	{
		return $this->belongsTo(ProductCriteria::class);
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}
	
	public function brand()
	{
		return $this->belongsTo(Brand::class);
	}	
}
