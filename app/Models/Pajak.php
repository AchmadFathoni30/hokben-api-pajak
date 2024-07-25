<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pajak extends Model
{
    use HasFactory;

    protected $table = 'api_pajak';

    protected $fillable = [
        'no_transaksi',
        'no_bill',
        'trans_date',
        'jam',
        'gross_sales',
        'sales_discount',
        'item_discount',
        'service',
        'tax',
        'sub_total',
        'rounding',
        'status',
        'branch_id',
        'valid_status',
        'tacharge'];

    protected $primaryKey = 'id';
}
