$(document).ready(function(){
    function formatAngka(angka) {
        if (typeof(angka) != 'string') angka = angka.toString();
        var reg = new RegExp('([0-9]+)([0-9]{3})');
        while(reg.test(angka)) angka = angka.replace(reg, '$1.$2');
        return angka;
    }


    $('body').on('click', '.ubahAnggota', function () {
        var link_id = $(this).val();
        $.get('/pegawai/anggota/edit/' + link_id, function (anggotas) {
            $('#formAnggotaEdit #nama').val(anggotas.nm_ang);
            $('#formAnggotaEdit #tgl_lahir').val(anggotas.tgl_lahir);
            $('#formAnggotaEdit #alamat').val(anggotas.alamat);
            $('#formAnggotaEdit #jk').val(anggotas.jk);
            $('#formAnggotaEdit #pekerjaan').val(anggotas.pekerjaan);
            $('#formAnggotaEdit #tlp').val(anggotas.tlp);
            $('#formAnggotaEdit #paket').val(anggotas.id_paketdtl);
            $('#formAnggotaEdit').attr('action','/pegawai/anggota/'+anggotas.id_ang);
            $('#fotoAnggotaUbah').attr('src','/images/upload/foto_anggota/'+anggotas.foto);
        })
    });
    $('body').on('click', '.hapusAnggota', function () {
        var link_id = $(this).val();
        $.get('/pegawai/anggota/edit/' + link_id, function (anggotas) {
            $('#AnggotaDelete').attr('action','/pegawai/anggota/delete/'+anggotas.id_ang);
        })
    });

    $('body').on('click', '.lihatAnggota', function () {
        var link_id = $(this).val();
        $.get('/pegawai/anggota/edit/' + link_id, function (anggotas) {
            $('#dnama').html(anggotas.nm_ang);
            $('#dtgl_lahir').html(anggotas.tgl_lahir);
            $('#dalamat').html(anggotas.alamat);
            if (anggotas.jk==1) {
                $('#djk').html("Pria");
            } else {
                $('#djk').html("Wanita");
            }
            $('#dpekerjaan').html(anggotas.pekerjaan);
            $('#dtlp').html(anggotas.tlp);
            $('#fotoAnggota').attr('src','/images/upload/foto_anggota/'+anggotas.foto);
        })
      });

      $('body').on('click', '.Perpanjang', function () {
        var link_id = $(this).val();
        $.get('/pegawai/anggota/edit/' + link_id, function (anggotas) {
            $('#formPerpanjang #id_paket').val(anggotas.id_ang);
            $('#pnama').html(anggotas.nm_ang);
            $('#ptgl_lahir').html(anggotas.tgl_lahir);
            $('#palamat').html(anggotas.alamat);
            if (anggotas.jk==1) {
                $('#pjk').html("Pria");
            } else {
                $('#pjk').html("Wanita");
            }
            $('#ppekerjaan').html(anggotas.pekerjaan);
            $('#ptlp').html(anggotas.tlp);
            $('#formPerpanjang #paket').val(anggotas.id_paketdtl);
            $('#pfotoAnggota').attr('src','/images/upload/foto_anggota/'+anggotas.foto);
            $('#formPerpanjang').attr('action','/pegawai/anggota/perpanjang/'+anggotas.id_ang);
        })
      });


    $('body').on('click', '.lihatPaket', function () {

        var link_id = $(this).val();
        var no=1;
        var i=0;
        $('#tampilHarga').empty();
        $('#dnm_paket').empty();
        $.get('/pemilik/paket/edit/' + link_id, function (paket) {
            //console.log(paket);
            $('#dnm_paket').html('<h3 align="center">'+paket.nm_paket+"</h3>");
        });
        $.get('/pemilik/paket/detail/' + link_id, function (pakets) {
            console.log(pakets);
           $.each(pakets, function(i,data) {
                $('#tampilHarga').append('<tr><td>'+no+'</td><td>Rp. '+formatAngka(pakets[i].harga)+' ,-</td><td>'+pakets[i].bulan+' Bulan</td></tr>');
                no++;
            });
        });
    });
    $('body').on('click', '.ubahPaket', function () {
        var link_id = $(this).val();
        $.get('/pemilik/paket/edit/' + link_id, function (paket) {
            $('#formPaketUbah #nama_paket').val(paket.nm_paket);
            $('#formPaketUbah').attr('action','/pemilik/paket/'+paket.id_paket);
        })
    });
    $('body').on('click', '.hapusPaket', function () {
        var link_id = $(this).val();
        $.get('/pemilik/paket/edit/' + link_id, function (pakets) {
            //console.log(pakets);
            $('#PaketDelete').attr('action','/pemilik/paket/delete/'+pakets.id_paket);
        })
    });
    $('body').on('click', '.tambahTarif', function () {

        var link_id = $(this).val();
        $.get('/pemilik/paket/edit/' + link_id, function (paket) {
            $('#formTambahTarif #id_paket').val(paket.id_paket);
            $('#tarif_paket').html('<h3 align="center">'+paket.nm_paket+"</h3>");
            //console.log(paket);
        });

    });
    $('body').on('click', '.addTarif', function () {
        var link_id = $(this).val();
        $.get('/pemilik/paket/edit/' + link_id, function (paket) {
            window.location="/pemilik/paket/edittarif/"+paket.id_paket;

        });
    });
    $('body').on('click', '.ubahTarif', function () {
        var link_id = $(this).val();
        $.get('/pemilik/paket/gettarif/' + link_id, function (tarifs) {
            //console.log(tarifs);
            $('#formUbahTarif #id_paket').val(tarifs.id_paket);
            $('#formUbahTarif #langganan').val(tarifs.bulan);
            $('#formUbahTarif #harga').val(tarifs.harga);
            $('#formUbahTarif').attr('action','/pemilik/paket/updatetarif/'+tarifs.id_paketdtl);
        })
    });
    $('body').on('click', '.hapusTarif', function () {
        var link_id = $(this).val();
        $.get('/pemilik/paket/gettarif/' + link_id, function (tarifs) {
            //console.log(pakets);
            $('#TarifDelete #id_paket').val(tarifs.id_paket);
            $('#TarifDelete').attr('action','/pemilik/paket/deletetarif/'+tarifs.id_paketdtl);
        })
    });
});


//hidden alert
$(".alert").fadeOut(4000);
