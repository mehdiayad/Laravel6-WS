@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">Dashboard</div>

                <div class="card-body">
                   
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <passport-clients></passport-clients> <br/>
                    <passport-personal-access-tokens></passport-personal-access-tokens> <br/>
                    <passport-authorized-clients></passport-authorized-clients> <br/>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
