<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	//
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';



    protected $fillable = ['name', 'description', 'kilos', 'image', 'unit_cost'];


  


}
