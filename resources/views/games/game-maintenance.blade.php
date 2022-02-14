@extends('layouts.blank')

@section('content')
<div class="container-fluid maintenance-style">
    <div class="row">
        <div class="col-5 text-center mt-4">
            <h1>Maintenance</h1>
            <p class="mb-0">ขออภัย กำลังปรับปรุงระบบ</p>
            <p>กรุณาลองใหม่ภายหลัง...</p>
        </div>
    </div>
</div>

<style>
    .maintenance-style {
        height: 100vh;
        background-image: url({{asset('img/game_maintenance.jpg')}});
    }
    h1 {
        font-size: 5rem;
        font-weight: bold;
        letter-spacing: 2px;
        color: #333;
    }
    p {
        font-size: 1.6rem;
        letter-spacing: 1px;
    }
</style>
@endsection