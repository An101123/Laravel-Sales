<div class="table-responsive-sm">
    <table class="table table-striped"
           id="products-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Price Promotion</th>
                <th>Image</th>
                <th>Id Category</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->price_promotion }}</td>
                <td> <img width="100px"
                         src="image/{{ $product->image }}"
                         alt=""></td>
                <td>{{ $product->id_category }}</td>
                <td>
                    {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('products.show', [$product->id]) }}"
                           class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('products.edit', [$product->id]) }}"
                           class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn
                        btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>