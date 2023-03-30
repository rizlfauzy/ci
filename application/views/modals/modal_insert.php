<div class="modal_box" id="modal_insert" onclick="">
  <span class="modal_close" title="Close Modal" onclick="document.querySelector('#modal_insert').style.display = 'none'">x</span>
  <div class="modal_content">
    <div class="modal_container">
      <div class="modal_header mb-3" id="modal_title">Tambah Data</div>
      <hr className="border-b-2 border-primary-bg mb-3">
      <div class="modal_body mt-5">
        <form action="<?= base_url('mahasiswa/insert'); ?>" class="form_insert" method="post">
        <input type="hidden" name="id" id="id" value="">
          <div class="mb-3 flex items-center">
            <div class="input_group">
              <input type="text" class="form_control" name="nama" id="nama" placeholder=" ">
              <label for="nama" class="place_label">Nama</label>
            </div>
          </div>
          <div class="mb-3 flex items-center">
            <div class="input_group">
              <input type="text" class="form_control" name="nrp" id="nrp" placeholder=" ">
              <label for="nrp" class="place_label">NRP</label>
            </div>
          </div>
          <div class="mb-3 flex items-center">
            <div class="input_group">
              <input type="email" class="form_control" name="email" id="email" placeholder=" ">
              <label for="email" class="place_label">Email</label>
            </div>
          </div>
          <div class="mb-3 flex items-center">
            <div class="input_group pop_up_wrapper">
              <input type="text" class="form_control_search" name="jurusan" id="jurusan" placeholder=" " autocomplete="off">
              <label for="jurusan" class="place_label">Jurusan</label>
              <button type="button" class="card_btn_pass btn_dropdown">
                <i class="bi bi-caret-up"></i>
              </button>
              <div class="pop_up on_hidden">
                <div class="pop_up_header">
                  <div class="pop_up_title">Hasil Pencarian</div>
                </div>
                <div class="pop_up_body">
                  <ul class="bg-white rounded-lg border border-gray-200 text-tertiary-text" id="list_jurusan">
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="mb-3 flex items-center">
            <button class="btn btn_primary w-full" id="btn_submit" type="submit">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>