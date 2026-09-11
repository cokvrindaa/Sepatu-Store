<?php

namespace App\Repositories;

use App\Models\ProductTranscations;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Support\Facades\Session;
use Override;

class OrderRepository implements OrderRepositoryInterface
{
  // $data didapatkan dari service...
  public function createTranscation(array $data)
  {
    return ProductTranscations::create($data); //menjalankan eloquent create yang diarahkan kemodel ProductTranscactions bedasarkan filable
  }
  // 
  public function findByTrxIdAndPhoneNumber($bookingTrxId, $phoneNumber)
  {
    // mencari bookingtrxid dan juga phone numbernya bedasarkan variabel
    return ProductTranscations::where('booking_trx_id', $bookingTrxId)
      ->where('phone_number', $phoneNumber)
      ->first(); //hanya ada 1 record data ajah
  }
  
  // Menyiman ke sesi ketika kita order data
  public function saveToSession(array $data)
  {
    Session::put('orderData', $data);
  }
  
  // mengambil data orderdata dari sesi
  public function getOrderDataFromSession()
  {
    return session('orderData', []);
  }
  
  // melakukan update jika data berubah
  public function updateSessionData(array $data)
  {
    $orderData = session('orderData', []);
    $orderData = array_merge($orderData, $data);
    session(['orderData' => $orderData]);
  }
}