@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card bg-light border-0">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-light btn-sm me-2">Back</a>
                        <h2 class="fs-4 my-4">Create Project</h2>
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

                    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="project-form">
                        @csrf

                        <div class="mb-3">
                            <label for="project_name" class="form-label">Project name</label>
                            <input type="text" class="form-control" id="project_name" name="project_name">
                        </div>
                        <div class="mb-3">
                            <label for="client" class="form-label">Client</label>
                            <input type="text" class="form-control" id="client" name="client">
                        </div>
                        <div class="mb-3">
                            <label for="project_description" class="form-label">Project Summary</label>
                            <input type="text" class="form-control" id="project_description" name="project_description">
                        </div>
                        <div class="mb-3">
                            <label for="project_image" class="form-label">Project Image</label>
                            <input class="form-control" type="file" id="project_image" name="project_image">
                        </div>
                        <div class="mb-3">
                            <label for="revenue" class="form-label">Revenue</label>
                            <input type="number" class="form-control" id="revenue" name="revenue">
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="start_date" class="form-label">Start date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date">
                            </div>
                            <div class="col">
                                <label for="end_date" class="form-label">End date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date">
                            </div>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="is_completed" name="is_completed" value="1">
                            <label class="form-check-label" for="is_completed">Project completed</label>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


