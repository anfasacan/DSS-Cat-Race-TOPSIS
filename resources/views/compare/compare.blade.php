@extends('Layout.master')
@section('title','Compare')
@section('compare')

<style>
    .tengah{
        margin: auto;
  width: 50%;
  padding: 10px;
        text-align: center
    }
</style>

<form method="POST" class="contact100-form validate-form" action="/compare_c" enctype="multipart/form-data">
    @csrf
    <br><br>
    <center><h2>Pilih banyaknya data yang ingin dibandigkan :</h2></center>
        <div class="tengah">
        <a style="font-size: 30px" type="button" class="btn btn-secondary" href="compare_2">2</a>
        <a style="font-size: 30px" type="button" class="btn btn-secondary" href="compare_3">3</a>
        <a style="font-size: 30px" type="button" class="btn btn-secondary" href="compare_4">4</a>
        <a style="font-size: 30px" type="button" class="btn btn-secondary" href="compare_5">5</a>
       <br>
        <br>
</form>
@endsection