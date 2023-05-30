@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-light btn-sm me-2">Back</a>
                        <h2 class="fs-4 my-4">Edit Project</h2>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="project-form">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="project_name" class="form-label">Project name</label>
                            <input type="text" class="form-control" id="project_name" name="project_name" value="{{ old('project_name', $project->project_name) }}">
                        </div>
                        <div class="mb-3">
                            <label for="client" class="form-label">Client</label>
                            <input type="text" class="form-control" id="client" name="client" value="{{ old('client', $project->client) }}">
                        </div>
                        <div class="mb-3">
                            <label for="project_description" class="form-label">Project Summary</label>
                            <input type="text" class="form-control" id="project_description" name="project_description" value="{{ old('project_description', $project->project_description) }}">
                        </div>
                        <div class="mb-3">
                            <label for="project_image" class="form-label">Project Image</label>
                            <input class="form-control" type="file" id="project_image" name="project_image">
                            @if ($project->project_image)
                                <input type="text" class="d-none" id="remove-img-input" name="delete_prev_image">
                                <span id="img-removed-message" class="d-none mt-2 text-success">Previous image removed</span>
                                <button type="button" class="btn btn-danger btn-sm mt-2" id="remove-img-btn">Remove previous image</button>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="revenue" class="form-label">Revenue</label>
                            <input type="number" class="form-control" id="revenue" name="revenue" value="{{ old('revenue', $project->revenue) }}">
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="start_date" class="form-label">Start date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $project->start_date) }}">
                            </div>
                            <div class="col">
                                <label for="end_date" class="form-label">End date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', $project->end_date) }}">
                            </div>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="is_completed" name="is_completed" @if ($project->is_completed === 1) checked @endif value="1">
                            <label class="form-check-label" for="is_completed">Project completed</label>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection