@extends('layouts.app')

@php
    use Carbon\Carbon;
@endphp

@section('content')
<div class="container">
    <h2 class="fs-4 text-primary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white fw-bold">Projects Stats</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div>Project count: {{ $totalProjects }}</div>
                    <div>Last creation: {{ $lastCreation->project_name }}</div> 
                    <div>Creation date: {{$lastCreation->created_at->format('H:i')}} - {{$lastCreation->created_at->format('d/m')}}</div>   
                    <div>Last edit: {{ $lastEdit->project_name }}</div>
                    <div>Last edit date: {{$lastEdit->updated_at->format('H:i')}} - {{$lastEdit->updated_at->format('d/m')}}</div>
                    <div>Revenue: {{ number_format($totalRevenue, 0, ' ', '') }}€</div>
                </div>
                <div class="card-header bg-primary">
                    <a href="{{ route('admin.projects.index') }}" class="text-decoration-none d-flex align-items-center text-white fw-bold">
                        All projects
                        <i class="ms-2 bi bi-arrow-right-circle-fill fs-3"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


