@extends('layouts.auth')

@section('content')
<div class="row justify-content-center  h-100 d-flex align-items-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">

                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Claro insurance</h1>
                            </div>
                            <form class="user" novalidate id="form-login" action="/login" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email"
                                        placeholder="Email ..." value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" placeholder="Password"
                                        name="password">
                                </div>
                                <div class="form-group">
                                    <div class="">
                                        <input type="checkbox" name="remember">
                                        <label>Remember
                                            Me</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                                <hr>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/localization/messages_es_PE.min.js"
    integrity="sha512-VEXnX78M4rHuAiHP4WnF7i774Z/MYfGM9Syikk99Y23tpKMiqu9SIelW4RQlj+9C0LQ3X8KLyGb4kOsanZcoiA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('assets/js/login.js') }}"></script>

@endpush