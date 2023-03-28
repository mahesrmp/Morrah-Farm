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
 * @property string $status
 * @property string $tanggal
 * @property int $jumlah_harga
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereJumlahHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereTanggal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pesanan whereUserId($value)
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
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
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

