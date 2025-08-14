<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice Details</title>
    <style>
        body {
            background: #f7f7f7;
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 32px;
        }
        .header {
            text-align: center;
            padding-bottom: 24px;
            border-bottom: 1px solid #eee;
        }
        .header h1 {
            margin: 0;
            color: #4a90e2;
            font-size: 2em;
            letter-spacing: 2px;
        }
        .meta {
            margin: 24px 0;
            padding: 16px;
            background: #f0f4fa;
            border-radius: 8px;
        }
        .meta div {
            margin-bottom: 10px;
            font-size: 1.05em;
        }
        .meta strong {
            color: #333;
        }
        .footer {
            text-align: center;
            color: #888;
            font-size: 0.95em;
            margin-top: 32px;
        }
        .receipt-img {
            margin-top: 10px;
            box-shadow: 0 2px 8px rgba(74,144,226,0.15);
            border-radius: 8px;
            max-width: 200px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Invoice Details</h1>
            <p>Thank you for your business!</p>
        </div>
        <div class="meta">
            <div><strong>Invoice ID:</strong> {{ $invoice['invoice_id'] }}</div>
            <div><strong>Product Name:</strong> {{ $invoice['product_name'] }}</div>
            <div><strong>Quantity:</strong> {{ $invoice['quantity'] }}</div>
            <div><strong>Total Price:</strong> {{ $invoice['total_price'] }}</div>
        </div>
        <div class="meta">
            <div><strong>Customer Name:</strong> {{ $invoice['customer_name'] }}</div>
            <div><strong>Email:</strong> {{ $invoice['customer_email'] }}</div>
            <div style="width:100%;"><strong>Address:</strong> {{ $invoice['customer_address'] }}</div>
            <div><strong>Mobile Phone:</strong> {{ $invoice['customer_mobile_phone'] }}</div>
            <div><strong>Status:</strong> {{ $invoice['status'] }}</div>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} UC Silver. All rights reserved.
        </div>
    </div>
</body>
</html>
