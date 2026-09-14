<?php

namespace App\Services;

use App\Models\ProductTranscations;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Contracts\PromoCodeRepositoryInterface;
use App\Repositories\ShoeRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderService
{
    protected $categoryRepository;

    protected $promoCodeRepository;

    protected $orderRepository;

    protected $shoeRepository;

    // inject
    public function __construct(PromoCodeRepositoryInterface $promoCodeRepository, CategoryRepositoryInterface $categoryRepository, OrderRepositoryInterface $orderRepository, ShoeRepository $shoeRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->promoCodeRepository = $promoCodeRepository;
        $this->orderRepository = $orderRepository;
        $this->shoeRepository = $shoeRepository;
    }

    // ketika ini di panggil , maka akan memanggil method saveToSession di orderRepository
    public function beginOrder(array $data)
    {
        $orderData = [
            'shoe_size' => $data['shoe_size'],
            'size_id' => $data['size_id'],
            'shoe_id' => $data['shoe_id'],
        ];
        $this->orderRepository->saveToSession($orderData);
    }

    // untuk bagian menampilkan detail barang order
    public function getOrderDetails()
    {
        $orderData = $this->orderRepository->getOrderDataFromSession();
        $shoe = $this->shoeRepository->find($orderData['shoe_id']);

        // set deafultnya 1
        $quantity = isset($orderData['quantity']) ? $orderData['quantity'] : 1;
        $subTotalAmount = $shoe->price * $quantity;

        // menghitung pajak
        $taxRate = 0.11;
        $totalTax = $subTotalAmount * $taxRate;

        $grandTotalAmount = $subTotalAmount + $totalTax;

        $orderData['sub_total_amount'] = $subTotalAmount;
        $orderData['total_tax'] = $totalTax;
        $orderData['grand_total_amount'] = $grandTotalAmount;

        return compact('orderData', 'shoe');
    }

    // Memeriksa / validasi kode promo
    public function applyPromoCode(string $code, int $subTotalAmount) {
      $promo = $this->promoCodeRepository->findByCode($code);
      // jika kode promo ada maka akan mengurangi nilai berdasarkan besarnya diskon
      if ($promo) {
        $discount = $promo->discount_amount;
        $grandTotalAmount = $subTotalAmount - $discount;
        $promoCodeId = $promo->id;
        return ['discount' => $discount, 'grandTotalAmount' => $grandTotalAmount, 'promoCodeId' => $promoCodeId];
      }
      // jika tidak ditemukan
      return ['error' => 'Kode promo ga ada cuyy'];
    }
    
    public function saveBookingTransaction(array $data) {
      $this->orderRepository->saveToSession($data);
    }
    
    public function updateCustomerData(array $data){
      $this->orderRepository->updateSessionData($data);
    }
    
    // mengkonfirmasi pembayaran
    public function paymentConfirm(array $validated) {
      // mengambil data di session
      $orderData = $this->orderRepository->getOrderDataFromSession();
      $productTranscationId = null;
      
      try { 
        // DB::transaction digunakan untuk menghindari kekosangan data
        DB::transaction( function() use ($validated, &$productTranscationId, $orderData) {
          if (isset($validated['proof'])) {
            // mengambil path dari bukti ke foto 
            $proofPath = $validated['proof']->store('proofs', 'public');
            $validated['proof'] = $proofPath;
          }
          
          // mengisi data ke db dengan orderData dari session
          $validated['name'] = $orderData['name'];
          $validated['phone'] = $orderData['phone'];
          $validated['email'] = $orderData['email'];
          $validated['booking_trx_id'] = ProductTranscations::genereateUniqeTrxId();
          $validated['city'] = $orderData['city'];
          $validated['post_code'] = $orderData['post_code'];
          $validated['proof'] = $orderData['proof'];
          $validated['address'] = $orderData['address'];
          $validated['quantity'] = $orderData['quantity'];
          $validated['sub_total_amount'] = $orderData['sub_total_amount'];
          $validated['grand_total_amount'] = $orderData['grand_total_amount'];
          $validated['discount_amount'] = $orderData['discount_amount'];
          $validated['is_paid'] = false;
          $validated['promo_code_id'] = $orderData['promo_code_id'];

          $newTranscation = $this->orderRepository->createTranscation($validated);
          
          $productTranscationId = $newTranscation->id;
        });
      } catch (\Exception $e){
        Log::error('Eror Pembayaran: '. $e->getMessage() );
        session()->flash('error', $e->getMessage());
        return null;
      }
      return $productTranscationId;
    }
}