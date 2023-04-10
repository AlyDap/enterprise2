<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $bahan = [
        'nama' => 'required',
        'jumlah' => 'required',
        'harga' => 'required|greater_than[0]'
    ];
    public $bahan_errors = [
        'nama' => [
            'required' => 'Nama Bahan Harus diisi',
        ],
        'jumlah' => [
            'required' => 'Jumlah Bahan Harus diisi',
        ],
        'harga' => [
            'required' => 'Harga Bahan Harus diisi',
            // 'greater_than[0]' => 'Harga Bahan Harus di atas 0',
        ]
    ];
}
