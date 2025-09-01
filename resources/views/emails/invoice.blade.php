<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice Details</title>
    <style>
        body {
            background: #f7f7f7;
            font-family: 'Playfair Display', 'Inter', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.10);
            padding: 36px 32px;
            border: 2px solid #d4af37;
        }
        .header {
            text-align: center;
            padding-bottom: 24px;
            border-bottom: 2px solid #d4af37;
        }
        .header h1 {
            margin: 0;
            color: #8e6f2e;
            font-size: 2.2em;
            letter-spacing: 2px;
            font-family: 'Playfair Display', serif;
        }
        .header p {
            color: #6b4e37;
            font-size: 1.1em;
            margin-top: 8px;
            font-family: 'Inter', sans-serif;
        }
        .meta {
            margin: 28px 0;
            padding: 18px;
            background: #f0f4fa;
            border-radius: 10px;
            border-left: 6px solid #d4af37;
            box-shadow: 0 2px 8px rgba(212,175,55,0.07);
        }
        .meta div {
            margin-bottom: 12px;
            font-size: 1.08em;
            color: #4a3728;
            font-family: 'Inter', sans-serif;
        }
        .meta strong {
            color: #8e6f2e;
            font-weight: 600;
            font-family: 'Playfair Display', serif;
        }
        .footer {
            text-align: center;
            color: #8b6f47;
            font-size: 1em;
            margin-top: 36px;
            font-family: 'Inter', sans-serif;
        }
        .receipt-img {
            margin-top: 12px;
            box-shadow: 0 2px 8px rgba(212,175,55,0.15);
            border-radius: 8px;
            max-width: 200px;
            border: 2px solid #d4af37;
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
            <div><strong>Invoice ID:</strong> {{ $invoice_id }}</div>
            <div><strong>Product Name:</strong> {{ $product_name }}</div>
            <div><strong>Quantity:</strong> {{ $quantity }}</div>
            <div><strong>Total Price:</strong> Rp {{ number_format($total_price, 0, ',', '.') }}</div>
        </div>
        <div class="meta">
            <div><strong>Customer Name:</strong> {{ $customer_name }}</div>
            <div><strong>Email:</strong> {{ $customer_email }}</div>
            <div style="width:100%;"><strong>Address:</strong> {{ $customer_address }}</div>
            <div><strong>Mobile Phone:</strong> {{ $customer_mobile_phone }}</div>
            <div><strong>Status:</strong> {{ $status }}</div>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Celuk Silver Creative. All rights reserved.
        </div>
    </div>
</body>
</html>
