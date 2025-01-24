<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse" style="min-height: 100vh;">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="#">
                                <i class="fas fa-home me-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fas fa-shopping-cart me-2"></i>
                                Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fas fa-heart me-2"></i>
                                Wishlist
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('order.profile') }}">
                                <i class="fas fa-user me-2"></i>
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fas fa-cog me-2"></i>
                                Settings
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                    </div>
                </div>

                <!-- Stats Cards -->
                {{-- <div class="row">
                    <div class="col-md-3 mb-4">
                        <div class="card text-white bg-primary">
                            <div class="card-body">
                                <h5 class="card-title">Total Orders</h5>
                                <h2 class="card-text">2</h2>
                                <p class="card-text"><small>+12% from last month</small></p>
                            </div>
                        </div>
                    </div>
        
                </div> --}}

                <!-- Recent Orders -->
                {{-- <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Recent Orders</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Product</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#12345</td>
                                        <td>Smartphone X</td>
                                        <td>2025-01-04</td>
                                        <td><span class="badge bg-success">Delivered</span></td>
                                        <td>$999</td>
                                    </tr>
                                    <tr>
                                        <td>#12344</td>
                                        <td>Laptop Pro</td>
                                        <td>2025-01-03</td>
                                        <td><span class="badge bg-warning">Processing</span></td>
                                        <td>$1499</td>
                                    </tr>
                                    <tr>
                                        <td>#12343</td>
                                        <td>Wireless Earbuds</td>
                                        <td>2025-01-02</td>
                                        <td><span class="badge bg-info">Shipped</span></td>
                                        <td>$199</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> --}}


                <h4> My Orders </h4>





                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> Order Number </th>
                            <th> Total Price </th>
                            <th> Payment Type </th>
                            <th> Order Status </th>
                            <th> Action </th>
                            <th> Feedback </th>

                        </tr>
                    </thead>
                    <tbody>



                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->order_id }}</td>
                                <td>{{ $order->total_price }}</td>
                                <td>{{ $order->payment_type }}</td>
                                <td>

                                    @php

                                        $status = $order->order_status;

                                        if ($status == '0') {
                                            echo 'Pending';
                                        } elseif ($status == '1') {
                                            echo 'OnGoing';
                                        } elseif ($status == '2') {
                                            echo 'Delivery Done';
                                        } else {
                                            echo 'Order Cancelled'; // Missing semicolon here
                                        }
                                    @endphp

                                </td>


                                <td>
                                    <a class="btn btn-primary" href="{{ route('order.cancel', $order->id) }}">Cancel</a>

                                </td>

                                <td>
                                    <a href="{{ route('order.feedback', ['order_id' => $order->id]) }}"
                                        class="btn btn-primary">
                                        Feedback
                                    </a>
                                </td>
                            </tr>
                        @endforeach





                        {{-- @foreach ($order_details as $single_order)

                        <tr>
                
                          <td>{{ $single_order->order_id}}</td>                
                          <td>${{ $single_order->total_price}}</td>            
                          <td>{{ $single_order->payment_type}}</td>

                          <td>

                              
                              @php

                              $status = $single_order->order_status;
                          
                              if ($status == "0") {
                                  echo "Pending";
                              } elseif ($status == "1") {
                                  echo "OnGoing";
                              } elseif ($status == "2") {
                                  echo "Delivery Done";
                              } else {
                                  echo "Order Cancelled"; // Missing semicolon here
                              };
                          @endphp

                            <td>


                                    <a class="btn btn-primary" href="{{ route('order.cancel',$single_order->id) }}">Cancel</a>

                
                            </td>

                
                        </tr>
                
                        @endforeach --}}



                    </tbody>

                </table>



            </main>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
