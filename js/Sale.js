class SalesJs {
  addsale(id) {
    var object = new FormData();
    object.append("id", id)
    fetch("SalesController/showPrdoductSale", {
      method: "POST",
      body: object,
    })
      .then((respuesta) => respuesta.text())
      .then(function (response) {
        document.querySelector("#compra").innerHTML = response;
      })
      .catch(function (error) {
        console.log(error);
      });
  }
}
var sale = new SalesJs();
