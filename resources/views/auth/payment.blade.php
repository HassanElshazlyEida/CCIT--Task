@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">

                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>{{ __('Second Process: Payment Plan') }}</small>
                        </div>
                        <form role="form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group{{ $errors->has('payment_plan') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-planet"></i></span>
                                    </div>
                                    <select  name="payment_plan"  class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  >
                                        <option value="" selected > {{__("Select Payment Plan")}} </option>
                                            @foreach ($plans as $plan)
                                                <option value="{{$plan}}" >{{$plan}} </option>
                                            @endforeach
                                    </select>
                            </div>
                                @if ($errors->has('payment_plan'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('payment_plan') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="row my-4">
                                <div class="col-12">
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                                        <label class="custom-control-label" for="customCheckRegister">
                                            <span class="text-muted">{{ __('I agree with the') }} <a href="#!">{{ __('Privacy Policy') }}</a></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4">{{ __('Create account') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
