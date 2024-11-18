<?php

return [
    'admin' => [
        [
            'active-segment' => 'dashboard',
            'label' => 'Dashboard',
            'route-name' => 'admin.dashboard',
            'icon' => 'home',
        ],
        [
            'active-segment' => 'perawat',
            'label' => 'Manajemen Perawat',
            'route-name' => 'admin.perawat',
            'icon' => 'user',
        ],
        [
            'active-segment' => 'pasien',
            'label' => 'Pasien',
            'submenu' => [
                [
                    'active-segment' => 'create',
                    'label' => 'Tambah Pasien',
                    'route-name' => 'admin.pasien.create',
                ],
                [
                    'active-segment' => 'list',
                    'label' => 'Daftar Pasien',
                    'route-name' => 'admin.pasien.list',
                ],
                [
                    'active-segment' => 'perawat',
                    'label' => 'Perawat Pasien',
                    'route-name' => 'admin.pasien.perawat',
                ],
            ],
            'icon' => 'users',
        ],
        [
            'active-segment' => 'penanganan',
            'label' => 'Penanganan Pasien',
            'route-name' => 'admin.penanganan',
            'icon' => 'check',
        ],
        [
            'active-segment' => 'absensi',
            'label' => 'Absensi',
            'route-name' => 'admin.absensi',
            'icon' => 'clipboard',
        ],
        [
            'active-segment' => 'evaluasi',
            'label' => 'Evaluasi Kinerja',
            'route-name' => 'admin.evaluasi',
            'icon' => 'check-square',
        ],
        [
            'active-segment' => 'perawat-terbaik',
            'label' => 'Perawat Terbaik',
            'route-name' => 'admin.result',
            'icon' => 'bar-chart-2',
        ],
        [
            'active-segment' => 'profil-puskesmas',
            'label' => 'Profil Puskesmas',
            'route-name' => 'profil',
            'icon' => 'info',
        ]
    ],

    'user' => [
        [
            'active-segment' => 'dashboard',
            'label' => 'Dashboard',
            'route-name' => 'dashboard',
            'icon' => 'home',
        ],
        [
            'active-segment' => 'absensi',
            'label' => 'Absensi',
            'route-name' => 'absensi',
            'icon' => 'clipboard',
        ],
        [
            'active-segment' => 'pasien',
            'label' => 'Pasien',
            'route-name' => 'pasien',
            'icon' => 'users',
        ],
        [
            'active-segment' => 'profil-puskesmas',
            'label' => 'Profil Puskesmas',
            'route-name' => 'profil',
            'icon' => 'info',
        ]
    ],
];
