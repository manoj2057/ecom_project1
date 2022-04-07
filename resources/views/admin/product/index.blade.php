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
                        <a href="{{ route('addProduct') }}" class="btn add-btn btn-primary" ><i class="fa fa-plus"></i> Add product</a>

                         <a href="{{ route('exportProductExcel') }}" class="btn add-btn btn-primary" style="background-color: #1a2eb9; border: 1px solid #1a2eb9;color: #fff; margin-right: 7px;" ><i class="fa fa-excel"></i> Export Excel</a> 
                        
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Category Id</th>
                                    <th>Product Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->category_id}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td><img src="{{asset('public/uploads/products/'.$product->image)}}"></td>
                                    <td>
                                        @if($product->status == 'Active')
                                        <span class="badge badge-success">{{$product->status}}</span>
                                    @else
                                        <span class="badge badge-danger">{{$product->status}}</span>
                                    @endif
                                        
                                    </td> 
                                    <td>{{$product->price}}</td>   
                                    <td><a href="{{route('editProduct',$product->id)}}" data-toggle="tooltip" title="Edit" class="btn btn-sm btn-outline-primary"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('deleteProduct',$product->id)}}" data-toggle="tooltip" title="Delete" class="btn btn-sm btn-outline-danger btn-delete" rel="{{ $product->id }}" rel1="product/delete"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                    
                                </tr>   
                                @endforeach

                            </tbody>
                            
                        </table>
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
    // $("#data-table").DataTable({
    //     processing: true,
    //     serverSide: true,
    //     sorting: true,
    //     searchable: true,
    //     responsive: true,
    //     ajax: "{{ route('tableCategory') }}",
    //     columns: [
    //         {data: 'DT_RowIndex', name: 'DT_RowIndex'},
    //         {data: 'category_name', name: 'category_name'},
    //         // {data: 'parent_id', name: 'parent_id'},
    //         // {data: 'action', name: 'action', orderable: false},
    //     ]
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