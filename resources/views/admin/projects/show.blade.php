@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <div class="d-flex align-items-center">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-light btn-sm me-2">Back</a>
                <h2 class="fs-4 my-4">Project Details</h2>
                @if (session('message'))
                    <div class="alert alert-success ms-auto p-2" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="card-body">
            <h4>Project name: {{ $project->project_name }}</h4>
            @if (isset($project->project_image))
                <img src="{{ asset('storage/' . $project->project_image) }}" alt="{{ $project->project_name }} image"
                    class="project-image">
            @endif
            <div>Project start date: {{ $project->start_date }}</div>
            <div>Project end date: {{ $project->end_date }}</div>
            <div>Project revenue: {{ $project->revenue }}€</div>
            <div>Project client: {{ $project->client }}</div>
            <div>Project summary: {{ $project->project_description }}</div>
            <div>Project status: {{ $project->is_completed == 0 ? 'Not Completed' : 'Completed' }}</div>
            <div>Project slug: {{ $project->slug }}</div>
        </div>
    </div>
</div>
@endsection
