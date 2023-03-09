<section class="py-36">
  <div class="container mx-auto px-6">
    <div class="flex flex-wrap">
      <div class="max-w-full w-[600px] bg-slate-100 mx-auto px-6 py-3 rounded-[8px]">
        <div class="w-full px-5">
          <div class="mb-3 text-secondary-text lg:text-xl text-lg font-bold">
            <h5>Detail Mahasiswa</h5>
          </div>
          <hr class="mb-3 border-slate-400">
          <div class="card_body">
            <table class="table ml-4">
              <thead>
                <tr class="tr_show">
                    <th width="20%">Nama</th>
                    <td width="60%">: <?= $mhs->name ?></td>
                </tr>
                <tr class="tr_show">
                    <th width="20%">NRP</th>
                    <td width="60%">: <?= $mhs->nrp ?></td>
                </tr>
                <tr class="tr_show">
                    <th width="20%">Email</th>
                    <td width="60%">: <?= $mhs->email ?></td>
                </tr>
                <tr class="tr_show">
                    <th width="20%">Jurusan</th>
                    <td width="60%">: <?= $mhs->jurusan ?></td>
                </tr>
              </thead>
            </table>
            <a class="link link_btn link_primary w-1/2 ml-4 my-4" href="<?= base_url() ?>mahasiswa">
              Kembali
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>