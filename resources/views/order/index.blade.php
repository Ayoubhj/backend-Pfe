@extends('layouts.app')

@section('content-s')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Orders</h3>
                @if(session()->has('status'))
                    <div class="alert alert-success" role="alert">
                        {{session()->get('status')}}
                    </div>
            @endif
        
               
                
                <table id="orders" class="table table-bordered table-condensed table-striped" >
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>User</th>
                        <th>SiZE</th>
                        <th>quantity</th>
                        <th>Price</th>
                        <th>Infoemation</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->products->title}}</td>
                            <td>{{$order->user->name}}</td>
                            <td>{{$order->size}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->products->price}}</td>
                            <td>   <a type="button"  class="btn btn-primary " data-toggle="modal" data-target="#exampleModalCenter{{$order->id}}">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                            <td class="d-flex justify-content-around">
                      
                               <form  method="POST"  action="{{route('order.update',$order->id)}}">
                                @method('PUT')
                                @csrf   
                                <input type="hidden" name="status" value="{{$order->status}}">
                                @if($order->status == 0)
                                <button  type="submit"  class="btn btn-primary "  >
                                        <p>Not delivered</p>
                                </button>
                                @else
                                <button  type="submit"  class="btn btn-success "  >
                                    <p> delivered</p>
                               </button>
                                @endif
                               </form>   
                                <form  method="POST"  action="{{route('order.destroy',$order->id)}}">
                                    @method('Delete')
                                    @csrf   
                                    <button name="status" type="submit"  class="btn btn-danger ml-4" >
                                        <p> Delete</p>
                                    </button>
                                   </form> 
                            </td>

                           <div class="modal fade" id="exampleModalCenter{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Information</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                        <div class="modal-body">
                                            
                                            <label>First name : </label> <label>{{$order->firstname}}</label><br>
                                            <label>Last name : </label>  <label>{{$order->lastname}}</label><br>
                                            <label>Adresse : </label> <label>{{$order->adresse}}</label><br>
                                            <label>Phone Number: </label> <label>{{$order->telephone}}</label><br>
                                            <label>Code Postal: </label> <label>{{$order->codepostal}}</label><br>
                                            <label>City : </label> <label>{{$order->city}}</label><br>
                                        <div class="modal-footer">
                                            <button  class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    
                                        </div>
                                    
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
            $('#orders').DataTable();
        })
    </script>
@endsection
