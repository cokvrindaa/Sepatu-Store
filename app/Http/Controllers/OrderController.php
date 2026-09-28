<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCheckBookingRequest;
use App\Http\Requests\StoreCustomerDataRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\StorePaymentRequest;
use App\Models\ProductTranscations;
use App\Models\Shoe;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;
    
    public function __construct(OrderService $orderService) {
        $this->orderService = $orderService;
    }

    // StoreOrderRequest kita harus buat dengan php artisan make:request StoreOrderRequest
    public function saveOrder(StoreOrderRequest $request, Shoe $shoe) {

        // melakukan validasi 
        $validated = $request->validated();
        
        // Penyimpanan ke service lalu di simpan di repository yang berkomunikasi ke model dan db 
        $validated['shoe_id'] = $shoe->id;
        $this->orderService->beginOrder($validated);
        
        return redirect()->route('front.booking');
    }

    // mengampilkan data data customer dan detail booking data
    public function booking() {
        $data = $this->orderService->getOrderDetails();
        return view('order.order' , $data);
    }

    public function customerData() {
        $data = $this->orderService->getOrderDetails();
        // dd($data);
        return view('order.customer_data', $data);
    }

    // menyimpan data 
    public function saveCustomerData(StoreCustomerDataRequest $request){
        // validasi
        $validated = $request->validated();
        // update data
        $this->orderService->updateCustomerData($validated);
        
        return redirect()->route('front.payment');
    }
    
    // menampilkan data payment
    public function payment() {
        $data = $this->orderService->getOrderDetails();
        // dd($data);
        return view('order.payment', $data);
    }

    public function paymentConfirm(StorePaymentRequest $request) {
        $validated = $request->validated();
        $productTranscationId = $this->orderService->paymentConfirm($validated);
        
        // jika berhasil arahkan ke order finished
        if($productTranscationId) {
            return redirect()->route('front.order_finished', $productTranscationId);
        }

        return redirect()->route('front.index')->withErrors(['error' => 'Pembayaran gagal, bisa coba lagi yah']);
    }
    
    public function orderFinished(ProductTranscations $productTransaction){
        return view('order.order_finished', compact('productTransaction'));
    }

    // cek booking
    public function checkBooking() {
        return view('order.my_order');
    }
    
    public function checkBookingDetails(StoreCheckBookingRequest $request){
        // validasi data
        $validated = $request->validated();
        
        $orderDetails = $this->orderService->getMyOrderDetails($validated);
        
        if($orderDetails) {
            return view('order.my_order_details', compact('orderDetails'));
        }
        
        return redirect()->route('front.check_booking')->withErrors(['error' => 'transcation not found']);
    }

}