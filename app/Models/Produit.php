<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    public $timestamps= false ;
    protected $fillable =['Nom_Produit','Prix_Produit','Description','Quantite_stocke','Image_Produit'] ;
}
