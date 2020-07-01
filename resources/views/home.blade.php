@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!

                    <br>

                    Visit your projects page: <a href="/projects"
                        class="hover:underline hover:text-gray-700">Projects</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection