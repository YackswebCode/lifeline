@extends('layouts.app')

@section('title', 'Dashboard - Lifeline')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card p-3 text-center">
                <h5>Credits Left</h5>
                <p class="display-6" style="color:var(--brand);">10</p>
                <a href="{{ route('settings') }}" class="btn btn-sm btn-outline-brand">Buy More</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>Your Recent Analyses</h3>
                <a href="{{ route('analyze') }}" class="btn btn-brand">+ New Analysis</a>
            </div>
            <div class="card p-3">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Image</th>
                            <th>Findings</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Mock rows -->
                        <tr>
                            <td>2025-02-20</td>
                            <td><img src="https://via.placeholder.com/50" class="img-thumbnail"></td>
                            <td>Opacity in right lower zone</td>
                            <td><span class="badge bg-success">Completed</span></td>
                        </tr>
                        <tr>
                            <td>2025-02-19</td>
                            <td><img src="https://via.placeholder.com/50" class="img-thumbnail"></td>
                            <td>Normal</td>
                            <td><span class="badge bg-success">Completed</span></td>
                        </tr>
                        <tr>
                            <td>2025-02-18</td>
                            <td><img src="https://via.placeholder.com/50" class="img-thumbnail"></td>
                            <td>Pending...</td>
                            <td><span class="badge bg-warning">Processing</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection