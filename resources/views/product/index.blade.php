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
                <p class="card-description"><a href="{{route('product.create') }}">Add New</a></code>
                </p>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th> Sl NO </th>
                        <th>  Name </th>
                        <th> Image </th>
                        <th> Price </th>
                        <th> Sale Price </th>
                        <th> Action </th>
                     
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                                             
                        @foreach ($products as $product)

                        <tr>
                
                            <td>{{ ++$i }}</td>
                
                            <td><img src="/images/{{ $product->image }}" width="100px"></td>
                
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->saleprice }}</td>
                
                          
                
                            <td>
                
                                <form action="{{ route('product.destroy',$product->id) }}" method="POST">
                
                     
                
                                    <a class="btn btn-info" href="{{ route('product.show',$product->id) }}">Show</a>
                
                      
                
                                    <a class="btn btn-primary" href="{{ route('product.edit',$product->id) }}">Edit</a>
                
                     
                
                                    @csrf
                
                                    @method('DELETE')
                
                        
                
                                    <button type="submit" class="btn btn-danger">Delete</button>
                
                                </form>
                
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
    