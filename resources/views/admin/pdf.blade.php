<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
</head>
<body>
    <h1 class="text-center">Payement details</h1>
    Customer Name: <h5>{{ $order->name }}</h5>
    Customer Address: <h5>{{ $order->address }}</h5>
    Product Name: <h5>{{ $order->title }}</h5>
    Product Price: <h5>{{ $order->price}}</h5>
    Product Quantity: <h5>{{ $order->quantity }}</h5>
    Payment Status: <h5>{{ $order->payment_status }}</h5>
    Delivery Status: <h5>{{ $order->delivery_status }}</h5>
   
</body>
</html>