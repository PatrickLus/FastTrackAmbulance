@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('req_am') }}">Request ambulance</a></li>
            </ul>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My requests') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <table style="width:100%">
                            <tr>
                                <th>Hospital</th>
                                <th>Date</th>
                                <th>Description</th>
                            </tr>

                            @foreach($requests as $request)
                                <tr>
                                    <td>{{ $request->full_name }}</td>
                                    <td>{{ $request->created_at }}</td>
                                    <td>{{ $request->description }}</td>
                                </tr>
                            @endforeach

                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
