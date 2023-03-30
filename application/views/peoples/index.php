<section class="py-36">
  <div class="container mx-auto px-6">
    <div class="flex flex-wrap">
      <div class="max-w-full w-[600px] bg-slate-100 mx-auto px-6 py-3 rounded-[8px]">
        <div class="w-full px-5">
          <div class="mb-3 text-secondary-text lg:text-xl text-lg font-bold">
            <h5>List Peoples</h5>
          </div>
          <hr class="mb-3 border-slate-400">
          <div class="w-3/4 mr-auto pt-3">
            <div class="mb-3 flex items-center">
              <div class="input_group">
                <input type="text" class="form_control input_search" name="search" id="search" placeholder=" " autocomplete="off" autofocus>
                <label for="search" class="place_label">Cari</label>
                <button type="button" class="card_btn_pass btn_search">
                  <i class="bi bi-search not_focus"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="card_body">
            <div class="max-h-[62vh] overflow-auto my-5">
              <table class="table w-full rounded-[8px] overflow-hidden">
                <thead class="bg-secondary-bg">
                  <tr>
                    <th class="md:text-md text-sm leading-[1.25] py-2 px-3 text-slate-100 text-center">
                      No
                    </th>
                    <th class="md:text-md text-sm leading-[1.25] py-2 px-3 text-slate-100 text-center">
                      Nama
                    </th>
                    <th class="md:text-md text-sm leading-[1.25] py-2 px-3 text-slate-100 text-center">
                      Email
                    </th>
                  </tr>
                </thead>
                <tbody id="tbody_peoples">
                  <?php
                  if (isset($list_peoples) && count($list_peoples) > 0) :

                  else :
                  ?>
                    <tr class="bg-gray-100 hover:bg-gray-200 border-b last:border-0 transition duration-300 ease-in-out">
                      <td class="md:text-md text-sm leading-[1.25] py-6 px-12 text-dark text-center" colspan="3">
                        Peoples tidak tersedia
                      </td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
            <div class="flex justify-center pagination-wrapper">
              <!-- <nav aria-label="Page navigation example">
                <ul class="list-style-none flex">
                  <li class="relative block rounded bg-transparent py-1.5 px-3 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white">
                    <a href="#">First</a>
                  </li>
                  <li class="relative block rounded bg-transparent py-1.5 px-3 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white">
                    <a href="#">&laquo</a>
                  </li>
                  <li class="relative block rounded bg-transparent py-1.5 px-3 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white bg-primary-bg !text-white">
                    <a href="#">1</a>
                  </li>
                  <li class="relative block rounded bg-transparent py-1.5 px-3 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white">
                    <a href="#">2</a>
                  </li>
                  <li class="relative block rounded bg-transparent py-1.5 px-3 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white">
                    <a href="#">3</a>
                  </li>
                  <li class="relative block rounded bg-transparent py-1.5 px-3 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white">
                    <a href="#">&raquo</a>
                  </li>
                  <li class="relative block rounded bg-transparent py-1.5 px-3 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white">
                    <a href="#">Last</a>
                  </li>
                </ul>
              </nav> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/js/peoples.js'); ?>"></script>