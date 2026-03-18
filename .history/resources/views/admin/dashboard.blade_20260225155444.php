@extends('layouts.app')

@section('title', 'Admin - Lifeline')

@section('content')
<div class="container">
    <h2>Admin Dashboard</h2>
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card p-3 text-white bg-primary">
                <h5>Total Users</h5>
                <p class="display-6">124</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3 text-white bg-success">
                <h5>Analyses Today</h5>
                <p class="display-6">42</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3 text-white bg-warning">
                <h5>Pending</h5>
                <p class="display-6">3</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3 text-white bg-info">
                <h5>Revenue (NGN)</h5>
                <p class="display-6">₦152k</p>
            </div>
        </div>
    </div>

    <div class="card mt-4 p-3">
        <h5>Recent Users</h5>
        <table class="table">
            <thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Credits</th></tr></thead>
            <tbody>
                <tr><td>1</td><td>John Doe</td><td>john@example.com</td><td>5</td></tr>
                <tr><td>2</td><td>Jane Smith</td><td>jane@clinic.ng</td><td>2</td></tr>
            </tbody>
        </table>
    </div>
</div>
@endsection