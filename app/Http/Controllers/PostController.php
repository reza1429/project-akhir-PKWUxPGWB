<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;
use Symfony\Component\Console\Output\Output;

class PostController extends Controller
{
    public function search_siswa(){
        // return request();
        if (request()->has('isi')) {
            $siswa=request()->siswa;
            $result=siswa::where('nisn', 'Like', '%'.request()->isi.'%')->get();
            return response()->json(['data'=>$result]);
        } else {
            return view('history.riwayat');
        }
        
    //     if ($request->ajax()) {
    //         $data_siswa=siswa::where('nisn', 'Like', '%'.$request->search_siswa.'%')->get();

    //         $output = '';
    //         if (count($data_siswa)>0) {
    //             $output.='<table class="table table-bordered table-stripped" id="table-siswa">
    //             <thead>
    //                 <tr>
    //                     <td>NISN</td>
    //                     <td>Nama</td>
    //                     <td>Kelas</td>
    //                     <td>Action</td>
    //                 </tr>
    //             </thead>
    //             <tbody>';

    //                 foreach ($data_siswa as $s){
    //                     $output.='
    //                     <tr>
    //                         <td>'.$s->nisn.'</td>
    //                         <td>'.$s->nama.'</td>
    //                         <td>'.$s->kelas.'</td>
    //                         <td>
    //                             <a class="btn btn-primary btn-sm" href="#" role="button">Tambah History</a>
    //                         </td>
    //                     </tr>';
    //                 }
    //                 $output.='
    //                     </tbody>
    //                 </table>
    //                 <div class="card-footer pagination d-flex justify-content-end">
    //                     {{ $siswa->onEachSide(1)->links() }}  
    //                 </div>';
    //         }else {
    //             $output .= 'No result';
    //         }
    //         return $output;
    //     }
    }
    //
}
