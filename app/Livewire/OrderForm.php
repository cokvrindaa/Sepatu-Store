<?php

namespace App\Livewire;

use App\Models\Shoe;
use App\Services\OrderService;
use Livewire\Component;

class OrderForm extends Component
{
    public Shoe $shoe;

    public $orderData;

    public $subTotalAmount;

    public $promoCode = null;

    public $promoCodeId = null;

    public $quantity = 1;

    public $discount = 0;

    public $grandTotalAmount = 0;

    public $totalDiscountAmount = 0;

    public $name;

    public $email;

    protected $orderService;

    // menggambil data dari order serivce yang udah nyimpen ke session
    public function boot(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function mount(Shoe $shoe, $orderData)
    {
        $this->shoe = $shoe;
        $this->orderData = $orderData;
        $this->subTotalAmount = $shoe->price;
        $this->grandTotalAmount = $shoe->price;
    }

    // kita menggunakan fungsi bawaan dari livewire yakni updated disambung dengan nama model yakni Quantity
    // wire:model.live.debounce.500ms="quantity"
    public function updatedQuantity()
    {
        $this->validateOnly('quantity', [
            // mengecek apakah qunatity yang di input dari pengguna itu melebih batas dari stok?
            'quantity' => 'required|integer|min:1|max:'.$this->shoe->stock,
        ], [
            // jika lebih dari batas tampilkan teks stok tak tersedia
            'quantity.max' => 'Stok tak tersedia',
        ]
        );

        $this->calculateTotal();
    }

    protected function calculateTotal(): void
    {
        $this->subTotalAmount = $this->shoe->price * $this->quantity;
        $this->grandTotalAmount = $this->subTotalAmount - $this->discount;
    }

    // ketika button dari blade.php di klik menggunakan wire:click

    public function incrementQuantity()
    {
        if ($this->quantity < $this->shoe->stock) {
            $this->quantity++;
            $this->calculateTotal();
        }
    }

    public function decrementQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
            $this->calculateTotal();
        }
    }

    // diggunakan untuk update secara realtime , dari method bawaan livewire yakni updated
    // fungsi ini dipanggil dari blade.php dengan wire:model.live.debounce.500ms="promoCode"

    public function updatedPromoCode()
    {
        $this->applyPromoCode();
    }

    public function applyPromoCode()
    {

        // jika promoCode tidak tersedia
        if (! $this->promoCode) {
            $this->resetDiscount();

            return;
        }

        // mengirimkan data ke order service
        $result = $this->orderService->applyPromoCode($this->promoCode, $this->subTotalAmount);

        // mengganti data frontend bedasarkan kondisi backend
        if (isset($result['error'])) {
            session()->flash('error', $result['error']);
            $this->resetDiscount();
        } else {
            session()->flash('message', 'Kode promo tersedia!');
            $this->discount = $result['discount'];
            $this->calculateTotal();
            $this->promoCodeId = $result['promoCodeId'];
            $this->totalDiscountAmount = $result['discount'];
        }
    }

    protected function resetDiscount()
    {
        $this->discount = 0;
        $this->calculateTotal();
        $this->promoCodeId = null;
        $this->totalDiscountAmount = 0;
    }

    // validasi
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'quantity' => 'required|int|min:1|max:'.$this->quantity,
        ];
    }

    // method ini akan dipanggil ke method submit
    protected function gatherBookingData(array $validatedData): array
    {
        return [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'grand_total_amount' => $this->grandTotalAmount,
            'sub_total_amount' => $this->subTotalAmount,
            'total_discount_amount' => $this->totalDiscountAmount,
            'promo_code' => $this->promoCode,
            'promo_code_id' => $this->promoCodeId,
            'discount' => $this->discount,
            'quantity' => $this->quantity,
        ];
    }
    
    // dipanggil oleh wire:submit.prevent="submit" di blade.php
    public function submit()
    {   
        // melakukan pemanggilan method sebelumnya, dan mengirim data ke orderService dengan method updateCustomerData
        // updateCustomerData  memanggil updateSessionData di Repository
        // data akan simpan ke session 
        $validatedData = $this->validate();
        $bookingData = $this->gatherBookingData($validatedData);
        $this->orderService->updateCustomerData($bookingData);

        return redirect()->route('front.customer_data');
    }

    public function render()
    {
        return view('livewire.order-form');
    }
}