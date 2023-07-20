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
                    <div class="card-header">{{ __('Request Detailed') }}</div>

                    <div class="card-body">
                        <table style="width:100%">
                            <tr>
                                <th>Patient</th>
                                <th>Contact</th>
                                <th>Date</th>
                                <th>Description</th>
                            </tr>

                            <tr>
                                <td>{{ $request->name }}</td>
                                <td>{{ $request->phone_number }}</td>
                                <td>{{ $request->created_at }}</td>
                                <td>{{ $request->description }}</td>
                            </tr>

                        </table>

                        <div id="map"></div>
                        <script>
                            navigator.geolocation.getCurrentPosition(position => {
                                // Show a map centered at latitude / longitude.
                                let location = "<?php echo $request->location ?>";

                                map.innerHTML =
                                    `<iframe
                                        width="700"
                                        height="300"
                                        src="https://maps.google.com/maps?q=${location}&amp;z=15&amp;output=embed">
                                    </iframes>`;
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
