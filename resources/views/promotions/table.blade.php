<div class="table-responsive-sm">
    <table class="table table-striped" id="promotions-table">
        <thead>
            <tr>
                <th>Title</th>
        <th>Discount</th>
        <th>Content</th>
        <th>Image</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($promotions as $promotion)
            <tr>
                <td>{{ $promotion->title }}</td>
            <td>{{ $promotion->discount }}</td>
            <td>{{ $promotion->content }}</td>
            <td>{{ $promotion->image }}</td>
                <td>
                    {!! Form::open(['route' => ['promotions.destroy', $promotion->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('promotions.show', [$promotion->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('promotions.edit', [$promotion->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>