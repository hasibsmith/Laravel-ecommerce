@extends('layouts.logout')
@include('admin.navbar')
@include('admin.sidebar')

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">

              @if ($message = Session::get('success'))

              <div class="alert alert-success">
      
                  <p>{{ $message }}</p>
      
              </div>
      
          @endif

          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Striped Table</h4>              
                </p>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th> Order Number  </th>
                        <th> Order Total Price </th>
                        <th> Payment Type </th>
                        <th> Order Status </th>                        
                        <th> Action </th>
                     
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                       
                    
          
                        @foreach ($order_details as $single_order)

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
                
                           
                
                                    <a class="btn btn-info" href="{{ route('order.approved',$single_order->id) }}">Approved</a>

                                    <a class="btn btn-info" href="{{ route('order.done',$single_order->id) }}">Delivery Done</a>             
                                      
                                    <a class="btn btn-primary" href="{{ route('order.cancel',$single_order->id) }}">Cancel</a>
                
                     
                
                            </td>

                
                        </tr>
                
                        @endforeach
                                        
                      </tr>
  
                    </tbody>
                   
                  </table>
                </div>
              </div>
            </div>
          </div>

            
            </div>

            @include('admin.footer')
    