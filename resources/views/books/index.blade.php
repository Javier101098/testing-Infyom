@extends('layouts.app')
@section('title')
    Books 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Books</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('books.create')}}" class="btn btn-primary form-btn">Books <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('books.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

