<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pajak;

class PajakController extends Controller
{
    public function getDataSalesComplete(Request $request)
    {
        $branch_id = $request->query('branch_id');
        $trans_date = $request->query('trans_date');

        if (!$branch_id || !$trans_date) {
            return response()->json([
                'error' => 'Harap isi branch_id dan trans_date'
            ], 400);
        }

        $query = DB::table('api_pajak')
        ->select([
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
            'tacharge',
            'nmhhb'])
        ->where('branch_id', $branch_id)
        ->whereDate('trans_date', $trans_date)
        ->get();

        $mappedData = $query->map(function ($item) {
            $item->status_description = $item->valid_status == 1 ? 'Sales Complete' : 'Sales Void';
            return $item;
        });

        return response()->json($mappedData);
    }
}
