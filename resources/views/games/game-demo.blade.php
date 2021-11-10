@extends('layouts.blank')

@section('content')
    <div class="container-fluid position-ref">
        <div class="row pt-4" style="height: 100vh;">
            <div class="col-12 text-center">
                <iframe 
                    src="{{ $demo }}"
                    class="responsive-iframe"
                >
            </div>
        </div>
    </div>
@endsection