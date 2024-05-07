@extends('layout')

@section('link-css')
    <link rel="stylesheet" href="/css/pagecss/home.css">
@endsection

@section('content')
    <div class="container">
        <div class="judul text-center fw-bolder mt-5">
            <h2>Welcome Back!</h2>
        </div>

        <div class="my-3 d-flex justify-content-end">
            <a style="background-color: #FFC107; color: black;" href="{{url('/addProduct')}}" class="btn ">Add New Vehicle</a>
        </div>

        <div class="judul text-center fw-bolder mt-5">
            <h2>No Vehicle</h2>
        </div>

        {{-- @foreach ($recipes as $recipe)
            <div class="body d-flex flex-row align-items-center border border-dark shadow p-3 mb-5 bg-body rounded mx-auto">
                <div class="img px-3 py-3">
                    <img src="{{ asset('storage/recipe/'. $recipe->image) }}" alt="" width="300px" height="300px">
                </div>

                <div class="isi d-flex flex-column">
                    <div class="">
                        <h3>{{$recipe->title}}</h3>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>By {{$recipe->author}}</span>
                    </div>

                    <hr class="hr hr-blurry" />

                    <div class="d-flex flex-col ">
                        <a href="{{url('updateRecipe/'.$recipe->id)}}" style="background-color: #F9DB6D; color: black;" class="btn">
                            Edit Recipe
                        </a>
                        <form action="{{url('deleteRecipe/'.$recipe->id)}}" method="POST">
                            @csrf
                            <a class="ms-3">
                                <button class="btn" type="submit" style="background-color: #F9DB6D; color: black;">
                                    Delete Recipe
                                </button>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach --}}

    </div>
@endsection
