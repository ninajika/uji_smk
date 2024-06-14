<?php

function getJawaban($jurusan) {
    $jawaban_aksestelekomunikasi = [
        1 => 'B',
        2 => 'B',
        3 => 'B',
        4 => 'B',
        5 => 'B',
        6 => 'A',
        7 => 'B',
        8 => 'B',
        9 => 'B',
        10 => 'C'
    ];
    
    $jawaban_modelbangunan = [
        1 => 'B',
        2 => 'B',
        3 => 'B',
        4 => 'A',
        5 => 'D',
        6 => 'C',
        7 => 'B',
        8 => 'B',
        9 => 'A',
        10 => 'B'
    ];

    $jawaban_otomatisasiperkebunan = [
        1 => 'A',
        2 => 'B',
        3 => 'C',
        4 => 'C',
        5 => 'B',
        6 => 'C',
        7 => 'C',
        8 => 'B',
        9 => 'B',
        10 => 'B'
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