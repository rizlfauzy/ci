const tbody_peoples = document.querySelector("#tbody_peoples"),
  pagination_wrapper = document.querySelector(".pagination-wrapper"),
  btn_search = document.querySelector(".btn_search"),
	input_search = document.querySelector("input[name='search']");

function templateTable(element,items,rows){
  element.innerHTML = items.length > 0 ? items.map((item,i)=>{
    return /*html*/ `
      <tr class="bg-gray-100 hover:bg-gray-200 border-b last:border-0 transition duration-300 ease-in-out">
        <td class="md:text-md text-sm leading-[1.25] py-2 px-3 text-dark text-center">
          ${++rows}
        </td>
        <td class="md:text-sm text-2xs leading-[1.25] py-2 px-3 text-dark text-center">
          ${item.name}
        </td>
        <td class="md:text-sm text-2xs leading-[1.25] py-2 px-3 text-dark text-center">
          ${item.email}
        </td>
      </tr>
      `
  }).join('') : /*html*/ `
    <tr class="bg-gray-100 hover:bg-gray-200 border-b last:border-0 transition duration-300 ease-in-out">
      <td class="md:text-md text-sm leading-[1.25] py-6 px-12 text-dark text-center" colspan="3">
        Peoples tidak tersedia
      </td>
    </tr>
  `
}

function templatePagination(html){
  if (html) {
    const page_link = document.querySelectorAll('.page-link');
    pagination_wrapper.children[0].children[0].innerHTML = [...page_link].map(link=>{
    const li = link.parentElement;
    const offset = link.href.split('/')[6];
    const is_active = li.classList.contains("pagination_active") ? "pagination_active" : "";
    return /*html*/`
      <li class="relative block rounded bg-transparent py-1.5 px-3 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100 dark:text-white dark:hover:bg-neutral-700 dark:hover:text-white ${is_active}">
        <button class="page-button" data-rows="${offset || ''}">${link.innerHTML}</button>
      </li>
    `
    }).join('');
  }
}

async function getSearchData(search,rows = "") {
	try {
		const form_data = new FormData();
		form_data.append("search", search);
		const {
			error: error_search,
			message: message_search,
			data: list_search,
      html,
      rows:rows_peoples
		} = await post_data({
			url: url + "/peoples/search/"+rows,
			method: "post",
			body: form_data,
		});
		if (error_search) throw new Error(message_search);
    console.log(list_search);
		pagination_wrapper.innerHTML = html;
    templatePagination(html)
    templateTable(tbody_peoples, list_search, rows_peoples);
	} catch (e) {
		swalAlert(e.message, "error");
	}
}

async function showTablePeoples(rows = ""){
  try {
    const {error:error_peoples,message:message_peoples,data:list_peoples,html,rows:rows_peoples} = await get_data({url:url+"/peoples/get_list_peoples/"+rows});
    if(error_peoples)throw new Error(message_peoples);
    pagination_wrapper.innerHTML = html;
    templatePagination(html)
    templateTable(tbody_peoples, list_peoples, rows_peoples);
  } catch (e) {
    swalAlert(e.message, "error");
  }
}

$(document).on("click",".page-button", async function (e) {  
  e.preventDefault();
  const rows = $(this).data("rows");
  if (input_search.value.length < 1) await showTablePeoples(rows);
  else await getSearchData(input_search.value,rows)
})

btn_search.addEventListener("click", async function (e) {
	if (this.children[0].classList.contains("not_focus")) {
		input_search.focus();
		return;
	}
	addClass(btn_search.children[0], "not_focus");
	input_search.value = "";
	await getSearchData(input_search.value)
});

input_search.addEventListener("focus", function (e) {
	addClass(btn_search.children[0], "focus");
	removeClass(btn_search.children[0], "not_focus");
});

input_search.addEventListener("blur", function (e) {
	removeClass(btn_search.children[0], "focus");
	if (!e.relatedTarget) addClass(btn_search.children[0], "not_focus");
});

input_search.addEventListener("input", async function (e) {
	await getSearchData(this.value);
});

showTablePeoples()