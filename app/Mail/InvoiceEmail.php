<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

// PDF
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $invoice;

    /**
     * The invoice parameter datas:
     * - product_id: required|exists:products,id
     * - user_id: nullable|exists:users,id
     * - customer_name: required|string|max:255
     * - customer_email: required|email|max:255
     * - customer_address: required|string|max:500
     * - customer_mobile_phone: required|string|max:15
     * - payment_receipt: nullable|image|mimes:jpeg,png,jpg,gif|max:2048
     * - quantity: required|integer|min:1
     * - total_price: required|numeric|min:0
     * - status: required|string|max:50
     */

    /**
     * Create a new message instance.
     */
    public function __construct($invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $pdf = PDF::loadView('emails.invoice', $this->invoice);
        return $this->subject('Your Invoice #' . $this->invoice['invoice_id'])
            ->view('emails.invoice')
            ->with([
                'product_name' => $this->invoice['product_name'] ?? null,
                'customer_name' => $this->invoice['customer_name'] ?? null,
                'customer_email' => $this->invoice['customer_email'] ?? null,
                'customer_address' => $this->invoice['customer_address'] ?? null,
                'customer_mobile_phone' => $this->invoice['customer_mobile_phone'] ?? null,
                'payment_receipt' => $this->invoice['payment_receipt'] ?? null,
                'quantity' => $this->invoice['quantity'] ?? null,
                'total_price' => $this->invoice['total_price'] ?? null,
                'status' => $this->invoice['status'] ?? null,
                'invoice_id' => $this->invoice['invoice_id'] ?? null,
            ])
            ->attachData($pdf->output(), 'invoice_' . $this->invoice['invoice_id'] . '.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
