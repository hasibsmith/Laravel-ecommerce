
@extends('layouts.logout')
@include('admin.navbar')
@include('admin.sidebar')


   

    <div class="form-group">
      <label for="exampleInputUsername1">Category Name</label>
      {{ $category->name }}
    </div> 
    <br>  <br>  <br>
    <div class="form-group">
      <label for="exampleInputEmail1">Category Image</label>
     
      <img src="/images/{{ $category->image }}" width="500px">
    </div>
    
    


@include('admin.footer')
  
    
















