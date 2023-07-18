<!-- update.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Update User IDs</h1>

        <form action="{{ route('updateID') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Update User IDs</button>
        </form>
    </div>
@endsection
