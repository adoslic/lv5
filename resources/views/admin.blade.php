@extends('layouts.app')
{{-- Ovaj prikaz nam predstavlja popis korisnika --}}
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    @foreach ($users as $user)
                        @if($user->id != $id)   
                        {{-- Prikaži sve korisnike osim admina --}}
                            <a href="home/{{$user->id}}">{{$user->name}}</a><br>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection