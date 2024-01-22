<?php

namespace App\Http\Controllers;

use App\Models\Consumption;
use App\Services\InvoiceService;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    private InvoiceService $invoiceService;

    public function __construct(InvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }
    public function generateInvoice(): \Illuminate\Http\JsonResponse
    {
        $invoiceData = $this->invoiceService->calculateInvoice();

        return response()->json([
            'message' => 'Invoice generated successfully',
            'invoice_details' => $invoiceData['invoice_details'],
            'total_cost' => $invoiceData['total_cost'],
        ]);

    }
}
