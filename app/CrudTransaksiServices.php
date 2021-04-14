<?php

namespace App;
use App\TransaksiRepository;
use Validator;
use DB;

class CrudTransaksiServices
{
    protected $listrepo;

    public function __construct(){
        $this->listrepo = new TransaksiRepository;
    }


    public function stok($id)
    {
        //default pesan
        $pesan = ['status' => false, 'buku_id' => $id, 'stok' => 0, 'pesan' => ''];
        $stokMasuk = $this->listrepo->getTransaksiMasuk($id)->sum('total');
        $stokKeluar = $this->listrepo->getTransaksiKeluar($id)->sum('total');
        $results = value($stokMasuk) - value($stokKeluar);
        if ($results > 0) {
            $pesan['status'] = true;
            $pesan['stok'] = $results;
        }
        return $pesan;
    }

    //transaksi pesan buku
    public function memberOrder($id, $data)
    {
        $pesan = ['status' => false, 'pesan' => ''];
        $validator = Validator::make($data->post(), [
            "field_qty" => 'required|integer',
        ]);
        if ($validator->fails()) {
            $pesan['status'] = false;
            $pesan['pesan'] = $validator->errors();
            return $pesan;
        }

        //cek stok
        $stokBuku = $this->stok($id);
        if ($data['field_qty'] > $stokBuku['stok'] or $data['field_qty'] < 1) {
            $pesan['status'] = false;
            $pesan['pesan'] = 'stok tersedia hanya ' . $stokBuku['stok'] . '.';
            return $pesan;
        }

        try {
            $simpan = new Transaksi;
            $simpan->status = 'PESAN';
            $simpan->qty = $data['field_qty'];
            $simpan->buku_id = $id;
            $simpan->user_id = session()->get('user_id');
            $simpan->deskripsi = '-';
            $simpan->save();
            $pesan['status'] = true;
            $pesan['pesan'] = 'Pesanan Anda telah tersimpan, tunggu proses administrasi berikut';
            return $pesan;
        } catch (\Exception $e) {
            $pesan['status'] = false;
            $pesan['pesan'] = $e->getMessage();
            return $pesan;
        }
    }

    //transaksi pengeluaran
    public function updateTransaksiKeluar($id, $data)
    {
        $pesan = ['status' => false, 'pesan' => ''];
        $validator = Validator::make($data->post(), [
            'tgl_pinjam' => 'required',
            'catatan' => 'required',
        ]);
        if ($validator->fails()) {
            $pesan['status'] = false;
            $pesan['pesan'] = $validator->errors();
            return $pesan;
        }

        try {
            $simpan = $this->listrepo->findById($id);
            $simpan->status = 'KELUAR';
            $simpan->tgl_pinjam = $data['tgl_pinjam'];
            $simpan->deskripsi = $data['catatan'];
            $simpan->update();
            $pesan['status'] = true;
            $pesan['pesan'] = 'Order telah berhasil diproses';
            return $pesan;
        } catch (\Exception $e) {
            $pesan['status'] = false;
            $pesan['pesan'] = $e->getMessage();
            return $pesan;
        }
    }


    //transaksi penerimaan
    public function updateTransaksiMasuk($id, $data)
    {
        $pesan = ['status' => false, 'pesan' => ''];
        $validator = Validator::make($data->post(), [
            'tgl_kembali' => 'required',
        ]);
        if ($validator->fails()) {
            $pesan['status'] = false;
            $pesan['pesan'] = $validator->errors();
            return $pesan;
        }

        try {
            $simpan = $this->listrepo->findById($id);
            $simpan->status = 'SELESAI';
            $simpan->tgl_kembali = $data['tgl_kembali'];
            $simpan->update();
            $pesan['status'] = true;
            $pesan['pesan'] = 'Order telah berhasil diproses';
            return $pesan;
        } catch (\Exception $e) {
            $pesan['status'] = false;
            $pesan['pesan'] = $e->getMessage();
            return $pesan;
        }
    }

    //transaksi penyesuaian
    public function transaksiPenyesuaian($data)
    {
        $pesan = ['status' => false, 'pesan' => ''];
        $validator = Validator::make($data->post(), [
            'field_judul' => 'required',
            'field_pengarang' => 'required',
            'field_kategori' => 'required',
            'field_rak' => 'required',
            'field_date' => 'required',
            'field_qty' => 'required',
        ]);
        if ($validator->fails()) {
            $pesan['status'] = false;
            $pesan['pesan'] = $validator->errors();
            return $pesan;
        }

        try {
            DB::beginTransaction();
            //buat master buku baru
            $simpanBuku = new Buku;
            $simpanBuku->nama = $data['field_judul'];
            $simpanBuku->deskripsi = $data['field_pengarang'];
            $simpanBuku->kategori = $data['field_kategori'];
            $simpanBuku->rak_id = $data['field_rak'];
            $simpanBuku->save();

            $simpan = new Transaksi;
            $simpan->status = 'MASUK';
            $simpan->qty = $data['field_qty'];
            $simpan->buku_id = $simpanBuku->id;
            $simpan->tgl_kembali = $data['field_date'];
            $simpan->user_id = session()->get('user_id');
            $simpan->deskripsi = $data['field_deskripsi'];
            $simpan->save();
            DB::commit();
            $pesan['status'] = true;
            $pesan['pesan'] = 'Data telah tersimpan';
            return $pesan;
        } catch (\Exception $e) {
            DB::rollback();
            $pesan['status'] = false;
            $pesan['pesan'] = $e->getMessage();
            return $pesan;
        }
    }



}
