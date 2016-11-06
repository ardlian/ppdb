<?php
return [
    'Pendaftaran' => [
        'type' => 1,
        'description' => 'Tugas Pendaftaran',
        'children' => [
            'permissionChat',
            'InputPendaftar',
            'UpdatePendaftar',
            'ViewPendaftar',
            'deletePendaftar',
            'lihatRangking',
            'InputNilai',
            'updateNilai',
            'deleteNilai',
            'MenuNilai',
            'menuPendaftaran',
            'listKabupaten',
        ],
    ],
    'InputPendaftar' => [
        'type' => 2,
        'description' => 'input data pendaftar',
        'children' => [
            '/calon-siswa/create',
        ],
    ],
    'UpdatePendaftar' => [
        'type' => 2,
        'description' => 'Update Data Pendaftar',
        'children' => [
            '/calon-siswa/update',
        ],
    ],
    'ViewPendaftar' => [
        'type' => 2,
        'description' => 'Melihat Detail Data Pendaftar',
        'children' => [
            '/calon-siswa/view',
        ],
    ],
    'deletePendaftar' => [
        'type' => 2,
        'description' => 'Delet Data Pendaftar',
        'children' => [
            '/calon-siswa/delete',
        ],
    ],
    '/chat/*' => [
        'type' => 2,
    ],
    'permissionChat' => [
        'type' => 2,
        'description' => 'Boleh Ngakses Chat',
        'children' => [
            '/chat/*',
        ],
    ],
    'Daftar Ulang' => [
        'type' => 1,
        'description' => 'Petugas Daftar Ulang',
        'children' => [
            'permissionChat',
        ],
    ],
    'Validator' => [
        'type' => 1,
        'description' => 'Petugas Validator',
        'children' => [
            'permissionChat',
        ],
    ],
    'Sekertaris' => [
        'type' => 1,
        'description' => 'Pencetak Laporan Jurnal Harian',
        'children' => [
            'permissionChat',
            'lihatRangking',
            'indexPencabutan',
            'MenuNilai',
            'LihatDetailPencabutan',
            'mencabutSiswa',
            'menuCetak',
            'CetakJurnalPendaftaran',
            'printJurnalPPDB',
            'lihatSebelumCetak',
            'menucetakBukuNomorPendaftaran',
            'LihatTempateCetakBukuNomorPPDB',
            'PermissionCetakBukuNomorPPDB',
            'cetakBukuDataPencabutanALL',
            'lihatTemplateCetakCabut',
            'menuCetakBukuRekapCabutan',
            'InputPendaftar',
            'UpdatePendaftar',
            'ViewPendaftar',
            'deletePendaftar',
            'menuPendaftaran',
            'PilihTanggalCetakBukuPendaftaran',
            'CetakBukuPendaftaran',
            'lihatTempletBukuPendaftaran',
            'menuCetakPemberitahuanDiterima',
            'cetakTemplateTerima',
            'cetakSuratTerima',
            'CetakSemuaSuratPemberitahuanDiterima',
            'listKabupaten',
            'exportDownloadGridView',
            'ijinMenarikPencabutan',
            'pilihHalamanCetakSuratDiterima',
        ],
    ],
    'Admin' => [
        'type' => 1,
        'description' => 'Penguasa Sistem',
        'children' => [
            'createTapel',
            'ViewTapel',
            'updateTapel',
            'deleteTapel',
            'permissionAmin2',
            'permissionGii',
        ],
    ],
    '/*' => [
        'type' => 2,
    ],
    '/tapel/index' => [
        'type' => 2,
    ],
    '/tapel/view' => [
        'type' => 2,
    ],
    '/tapel/create' => [
        'type' => 2,
    ],
    '/tapel/update' => [
        'type' => 2,
    ],
    '/tapel/delete' => [
        'type' => 2,
    ],
    'createTapel' => [
        'type' => 2,
        'description' => 'Ijin Membuat TahunAjaran',
        'children' => [
            '/tapel/index',
            '/tapel/create',
        ],
    ],
    'ViewTapel' => [
        'type' => 2,
        'description' => 'Lihat Tahun Ajaran',
        'children' => [
            '/tapel/view',
        ],
    ],
    'updateTapel' => [
        'type' => 2,
        'description' => 'update Tahun Ajaran',
        'children' => [
            '/tapel/update',
        ],
    ],
    'deleteTapel' => [
        'type' => 2,
        'description' => 'Delete Tahun Ajaran',
        'children' => [
            '/tapel/delete',
        ],
    ],
    '/admin/*' => [
        'type' => 2,
    ],
    '/gii/*' => [
        'type' => 2,
    ],
    'permissionAmin2' => [
        'type' => 2,
        'description' => 'permission menggunakan Yii2 Admin',
        'children' => [
            '/admin/*',
        ],
    ],
    'permissionGii' => [
        'type' => 2,
        'description' => 'Menggunakan Gii',
        'children' => [
            '/gii/*',
        ],
    ],
    '/gii/default/index' => [
        'type' => 2,
    ],
    '/admin/default/index' => [
        'type' => 2,
    ],
    '/calon-siswa/index' => [
        'type' => 2,
    ],
    '/calon-siswa/view' => [
        'type' => 2,
    ],
    '/calon-siswa/create' => [
        'type' => 2,
    ],
    '/calon-siswa/update' => [
        'type' => 2,
    ],
    '/calon-siswa/delete' => [
        'type' => 2,
    ],
    '/prestasi/index' => [
        'type' => 2,
    ],
    '/prestasi/view' => [
        'type' => 2,
    ],
    '/prestasi/create' => [
        'type' => 2,
    ],
    '/prestasi/update' => [
        'type' => 2,
    ],
    '/prestasi/delete' => [
        'type' => 2,
    ],
    '/nilai/index' => [
        'type' => 2,
    ],
    '/nilai/view' => [
        'type' => 2,
    ],
    '/nilai/create' => [
        'type' => 2,
    ],
    '/nilai/update' => [
        'type' => 2,
    ],
    '/nilai/delete' => [
        'type' => 2,
    ],
    'lihatRangking' => [
        'type' => 2,
        'description' => 'Permission Untuk Melihat Daftar siswa berdasarkan Nilai total',
        'children' => [
            '/nilai/view',
        ],
    ],
    'InputNilai' => [
        'type' => 2,
        'description' => 'Permission untuk menginput Nilai',
        'children' => [
            '/nilai/create',
        ],
    ],
    'updateNilai' => [
        'type' => 2,
        'description' => 'Permission untuk memperbaharui Nilai',
        'children' => [
            '/nilai/update',
        ],
    ],
    'deleteNilai' => [
        'type' => 2,
        'description' => 'Permission Untuk Mendelete Nilai',
        'children' => [
            '/nilai/delete',
        ],
    ],
    'MenuNilai' => [
        'type' => 2,
        'description' => 'Permission Aksess Menu Nilai',
        'children' => [
            '/nilai/index',
        ],
    ],
    'menuPendaftaran' => [
        'type' => 2,
        'description' => 'Permission Akses Menu Pendaftaran',
        'children' => [
            '/calon-siswa/index',
        ],
    ],
    '/regencies/kab-list' => [
        'type' => 2,
    ],
    'listKabupaten' => [
        'type' => 2,
        'description' => 'Permission Melihat List Kabupaten',
        'children' => [
            '/regencies/kab-list',
        ],
    ],
    '/calon-siswa/cabut' => [
        'type' => 2,
    ],
    'indexPencabutan' => [
        'type' => 2,
        'description' => 'permisiion Melihat menu pencabutan',
        'children' => [
            '/calon-siswa/cabut',
        ],
    ],
    '/calon-siswa/lihat' => [
        'type' => 2,
    ],
    'LihatDetailPencabutan' => [
        'type' => 2,
        'description' => 'Permission untuk melihat detail siswa yang akan divcabut',
        'children' => [
            '/calon-siswa/lihat',
        ],
    ],
    '/calon-siswa/buang' => [
        'type' => 2,
    ],
    'mencabutSiswa' => [
        'type' => 2,
        'description' => 'Permission untuk mencabut siswa',
        'children' => [
            '/calon-siswa/buang',
        ],
    ],
    '/cetak/index' => [
        'type' => 2,
    ],
    'menuCetak' => [
        'type' => 2,
        'description' => 'Permission untuk munculkan menu cetak',
        'children' => [
            '/cetak/index',
        ],
    ],
    '/cetak/create' => [
        'type' => 2,
    ],
    'CetakJurnalPendaftaran' => [
        'type' => 2,
        'description' => 'Permission Untuk Cetak Jurnal Pendaftaran',
        'children' => [
            '/cetak/create',
        ],
    ],
    '/cetak/cetakjurnal' => [
        'type' => 2,
    ],
    'printJurnalPPDB' => [
        'type' => 2,
        'description' => 'permission ngeprint Jurnal PPDB',
        'children' => [
            '/cetak/cetakjurnal',
        ],
    ],
    '/cetak/view' => [
        'type' => 2,
    ],
    'lihatSebelumCetak' => [
        'type' => 2,
        'description' => 'Permission Melihat Hasil Sebelum Cetak',
        'children' => [
            '/cetak/view',
        ],
    ],
    '/cetak/nomor' => [
        'type' => 2,
    ],
    'menucetakBukuNomorPendaftaran' => [
        'type' => 2,
        'description' => 'permisison masuk menu buku cetak Pendaftaran',
        'children' => [
            '/cetak/nomor',
        ],
    ],
    '/cetak/cetaknomor' => [
        'type' => 2,
    ],
    '/cetak/templatenomor' => [
        'type' => 2,
    ],
    'LihatTempateCetakBukuNomorPPDB' => [
        'type' => 2,
        'description' => 'permission menu lihat template buku cetak nomor PPDB',
        'children' => [
            '/cetak/templatenomor',
        ],
    ],
    'PermissionCetakBukuNomorPPDB' => [
        'type' => 2,
        'description' => 'Permission Untuk Mencetak Buku Nomor PPDB',
        'children' => [
            '/cetak/cetaknomor',
        ],
    ],
    '/cetak/cetakcabut' => [
        'type' => 2,
    ],
    '/cetak/templatecabut' => [
        'type' => 2,
    ],
    '/cetak/cabut' => [
        'type' => 2,
    ],
    'menuCetakBukuRekapCabutan' => [
        'type' => 2,
        'description' => 'Permission MAsuk Menu Pencetakkan buku cabutan',
        'children' => [
            '/cetak/cabut',
        ],
    ],
    'lihatTemplateCetakCabut' => [
        'type' => 2,
        'description' => 'Permission untuk memilih tanggal dan melihat template Cetak Data Pencabutan',
        'children' => [
            '/cetak/templatecabut',
        ],
    ],
    'cetakBukuDataPencabutanALL' => [
        'type' => 2,
        'description' => 'Permission untuk mencetak data semua calon Yang sudah di cabut',
        'children' => [
            '/cetak/cetakcabut',
        ],
    ],
    '/cetak/daftar' => [
        'type' => 2,
    ],
    'PilihTanggalCetakBukuPendaftaran' => [
        'type' => 2,
        'description' => 'Permission untuk poilih tanggal cetak buku pendaftaran',
        'children' => [
            '/cetak/daftar',
        ],
    ],
    'lihatTempletBukuPendaftaran' => [
        'type' => 2,
        'description' => 'Permission Lihat Template Buku Pendaftaran',
        'children' => [
            '/cetak/templatedaftar',
        ],
    ],
    '/cetak/templatedaftar' => [
        'type' => 2,
    ],
    '/cetak/cetakdaftar' => [
        'type' => 2,
    ],
    'CetakBukuPendaftaran' => [
        'type' => 2,
        'description' => 'Permission Mencetak Buku Pendaftaran',
        'children' => [
            '/cetak/cetakdaftar',
        ],
    ],
    '/cetak/terima' => [
        'type' => 2,
    ],
    '/cetak/templateterima' => [
        'type' => 2,
    ],
    '/cetak/cetakterima' => [
        'type' => 2,
    ],
    'menuCetakPemberitahuanDiterima' => [
        'type' => 2,
        'description' => 'ijin untuk masuk ke menu cetak surat pemberitahuan',
        'children' => [
            '/cetak/terima',
        ],
    ],
    'cetakTemplateTerima' => [
        'type' => 2,
        'description' => 'Menu lihat template surat pemberitahuan di terima',
        'children' => [
            '/cetak/templateterima',
        ],
    ],
    'cetakSuratTerima' => [
        'type' => 2,
        'description' => 'ijin mencetak surat pemberitahuan diterima',
        'children' => [
            '/cetak/cetakterima',
        ],
    ],
    '/cetak/cetakterimasemua' => [
        'type' => 2,
    ],
    'CetakSemuaSuratPemberitahuanDiterima' => [
        'type' => 2,
        'description' => 'CetakSemuaSuratPemberitahuanDiterima',
        'children' => [
            '/cetak/cetakterimasemua',
        ],
    ],
    'Informasi' => [
        'type' => 1,
        'description' => 'user informasi',
        'children' => [
            'lihatRangking',
            'MenuNilai',
        ],
    ],
    '/gridview/export/download' => [
        'type' => 2,
    ],
    'exportDownloadGridView' => [
        'type' => 2,
        'description' => 'permission untuk eksport tabel grid view',
        'children' => [
            '/gridview/export/download',
        ],
    ],
    '/calon-siswa/tarik' => [
        'type' => 2,
    ],
    'ijinMenarikPencabutan' => [
        'type' => 2,
        'description' => 'ijin untuk menarik pencabutan',
        'children' => [
            '/calon-siswa/tarik',
        ],
    ],
    '/cetak/cetakpilihsemua' => [
        'type' => 2,
    ],
    'pilihHalamanCetakSuratDiterima' => [
        'type' => 2,
        'description' => 'pilih halam cetak terima semua',
        'children' => [
            '/cetak/cetakpilihsemua',
        ],
    ],
];
