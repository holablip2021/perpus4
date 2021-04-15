<?php

namespace App\Services;

use Validator;
use App\Repositories\RakRepository;
use App\Models\Rak;
class CrudRakServices
{
    protected $listrepo;

    public function __construct(){
        $this->listrepo = new RakRepository;
    }

    //Fungsi Simpan dan Update
    public function createAndUpdateRak($data, $id = null)
    {

        $pesan = ['status' => false, 'pesan' => ''];

        $validator = Validator::make($data->post(), [
            'field_deskripsi_rak' => 'required',
        ]);
        if ($validator->fails()) {
            $pesan['pesan'] = $validator->errors();
            return $pesan;
        }

        try {
            $simpan = $this->listrepo->findById($id);
            if (!$simpan) {
                $simpan = new Rak();
            }
            $simpan->deskripsi  = $data['field_deskripsi_rak'];
            $simpan->save();
            $pesan['status'] = true;
            $pesan['pesan'] = 'Data telah tersimpan';
            return $pesan;
        } catch (\Exception $e) {
            $pesan['status'] = false;
            $pesan['pesan'] = $e->getMessage();
            return $pesan;
        }
    } 


}
