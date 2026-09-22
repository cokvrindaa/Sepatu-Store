<div class="w-full max-w-2xl space-y-6">
    <img src="{{ Storage::url($shoe->photos()->latest()->first()->photo) }}" class="w-full max-w-[260px] h-[160px] object-contain mx-auto" alt="Nike Air Humara Shoes">
    <form action="customer-data.html" class="bg-white rounded-3xl shadow border p-6 space-y-4" id="booking-form">
      <h2 class="text-xl font-bold">{{ $shoe->name }}</h2>
      <p class="text-gray-600">Rp. {{ number_format($shoe->price) }} • {{ $orderData['shoe_size'] }}</p>
      <div class="flex items-center text-yellow-400 mb-2"><span>★★★★☆</span></div>
      <hr class="border-gray-200">
      <div class="flex items-center bg-white rounded-full border border-gray-200 px-4 py-2 focus-within:ring-2 focus-within:ring-[#FFC700]">
        <img src="{{ asset('assets/images/icons/user.svg') }}" class="w-5 h-5 mr-2" alt="user">
        <input type="text" wire:model="name" name="name" placeholder="Complete Name" class="w-full outline-none" required>
        @error('name')
          <span class="text-red-500">{{ $message }}</span>
        @enderror
      </div>
      <div class="flex items-center bg-white rounded-full border border-gray-200 px-4 py-2 focus-within:ring-2 focus-within:ring-[#FFC700]">
        <img src="{{ asset('assets/images/icons/sms.svg') }}" class="w-5 h-5 mr-2" alt="email">
        <input wire:model="email" type="email" name="email" placeholder="Email Address" class="w-full outline-none" required>
        @error('email')
          <span class="text-red-500">{{ $message }}</span>
        @enderror
      </div>
      <hr class="border-gray-200">

      <div class="flex items-center gap-2">
        <span class="font-bold">Jumlah :</span>

        {{-- ketika tombol ini diklik akan menjalankan method tsb di OrderForm --}}
        <button type="button" wire:click="decrementQuantity"  class="bg-gray-800 text-white rounded-full w-8 h-8 flex items-center justify-center">-</button>

        <span id="quantity-display" class="text-lg font-medium">{{ $quantity }}</span>

        {{-- intergrasi livewire --}}
        <input type="hidden" wire:model.live.debounce.500ms="quantity" id="quantity" name="quantity" value="1" />

        <button type="button" wire:click="incrementQuantity" class="bg-[#C5F277] text-white rounded-full w-8 h-8 flex items-center justify-center">+</button>
      </div>

      <div class="flex items-center bg-white rounded-full border border-gray-200 px-4 py-2 focus-within:ring-2 focus-within:ring-[#FFC700]">
        <img src="{{ asset('assets/images/icons/discount-shape.svg') }}" class="w-5 h-5 mr-2" alt="promo">
        <input type="text" wire:model.live.debounce.500ms="promoCode"  name="promo" placeholder="Promo Code" class="w-full outline-none" id="promo-input">
      </div>

      <p id="promo-msg" class="text-sm"></p>
      <hr class="border-gray-200">
      <div class="flex justify-between"><span>Sub Total</span><span id="total-price" class="font-bold">Rp {{ number_format($grandTotalAmount) }}</span></div>
      <div class="flex justify-between"><span>Discount</span><span id="discount-value" class="font-bold ">- Rp {{ $discount }}</span></div>
    </form>
    <div class="fixed bottom-4 left-4 right-4 z-50 md:static">
      <div class="flex items-center justify-between rounded-full bg-[#2A2A2A] p-2.5 pl-6 shadow-2xl">
        <div class="flex flex-col">
          <p class="font-extrabold text-lg text-white" id="grand-total">Rp {{ number_format($grandTotalAmount) }}</p>
          <p class="text-[10px] text-gray-400">Grand total</p>
        </div>
        <button type="submit" form="booking-form" class="rounded-full px-6 py-3 bg-[#C5F277] font-extrabold text-sm text-black">
          Continue
        </button>
      </div>
    </div>
</div>
