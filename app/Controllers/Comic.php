<?php namespace App\Controllers;

use Config\App;

class Comic extends BaseController
{
    protected $comicsModel;
    public function __construct()
    {
        $this->comicsModel = new \App\Models\ComicsModel();
    }
    public function index(){
        // $comics = $this->comicsModel->findAll();
        $data = [
            'title' => 'Daftar Komik',
            'comics' =>  $this->comicsModel->getComic()
        ];
        return view('comic/index', $data);
    }

    public function detail($slug){
        $data = [
            'title' => 'Detail Komik',
            'slug' => $slug,
            'comics' =>  $this->comicsModel->getComic($slug)
        ];

        if (empty($data['comics'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Komik' . $slug . 'Tidak Ditemukan');
        }
        return view('comic/detail',$data);
    }

    public function create(){
        $data = [
            'title' => 'Tambah Data Komik',
            'validation' => \Config\Services::validation()
        ];
        return view('comic/create',$data);
    }

    public function save(){

        if (!$this->validate([
            'judul'=> [
                'rules' => 'required|is_unique[comics.judul]',
                'errors' => [
                    'required' => '{field} komik harus diisi',
                    'is_unique' => '{field} komik sudah terdaftar'
                ]
            ],
            'sampul' => [
                'rules' =>'max_size[sampul,2048]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran Gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            # code...
            // $validation = \Config\Services::validation();
            // return redirect()->to('/Comic/create')->withInput()->with('validation', $validation);
            return redirect()->to('/Comic/create')->withInput();
        }

        // ? Ambil Gambar
        $sampulFile = $this->request->getFile('sampul');
        if ($sampulFile->getError() == 4) {
            $namaSampul = 'default.jpg';
        }
        else{
            //? Pindahkan ke folder img
            $sampulFile->move('img');
            // ? Ambil nama file sampul
            $namaSampul = $sampulFile->getName();
        }

        $this->comicsModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => url_title($this->request->getVar('judul'),'-',true),
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sinopsis' => $this->request->getVar('sinopsis'),
            'sampul' => $namaSampul
        ]);

        return redirect()->to('/comic');
    }

    public function delete($id){
        // ? Cari gambar berdasarkan id
        $comic = $this->comicsModel->find($id);

        if ($comic['sampul'] != 'default.jpg') {
            // ? hapus gambar
            unlink('img/' . $comic['sampul']);
        }

        if ($comic['slider_img'] != 'default.jpg') {
            // ? hapus gambar
            // unlink('slider/img/' . $comic['slider_img']);
        }
        
        $this->comicsModel->delete($id);
        return redirect()->to('/comic');
    }

    public function edit($slug){
        
        
        $data = [
            'title' => 'Edit Data Komik',
            'validation' => \Config\Services::validation(),
            'comic' => $this->comicsModel->getComic($slug)
        ];

        return view('comic/edit',$data);
    }

    public function update($id){

        $oldComics = $this->comicsModel->getComic($this->request->getVar('slug'));
        if ($oldComics['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        }else{
            $rule_judul = 'required|is_unique[comics.judul]';
        }
        if (!$this->validate([
            'judul'=> [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} komik harus diisi',
                    'is_unique' => '{field} komik sudah terdaftar'
                ]
            ],
                'sampul' => [
                    'rules' =>'max_size[sampul,2048]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png,image/svg]',
                    'errors' => [
                        'max_size' => 'Ukuran Gambar terlalu besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang anda pilih bukan gambar'
                    ]
                    ]
        ])) {
            return redirect()->to('/comic/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileSampul = $this->request->getFile('sampul');
        
        // ? cek gambar, jika tetap gambar lama
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else{
            $namaSampul = $fileSampul->getRandomName();
            $fileSampul->move('img', $namaSampul);
            // ? Hapus file lama
            unlink('img/' . $this->request->getVar('sampulLama')); 
        }
        

         
        $this->comicsModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => url_title($this->request->getVar('judul'),'-',true),
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sinopsis' => $this->request->getVar('sinopsis'),
            'sampul' => $namaSampul
        ]);

        return redirect()->to('/comic');
    }
}