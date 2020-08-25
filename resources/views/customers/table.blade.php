<div class="table-responsive-sm">
    <table class="table table-striped" id="customers-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Email</th>
        <th>Phonenumber</th>
        <th>Address</th>
        <th>Note</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->phoneNumber }}</td>
            <td>{{ $customer->address }}</td>
            <td>{{ $customer->note }}</td>
                <td>
                    {!! Form::open(['route' => ['customers.destroy', $customer->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('customers.show', [$customer->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('customers.edit', [$customer->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>