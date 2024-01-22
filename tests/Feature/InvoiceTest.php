<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvoiceTest extends TestCase
{

    public function testGenerateInvoice()
    {
        $response = $this->get('/api/invoice');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'message',
                'invoice_details' => [
                    '*' => [
                        'id',
                        'service_id',
                        'quantity',
                        'created_at',
                        'cost',
                        'service' => ['id', 'name', 'monthly_cost','unit_cost'],
                    ],
                ],
                'total_cost',
            ]);
    }
}
