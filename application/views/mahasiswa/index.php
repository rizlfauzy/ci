<section class="py-36">
  <div class="container mx-auto px-6">
    <div class="flex flex-wrap max-w-full w-[600px] mx-auto">
      <div class="w-1/4 mx-auto py-3">
        <button class="btn btn_primary px-5" id="btn_tambah" onclick="modal_insert.style.display = 'block'">Tambah</button>
      </div>
      <div class="w-3/4 mx-auto py-3">
        <div class="mb-3 flex items-center">
          <div class="input_group">
            <input type="text" class="form_control input_search" name="search" id="search" placeholder=" ">
            <label for="search" class="place_label">Cari</label>
            <button type="button" class="card_btn_pass btn_search">
              <i class="bi bi-search not_focus"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-wrap">
      <div class="max-w-full w-[600px] bg-slate-100 mx-auto px-6 py-3 rounded-[8px]">
        <div class="w-full px-5">
          <div class="mb-3 text-secondary-text lg:text-xl text-lg font-bold">
            <h5>List Mahasiswa</h5>
          </div>
          <hr class="mb-3 border-slate-400">
          <div class="card_body">
            <div class="max-h-[62vh] overflow-auto my-5">
              <table class="table w-full rounded-[8px] overflow-hidden">
                <thead class="bg-secondary-bg">
                  <tr>
                    <th class="md:text-md text-sm leading-[1.25] py-2 px-3 text-slate-100 text-center">
                      No
                    </th>
                    <th class="md:text-md text-sm leading-[1.25] py-2 px-3 text-slate-100 text-center">
                      Name
                    </th>
                    <th class="md:text-md text-sm leading-[1.25] py-2 px-3 text-slate-100 text-center">
                      Aksi
                    </th>
                  </tr>
                </thead>
                <tbody id="tbody_mahasiswa">
                  <?php
                  if (isset($list_mahasiswa) && count($list_mahasiswa) > 0) :
                    foreach ($list_mahasiswa as $key => $mhs) : ?>
                      <tr class="bg-gray-100 hover:bg-gray-200 border-b last:border-0 transition duration-300 ease-in-out">
                        <td class="md:text-md text-sm leading-[1.25] py-2 px-3 text-dark text-center">
                          <?= $key + 1 ?>
                        </td>
                        <td class="md:text-sm text-2xs leading-[1.25] py-2 px-3 text-dark text-center">
                          <?= $mhs->name ?>
                        </td>
                        <td class="md:text-sm text-2xs leading-[1.25] py-2 px-3 text-dark text-center">
                          <a class="link link_btn link_primary" href="<?= base_url('mahasiswa/detail/') . $mhs->id; ?>">
                            Detail
                          </a>
                          <button type="button" class="btn btn_warning btn_edit_mhs" data-id="<?= $mhs->id ?>" onclick="modal_insert.style.display = 'block'">
                            Ubah
                          </button>
                          <button type="button" class="btn btn_reset btn_delete_mhs" data-id="<?= $mhs->id ?>">
                            Delete
                          </button>
                        </td>
                      </tr>
                    <?php
                    endforeach;
                  else :
                    ?>
                    <tr class="bg-gray-100 hover:bg-gray-200 border-b last:border-0 transition duration-300 ease-in-out">
                      <td class="md:text-lg text-md leading-[1.25] py-6 px-12 text-dark text-center" colspan="3">
                        Mahasiswa tidak tersedia
                      </td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="<?= base_url('assets/js/mahasiswa.js'); ?>"></script>