@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <ul>
                    <li><a href="{{ route('hospital_name') }}">Home</a></li>
                </ul>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Requests') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table style="width:100%">
                            <tr>
                                <th>Patient</th>
                                <th>Contact</th>
                                <th>Date</th>
                                <th>Description</th>
                            </tr>

                            @foreach($requests as $request)
                                <tr>
                                    <td>{{ $request->name }}</td>
                                    <td>{{ $request->phone_number }}</td>
                                    <td>{{ $request->created_at }}</td>
                                    <td>{{ $request->description }}</td>
                                    <td><a href="{{ route('hospital_req', $request->id) }}">details</a></td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
