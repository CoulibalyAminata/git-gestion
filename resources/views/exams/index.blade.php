<!-- resources/views/exams/index.blade.php -->
@extends('layout')

@section('title', 'Exam List')

@section('content')
    <div class="row">
        <div class="col-md-10 mx-auto mt-5">
            <h1 class="mb-3">Liste des Examens</h1>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ route('exams.create') }}" class="btn btn-info">Ajouter</a>
                <a href="{{ route('exams.results.create') }}" class="btn btn-warning">Enregister les notes</a>
            </div>
            @if (session()->has('success'))
                <div class="alert alert-success text-center my-2">{{ session()->get('success') }}</div>
            @endif
            <table class="table table-striped shadow">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Titre</th>
                        <th>Date de composition</th>
                        <th>Matière</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exams as $exam)
                        <tr>
                            <td>{{ $exam->id }}</td>
                            <td>{{ $exam->title }}</td>
                            <td>{{ $exam->date }}</td>
                            <td>
                                @if ($exam->course)
                                    {{ $exam->course->name }}
                                @else
                                    Cours non disponible
                                @endif
                            </td>
                            <td>
                                <a class="btn text-info" href="{{ route('exams.edit', $exam->id) }}">Edit</a>
                                <form action="{{ route('exams.destroy', $exam->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn text-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
