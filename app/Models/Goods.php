<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Goods extends Model{
	use SoftDeletes;
    protected $table='goods';

    protected $fillable=['img','name','appleid','price','number','url','status'];
    
}