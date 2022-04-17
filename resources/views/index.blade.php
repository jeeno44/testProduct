@extends("master")

@section("content")
    <div class="row">
        <div class="col-8 offset-2">

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


                @foreach($products as $product)

                    <tr>
                        @if(auth()->user()->role_id == 1)
                            <td>
                                <a href="/edit/{{ $product->id }}" title="Редактировать">{{ $product->id }}</a>
                            </td>
                        @else
                            <td>{{ $product->id }}</td>
                        @endif
                        <td>{{ $product->article }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->status }}</td>
                        <td>{{ $product->data }}</td>
                        @admin
                            <td><a href="/del/{{ $product->id }}"><img src="https://icons.iconarchive.com/icons/visualpharm/must-have/256/Remove-icon.png" height="25" width="25" alt=""></a></td>
                        @endadmin
                    </tr>

                @endforeach

                </tbody>


            </table>

        </div>
    </div>
@endsection
