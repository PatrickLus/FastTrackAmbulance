@extends("layouts.admin")
@section('content')

    <div id="auth">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div id="auth-left">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                       {{-- {!! Toastr::message() !!}--}}
                    <h3 class="auth-title">Register new Hospital</h3>
                    <p class="auth-subtitle mb-5">Input details.</p>

                    <form method="POST" action="{{ route('save_hospital') }}"
                          class="md-float-material" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group position-relative mb-4">
                            <label>Full Name</label>
                            <input type="text" value="{{ old('full_name') }}" class="form-control form-control-lg" name="full_name" id="full_name">
                        </div>

                        <div class="form-group position-relative mb-4">
                            <label>Email Address</label>
                            <input type="email" value="{{ old('email_address') }}" class="form-control form-control-lg" name="email_address"
                                   id="email_address">
                        </div>

                        <div class="form-group position-relative mb-4">
                            <label>Contact Number</label>
                            <input type="text" value="{{ old('contact_number') }}" class="form-control form-control-lg" name="contact_number"
                                   id="contact_number">
                        </div>

                        <div class="form-group position-relative mb-4">
                            <label>Address</label>
                            <textarea class="form-control" value="{{ old('address') }}" name="address" id="address" rows="4"></textarea>
                        </div>

                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Create</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                </div>
            </div>
        </div>
    </div>

@endsection
