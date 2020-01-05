@extends('admin.layouts.master')

@section('content')
<div id="bills">
    <list-bill/>
</div>
@endsection
@section('script')
<script src="{{ mix('js/app.js') }}" defer></script>
@endsection
