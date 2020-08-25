<div class="table-responsive-sm">
    <table class="table table-striped"
           id="aboutuses-table">
        <thead>
            <tr>
                <th>Content</th>
                <th>Image</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aboutuses as $aboutUs)
            <tr>
                <td>{{ $aboutUs->content }}</td>
                <td><img width="100px"
                         src="image/{{ $aboutUs->image }}"
                         alt=""></td>
                <td>
                    {!! Form::open(['route' => ['aboutuses.destroy', $aboutUs->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('aboutuses.show', [$aboutUs->id]) }}"
                           class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('aboutuses.edit', [$aboutUs->id]) }}"
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