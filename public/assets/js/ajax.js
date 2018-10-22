$(document).ready(function(){
    function formatAngka(angka) {
        if (typeof(angka) != 'string') angka = angka.toString();
        var reg = new RegExp('([0-9]+)([0-9]{3})');
        while(reg.test(angka)) angka = angka.replace(reg, '$1.$2');
        return angka;
    }

    $('#formAnggota').on('change', '#id_paket', function () {
        var id = $(this).val();
        $.get('/pegawai/anggota/getpaket/' + id, function (data) {
            //console.log(data);
            $('#formAnggota #nm_paket').val(data.nm_paket);
            $('#formAnggota #harga').val("Rp. "+formatAngka(data.harga)+",-");
            $('#formAnggota #langganan').val(data.bulan+" Bulan");
        })
    });
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
            $('#formAnggotaEdit').attr('action','/pegawai/anggota/'+anggotas.id);
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

    $('body').on('click', '.ubahPerdatang', function () {
        var link_id = $(this).val();
        $.get('/pemilik/paket/getperdatang', function (perdatang) {
            //console.log(perdatang);
            $('#formPerdatangUbah #harga').val(perdatang[0].harga);
            $('#formPerdatangUbah').attr('action','/pemilik/paket/updateperdatang/'+perdatang[0].id_paketdtl);
        })
    });
});

$('body').on('click', '.ubahService', function () {
    var link_id = $(this).val();
    $.get('/admin/service/edit/' + link_id, function (services) {
        console.log(services);
        $('#formServiceUbah #nm_service').val(services.nm_service);
        $('#formServiceUbah #data_limit').val(services.data_limit);
        $('#formServiceUbah #harga').val(services.harga);
        $('#formServiceUbah #type_service').val(services.type_service);
        $('#formServiceUbah').attr('action','/admin/service/'+services.id_service);
    })
});
$('body').on('click', '.hapusService', function () {
    var link_id = $(this).val();
    $.get('/admin/service/edit/' + link_id, function (services) {
        //console.log(pakets);
        $('#ServiceDelete #id_service').val(services.id_service);
        $('#ServiceDelete').attr('action','/admin/service/delete/'+services.id_service);
    })
});

$('body').on('click', '.ubahPegawai', function () {
    var link_id = $(this).val();
    $.get('/pemilik/pegawai/edit/' + link_id, function (pegawais) {
        $('#formPegawaiUbah #nm_lengkap').val(pegawais.nm_lengkap);
        $('#formPegawaiUbah #tgl_lahir').val(pegawais.tgl_lahir);
        $('#formPegawaiUbah #alamat').val(pegawais.alamat);
        $('#formPegawaiUbah #jk').val(pegawais.jk);
        $('#formPegawaiUbah #tlp').val(pegawais.tlp);
        $('#formPegawaiUbah #email').val(pegawais.email);
        $('#formPegawaiUbah #username').val(pegawais.username);
        $('#formPegawaiUbah').attr('action','/pemilik/pegawai/'+pegawais.id_user);
        $('#fotoPegawaiUbah').attr('src','/images/upload/foto_user/'+pegawais.foto);
    })
});

$('body').on('click', '.lihatPegawai', function () {
    var link_id = $(this).val();
    $.get('/pemilik/pegawai/edit/' + link_id, function (pegawais) {
        $('#dusername').html(pegawais.username);
        $('#demail').html(pegawais.email);
        $('#dnama').html(pegawais.nm_lengkap);
        $('#dtgl_lahir').html(pegawais.tgl_lahir);
        $('#dalamat').html(pegawais.alamat);
        if (pegawais.jk==1) {
            $('#djk').html("Pria");
        } else {
            $('#djk').html("Wanita");
        }
        $('#dtlp').html(pegawais.tlp);
        $('#fotoPegawai').attr('src','/images/upload/foto_user/'+pegawais.foto);
    })
  });
  $('body').on('click', '.hapusPegawai', function () {
    var link_id = $(this).val();
    $.get('/pemilik/pegawai/edit/' + link_id, function (pegawais) {
        //console.log(pakets);
        $('#PegawaiDelete').attr('action','/pemilik/pegawai/delete/'+pegawais.id_user);
    })
});



//hidden alert
$(".alert").fadeOut(4000);
