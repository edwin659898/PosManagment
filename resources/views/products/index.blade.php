@extends('layouts.app')

@section('content')

<div class="container_fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4 style="float: left"> Add Products </h4> 
                    <a href="#" style="float: right" class="btn btn-dark" datatoggle="modal" data-target="#addproduct">
                         <i class="fa fa-plus"> </i> Add New Products</a></div>
                    <div class="card-body">
                        <table class="table table-bordered table-left">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Brand</th>
                                    <th>price</th>
                                    {{-- <th>Description</th> --}}
                                    <th>Qiuantity</th>
                                    <th>Alert Stock</th>
                                    <th>Actions</th>
                                    
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product )                            
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->brand }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ number_format( $product->price, 2) }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td> @if ($product->alert_stock >= $product->quantity) <span class="badge badge-danger">Low Stock >{{ $product->alert_stock }} </span>
                                         @else <span class="badge badge-success"> {{ $product->alert_stock }} </span>
                                    @endif</td>
                                    {{-- <td>{{ $product->alert_stock }}</td> --}}
                                   
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editproduct{{ $product->id }}"><i class="fa fa-edit"></i>Edit</a>
                                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteproduct{{ $product->id }}"><i class="fa fa-trash"></i>Delete</a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal Edit product -->
<div class="modal right fade" id="editproduct {{ $product->name }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          {{ $product->id }}
        </div>
        <div class="modal-body">
            <form action="{{ route ('products.update', $product->id) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" name="Product_name" id="" value="{{ $product->product_name }}" class="form-control"> 
             </div>
             <div class="form-group">
                <label for="">Stock</label>
                <input type="number" name="stock" id="" value="{{ $product->stock }}" class="form-control"> 
             </div>
             <div class="form-group">
                <label for="">Price</label>
                <input type="number" name="price" id="" value="{{ $product->price }}" class="form-control"> 
             </div>
             <div class="form-group">
                <label for="">Quantity</label>
                <input type="number" name="quantity" value="{{ $product->quantity }}" id="" class="form-control"> 
             </div>
             <div class="form-group">
                <label for="">Alert Stock</label>
                <input type="number" name="alert_stock" value="{{ $product->alert_stock }}" id="" class="form-control"> 
             </div>
             <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" value="{{ $product->description }}" id="" cols="30" rows="2" class="form-control">
                    {{ $product->description }}
                </textarea>
                {{-- <input type="text" name="description" id="" class="form-control">  --}}
             </div>
             <div class="form-group">
                <label for="">Role</label>
                {{--  --}}
             </div>
             <div class="modal-footer">
                <button class="btn btn-warning btn-block">Update product</button>
             </div>
            </form>
        </div>
      </div>
    </div>
  </div>

{{-- pass here here Edit model --}}


<!-- Modal Delete product -->
<div class="modal right fade" id="deleteproduct {{ $product->name }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          {{ $product->id }}
        </div>
        <div class="modal-body">
            <form action="{{ route ('products.destroy', $product->id) }}" method="post">
            @csrf
            @method('delete')
            <p> Are you sure you want to Delete this product {{ $product->product_name }}?</p>
             
             
             <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Delete</button>
             </div>
            </form>
        </div>
      </div>
    </div>
  </div>

{{-- pass here here Delete model --}}


                                @endforeach
                                {{-- pagination on products --}}
                                {{ $products->links() }}

                            </tbody>
                        </table>
                    </div>
                
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="row">
            <div class="card">
                <div class="card-header"> <a href="#"> <i class="fa fa-plus"> </i> Search product</a>
                    <div class="card-body">
                        ''''''''''
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal add product -->
<div class="modal right fade" id="addproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route ('products.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" name="Product_name" id="" class="form-control"> 
             </div>
             <div class="form-group">
                <label for="">stock</label>
                <input type="number" name="stock" id="" class="form-control"> 
             </div>
             <div class="form-group">
                <label for="">Quantity</label>
                <input type="number" name="quantity" id="" class="form-control"> 
             </div>
             <div class="form-group">
                <label for="">Price</label>
                <input type="number" name="Price" id="" class="form-control"> 
             </div>
             <div class="form-group"> 
                <label for="">Alert Stock</label>
                <input type="number" name="alert_stock" id="" class="form-control">
             </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" id="" cols="30" rows="2" class="form-control">

                    </textarea>
                    {{-- <input type="text" name="description" id="" class="form-control">  --}}
                 </div>
               
             {{-- <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" name="confirm_password" id="" class="form-control"> 
             </div> --}}
             <div class="form-group">
                <label for="">Brand</label>
                <input type="text" name="brand" id="" class="form-control">
               
             </div>
             <div class="modal-footer">
                <button class="btn btn-primary btn-block">Save product</button>
             </div>
            </form>
        </div>
      </div>
    </div>
  </div>

{{-- pass here here --}}


  <style>
    .modal.right .modal-dialog{
        top: 0;
        right: 0;
        margin-right: 19vh; 
         
    }
    .modal.fade::not(.in).right .modal-dialog {
        -webkit-transform: translate3d(25%, 0, 0);
        transform: translate3d(25%, 0, 0)
         
    }

   </style>

@endsection