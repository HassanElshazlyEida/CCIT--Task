{{-- {{dd(Session::get('error'))}} --}}
<div class="header bg-gradient-primary py-7 py-lg-8">
    <div class="container">
        <div class="header-body text-center mb-7">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <h1 class="text-white">{{ __('Welcome to Argon Dashboard FREE Laravel Live Preview.') }}</h1>
                </div>
            </div>
        </div>
    </div>
    @if ($message = Session::get('error'))
        <div class="d-flex justify-content-center">
            <div class="alert alert-danger alert-block w-25">

                <button type="button" class="close" data-dismiss="alert">×</button>

                <strong>{{ $message }}</strong>

            </div>
        </div>

    @endif
    <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
</div>
