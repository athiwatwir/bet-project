@extends('layouts.blank')

@section('content')
    <div class="container-fluid position-ref">
        <div class="row pt-4" style="height: 100vh;">
            <div class="col-12 text-center">
                <iframe 
                    src="{{ $demo }}"
                    class="responsive-iframe"
                >
                <!-- <iframe 
                    src="https://m.pg-demo.com/buffalo-win/index.html?__refer=m.pg-redirect.com&__sv=0&language=en-US&bet_type=2&operator_token=8735ze6y8kp7jpwmxvau7gvytu3adwj4&from=https%3A%2F%2Fpublic.pg-redirect.com%2Fpages%2Fclose.html"
                    style="width: 100%; height: 100vh;"
                > -->
            </div>
        </div>
    </div>
@endsection