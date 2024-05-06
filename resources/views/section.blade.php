@extends('styleguide::styleguide')

@section('css')
    <style type="text/css">
    </style>
@stop
@section ('content')
    <div class="style-body">
        @if (Breadcrumbs::exists('breadcrumb'))
        <div class="style-breadcrumb">
            <div class="row column small-12">
                    {{ Breadcrumbs::render('breadcrumb') }}
            </div>
        </div>
        @endif
        <div class="row column small-12">
            @foreach ($sections as $section)
                <div class="style-section">
                    {!! $section !!}
                </div>
            @endforeach
        </div>
    </div>
@stop

