<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductAttributeOption;

use DB;

class ProductAttribute extends Model
{
    use HasFactory;
    protected $table = 'product_attributes';

    protected $fillable = [
        'name', 'slug', 'terms', 'store_id', 'theme_id'
    ];


    public static function slugs($data)
    {
        $slug = '';
        // Remove special characters
        $slug = preg_replace('/[^a-zA-Z0-9\s-]/', '', $data);
        // Replace multiple spaces with a single hyphen
        $slug = preg_replace('/\s+/', '-', trim($slug));
        // Convert to lowercase
        $slug = strtolower($slug);
        $table = with(new ProductAttribute)->getTable();
        $allSlugs = self::getRelatedSlugs($table, $slug ,$id = 0);

        if (!$allSlugs->contains('slug', $slug)) {
            return $slug;
        }
        for ($i = 1; $i <= 100; $i++) {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                return $newSlug;

            }
        }
    }

    protected static function getRelatedSlugs($table, $slug, $id = 0)
    {
        return DB::table($table)->select()->where('slug', 'like', $slug . '%')->where('id', '<>', $id)->get();
    }

    public function attributeOptions()
    {
        return $this->hasMany(ProductAttributeOption::class, 'attribute_id')->orderBy('order','asc');
    }

}