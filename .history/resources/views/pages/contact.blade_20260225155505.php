@extends('layouts.app')

@section('title', 'Contact - Lifeline')

@section('content')
<div class="container">
    <h1>Contact Us</h1>
    <div class="row">
        <div class="col-md-6">
            <form>
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Message</label>
                    <textarea class="form-control" rows="4"></textarea>
                </div>
                <button class="btn btn-brand">Send</button>
            </form>
        </div>
        <div class="col-md-6">
            <p><i class="fas fa-envelope me-2"></i> support@lifeline.ai</p>
            <p><i class="fas fa-phone me-2"></i> +234 800 123 4567</p>
            <p><i class="fas fa-map-marker-alt me-2"></i> Lagos, Nigeria</p>
        </div>
    </div>
</div>
@endsection