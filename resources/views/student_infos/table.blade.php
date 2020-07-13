<div class="table-responsive">
    <table class="table" id="studentInfos-table">
        <thead>
            <tr>
                <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($studentInfos as $studentInfo)
            <tr>
                <td>{{ $studentInfo->first_name }}</td>
            <td>{{ $studentInfo->last_name }}</td>
            <td>{{ $studentInfo->email }}</td>
            <td>{{ $studentInfo->phone }}</td>
            <td>{{ $studentInfo->address }}</td>
            <td>{{ $studentInfo->address }}</td>
            <td>{{ $studentInfo->description }}</td>
            <td>{{ $studentInfo->description }}</td>
                <td>
                    {!! Form::open(['route' => ['studentInfos.destroy', $studentInfo->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('studentInfos.show', [$studentInfo->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('studentInfos.edit', [$studentInfo->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{-- For Pagination --}}
        <div>{{ $studentInfos->links() }}</div>
</div>
