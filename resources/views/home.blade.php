@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!

                    @can('edit_forum')
                        <a href="#">Edit the users</a>
                    @endcan

                    @can('manage_money')
                        <a href="#">Manage the funds</a>
                    @endcan                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
