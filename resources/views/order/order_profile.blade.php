<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .profile-section, .orders-section {
            background: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .profile-header img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
        }

        .profile-header h2 {
            margin: 0;
        }

        .profile-header button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .profile-header button:hover {
            background-color: #0056b3;
        }

        .orders-section table {
            width: 100%;
            border-collapse: collapse;
        }

        .orders-section th, .orders-section td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .orders-section th {
            background-color: #f8f9fa;
        }

        .action-btn {
            padding: 8px 12px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .action-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    <!-- Profile Section -->
    <div class="profile-section">
        <div class="profile-header">
            <div class="profile-info">
             

         @forelse ($user_address as $item)

         <h2>Name : {{$item->firstname}}</h2>
         <p>Email :{{$item->email}}</p>
         <p>{{$item->mobileno}}</p>
         @empty
             
         @endforelse
                
            </div>
            <button>Edit Profile</button>
        </div>
    </div>

    <!-- Orders Section -->
    <div class="orders-section">
        <h3>My Orders</h3>
        <table class="table table-striped">
            <thead>
              <tr>
                <th> Order Number  </th>
                <th> Total Price </th>
                <th> Payment Type </th>
                <th> Order Status </th>                        
                <th> Action </th>
                <th> Feedback </th>
             
              </tr>
            </thead>
            <tbody>
             
      
          
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->order_id }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>{{ $order->payment_type }}</td>
                    <td>

                        @php

                        $status = $order->order_status;
                    
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

                    </td>
               

                  <td>
                          <a class="btn btn-primary" href="{{ route('order.cancel',$order->id) }}">Cancel</a>
      
                  </td>
                   
                    <td>
                        <a href="{{ route('order.feedback', ['order_id' => $order->id]) }}" class="btn btn-primary">
                            Feedback
                        </a>
                    </td>
                </tr>
            @endforeach

    </div>
</div>

</body>
</html>
