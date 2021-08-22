<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \App\Models\Catalog;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['name', 'code', 'article','files', 'link', 'catalog_id','updated_at', 'created_at', 'deleted_at'];
    public function Catalog()
    {
        return $this->belongsTo(Catalog::class, 'catalog_id')->first();//функция ля получения компании
    }
    public function zapchact()
    {
        return $this->hasMany(Zapchast::class,'product_id')->get();//фуникция для получения всез сотрудников для одной компании

    }
}
