@extends('admin.includes.admin_design')
@section('content')

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{ route('addCategory') }}" class="btn add-btn btn-danger" ><i class="fa fa-plus"></i> Add Category</a>

                         <a href="{{ route('exportCategoryExcel') }}" class="btn add-btn btn-primary" style="background-color: #1a2eb9; border: 1px solid #1a2eb9;color: #fff; margin-right: 7px;" ><i class="fa fa-excel"></i> Export Excel</a>
                         <a href="{{ route('exportPdf') }}" class="btn add-btn btn-success" style="background-color: #37b91a; border: 1px solid #1a2eb9;color: #fff; margin-right: 7px;" ><i class="fa fa-excel"></i> Export Pdf</a>  
                        
                    </div>
                    <div class="card-body">
                        <form action="{{route('deleteMultipleCategory')}}" method="post">
                            @csrf
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr> 
                                    <th></th>
                                    <th>S.N</th>
                                    <th>Category Name</th>
                                    <th>Under Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr> 
                                    <td>
                                        <input type="checkbox" name="ids[{{$category->id}}]" value="{{$category->id}}">
                                    </td>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->category_name}}</td>
                                    <td>
                                        @if($category->parent_id == 0)
                                            Main Category
                                         @else
                                         {{$category->subCategory->category_name}}   
                                        @endif
                                    </td>
                                    <td>
                                        @if($category->status == 'Active')
                                        <span class="badge badge-success">{{$category->status}}</span>
                                    @else
                                        <span class="badge badge-danger">{{$category->status}}</span>
                                    @endif
                                        
                                    </td>    
                                    <td><a href="{{route('editCategory',$category->id)}}" data-toggle="tooltip" title="Edit" class="btn btn-sm btn-outline-primary"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('deleteCategory',$category->id)}}" data-toggle="tooltip" title="Delete" class="btn btn-sm btn-outline-danger btn-delete" rel="{{ $category->id }}" rel1="category/delete"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                    
                                </tr>   
                                @endforeach

                            </tbody>
                            
                        </table>
                        <input type="submit" value="Delete Categories">
                    </form>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->


@endsection
@section('js')
<script src="{{ asset('public/dashboard/assets/js/jquery.sweet-alert.custom.js') }}"></script>
<script src="{{ asset('public/dashboard/assets/js/sweetalert.min.js') }}"></script>

<script>
    $("#data-table").DataTable({
        processing: true,
        serverSide: true,
        sorting: true,
        searchable: true,
        responsive: true,
        ajax: "{{ route('tableCategory') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'category_name', name: 'category_name'},
            // {data: 'parent_id', name: 'parent_id'},
            // {data: 'action', name: 'action', orderable: false},
        ]
    });
    $('body').on('click', '.btn-delete', function (event){
              event.preventDefault();
              var SITEURL = '{{ URL::to('') }}';
              var id = $(this).attr('rel');
              var deleteFunction = $(this).attr('rel1');
              swal({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Yes, delete it!',
                  cancelButtonText: 'No, cancel!',
              },
              function(){
                  window.location.href = SITEURL + "/admin/" + deleteFunction + "/" + id;
              });
          });

</script>
@endsection