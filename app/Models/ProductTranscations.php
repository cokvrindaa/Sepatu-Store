<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductTranscations extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'booking_trx_id',
        'city',
        'post_code',
        'proof',
        'shoe_size',
        'address',
        'quantity',
        'sub_total_amount',
        'grand_total_amount',
        'discount_amount',
        'is_paid',
        'shoe_id',
        'promo_code_id',
    ];

    // membuat genrator untuk uniqe id dari sewa
    public static function genereateUniqeTrxId()
    {
        $prefix = 'ss';
        do {
            $randomString = $prefix.mt_rand(1000, 9999);
        } while (self::where(('booking_trx_id').$randomString)->exists());

        return $randomString;
    }

    public function shoe(): BelongsTo
    {
        return $this->belongsTo(Shoe::class, 'shoe_id');
    }

    public function promoCode(): BelongsTo
    {
        return $this->belongsTo(PromoCode::class, 'promo_code_id');
    }
}
