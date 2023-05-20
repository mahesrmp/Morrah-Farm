<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Blog
 *
 * @property int $id
 * @property string $judul
 * @property string $isi
 * @property string $gambar
 * @property int $id_user
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereGambar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereIsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereJudul($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedAt($value)
 */
	class Blog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\HomeSlider
 *
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSlider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSlider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSlider query()
 */
	class HomeSlider extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Peanan
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Peanan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Peanan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Peanan query()
 */
	class Peanan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Pesanan
 *
 * @property int $id
 * @property int $user_id
 * @property string $tanggal
 * @property string $status
 * @property int $kode
 * @property int $jumlah_harga
 * @property string $gambar
 * @property string $address
 * @property int $produk_id
 * @property int $jumlah_pesan
 * @property string $img
 * @property string $nama_pengirim
 * @property string $tlpn
 * @property string $angkutan
 * @property string $jenis
 * @property string $plat
 * @property string $kurir
 * @property string $resi
 * @property string $review
 * @property string $img2
 * @property string $video
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PesananDetail[] $pesanan_detail
 * @property-read int|null $pesanan_detail_count
 * @property-read \App\Models\Produk|null $produk
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereAngkutan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereGambar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereImg2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereJenis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereJumlahHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereJumlahPesan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereKurir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereNamaPengirim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan wherePlat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereProdukId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereResi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereReview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereTanggal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereTlpn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereVideo($value)
 */
	class Pesanan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PesananDetail
 *
 * @property int $id
 * @property int $produk_id
 * @property int $pesanan_id
 * @property int $jumlah
 * @property int $jumlah_harga
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Pesanan|null $pesanan
 * @property-read \App\Models\Produk|null $produk
 * @method static \Illuminate\Database\Eloquent\Builder|PesananDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PesananDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PesananDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|PesananDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PesananDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PesananDetail whereJumlah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PesananDetail whereJumlahHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PesananDetail wherePesananId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PesananDetail whereProdukId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PesananDetail whereUpdatedAt($value)
 */
	class PesananDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Produk
 *
 * @property int $id
 * @property string $nama_produk
 * @property string $gambar
 * @property int $harga
 * @property int $stok
 * @property string $keterangan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PesananDetail[] $pesanan_detail
 * @property-read int|null $pesanan_detail_count
 * @method static \Illuminate\Database\Eloquent\Builder|Produk newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Produk newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Produk query()
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereGambar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereNamaProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereStok($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produk whereUpdatedAt($value)
 */
	class Produk extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $role
 * @property string|null $alamat
 * @property string|null $nohp
 * @property string|null $foto
 * @property string|null $nohp_verified_at
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Blog[] $blogs
 * @property-read int|null $blogs_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Pesanan[] $pesanan
 * @property-read int|null $pesanan_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNohp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNohpVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

