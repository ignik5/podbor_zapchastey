<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Zapchast extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['name', 'code', 'article', 'link', 'product_id','updated_at', 'created_at', 'deleted_at'];

    public function Product()
{
    return $this->belongsTo(Product::class, 'product_id')->first();//функция ля получения компании
}
}
