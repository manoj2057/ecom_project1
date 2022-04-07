@extends('admin.includes.admin_design')
@section('content')
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <strong>All Products</strong> 
        </div>
        <div class="col-auto float-right ml-auto">
            <a href="{{ route('product.index') }}" class="btn update-btn btn-primary" ><i class="bi bi-eye"></i> View Products</a>

        </div>
        <div class="card-body card-block">
            @include('admin.includes._message')
            <form action="{{route('storeProduct')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3"><label for="category_id" class=" form-control-label">Select Category <span class="text-danger">*</label></div>
                    <div class="col-12 col-md-9">
                        <select name="category_id" id="category_id" class="form-control-sm form-control">
                            <option selected disabled>Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category['id'] }}">{{ $category['category_name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="name" class=" form-control-label">Product Name<span class="text-danger">*</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="name" name="product_name" placeholder="Enter category name" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="image" class=" form-control-label">Image<span class="text-danger">*</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="image" name="image" accept="image/*" class="form-control" onchange="readURL(this);">
                    </div>
                    <img src="" id="one" style="width: 100px">
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="status" class=" form-control-label">Status</label></div>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="checkbox" name="status" checked data-toggle="toggle" data-size="xs" value="1">
                         <label>Active</label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="name" class=" form-control-label">Price<span class="text-danger">*</label></div>
                    <div class="col-12 col-md-9"><input type="number" id="price" name="price" placeholder="Enter price" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="excerpt" class=" form-control-label">Excerpt<span class="text-danger">*</label></div>
                    <div class="col-12 col-md-9"><textarea name="excerpt" id="excerpt" cols="10" rows="3" class="form-control"></textarea></div>
                </div>
                
               
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    
                </div>
               
                
               
                   
                    
                   
                    
                    
            </form>
        </div>
        
    </div>
   
</div>
@endsection
@section('js')
<script>
    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload= function(e){
                $('#one')
                .attr('src',e.target.result)
                .width(100)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    
</script>

    
@endsection