<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProofOfDelivery extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'proof_of_delivery';
    protected $fillable = [
        'branch_name',
        'invoice_no',
        'customer_name',
        'invoice_amount',
        'quantity'
    ];

    public function deliveryData(){
        return $this->hasOne(ProofOfDeliveryData::class, 'pod_id', 'id');
    }
}
