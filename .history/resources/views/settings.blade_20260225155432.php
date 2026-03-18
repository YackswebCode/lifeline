@extends('layouts.app')

@section('title', 'Settings - Lifeline')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card p-3">
                <h5>Quick Links</h5>
                <ul class="nav flex-column">
                    <li class="nav-item"><a href="#profile" class="nav-link">Profile</a></li>
                    <li class="nav-item"><a href="#plan" class="nav-link">Plan & Billing</a></li>
                    <li class="nav-item"><a href="#notifications" class="nav-link">Notifications</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card p-4 mb-4" id="profile">
                <h4>Profile Information</h4>
                <form>
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" class="form-control" value="Dr. Jane Doe">
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" value="jane.doe@hospital.ng">
                    </div>
                    <div class="mb-3">
                        <label>Organization</label>
                        <input type="text" class="form-control" value="Lagos University Teaching Hospital">
                    </div>
                    <button class="btn btn-brand">Update Profile</button>
                </form>
            </div>

            <div class="card p-4 mb-4" id="plan">
                <h4>Current Plan</h4>
                <p><strong>Trial</strong> – 10 free analyses remaining</p>
                <a href="#" class="btn btn-outline-brand">Upgrade to Pro</a>
                <hr>
                <h5>Billing History</h5>
                <table class="table">
                    <tr><td>Feb 1, 2025</td><td>Pro Plan</td><td>$29</td><td>Paid</td></tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection