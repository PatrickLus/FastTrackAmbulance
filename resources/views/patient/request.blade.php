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
                    <div class="card-header">{{ __('Make a request') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('req_am_act') }}" class="md-float-material">
                            @csrf

                            <div class="form-group position-relative has-icon-left mb-4">
                                <label for="hospital">Choose a Hospital</label>

                                <select class="form-control form-control-lg" name="hospital" id="hospital">
                                    @foreach($hospitals as $hospital)
                                        <option value="{{ $hospital->id }}">{{ $hospital->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group position-relative has-icon-left mb-4">
                                <label for="description">Describe the emergency</label>
                                    <input type="text"
                                           id="description"
                                           class="form-control form-control-lg
                                    @error('description') is-invalid @enderror"
                                           name="description" />
                                <div class="form-control-icon">
                                    <i class="bi bi-shield-lock"></i>
                                </div>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-1">Send Request</button>
                        </form>
                        <div id="map"></div>
                        <script>
                            navigator.geolocation.getCurrentPosition(position => {
                                const { latitude, longitude } = position.coords;
                                // Show a map centered at latitude / longitude.
                                map.innerHTML = '<iframe width="700" height="300" src="https://maps.google.com/maps?q='+latitude+','+longitude+'&amp;z=15&amp;output=embed"></iframes>';
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
