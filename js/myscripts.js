//alert("Javascript is working !");


function displayDate(){

  date = new Date();

  return date.toDateString();


}
function changeImage(){

      document.getElementById("bg1").style.backgroundImage = "url('images/logo3.jpg')";

}

function notDeleted(){

  alert("item was not deleted");

}

function itemDeleted(){
  alert("item was deleted");
}

function itemUpdated(){
  alert("item has been updated");
}

function addedToBasket(){
  alert("Item added to basket");
}

function deletedFromBasket(){
  alert("Your Basket has been updated");
}



function displayPayment(){


  payment = 'Processing Payment';


  return payment;


}

function displayPayment2(){


  payment = 'Payment Successful';


  return payment;


}

function signup(){
  alert("Thank you for Signing up. ");
}
