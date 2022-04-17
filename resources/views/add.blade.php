@extends('master')

@section("content")

    <div class="row">
            <div class="col-6 offset-3">

                <form action="/add" method="post">

                    <div class="form-group">
                        <label for="article">Article :</label>
                        <input type="text" class="form-control" id="article" name="article" value="{{ old('article') }}">
                    </div>

                    @if($errors->has('article'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{$errors->first('article')}}</strong>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="name">Name :</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    </div>

                    @if($errors->has('name'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{$errors->first('name')}}</strong>
                        </div>
                    @endif

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status" checked value="available">
                        <label class="form-check-label" for="status">
                            Available
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status" value="unavailable">
                        <label class="form-check-label" for="">
                            Unavailable
                        </label>
                    </div>

                    <br>

                    <div class="form-group">
                        <label for="color">Color :</label>
                        <input type="text" class="form-control" id="color" name="color" value="{{ old('color') }}">
                    </div>
                    <div class="form-group">
                        <label for="size">Size :</label>
                        <input type="text" class="form-control" id="size" name="size" value="{{ old('size') }}">
                    </div>

                    <input type="submit" value="Send" class="btn btn-primary">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                </form>

            </div>
        </div>

    <div class="row">
            <div class="col-12">&nbsp;</div>
        </div>

    <hr>

    <div class="row">
            <div class="col-12">

                <table class="table table-bordered">

                      <thead>

                         <th width="50px">ID</th>
                         <th>Article</th>
                         <th>Name</th>
                         <th>Status</th>
                         <th>Data</th>
                         @admin()
                             <th width="60px">
                                 <img src="https://icons.iconarchive.com/icons/custom-icon-design/office/256/edit-icon.png" height="25" width="25" alt="">
                             </th>
                         @endadmin
                      </thead>

                      <tbody>


                      @foreach($alls as $all)

                          <tr>
                              @if(auth()->user()->role_id == 1)
                                  <td>
                                      <a href="/edit/{{ $all->id }}">{{ $all->id }}</a>
                                  </td>
                              @else
                                  <td>{{ $all->id }}</td>
                              @endif
                              <td>{{ $all->article }}</td>
                              <td>{{ $all->name }}</td>
                              <td>{{ $all->status }}</td>
                              <td>{{ $all->data }}</td>
                              @admin
                                <td>
                                    <a href="/del/{{ $all->id }}">
                                        <img src="https://icons.iconarchive.com/icons/visualpharm/must-have/256/Remove-icon.png" height="25" width="25" alt="">
                                    </a>
                                </td>
                              @endadmin
                          </tr>

                      @endforeach

                      </tbody>


                </table>

            </div>
        </div>

@endsection
