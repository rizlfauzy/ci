<header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
  <div class="container">
    <div class="flex items-center justify-between relative">
      <div class="px-4">
        <a href="<?= base_url('home/') ?>" class="font-bold text-lg text-dark dark:text-primary block py-6">Rizal Fauzi</a>
      </div>
      <div class="flex items-center px-4">
        <button id="hamburger" name="hamburger" class="block absolute right-4 lg:hidden">
          <span class="hamburger-line origin-top-left"></span>
          <span class="hamburger-line"></span>
          <span class="hamburger-line origin-bottom-left"></span>
        </button>
        <nav id="nav-menu" class="hidden absolute py-5 bg-gray-200 shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none dark:bg-dark dark:shadow-slate-500 lg:dark:bg-transparent">
          <ul class="block lg:flex nav-list">
            <li class="group md:hover:bg-gray-300 lg:hover:bg-transparent">
              <a href="<?= base_url('home/') ?>" class="text-base text-dark mx-8 flex py-2 group-hover:text-slate-800 nav-link <?= isset($home) ? "active" : "" ?>">
                Home
              </a>
            </li>
            <li class="group md:hover:bg-gray-300 lg:hover:bg-transparent">
              <a href="<?= base_url('mahasiswa/') ?>" class="text-base text-dark mx-8 flex py-2 group-hover:text-slate-800 nav-link <?= isset($mahasiswa) ? "active" : "" ?>">
                Mahasiswa
              </a>
            </li>
            <li class="group md:hover:bg-gray-300 lg:hover:bg-transparent">
              <a href="<?= base_url('about/') ?>" class="text-base text-dark mx-8 flex py-2 group-hover:text-slate-800 nav-link <?= isset($about) ? "active" : "" ?>">
                About
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</header>
<div class="for_alert">
  <!-- <-?php Flasher::flash() ?> -->
</div>
<script src="<?= base_url('assets/js/navbar.js') ?>"></script>
