<?php

function getJawaban($jurusan) {
    $jawaban_aksestelekomunikasi = [
        1 => 'A',
        2 => 'C',
        3 => 'B',
        4 => 'A',
        5 => 'A',
        6 => 'A',
        7 => 'A',
        8 => 'B',
        9 => 'B',
        10 => 'C'
    ];
    
    $jawaban_modelbangunan = [
        1 => 'A',
        2 => 'B',
        3 => 'C',
        4 => 'A',
        5 => 'B',
        6 => 'A',
        7 => 'B',
        8 => 'A',
        9 => 'C',
        10 => 'A'
    ];

    $jawaban_otomatisasiperkebunan = [
        1 => 'A',
        2 => 'B',
        3 => 'C',
        4 => 'A',
        5 => 'B',
        6 => 'A',
        7 => 'B',
        8 => 'A',
        9 => 'C',
        10 => 'A'
    ];

    switch ($jurusan) {
        case 'aksestelekomunikasi':
            return $jawaban_aksestelekomunikasi;
            break;
        case 'modelbangunan':
            return $jawaban_modelbangunan;
            break;
        case 'otomatisasiperkebunan':
            return $jawaban_otomatisasiperkebunan;
            break;
        default:
            return null;
            break;
    };
}
?>