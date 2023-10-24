const addBtn = document.querySelector(".add");
const input = document.querySelector(".dynamic-input");
var array = ["Volvo","Saab","Mercades","Audi"];

function removeInput(){
    this.parentElement.remove();
}

function addInput(){
    

    const name = document.createElement("select");
    name.id = ".productID";
    name.className = "output-detail-box-select";

    for (var i = 0; i < array.length; i++) {
        var option = document.createElement("option");
        option.value = array[i];
        option.text = array[i];
        name.appendChild(option);
    }

    const price = document.createElement("input");
    price.type = "text";
    price.className = "output-detail-box-input";

    const number = document.createElement("input");
    number.type = "number";
    number.className = "output-detail-box-input";

    const btn = document.createElement("input");
    btn.className = "delete";
    btn.innerHTML = "&time";

    btn.addEventListener("click", removeInput);

    const flex = document.createElement("div");
    flex.className = "dynamic-input";

    input.appendChild(flex);
    flex.appendChild(name);
    flex.appendChild(price);
    flex.appendChild(number);
    flex.appendChild(btn);
}
addBtn.addEventListener("click", addInput);