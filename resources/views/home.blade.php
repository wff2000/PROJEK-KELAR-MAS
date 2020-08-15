@extends('layouts.app')

@section('css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="header" style="background-image: url('{{asset('img/background-1.jpg')}}');">
    <div class="container headerContainer">
        <div class="row">
            <div class="col-md-12 headerContent text-center">.
                <h1>Welcome To Our Website</h1>
            </div>
            <div class="col-md-12 headerContent text-center">
                <h3>The Place that every programmer gather and exchange opinion</h1>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <div class="card-title text-center">
                  <img src="{{ asset('img/htmlLogo.png') }}" alt="">
              </div>
              <p class="card-text text-center">Hypertext Markup Language (HTML) adalah bahasa markah standar untuk dokumen yang dirancang untuk ditampilkan di peramban internet.Peramban internet menerima dokumen HTML dari server web atau dari penyimpanan lokal dan membuat dokumen menjadi halaman web multimedia. HTML menggambarkan struktur halaman web secara semantik dan isyarat awal yang disertakan untuk penampilan dokumen.HTML dapat menyematkan program yang ditulis dalam bahasa scripting seperti JavaScript, yang memengaruhi perilaku dan konten halaman web. Dimasukkannya CSS mendefinisikan tampilan dan tata letak konten</p>
              <div class="buttonContainer text-center">
                  <a href="https://id.wikipedia.org/wiki/HTML" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <div class="card-title text-center">
                    <img src="{{ asset('img/cssLogo.png') }}" alt="">
                </div>
                <p class="card-text text-center">Cascading Style Sheet (CSS) merupakan aturan untuk mengatur beberapa komponen dalam sebuah web sehingga akan lebih terstruktur dan seragam. CSS bukan merupakan bahasa pemograman.Pada umumnya CSS dipakai untuk memformat tampilan halaman web yang dibuat dengan bahasa HTML dan XHTML.CSS dapat mengendalikan ukuran gambar, warna bagian tubuh pada teks, warna tabel, ukuran border, warna border, warna hyperlink, warna mouse over, spasi antar paragraf, spasi antar teks, margin kiri, kanan, atas, bawah, dan parameter lainnya.</p>
                <div class="buttonContainer text-center">
                    <a href="https://id.wikipedia.org/wiki/Cascading_Style_Sheets" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="row" id="row2">
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <div class="card-title text-center">
                    <img src="{{ asset('img/jsLogo.png') }}" alt="">
                </div>
                <p class="card-text text-center">JavaScript adalah bahasa pemrograman tingkat tinggi dan dinamis. JavaScript dapat disisipkan dalam halaman web menggunakan tag SCRIPT. avaScript merupakan salah satu teknologi inti World Wide Web selain HTML dan CSS. JavaScript membantu membuat halaman web interaktif dan merupakan bagian aplikasi web yang esensial. Engine JavaScript disisipkan ke dalam perangkat lunak lain seperti dalam server-side dalam server web dan basis data, dalam program non web seperti perangkat lunak pengolah kata dan pembaca PDF, dan sebagai runtime environment yang memungkinkan penggunaan JavaScript untuk membuat aplikasi desktop maupun mobile.</p>
                <div class="buttonContainer text-center">
                    <a href="https://id.wikipedia.org/wiki/JavaScript" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <div class="card-title text-center">
                    <img src="{{ asset('img/boostrapLogo.png') }}" alt="">
                </div>
                <p class="card-text text-center">Bootstrap adalah kerangka kerja CSS yang sumber terbuka dan bebas untuk merancang situs web dan aplikasi web. Kerangka kerja ini berisi templat desain berbasis HTML dan CSS untuk tipografi, formulir, tombol, navigasi, dan komponen antarmuka lainnya, serta juga ekstensi opsional JavaScript. Tidak seperti kebanyakan kerangka kerja web lainnya, kerangka kerja ini hanya fokus pada pengembangan front-end saja.</p>
                <div class="buttonContainer text-center">
                    <a href="https://id.wikipedia.org/wiki/Bootstrap_(kerangka_kerja)" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
