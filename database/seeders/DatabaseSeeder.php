<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Brosur;
use App\Models\DataSiswa;
use App\Models\FasilitasSingkat;
use App\Models\Galeri;
use App\Models\Profil;
use Illuminate\Database\Seeder;
use App\Models\SambutanKepalaSekolah;
use App\Models\SyaratPendaftaran;
use App\Models\SyaratPPDB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name'          => 'Dwiki Arya',
            'role'          => 'admin',
            'email'         => 'admin@gmail.com',
            'password'      => bcrypt('password'),
        ]);
        User::create([
            'name'          => 'Lorem',
            'role'          => 'siswa',
            'email'         => 'siswa@gmail.com',
            'password'      => bcrypt('password'),
        ]);

        Profil::create([
            'title'          => 'Sejarah',
            'slug'          => 'sejarah',
            'desc'          => '<p style="text-align: justify;">Berdiri sejak tahun 1985, semula adalah STM Pertanian Karanganyar. Seiring berjalannya waktu, serta menyesuaikan kebutuhan dari masyarakat, maka terhitung mulai tanggal 22 April 1996 berdasar &ldquo;surat persetujuan pendirian/penyelenggaraan sekolah swasta nomor 584/I03/I/1996&rdquo; yang diterbitkan oleh Kepala Kantor Wilayah Departemen Pendidikan dan Kebudayaan Provinsi Jawa Tengah, STM Pertanian Karanganyar bertranformasi menjadi SMK Penda 2 Karanganyar yang beralamat di Jl. Lawu Harjosari Popongan Karanganyar.</p>
<p style="text-align: justify;">Pada awal berdirinya, SMK Penda 2 Karanganyar hanya membuka 2 program keahlian yaitu Teknik Mekanik Otomotif (MO) dan Teknik Mekanik Industri (MI). Dari 2 program keahlian tersebut, pada awal beridinya SMK Penda 2 Karanganyar memiliki 4 kelas regular. &nbsp;Paradigma baru pengembangan pendidikan perlu didasarkan atas kondisi lingkungan strategis yang sedang berkembang saat ini, yaitu menghadapi era globalisasi yang semakin terbuka dan kompetitif, yang diiringi dengan pesatnya perkembangan ilmu pengetahuan dan teknologi serta pentingnya dunia kesehatan bagi masyarakat. Oleh sebab itu, pada tahun 2012 SMK Penda 2 Karanganyar, membuka 1 program keahlian baru yaitu Tata Busana (TB).</p>
<p style="text-align: justify;">Sampai saat ini, setelah melakukan sosialisasi dan berbagai pendekatan serta memperhatikan saran dari wali murid dan tokoh masyarakat, SMK Penda 2 Karanganyar lebih dikenal oleh masyarkat. Hal itu terbukti secara kuantitas jumlah peserta didik yang tercatat saat ini lebih dari 1000 siswa dari 3 program keahlian yang ada yaitu:</p>
<ol>
<li style="text-align: justify;">Teknik Kendaraan Ringan Otomotif (TKRO)</li>
<li style="text-align: justify;">Teknik Mekanik Industri (TMI)</li>
<li style="text-align: justify;">Tata Busana (TB)</li>
</ol>',
            'input_by'      => 'lorem',
        ]);
        Profil::create([
            'title'          => 'Identitas Sekolah',
            'slug'          => 'identitas-sekolah',
            'desc'          => '<table style="width: 72.1848%;" border="1" cellspacing="0" cellpadding="5">
<tbody>
<tr>
<td style="width: 29.506%;">
<p>Nama sekolah</p>
</td>
<td style="width: 2.96449%;">
<p>:</p>
</td>
<td style="width: 67.396%;">
<p>SMK Penda 2 Karanganyar</p>
</td>
</tr>
<tr>
<td style="width: 29.506%;">
<p>NPSN</p>
</td>
<td style="width: 2.96449%;">
<p>:</p>
</td>
<td style="width: 67.396%;">
<p>20312070</p>
</td>
</tr>
<tr>
<td style="width: 29.506%;">
<p>Alamat</p>
</td>
<td style="width: 2.96449%;">
<p>:</p>
</td>
<td style="width: 67.396%;">
<p>Jl. Lawu Harjosari</p>
</td>
</tr>
<tr>
<td style="width: 29.506%;">
<p>Desa/Kelurahan</p>
</td>
<td style="width: 2.96449%;">
<p>:</p>
</td>
<td style="width: 67.396%;">
<p>Popongan</p>
</td>
</tr>
<tr>
<td style="width: 29.506%;">
<p>Kecamatan</p>
</td>
<td style="width: 2.96449%;">
<p>:</p>
</td>
<td style="width: 67.396%;">
<p>Karanganyar</p>
</td>
</tr>
<tr>
<td style="width: 29.506%;">
<p>Provinsi</p>
</td>
<td style="width: 2.96449%;">
<p>:</p>
</td>
<td style="width: 67.396%;">
<p>Jawa Tengah</p>
</td>
</tr>
<tr>
<td style="width: 29.506%;">
<p>Telp.</p>
</td>
<td style="width: 2.96449%;">
<p>:</p>
</td>
<td style="width: 67.396%;">
<p>(0271) 494 787</p>
</td>
</tr>
<tr>
<td style="width: 29.506%;">
<p>Status sekolah</p>
</td>
<td style="width: 2.96449%;">
<p>:</p>
</td>
<td style="width: 67.396%;">
<p>Swasta</p>
</td>
</tr>
<tr>
<td style="width: 29.506%;">
<p>Status kepemilikan</p>
</td>
<td style="width: 2.96449%;">
<p>:</p>
</td>
<td style="width: 67.396%;">
<p>Yayasan</p>
</td>
</tr>
<tr>
<td style="width: 29.506%;">
<p>Waktu Penyelenggaraan</p>
</td>
<td style="width: 2.96449%;">
<p>:</p>
</td>
<td style="width: 67.396%;">
<p>Sehari penuh (5 hari)</p>
</td>
</tr>
<tr>
<td style="width: 29.506%;">
<p>SK Pendirian Sekolah</p>
</td>
<td style="width: 2.96449%;">
<p>:</p>
</td>
<td style="width: 67.396%;">
<p>584/I03/I/1996</p>
</td>
</tr>
<tr>
<td style="width: 29.506%;">
<p>Tanggal SK Pendirian</p>
</td>
<td style="width: 2.96449%;">
<p>:</p>
</td>
<td style="width: 67.396%;">
<p>22 April 1996</p>
</td>
</tr>
<tr>
<td style="width: 29.506%;">
<p>SK Izin Operasional</p>
</td>
<td style="width: 2.96449%;">
<p>:</p>
</td>
<td style="width: 67.396%;">
<p>AHU-AH.01.08-418</p>
</td>
</tr>
<tr>
<td style="width: 29.506%;">
<p>Tanggal SK Izin Operasional</p>
</td>
<td style="width: 2.96449%;">
<p>:</p>
</td>
<td style="width: 67.396%;">
<p>15 Februari 2008</p>
</td>
</tr>
<tr>
<td style="width: 29.506%;">
<p>Akreditasi</p>
</td>
<td style="width: 2.96449%;">
<p>:</p>
</td>
<td style="width: 67.396%;">
<p>B</p>
</td>
</tr>
<tr>
<td style="width: 29.506%;">
<p>No. SK Akreditasi</p>
</td>
<td style="width: 2.96449%;">
<p>:</p>
</td>
<td style="width: 67.396%;">
<p>247/BAN-SM/SK/2018</p>
</td>
</tr>
<tr>
<td style="width: 29.506%;">
<p>Tanggal SK Akreditasi</p>
</td>
<td style="width: 2.96449%;">
<p>:</p>
</td>
<td style="width: 67.396%;">
<p>4 Desember 2018</p>
</td>
</tr>
<tr>
<td style="width: 29.506%;">
<p>Sertifikat ISO</p>
</td>
<td style="width: 2.96449%;">
<p>:</p>
</td>
<td style="width: 67.396%;">
<p>9001:2008</p>
</td>
</tr>
<tr>
<td style="width: 29.506%;">
<p>Luas Tanah</p>
</td>
<td style="width: 2.96449%;">
<p>:</p>
</td>
<td style="width: 67.396%;">
<p>4000 m<sup>2</sup></p>
</td>
</tr>
<tr>
<td style="width: 29.506%;">
<p>Akses Internet</p>
</td>
<td style="width: 2.96449%;">
<p>:</p>
</td>
<td style="width: 67.396%;">
<p>Fiber Optik</p>
</td>
</tr>
<tr>
<td style="width: 29.506%;">
<p>Sumber listrik</p>
</td>
<td style="width: 2.96449%;">
<p>:</p>
</td>
<td style="width: 67.396%;">
<p>PLN</p>
</td>
</tr>
</tbody>
</table>',
            'input_by'      => 'lorem',
        ]);
        Profil::create([
            'title'          => 'Visi & Misi',
            'slug'          => 'visi-misi',
            'desc'          => '<h1>Visi</h1>
<p>Terwujudnya warga sekolah yang berakhlak mulia, terdidik, terampil dan mandiri</p>
<h1>Misi</h1>
<ol>
<li>Mengembangkan sumber daya secara optimal guna mempersiapkan lulusan yang berakhlak mulia</li>
<li>Mewujudkan pendidikan yang prima untuk menghasilkan lulusan yang berprestasi</li>
<li>Meningkatkan sumber daya dan peralatan praktik guna memenuhi ketrampilan siswa</li>
<li>Menumbuhkan jiwa kewiraushaan guna kemandirian siswa<br>&nbsp;</li>
</ol>
<h1>Tujuan</h1>
<ol>
<li>Terwujudnya SMK Penda 2 Karanganyar sebagai pusat pendidikan dan pelatihan komptensi teknologi kejuruan yang berbasis manajemen wirausaha</li>
<li>Menghasilkan tamatan yang professional, tangguh berjiwa mandiri, berbudi pekerti luhur yang mampu menguasai bahasa pergaulan internasional</li>
<li>Bersama instansi lain yang berkaitan menunjang pelaksanaan ekonomi daerah Kabupaten Karanganyar</li>
<li>Memberikan layanan pelatihan kompetensi di bidang teknologi dan industry kepada lembaga maupun masyarakat umum</li>
<li>Memberi layanan jasa dan produksi</li>
<li>Mengembangkan diri menjadi Pusat Pendidikan Keunggulan Teknologi (PPKT)</li>
<li>Mengembangkan diri menjadi tes center</li>
</ol>',
            'input_by'      => 'lorem',
        ]);
        Profil::create([
            'title'         => 'Fasilitas',
            'slug'          => 'fasilitas',
            'desc'          => '<p style="text-align: justify;">SMK Penda 2 Karanganyar memiliki sejumlah fasilitas untuk menunjang kegiatan belajar siswa baik secara akademik maupun secara non-akademik. Fasilitas yang menjadi kebanggaan adalah, SMK Penda 2 Karanganyar memiliki 2 (dua) local gedung yang menunjang kegiatan belajar mengajar (KBM). Gedung 1 terletak di Jl. Lawu Harjosari, Popongan, Karanganyar dan Gedung 2 terletak di</p>
<p style="text-align: justify;">Fasilitas lain yang mendukung kegiatan akademik maupun secara non-akademik adalah sebagai berikut:</p>
<table style="width: 64.7738%;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="width: 6.32653%; text-align: center;">
<p><strong>NO</strong></p>
</td>
<td style="width: 45.3061%; text-align: center;">
<p><strong>JENIS FASILITAS</strong></p>
</td>
<td style="width: 13.6735%; text-align: center;">
<p><strong>JUMLAH</strong></p>
</td>
<td style="width: 34.6939%; text-align: center;">
<p><strong>KETERANGAN</strong></p>
</td>
</tr>
<tr>
<td style="width: 6.32653%;">
<p>1</p>
</td>
<td style="width: 45.3061%;">
<p>Ruang Kepala Sekolah</p>
</td>
<td style="width: 13.6735%;">
<p>1</p>
</td>
<td style="width: 34.6939%;">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 6.32653%;">
<p>2</p>
</td>
<td style="width: 45.3061%;">
<p>Ruang Guru</p>
</td>
<td style="width: 13.6735%;">
<p>2</p>
</td>
<td style="width: 34.6939%;">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 6.32653%;">
<p>3</p>
</td>
<td style="width: 45.3061%;">
<p>Ruang BP/BK/Konseling</p>
</td>
<td style="width: 13.6735%;">
<p>1</p>
</td>
<td style="width: 34.6939%;">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 6.32653%;">
<p>4</p>
</td>
<td style="width: 45.3061%;">
<p>Ruang Tata Usaha</p>
</td>
<td style="width: 13.6735%;">
<p>1</p>
</td>
<td style="width: 34.6939%;">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 6.32653%;">
<p>5</p>
</td>
<td style="width: 45.3061%;">
<p>Lab. Komputer</p>
</td>
<td style="width: 13.6735%;">
<p>2</p>
</td>
<td style="width: 34.6939%;">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 6.32653%;">
<p>6</p>
</td>
<td style="width: 45.3061%;">
<p>Ruang BKK</p>
</td>
<td style="width: 13.6735%;">
<p>1</p>
</td>
<td style="width: 34.6939%;">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 6.32653%;">
<p>7</p>
</td>
<td style="width: 45.3061%;">
<p>Ruang UKS</p>
</td>
<td style="width: 13.6735%;">
<p>1</p>
</td>
<td style="width: 34.6939%;">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 6.32653%;">
<p>8</p>
</td>
<td style="width: 45.3061%;">
<p>Ruang Kelas</p>
</td>
<td style="width: 13.6735%;">
<p>23</p>
</td>
<td style="width: 34.6939%;">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 6.32653%;">
<p>9</p>
</td>
<td style="width: 45.3061%;">
<p>Ruang OSIS</p>
</td>
<td style="width: 13.6735%;">
<p>1</p>
</td>
<td style="width: 34.6939%;">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 6.32653%;">
<p>10</p>
</td>
<td style="width: 45.3061%;">
<p>Ruang Ambalan Pramuka</p>
</td>
<td style="width: 13.6735%;">
<p>1</p>
</td>
<td style="width: 34.6939%;">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 6.32653%;">
<p>11</p>
</td>
<td style="width: 45.3061%;">
<p>Studio Musik</p>
</td>
<td style="width: 13.6735%;">
<p>1</p>
</td>
<td style="width: 34.6939%;">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 6.32653%;">
<p>12</p>
</td>
<td style="width: 45.3061%;">
<p>Lab. Teaching Factory</p>
</td>
<td style="width: 13.6735%;">
<p>1</p>
</td>
<td style="width: 34.6939%;">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 6.32653%;">
<p>13</p>
</td>
<td style="width: 45.3061%;">
<p>Ruang Perpustakaan</p>
</td>
<td style="width: 13.6735%;">
<p>1</p>
</td>
<td style="width: 34.6939%;">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 6.32653%;">
<p>14</p>
</td>
<td style="width: 45.3061%;">
<p>Mushola</p>
</td>
<td style="width: 13.6735%;">
<p>1</p>
</td>
<td style="width: 34.6939%;">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 6.32653%;">
<p>15</p>
</td>
<td style="width: 45.3061%;">
<p>Lapangan Basket</p>
</td>
<td style="width: 13.6735%;">
<p>1</p>
</td>
<td style="width: 34.6939%;">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 6.32653%;">
<p>16</p>
</td>
<td style="width: 45.3061%;">
<p>Lapangan Bulutangkis</p>
</td>
<td style="width: 13.6735%;">
<p>1</p>
</td>
<td style="width: 34.6939%;">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 6.32653%;">
<p>17</p>
</td>
<td style="width: 45.3061%;">
<p>Area Parkir</p>
</td>
<td style="width: 13.6735%;">
<p>1</p>
</td>
<td style="width: 34.6939%;">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 6.32653%;">
<p>18</p>
</td>
<td style="width: 45.3061%;">
<p>Ruang Praktik TKRO</p>
</td>
<td style="width: 13.6735%;">
<p>2</p>
</td>
<td style="width: 34.6939%;">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 6.32653%;">
<p>19</p>
</td>
<td style="width: 45.3061%;">
<p>Ruang Praktik TMI</p>
</td>
<td style="width: 13.6735%;">
<p>2</p>
</td>
<td style="width: 34.6939%;">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 6.32653%;">
<p>20</p>
</td>
<td style="width: 45.3061%;">
<p>Ruang Praktik TB</p>
</td>
<td style="width: 13.6735%;">
<p>2</p>
</td>
<td style="width: 34.6939%;">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 6.32653%;">
<p>21</p>
</td>
<td style="width: 45.3061%;">
<p>Gudang</p>
</td>
<td style="width: 13.6735%;">
<p>2</p>
</td>
<td style="width: 34.6939%;">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 6.32653%;">
<p>22</p>
</td>
<td style="width: 45.3061%;">
<p>Kantin</p>
</td>
<td style="width: 13.6735%;">
<p>2</p>
</td>
<td style="width: 34.6939%;">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 6.32653%;">
<p>23</p>
</td>
<td style="width: 45.3061%;">
<p>Kamar mandi</p>
</td>
<td style="width: 13.6735%;">
<p>18</p>
</td>
<td style="width: 34.6939%;">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 6.32653%;">
<p>24</p>
</td>
<td style="width: 45.3061%;">
<p>Wifi</p>
</td>
<td style="width: 13.6735%;">
<p>15</p>
</td>
<td style="width: 34.6939%;">
<p>100 Mbps</p>
</td>
</tr>
<tr>
<td style="width: 6.32653%;">
<p>25</p>
</td>
<td style="width: 45.3061%;">
<p>Pos Satpam</p>
</td>
<td style="width: 13.6735%;">
<p>1</p>
</td>
<td style="width: 34.6939%;">
<p>&nbsp;</p>
</td>
</tr>
<tr>
<td style="width: 6.32653%;">
<p>26</p>
</td>
<td style="width: 45.3061%;">
<p>Ruang Toolman</p>
</td>
<td style="width: 13.6735%;">
<p>2</p>
</td>
<td style="width: 34.6939%;">
<p>&nbsp;</p>
</td>
</tr>
</tbody>
</table>',
            'input_by'      => 'lorem',
        ]);
        SambutanKepalaSekolah::create([
            'kepala_sekolah'    => 'Aris Sukarno, S.pd. M.pd',
            'foto'              => 'image.jpg',
            'desc'              => '
            <h3>Sambutan Kepala Sekolah</h3>
            <p>
            Selamat datang di website resmi SMK Penda 2 Karanganyar!

Saya, Aris Sukarno, S.pd. M.pd, sebagai Kepala Sekolah, dengan tulus menyambut Anda di halaman website sekolah ini. Kami sangat senang dapat berbagi informasi seputar keunggulan dan prestasi sekolah kami. Dengan visi dan misi yang kuat, kami berkomitmen untuk memberikan pendidikan berkualitas, berfokus pada pengembangan potensi siswa dalam lingkungan belajar yang inovatif dan mendukung. Melalui website ini, kami mengajak Anda untuk mengenal lebih jauh tentang SMK Penda 2 Karanganyar, kurikulum yang kami tawarkan, program ekstrakurikuler yang menarik, serta tenaga pengajar yang berdedikasi. Kami berharap informasi yang kami sajikan dapat memberikan gambaran yang komprehensif tentang dedikasi kami untuk membantu setiap siswa meraih kesuksesan di masa depan.
            </p>',
        ]);
        Brosur::create([
            'nama_brosur'       => 'Brosur Tes',
            'foto'              => 'image.jpg',
            'input_by'          => 'admin',
        ]);
        DataSiswa::create([
            'content'           => 'tes',
            'author'            => 'tes',
        ]);
        FasilitasSingkat::create([
            'keterangan'       => 'Ruang Kelas',
            'total'            => 23,
        ]);
        FasilitasSingkat::create([
            'keterangan'       => 'Fasilitas',
            'total'            => 30,
        ]);
        FasilitasSingkat::create([
            'keterangan'       => 'Total Pengajar',
            'total'            => 18,
        ]);
        FasilitasSingkat::create([
            'keterangan'       => 'Total Siswa',
            'total'            => 969,
        ]);
        SyaratPendaftaran::create([
            'content'          => 'tes',
            'author'           => 'tes',
        ]);
    }
}
