@extends('layouts.app')

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-header">

            @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="card-custom" style="width: 100%">
                {!! Form::open(['id'=>'form_data','url'=>"dashboard/car/destroy/all",'method'=>'delete']) !!}
                    {!! $dataTable->table([
                        'class'=>'table table-separate table-head-custom table-checkable'
                    ],true)!!}
            </div>
        </div>

    </div>
</div>


@endsection
{{-- Scripts Section --}}
@push('js')



{!! $dataTable->scripts() !!}

<!-- Datatables buttons -->
<script src="{{asset("plugins/datatables/checkbox.js")}}"></script>

<script src="{{asset("plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
<script src="{{asset("plugins/vendor/datatables/buttons.server-side.js")}}"></script>
<script src="{{asset("plugins/datatables-buttons/dataTables.buttons.min.js")}}"></script>
<script src="{{asset("plugins/vendor/datatables/buttons.server-side.js")}}"></script>

@endpush

@push('style')
<link rel="stylesheet" href="{{asset("plugins/datatables-buttons/css/buttons.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
@endpush
