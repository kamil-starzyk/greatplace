@extends('layout')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/add.css') }}">
@endpush

@section('content')

<div id="main-wrapper">

    <div id="main-box">
        <form action="{{ route('add-form-1') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box__input">
                <input class="box__file" type="file" name="files[]" id="file" data-multiple-caption="{count} files selected" multiple />
                <label for="file"><strong>Choose a file</strong><span class="box__dragndrop"> or drag it here</span>.</label>
                <button class="box__button" type="submit">Dalej</button>
            </div>
            <div class="box__uploading">Uploading…</div>
            <div class="box__success">Done!</div>
            <div class="box__error">Error! <span></span>.</div>
        </form>
    </div>
        
</div>

@endsection