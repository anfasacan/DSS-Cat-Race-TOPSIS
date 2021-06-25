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

<form method="POST" class="contact100-form validate-form" action="/compare_c_4" enctype="multipart/form-data">
    @csrf
    <br><br>
    <center><h2>Pilih banyaknya data yang ingin dibandigkan :</h2></center>

    {{-- <div style="margin-top:20px; margin-left :40%; margin-right:10%"> --}}
        <div class="tengah">
            <a style="font-size: 30px" type="button" class="btn btn-secondary" href="compare_2">2</a>
            <a style="font-size: 30px" type="button" class="btn btn-secondary" href="compare_3">3</a>
            <a style="font-size: 30px" type="button" class="btn btn-secondary" href="compare_4">4</a>
            <a style="font-size: 30px" type="button" class="btn btn-secondary" href="compare_5">5</a>
       <br>
        <br>
        <span ><h2>Masukan 4 Jenis Kucing untuk dibandigkan</h2></span>
        <div>
          <select class="form-control form-control-lg" name="kucing1" style="">
                <option disabled selected value style="display: :none">Pilih</option>
                @foreach ($data_kucing as $kucing1)
                <option>{{$kucing1->jenis_kucing}}</option>
                @endforeach
            </select>
            <select class="form-control form-control-lg" name="kucing2" style="">
              <option disabled selected value style="display: :none" >Pilih</option>
              @foreach ($data_kucing as $kucing2)
                <option>{{$kucing2->jenis_kucing}}</option>
                @endforeach
            </select>
            <select class="form-control form-control-lg" name="kucing3" style="">
                <option disabled selected value style="display: :none" >Pilih</option>
                @foreach ($data_kucing as $kucing3)
                <option>{{$kucing3->jenis_kucing}}</option>
                @endforeach
              </select>
              <select class="form-control form-control-lg" name="kucing4" style="">
                <option disabled selected value style="display: :none" >Pilih</option>
                @foreach ($data_kucing as $kucing4)
                <option>{{$kucing4->jenis_kucing}}</option>
                @endforeach
              </select>
        </div>    
    </div>
<div class="tengah">
<button type="submit" class="btn btn-outline-dark btn-lg">
    <span>
        Bandingkan !
        <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
    </span>
</button>
</div>
</form>
@endsection