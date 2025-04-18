<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection, WithHeadings
{
    public $month;
    public $year;

    public function __construct($month, $year)
    {
        $this->month = $month;
        $this->year = $year;
    }

    /**
     * Return the collection of orders filtered by month and year
     */
    public function collection()
    {
        return Order::with(['customer', 'billingDetails', 'items.product'])
            ->whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month)
            ->get()
            ->map(function ($order) {
                return [
                    'id' => $order->id,
                    'customer_name' => $order->customer ? $order->customer->fname . ' ' . $order->customer->lname : 'N/A',
                    'product_name' => $order->items->isNotEmpty() ? $order->items->pluck('product_name')->implode(', ') : 'No products',
                    'quantity' => $order->items->sum('quantity'),
                    'total_price' => $order->total,
                    'created_at' => $order->created_at->format('Y-m-d H:i:s'),
                ];
            });
    }

    /**
     * Add headings to the export file
     */
    public function headings(): array
    {
        return [
            'Order ID',
            'Customer Name',
            'Product',
            'Quantity',
            'Total Price',
            'Order Date',
        ];
    }
}
