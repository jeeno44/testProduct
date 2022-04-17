@extends('master')

@section("content")

    <div class="row">
            <div class="col-6 offset-3">

                <form action="/edit/{{ $rec->id }}" method="post">

                    <div class="form-group">
                        <label for="article">Article :</label>
                        <input type="text" class="form-control" id="article" name="article" value="{{ $rec->article }}">
                    </div>

                    @if($errors->has('article'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{$errors->first('article')}}</strong>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="name">Name :</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $rec->name }}">
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

@endsection
