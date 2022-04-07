@extends('admin.includes.admin_design')
@section('content')
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <strong>Update</strong> Category
        </div>
        <div class="col-auto float-right ml-auto">
            <a href="{{ route('category.index') }}" class="btn update-btn btn-primary" ><i class="bi bi-eye"></i> View updates</a>

        </div>
        <div class="card-body card-block">
            @include('admin.includes._message')
            <form action="{{route('updateCategory', $categoryData->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3"><label for="parent_id" class=" form-control-label">Category <span class="text-danger">*</label></div>
                    <div class="col-12 col-md-9">
                        <select name="parent_id" id="parent_id" class="form-control-sm form-control">
                            <option value="0">Main Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($categoryData->parent_id == $category->id) selected @endif>{{ $categoryData->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="name" class=" form-control-label">Category Name<span class="text-danger">*</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="name" name="category_name" placeholder="Enter category name" class="form-control"  value="{{ $categoryData->category_name }}"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="status" class=" form-control-label">Status</label></div>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="checkbox" name="status" checked data-toggle="toggle" data-size="xs" @if($categoryData->status == 'Active') checked @endif name="status" >
                         <label>Active</label>
                    </div>
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