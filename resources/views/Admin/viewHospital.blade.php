@extends("layouts.admin")
@section('content')

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Hospitals
        </div>

        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Joined on</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Joined on</th>
                    </tr>
                </tfoot>

                <tbody>
                    @foreach($hospitals as $hospital)
                        <tr>
                            <td>{{ $hospital->full_name }}</td>
                            <td>{{ $hospital->email_address }}</td>
                            <td>{{ $hospital->contact_number }}</td>
                            <td>{{ $hospital->address }}</td>
                            <td>{{ $hospital->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
