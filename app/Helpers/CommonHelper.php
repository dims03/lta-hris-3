<?php

use App\Models\History;
use App\Models\Lokasi;
use App\Models\User;
use Illuminate\Support\Facades\DB;

function getBawahan()
{
	$users_id = auth()->user()->id;

	return User::where('atasan_id',$users_id)->get();
}

function generate_nik($join_date, $lokasi)
{
  $exp_join = explode('-', $join_date);

  $select_kode = DB::raw('RIGHT(users.nik,3) as kode');
  $query = DB::table('users')
    ->select($select_kode)
    ->whereYear('join_date', $exp_join[0])
    ->where('lokasi_id', $lokasi)
    ->orderBy('id', 'DESC')
    ->limit(1);
  $get = $query->get();
  $count = count($get);

  foreach ($get as $get) {
    $data = $get->kode;
  }

  if ($count <> 0) {
    $kode = intval($data) + 1;
  } else {
    $kode = 1;
  }

  $kode_area = Lokasi::find($lokasi)->kode;

  $yy = date('y', strtotime($join_date));

  $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); 
  $kodejadi = $kode_area . $yy . $kodemax;
  return $kodejadi;
}

function history($title, $action, $keterangan)
{
  $data2 = array(
    'title' => $title,
    'action' => $action,
    'desc' => $keterangan
  );

  return History::create($data2);
}

function time_elapsed_string($datetime, $full = false, $singkat = false)
{
  $now = new DateTime;
  $ago = new DateTime($datetime);
  $diff = (array) $now->diff($ago);

  $diff['w'] = floor($diff['d'] / 7);
  $diff['d'] -= $diff['w'] * 7;
  if (!$singkat) {
    $string = array(
      'y' => 'tahun',
      'm' => 'bulan',
    );
  } else {
    $string = array(
      'y' => 'Thn',
      'm' => 'Bln',
    );
  }
  foreach ($string as $k => &$v) {
    if ($diff[$k]) {
      $v = $diff[$k] . ' ' . $v . ($diff[$k] > 1 ? '' : '');
    } else {
      unset($string[$k]);
    }
  }

  if (!$full) $string = array_slice($string, 0, 1);
  if (!$singkat) {
    return $string ? implode(', ', $string) . ' yang lalu' : 'just now';
  } else {
    return $string ? implode(', ', $string) . '' : '< 1 Bln';
  }
}

function tgl_indo($tanggal)
{
  if (empty($tanggal) || $tanggal == '0000-00-00') {
    return '-';
  } else {
    $bulan = array(
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tahun
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tanggal

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
  }
}

function tgl_def($tanggal)
{
  if (empty($tanggal) || $tanggal == '0000-00-00') {
    return '-';
  } else {
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tahun
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tanggal

    return $pecahkan[2] . '/' . $pecahkan[1] . '/' . $pecahkan[0];
  }
}
