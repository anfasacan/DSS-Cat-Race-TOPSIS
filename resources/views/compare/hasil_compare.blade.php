@extends('Layout.master')
@section('title','Hasil Compare')
@section('hasil_compare')
<style>
    .tengah{
        margin: auto;
  width: 50%;
  padding: 10px;
        text-align: center
    }
    .kanankiri{
        margin-left: 10%;
        margin-right: 10%
    }
</style>

<form method="POST" class="contact100-form validate-form" action="/compare_c" enctype="multipart/form-data">
    @csrf
        <br><br>
        <center><h2>Pilih banyaknya data yang ingin dibandingkan :</h2></center>
        <div class="tengah">
            <a style="font-size: 30px" type="button" class="btn btn-secondary" href="compare_2">2</a>
            <a style="font-size: 30px" type="button" class="btn btn-secondary" href="compare_3">3</a>
            <a style="font-size: 30px" type="button" class="btn btn-secondary" href="compare_4">4</a>
            <a style="font-size: 30px" type="button" class="btn btn-secondary" href="compare_5">5</a>
        </div>
       
</form>
<br>
<br>
<table class="table" style="margin-top:20px; width :80%; margin-left :10%; margin-right:10%">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Peringkat</th>
        <th scope="col">Ras Kucing</th>
        <th scope="col">Preference</th>
        <th scope="col">Informasi</th>
      </tr>
    </thead>
    <tbody>
        <?php
        $k=0;
        foreach ($x_compare as $ranks){
            echo"<tr>";
                
                echo "<td>".($k+1)."</td>";
                for($p=0;$p< 2;$p++)
                {
                    echo "<td>".$vtot_r[$k][$p]."</td>";
                }
                $k++;
                ?>
            
            {{-- <td><a type="button"; data-toogle="modal"; data-target="{{$x_rank[$k-1][0]}}" > ? </a> </td> --}}
            <td><button style="background-color:white; border: none; color:white; text-decoration: none; display: inline-block;" type="button" data-toggle="modal" data-target="#{{str_replace(' ','',$x_rank[$k-1][0])}}">
                <img src="{{URL::to('/')}}/images/logo/icon_question.jpg" width="30px" height="30px" class="" alt="Img_Logo">
              </button></td>
            
                <?php
            }
            ?>


</tr>
                
    </tbody>
  </table>

  <?php
// Berdasarkan perbandingan ras kucing yang telah dilakukan dengan menggunakan metode TOPSIS, maka ras kucing yang terbaik untuk diadopsi adalah yang memiliki nilai preference tertinggi, yaitu ras kucing...... disusul ras kucing... kemudian ras kucing.... lalu ras kucing dan terakhir ras kucing.....
            if (count($x_rank) == 2){
                // echo "ranking 1 adalah ".$x_rank[0][0];
                $keterangan = ("Berdasarkan perbandingan ras kucing yang telah dilakukan dengan menggunakan metode TOPSIS, maka ras kucing yang terbaik untuk diadopsi adalah yang memiliki nilai preference tertinggi, yaitu ras kucing "
                .$vtot_r[0][0].", dan disusul ras kucing ".$vtot_r[1][0].".");
            }
            elseif (count($x_rank) == 3){
                $keterangan = ("Berdasarkan perbandingan ras kucing yang telah dilakukan dengan menggunakan metode TOPSIS, maka ras kucing yang terbaik untuk diadopsi adalah yang memiliki nilai preference tertinggi, yaitu ras kucing "
                .$vtot_r[0][0].", disusul ras kucing ".$vtot_r[1][0].", dan terakhir ras kucing ".$vtot_r[2][0].".");
            }
            elseif (count($x_rank) == 4){
                $keterangan = ("Berdasarkan perbandingan ras kucing yang telah dilakukan dengan menggunakan metode TOPSIS, maka ras kucing yang terbaik untuk diadopsi adalah yang memiliki nilai preference tertinggi, yaitu ras kucing "
                .$vtot_r[0][0].", disusul ras kucing ".$vtot_r[1][0].", kemudian ras kucing ".$vtot_r[2][0].", dan terakhir ras kucing ".$vtot_r[3][0].".");
            }
            elseif (count($x_rank) == 5){
                $keterangan = ("Berdasarkan perbandingan ras kucing yang telah dilakukan dengan menggunakan metode TOPSIS, maka ras kucing yang terbaik untuk diadopsi adalah yang memiliki nilai preference tertinggi, yaitu ras kucing "
                .$vtot_r[0][0].", disusul ras kucing ".$vtot_r[1][0].", kemudian ras kucing ".$vtot_r[2][0].", lalu ras kucing ".$vtot_r[3][0].", dan terakhir ras kucing ".$vtot_r[4][0].".");
            }
            ?>
            <br>
            <br>
    <div class="kanankiri">
        <h3><b>Kesimpulan :</b></h3>
        <h4>{{$keterangan}}</h4>
    </div>
  
 @for($i=0;$i<count($x_rank);$i++)


<!-- Modal -->
<div class="modal fade" id="{{str_replace(' ','',$x_rank[$i][0])}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered " role="document">
	<div class="modal-content">

		<div class="modal-header">
            <h1  style="margin-left : 30%" id="exampleModalLongTitle">{{$x_rank[$i][0]}}</h1>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<div class="modal-body">

			<div class="card mb-3">
				<div class=" row no-gutters">
					<div class="col-md-6 mt-5">
					<img src="{{URL::to('/')}}/images/kucing/{{$x_rank[$i][8]}}" width="100px" height="300px" class="card-img" alt=""></a>
					</div>
					<div class="col-md-6">
						<div class="card-body">
							{{-- <h4 class="card-title text-black">Informasi Kucing</h4> --}}
                            <div class="text-black">
                                <tr>
									<td><h4 style="text-align: left;"><b>Biaya Adopsi :</h5></b></td>
									<td><h5>Rp.{{number_format($x_rank[$i][1],2,',',',')}},-</h5></td>
								</tr>
                                <?php
                                if($x_rank[$i][2]==1){
                                    $perawatan = "sangat mudah";
                                }
                                elseif ($x_rank[$i][2]==2) {
                                    $perawatan = "mudah";
                                }
                                elseif ($x_rank[$i][2]==3) {
                                    $perawatan = "tidak sulit dan tidak mudah";
                                }
                                elseif ($x_rank[$i][2]==4) {
                                    $perawatan = "sulit";
                                }
                                elseif ($x_rank[$i][2]==5) {
                                    $perawatan = "sangat sulit";
                                }
                                ?>
								<tr>
									<td><h4 style="text-align: left;"><b>Perawatan :</b></h4></td>
									<td><h5>{{$perawatan}}</h5></td>
								</tr>
								
                                <?php
                                if($x_rank[$i][3]==1){
                                    $lingkungan_hidup = "Dimana Saja";
                                }
                                elseif ($x_rank[$i][3]==2) {
                                    $lingkungan_hidup = "Ditempat Bersih atau Luas";
                                }
                                elseif ($x_rank[$i][3]==3) {
                                    $lingkungan_hidup = "Ditempat Bersih dan Luas";
                                }
                                elseif ($x_rank[$i][3]==4) {
                                    $lingkungan_hidup = "Ditempat Spesial untuk Rasnya";
                                }
                                elseif ($x_rank[$i][3]==5) {
                                    $lingkungan_hidup = "Ditempat Bersih, Luas, dan Spesial untuk Rasnya";
                                }
                                ?>
								<tr>
									<td><h4 style="text-align: left;"><b>Lingkungan Hidup atau kandang :</b></h4></td>
									<td><h5>{{$lingkungan_hidup}}</h5></td>
								</tr>
                                <?php
                                if($x_rank[$i][4]==1){
                                    $sifat = "Kurang Cerdas dan Kurang Bersahabat";
                                }
                                elseif ($x_rank[$i][4]==2) {
                                    $sifat = "Cerdas Atau Bersahabat";
                                }
                                elseif ($x_rank[$i][4]==3) {
                                    $sifat = "Cerdas dan Bersahabat";
                                }
                                elseif ($x_rank[$i][4]==4) {
                                    $sifat = "Sangat cerdas atau sangat Bersahabat";
                                }
                                elseif ($x_rank[$i][4]==5) {
                                    $sifat = "Sangat cerdas dan sangat Bersahabat";
                                }
                                ?>
                                <tr>
									<td><h4 style="text-align: left;"><b>Sifat :</b></h4></td>
									<td><h5>{{$sifat}}</h5></td>
								</tr>

                                <?php
                                if($x_rank[$i][5]==1){
                                    $penampilan = "Kurang Menarik";
                                }
                                elseif ($x_rank[$i][5]==2) {
                                    $penampilan = "Biasa Saja";
                                }
                                elseif ($x_rank[$i][5]==3) {
                                    $penampilan = "Cukup Menarik";
                                }
                                elseif ($x_rank[$i][5]==4) {
                                    $penampilan = "Menarik";
                                }
                                elseif ($x_rank[$i][5]==5) {
                                    $penampilan = "Sangat Menarik";
                                }
                                ?>
                                <tr>
									<td><h4 style="text-align: left;"><b>penampilan :</b></h4></td>
									<td><h5>{{$penampilan}}</h5></td>
								</tr>

                                <?php
                                if($x_rank[$i][6]==1){
                                    $kepemilikan = "Banyak yang sudah punya";
                                }
                                elseif ($x_rank[$i][6]==2) {
                                    $kepemilikan = "Tidak banyak dan Tidak sedikit yang punya";
                                }
                                elseif ($x_rank[$i][6]==3) {
                                    $kepemilikan = "Cukup jarang yang punya";
                                }
                                elseif ($x_rank[$i][6]==4) {
                                    $kepemilikan = "Jarang yang punya";
                                }
                                elseif ($x_rank[$i][6]==5) {
                                    $kepemilikan = "Jarang Sekali yang punya";
                                }
                                ?>
                                <tr>
									<td><h4 style="text-align: left;"><b>kepemilikan :</b></h4></td>
									<td><h5>{{$kepemilikan}}</h5></td>
								</tr>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
		</div>
	</div>
	</div>
</div>
			</div>
            @endfor

            

@endsection