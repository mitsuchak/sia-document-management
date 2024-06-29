<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProofOfDeliveryData extends Model
{
    use HasFactory;
    protected $table = 'proof_of_delivery_data';
    protected $fillable = [
        'pod_id',
        'delivery_status',
        'file_upload',
        'upload_date',
        'review_status',
    ];

    public function proofData(){
        return $this->hasOne(ProofOfDelivery::class, 'pod_id', 'id');
    }
}
