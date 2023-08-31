@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            Progetti
        </h2>
        <div class="row justify-content-center">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">title</th>
                        <th scope="col">link</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr>
                            <th scope="row">{{ $project->id }}</th>
                            <td>{{ $project->title }}</td>
                            <td><a class="text-decoration-none text-white"
                                    href="{{ $project->link }}">{{ $project->link }}</a></td>
                            <td>
                                <div class="d-flex">
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.admin.show', $project) }}"><i
                                            class="fas fa-eye"></i></a>
                                    <a class="btn btn-warning btn-sm mx-2" href="#"><i
                                            class="fas fa-pencil text-white"></i></a>
                                    <form action="{{ route('admin.admin.destroy', $project) }}" method="POST"
                                        class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th>Non ci sono progetti</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    @vite('resources\js\delete-confirmation.js');
@endsection
