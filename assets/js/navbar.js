const hambuger_btn = document.querySelector("#hamburger"),
  header = document.querySelector("header"),
  { url } = document.body.dataset,
  for_alert = document.querySelector(".for_alert");

function addClass(e, classes) {
  e.classList && e.classList.add(...classes.split(" "));
}

function removeClass(e, classes) {
  e.classList && e.classList.remove(...classes.split(" "));
}

function post_data({ url, method, body }) {
  return fetch(url, {
    method,
    mode: "cors",
    body,
    // headers: {
    //   "Content-Type": "application/json",
    // },
  }).then(async (res) => {
    const response_json = await res.json();
    if (res.status === 302) window.location.reload();
    if (res.ok) return response_json;
    return response_json;
  });
}

function get_data({ url }) {
  return fetch(url, {
    method: "GET",
    mode: "cors",
  }).then(async (res) => {
    const response_json = await res.json();
    if (res.status === 302) window.location.reload();
    if (res.ok) return response_json;
    return response_json;
  });
}

function templateAlert(message, color, strong_text) {
  for_alert.innerHTML = /*html*/ `
    <div class="alert bg-${color}-100 rounded-lg lg:py-5 py-2 lg:px-6 px-3 mb-3 lg:text-md text-xs text-${color}-700 data-[te-alert-show]:inline-flex items-center w-full alert-dismissible fade show" role="alert" data-te-alert-init
  data-te-alert-show>
        <strong class="mr-1">${strong_text} </strong> ${message}
        <button
          type="button"
          class="btn-close box-content p-1 ml-auto text-${color}-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-${color}-900 hover:opacity-75 hover:no-underline"
          data-te-alert-dismiss
          aria-label="Close"
        >
          <i class="bi bi-x-lg"></i>
        </button>
      </div>
  `;
}

function swalAlert(msg,type){
  Swal.fire({
    toast: true,
    showConfirmButton: false,
    position: 'top-end',
    text: msg,
    icon: type,
    timer: 2000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
  });
}

hambuger_btn.addEventListener("click", function (e) {
  const nav_menu = hambuger_btn.nextElementSibling;
  hambuger_btn.classList.toggle("hamburger-active");
  nav_menu.classList.toggle("hidden");
});

window.addEventListener("scroll", function (e) {
  const fixed_nav = header.offsetTop;
  window.pageYOffset > fixed_nav
    ? header.classList.add("navbar-fixed")
    : header.classList.remove("navbar-fixed");
});
