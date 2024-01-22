<?php

namespace App\Services;

use App\Models\Consumption;
use App\Models\Service;

class InvoiceService
{
    public function calculateInvoice(): array
    {
        $consumptions = Consumption::where('created_at', '>=', now()->subDays(15))->get();

        foreach ($consumptions as $consumption) {
            $this->calculateCost($consumption);
        }

        $formattedInvoiceDetails = $consumptions->map(function ($consumption) {
            return [
                'id' => $consumption->id,
                'service_id' => $consumption->service_id,
                'quantity' => $consumption->quantity,
                'created_at' => $consumption->created_at->format('Y-m-d'),
                'cost' => $consumption->cost,
                'service' => $this->formatService($consumption->service),
            ];
        });

        $totalCost = $formattedInvoiceDetails->sum('cost');

        return [
            'invoice_details' => $formattedInvoiceDetails,
            'total_cost' => $totalCost,
        ];
    }

    private function calculateCost(Consumption $consumption) :void
    {
        $service = $consumption->service;

        switch ($service->name) {
            case 'BackOffice service':
                $consumption->cost = round($service->monthly_cost * $consumption->quantity,2);
                break;
            case 'Storage service':
            case 'Proxy service':
            case 'SpeechTranslation':
                $consumption->cost = round($service->unit_cost * $consumption->quantity,2);
                break;
        }
    }

    private function formatService(Service $service): array
    {
        return [
            'id' => $service->id,
            'name' => $service->name,
            'monthly_cost' => $service->monthly_cost,
            'unit_cost' => $service->unit_cost
        ];
    }
}
