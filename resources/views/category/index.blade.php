@extends('layouts.app')

@section('content-s')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Category</h3>
                @if(session()->has('status'))
                    <div class="alert alert-success" role="alert">
                       {{session()->get('status')}}
                    </div>
                @endif
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
                    Add Category
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('category.store')}}" method="POST">
                                @csrf
                            <div class="modal-body">
                                <label>Name</label> <input class="form-control" type="text " placeholder="name" name="name"/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
                <table id="category" class="table table-bordered table-condensed table-striped" >
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                          <tr>
                              <td>{{$category->id}}</td>
                              <td>{{$category->name}}</td>
                              <td class="d-flex justify-content-around">
                                  <a type="button"  class="btn btn-primary "    data-toggle="modal" data-target="#exampleModalCenter{{$category->id}}">
                                      <i class="fa fa-edit"></i>
                                  </a>
                                  <form method="POST" action="{{route('category.destroy',$category->id)}}">
                                      @csrf
                                      @method('DELETE')
                                  <button type="submit" class="btn btn-danger" >
                                      <i class="fa fa-trash"></i>
                                  </button>
                                  </form>

                              </td>
                              <div class="modal fade" id="exampleModalCenter{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <form action="{{route('category.update',$category->id)}}" method="POST">
                                          <div class="modal-body">
                                              <label>Name</label> <input type="text" class="form-control" name="name" placeholder="name " value="{{$category->name}}">
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                  @csrf
                                                  @method('PUT')
                                                  <button type="submit"  class="btn btn-primary">Save changes</button>
                                              </form>
                                          </div>
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
          $('#category').DataTable();
      })
  </script>
@endsection
