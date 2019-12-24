$(document).ready(function () {
    //Tombol cari
    $('#tombol-cari').hide();
    //Event ketika keyword di tulis
    $('#keyword').on('keyup', function () {
        // Munculkan icon loading
        // $('#loader').show();

        // Ajax menggunakan load
        $('#container-table').load('ajax/list.php?keyword=' + $('#keyword').val());

        //Ajax menggunakan  $.get
        // $.get('ajax/list.php?keyword=' + $('keyword').val(), function (data) {


        // $('#container-table').html(data);
        //Gambar gif loader di hide setelah data muncul
        // $('.loader').hide();
        // })
    });




});