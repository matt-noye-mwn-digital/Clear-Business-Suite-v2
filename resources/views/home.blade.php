@extends('layouts.app')

@section('content')
    @if($user->hasRole(['super admin', 'admin', 'staff']))
        <script>
            window.location = '{{ route('admin.dashboard') }}';
        </script>
    @elseif($user->hasRole('client'))
        <script>
            window.location = '{{ route('client.dashboard') }}';
        </script>
    @elseif($user->hasRole('lead'))

    @else
        <div class="row">
            <div class="col-12">
                <h1>You do not belong here, go away.</h1>
            </div>
        </div>
    @endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
