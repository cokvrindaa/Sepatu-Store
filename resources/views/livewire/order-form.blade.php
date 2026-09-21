<div class="w-full max-w-2xl space-y-6">
    <img src="{{ Storage::url($shoe->photos()->latest()->first()->photo) }}" class="w-full max-w-[260px] h-[160px] object-contain mx-auto" alt="Nike Air Humara Shoes">
    <form action="customer-data.html" class="bg-white rounded-3xl shadow border p-6 space-y-4" id="booking-form">
      <h2 class="text-xl font-bold">{{ $shoe->name }}</h2>
      <p class="text-gray-600">Rp. {{ number_format($shoe->price) }} • {{ $orderData['shoe_size'] }}</p>
      <div class="flex items-center text-yellow-400 mb-2"><span>★★★★☆</span></div>
      <hr class="border-gray-200">
      <div class="flex items-center bg-white rounded-full border border-gray-200 px-4 py-2 focus-within:ring-2 focus-within:ring-[#FFC700]">
        <img src="{{ asset('assets/images/icons/user.svg') }}" class="w-5 h-5 mr-2" alt="user">
        <input type="text" name="fullname" placeholder="Complete Name" class="w-full outline-none" required>
      </div>
      <div class="flex items-center bg-white rounded-full border border-gray-200 px-4 py-2 focus-within:ring-2 focus-within:ring-[#FFC700]">
        <img src="{{ asset('assets/images/icons/sms.svg') }}" class="w-5 h-5 mr-2" alt="email">
        <input type="email" name="email" placeholder="Email Address" class="w-full outline-none" required>
      </div>
      <hr class="border-gray-200">
      <div class="flex items-center gap-2">
        <span class="font-bold">Jumlah :</span>
        <button type="button" id="minus" class="bg-gray-800 text-white rounded-full w-8 h-8 flex items-center justify-center">-</button>
        <span id="quantity-display" class="text-lg font-medium">1</span>
        <input type="hidden" id="quantity" name="quantity" value="1" />
        <button type="button" id="plus" class="bg-[#C5F277] text-white rounded-full w-8 h-8 flex items-center justify-center">+</button>
      </div>
      <div class="flex items-center bg-white rounded-full border border-gray-200 px-4 py-2 focus-within:ring-2 focus-within:ring-[#FFC700]">
        <img src="{{ asset('assets/images/icons/discount-shape.svg') }}" class="w-5 h-5 mr-2" alt="promo">
        <input type="text" name="promo" placeholder="Promo Code" class="w-full outline-none" id="promo-input">
      </div>
      <p id="promo-msg" class="text-sm"></p>
      <hr class="border-gray-200">
      <div class="flex justify-between"><span>Sub Total</span><span id="total-price" class="font-bold">Rp 5.128.000</span></div>
      <div class="flex justify-between"><span>Discount</span><span id="discount-value" class="font-bold ">- Rp 900.000</span></div>
    </form>
    <div class="fixed bottom-4 left-4 right-4 z-50 md:static">
      <div class="flex items-center justify-between rounded-full bg-[#2A2A2A] p-2.5 pl-6 shadow-2xl">
        <div class="flex flex-col">
          <p class="font-extrabold text-lg text-white" id="grand-total">Rp 4.228.000</p>
          <p class="text-[10px] text-gray-400">Grand total</p>
        </div>
        <button type="submit" form="booking-form" class="rounded-full px-6 py-3 bg-[#C5F277] font-extrabold text-sm text-black">
          Continue
        </button>
      </div>
    </div>
</div>
