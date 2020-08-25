<div class="table-responsive-sm">
    <table class="table table-striped" id="orderDetails-table">
        <thead>
            <tr>
                <th>Id Product</th>
        <th>Id Order</th>
        <th>Quantity</th>
        <th>Price</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orderDetails as $orderDetail)
            <tr>
                <td>{{ $orderDetail->id_product }}</td>
            <td>{{ $orderDetail->id_order }}</td>
            <td>{{ $orderDetail->quantity }}</td>
            <td>{{ $orderDetail->price }}</td>
                <td>
                    {!! Form::open(['route' => ['orderDetails.destroy', $orderDetail->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('orderDetails.show', [$orderDetail->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('orderDetails.edit', [$orderDetail->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>