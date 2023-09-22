@extends('template')

@section('content')
    <div class="col container">
        <h2 class="h2 text-center text-gray-400 pt-5 pb-4 text-capitalize display-3">
            Admin Tasks
        </h2>
        <div class="row justify-content-center">
            <div class="col-lg-12 text-gray-400 pr-5 pl-5 pt-3 pb-3">

                <!-- Success Alert -->
                @if(session('success'))
                    <div class="alert alert-success fade mb-4 show col-8 d-flex align-items-center" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close ml-4" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Tasks -->
                <div class="admin-tasks">
                    <div class="btn btn-danger mb-2" role="button">
                        <a href="{{ route('ClearCache') }}" class="text-white text-decoration-none">
                            Clear Cache
                        </a>
                    </div>

                    <div class="btn btn-danger mb-2" role="button">
                        <a href="{{ route('ClearViews') }}" class="text-white text-decoration-none">
                            Clear Views
                        </a>
                    </div>

                    <div class="btn btn-danger mb-2" role="button">
                        <a href="{{ route('ClearRoutes') }}" class="text-white text-decoration-none">
                            Clear Routes
                        </a>
                    </div>

                    <div class="btn btn-danger mb-2" role="button">
                        <a href="{{ route('ClearConfig') }}" class="text-white text-decoration-none">
                            Clear Config Cache
                        </a>
                    </div>

                    <div class="btn btn-danger mb-2" role="button">
                        <a href="{{ route('MigrateDatabase') }}" class="text-white text-decoration-none">
                            Run Database Migrations
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
