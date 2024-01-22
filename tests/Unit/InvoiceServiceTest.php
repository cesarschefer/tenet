<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\InvoiceService;

class InvoiceServiceTest extends TestCase
{
    public function testCalculateInvoice()
    {
        $invoiceService = new InvoiceService();
        $result = $invoiceService->calculateInvoice();

        $this->assertArrayHasKey('invoice_details', $result);
        $this->assertArrayHasKey('total_cost', $result);
    }
}
