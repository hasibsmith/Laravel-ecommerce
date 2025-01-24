@extends('layouts.logout')
@include('admin.navbar')
@include('admin.sidebar')




<form action=" {{route('product.store')}} " method="POST" class="forms-sample" enctype="multipart/form-data">

    @csrf

    <div class="form-group">
      <label for="exampleInputUsername1">Select Category  Name

        <select name="category_id" id="category_id" class="form-select">
          @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach

        </select>     

      </label>
      
    </div>

  

    <div class="form-group">
      <label for="exampleInputUsername1">Product Name</label>
      <input type="text" name="name" class="form-control" id="exampleInputUsername1" placeholder="name">
    </div>
    <div class="form-group">
      <label for="exampleInputUsername1">Product Price</label>
      <input type="text" name="price" class="form-control" id="exampleInputUsername1" placeholder="name">
    </div>
    <div class="form-group">
      <label for="exampleInputUsername1">Product Sale Price</label>
      <input type="text" name="saleprice" class="form-control" id="exampleInputUsername1" placeholder="name">
    </div>

    <div class="form-group">
      <label for="description">Product Description</label>
      <!-- Use a <textarea> instead of <input> for CKEditor -->
      <textarea name="description" class="form-control" id="description" placeholder="Enter product description"></textarea>
  </div>
  
    <div class="form-group">
      <label for="exampleInputEmail1">Product Image</label>
      <input type="file" name="image"  class="form-control" id="exampleInputEmail1" placeholder="file">
    </div>

  
    <button type="submit" class="btn btn-primary me-2">Submit</button>

  </form>
</div>

@include('admin.footer')

<!-- Push CKEditor Script -->
@push('scripts')
<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
<script>
    // Initialize CKEditor for the 'description' field
    CKEDITOR.replace('description');
</script>
@endpush