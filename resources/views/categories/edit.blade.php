@extends('layouts.logout')
@include('admin.navbar')
@include('admin.sidebar')


   

    <form action="{{ route('categories.update',$category->id) }}" method="POST" enctype="multipart/form-data"> 

        @csrf

        @method('PUT')

    <div class="form-group">
      <label for="exampleInputUsername1">Category Name</label>
      <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="exampleInputUsername1" placeholder="name">
    </div>
    
    <div class="form-group">
      <label for="exampleInputEmail1">Category Image</label>
      <input type="file" name="image"  class="form-control" id="exampleInputEmail1" placeholder="file">
      <img src="/images/{{ $category->image }}" width="300px">
    </div>
    
    <button type="submit" class="btn btn-primary me-2">Submit</button>

  </form>


@include('admin.footer')
  
    