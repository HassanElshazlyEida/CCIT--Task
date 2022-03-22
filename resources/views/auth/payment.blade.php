@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">

                    <div class="card-body px-lg-5 py-lg-5">

                        <form role="form" method="GET" action="{{ route('pay') }}">
                            @csrf
                            <div class="form-group{{ $errors->has('payment_plan') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-planet mr-2"></i>
                                            <div class=" text-muted ">
                                                <small>{{ __('Second Process: Payment Plan') }}</small>
                                            </div>
                                        </span>
                                    </div>
                                    @foreach ($plans as $plan)
                                        <div class="container kl">
                                            <div class="row rtwo my-3">
                                                <div class="col-md-12">
                                                    <div class="form-check"> <input class="form-check-input" type="radio" name="payment_plan" value="{{$plan}}">
                                                    <label class="form-check-label">{{$plan->price}}</label> <span class="text-muted">{{$plan->name}} </span></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                            </div>

                                @if ($errors->has('payment_plan'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('payment_plan') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @if(!isset($payLink))
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
                            @endif
                            <div class="text-center">
                                @if(isset($payLink))
                                    <x-paddle-button :url="$payLink" class="px-8 py-4">
                                        Pay
                                    </x-paddle-button>
                                @else
                                <button type="submit" class="btn btn-primary mt-4">{{ __('Subscribe') }}</button>
                                @endif

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
