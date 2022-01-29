@extends('layouts.master')
@section('title','Login')
@section('styles')
  <link rel="stylesheet" href="{{asset('css/login.css')}}">

@endsection

@section('content')
    <div class="d-flex flex-column justify-content-start align-items-center shadow-sm bg-white rounded p-0" style="min-height: 370px; max-height: 370px; min-width: 370px; max-width: 370px;">
        <div>
            <div class="col-12 col-sm-12 d-flex align-items-stretch justify-content-start" style="min-height: 130px;">
                <div class="col-2 col-sm-2 d-flex justify-content-start">
                    <img src="{{ asset('assets/ribbon.png') }}" class="img-fluid" alt=""/>
                </div>
                <div class="col-6 col-sm-7 d-flex justify-content-start p-3">
                    <img src="{{ asset('assets/binus-logo.png') }}" class="img-fluid" alt=""/>
                </div>
                <div class="col-sm-4 col-3"></div>
            </div>
        </div>
        <form action="/login" method="post" class="d-flex flex-column justify-content-center align-items-center mt-4">
            {{ csrf_field() }}
            <div class="form-group py-1" style="min-width: 250px; max-width: 250px;">
                <input type="email" name="email" class="form-control" placeholder="Username" value="{{old('email')}}"/>
            </div>
            <div class="form-group py-1" style="min-width: 250px; max-width: 250px">
                <input type="password" name="password" class="form-control" placeholder="Password" value="{{old('password')}}"/>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger py-2 my-1 mb-2" style="min-width: 250px;max-width: 250px">
                    {{$errors->first()}}
                </div>
            @else
                <div class="mb-4"></div>
            @endif

            <div class="form-group d-flex justify-content-center">
                <button type="submit" class="btn btn-primary" style="min-width: 250px">Login</button>
            </div>
            @if ($errors->any())

            @else
                <div class="form-group d-flex justify-content-center mt-2">
                    <a href="/webcompiler">Continue without login</a>
                </div>
            @endif

        </form>
    </div>
@endsection
