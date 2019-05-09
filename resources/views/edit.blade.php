@extends('layouts.app')
{{-- Ovaj prikaz nam omogućuje mjenjanje uloge korisnika --}}
@section('content')
<div class="container">
    <div class="row">
            <div class="col-md-8 col-md-offset-2">
            
                <form action="{{ action('HomeController@update', $user->id)}}" method="POST">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="role" class="col-md-4 control-label">Role:</label>
                            
                            <div class="col-md-6">
                                <label class="radio-inline">
                                    {{-- pročitaj iz baze trenutnu ulogu i prikaži je na radio button-u --}}
                                    <input type="radio" name="role" {{($user->role=='student')? 'checked':''}} value="student">Student
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="role" {{($user->role=='teacher')? 'checked':''}} value="teacher">Teacher
                                </label>
                            </div>
                        </div>
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-btn fa-plus"></i>Change role</button>
                    
                    <input name="_method" type="hidden" value="PUT">
                </form>

        </div>
    </div>
</div>
@endsection
