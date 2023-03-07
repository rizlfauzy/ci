const modal_insert = document.querySelector("#modal_insert");

modal_insert && modal_insert.addEventListener('click',function (e){
  if (e.target.id === "modal_insert") {
    this.style.display = "none";
    const form = this.querySelector("form");
    form.reset();
  } else "";
})