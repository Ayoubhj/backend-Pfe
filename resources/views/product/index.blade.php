@extends('layouts.app')

@section('content-s')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Product</h3>
                @if(session()->has('status'))
                    <div class="alert alert-success" role="alert">
                        {{session()->get('status')}}
                    </div>
            @endif
            <!-- Button trigger modal -->
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
                    Add Product
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Add Product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <select class="custom-select mr-sm-2 m-1" name="cat_id" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        @foreach($categories as $category)
                                        <option  value="{{$category->id}}" >{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    <label>Title</label> <input class="form-control" type="text " placeholder="enter title" name="title"/>
                                    <label>descreption</label> <textarea  class="form-control mb-3"  placeholder="descreption" name="descreption"></textarea>
                                    <div class="custom-file ">

                                        <input name="image" type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    <label>quantity</label> <input class="form-control" type="text " placeholder="quantity" name="quantity"/>
                                    <label>price</label> <input class="form-control" type="text " placeholder="price" name="price"/>

                                </div>
                                <div class="modal-footer">
                                    <button  class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
                <table id="product" class="table table-bordered table-condensed table-striped" >
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cat_id</th>
                        <th>title</th>
                        <th>descreption</th>
                        <th>quantity</th>
                        <th>price</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->cat_id}}</td>
                            <td>{{$product->title}}</td>
                            <td>{{$product->descreption}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->price}}</td>
                            <td class="d-flex justify-content-around">
                                <a type="button"  class="btn btn-primary " data-toggle="modal" data-target="#exampleModalCenter{{$product->id}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form method="POST" action="{{route('product.destroy',$product->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" >
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>

                            </td>

                           <div class="modal fade" id="exampleModalCenter{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Add Product</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <select class="custom-select mr-sm-2 m-1" name="cat_id" id="inlineFormCustomSelect">
                                                <option selected>Choose...</option>
                                                @foreach($categories as $category)
                                                    <option  value="{{$category->id}}" >{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            <label>Title</label> <input class="form-control" type="text " placeholder="enter title" name="title"/>
                                            <label>descreption</label> <textarea  class="form-control mb-3"  placeholder="descreption" name="descreption"></textarea>
                                            <div class="custom-file ">

                                                <input name="image" type="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                            <label>quantity</label> <input class="form-control" type="text " placeholder="quantity" name="quantity"/>
                                            <label>price</label> <input class="form-control" type="text " placeholder="price" name="price"/>

                                        </div>
                                        <div class="modal-footer">
                                            <button  class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </tr>
                    @endforeach
                    </tbody>

                </table>

            <!-- Modal -->

        </div>
    </div>
    </div>
@endsection
@section('script')
    <script>

        $(document).ready(function() {
            $.noConflict();
            $('#product').DataTable();
        })
    </script>
@endsection
