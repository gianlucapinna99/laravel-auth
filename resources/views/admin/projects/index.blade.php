@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="fs-4 my-4">Personal Projects</h2>
                @if (session('message'))
                    <div class="alert alert-danger mb-0" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <a href="{{ route('admin.projects.create') }}" class="btn btn-sm ms-2 custom-link">Create new project</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Project Name</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Revenue</th>
                        <th scope="col">Client</th>
                        <th scope="col">Project Summary</th>
                        <th scope="col">Status</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <th scope="row">
                                <a href="{{ route('admin.projects.show', $project->id) }}">
                                    {{ $project->project_name }}
                                </a>
                            </th>
                            <td>{{ $project->start_date }}</td>
                            <td>{{ $project->end_date }}</td>
                            <td>{{ $project->revenue }}€</td>
                            <td>{{ $project->client }}</td>
                            <td>{{ $project->project_description }}</td>
                            <td>{{ $project->is_completed == 0 ? 'Not Completed' : 'Completed' }}</td>
                            <td>{{ $project->slug }}</td>
                            <td>
                                <div class="d-flex justify-content-between gap-1">
                                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('admin.projects.edit', $project->id) }}"
                                        class="btn btn-primary btn-sm">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
