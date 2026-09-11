<?php 
namespace App\Repositories;

use App\Models\Shoe;
use App\Repositories\Contracts\ShoeRepositoryInterface;
use Override;

class ShoeRepository implements ShoeRepositoryInterface {
  public function getPopularShoes($limit = 4)
  {
    return Shoe::where('is_popular', true)->take($limit)->get(); // mencari sepatu yang populer dengan limit nya 4
  }
  public function getAllNewShoes()
  {
    return Shoe::latest()->get(); // mengambil data sepatu terbaru
  }
  public function find($id)
  {
    return Shoe::find($id); // mengambil sepatu bedasarkan var id
  }
  public function getPrice($shoeId)
  {
    $shoe = $this->find($shoeId); // mencari harga sepatu bedasarkan id
    return $shoe ? $shoe->price : 0 ; // kalau ada...
  }
}