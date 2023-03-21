<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected static $product;
    protected static $imageFile, $imageName, $imageDirectory, $imageUrl;

    protected $fillable = ['name', 'price', 'category_name', 'image', 'status'];

    public static function newProducts($request)
    {
        self::$imageFile = $request->file('image');
        self::$imageName = time().rand(10, 1000).self::$imageFile->getClientOriginalName();
        self::$imageDirectory = 'assets/img/upload/';
        self::$imageFile->move(self::$imageDirectory, self::$imageName);
        self::$imageUrl = self::$imageDirectory . self::$imageName;

        self::$product = new Product();
        self::$product->name = $request->name;
        self::$product->price = $request->price;
        self::$product->category_name = $request->category_name;
        self::$product->image = self::$imageUrl;
        self::$product->status = $request->status;
        self::$product->save();

    }

    public static function updateProducts($request, $id)
    {
        self::$product = Product::find($id);

        self::$imageFile = $request->file('image');
        if (isset(self::$imageFile))
        {
            if (file_exists(self::$product->image))
            {
                unlink(self::$product->image);
            }
            self::$imageName = time().rand(10, 1000).self::$imageFile->getClientOriginalName();
            self::$imageDirectory = 'assets/img/upload/';
            self::$imageFile->move(self::$imageDirectory, self::$imageName);
            self::$imageUrl = self::$imageDirectory . self::$imageName;
        } else {
            self::$imageUrl = self::$product->image;
        }

        self::$product->name = $request->name;
        self::$product->price = $request->price;
        self::$product->category_name = $request->category_name;
        self::$product->image = self::$imageUrl;
        self::$product->status = $request->status;
        self::$product->save();
    }
}
