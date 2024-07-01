<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAgensiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('agensi', function (Blueprint $table) {
            $table->id(); // This creates an 'id' column as an unsigned big integer, by default
            $table->string('name')->unique();
            $table->timestamps();
        });

        // Insert data into the table
        $agensi = [
            'Jabatan Perancangan Bandar Dan Desa Negeri Selangor',
            'Perbadanan Tabung Pendidikan Tinggi Nasional',
            'Kementerian Pendidikan Malaysia',
            'Jabatan Pendidikan Negeri Perak',
            'Suruhanjaya Perkhidmatan Awam',
            'Kementerian Komunikasi Dan Digital',
            'Jabatan Pengairan Dan Saliran Negeri Terengganu',
            'Sustainable Energy Development Authority (SEDA) Malaysia',
            'Institut Penyiaran Dan Penerangan Tun Abdul Razak',
            'Jabatan Kemajuan Islam Malaysia',
            'Perbadanan Kemajuan Kraftangan Malaysia',
            'Kementerian Pelancongan, Seni Dan Budaya',
            'Majlis Peperiksaan Malaysia',
            'BIB Insurance Broker Sdn Bhd',
            'Suruhanjaya Pencegahan Rasuah Malaysia',
            'Agensi Anti Dadah Kebangsaan',
            'Pejabat Tanah Dan Galian Negeri Selangor',
            'Setiausaha Kerajaan Negeri Sembilan',
            'Majlis Bandaraya Petaling Jaya',
            'Jabatan Penerangan',
            'MSC Trustgate',
        ];

        foreach ($agensi as $name) {
            DB::table('agensi')->insert(['name' => $name]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agensi');
    }
}