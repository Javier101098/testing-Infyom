@extends('layouts.app')
@section('title')
    Autors 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Autors</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('autors.create')}}" class="btn btn-primary form-btn">Autor <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('autors.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

