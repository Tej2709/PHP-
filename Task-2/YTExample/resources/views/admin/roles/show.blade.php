@extends('admin.layouts.dashboard')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Name: {{$role['name']}}</h3>
            <h4>Slug: {{$role['slug']}}</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Permission</h5>
            <p class="card-text">
                ...........
            </p>
        </div>
        <div class="card-footer">
            <a href="{{ url()->previous() }}" class="btn btn-primary">Go back</a>
        </div>
    </div>
</div>
<a class="nav-link float-right" href="/roles">
        <i class="fa-solid fa-circle-arrow-left"></i>
        <span>Back</span>
    </a>


@endsection