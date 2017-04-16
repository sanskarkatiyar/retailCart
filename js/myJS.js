//myJS.js
//Sanskar Katiyar

//AJAX functions to edit the product listings in the shopping cart
//This would make it easier for the user to edit products then and there.


function addToCart(productID, units) {
    if (productID == "" && units !=0) {
        alert("Invalid Request!");
    } else {
        
        xmlhttp = new XMLHttpRequest();
        var url = "cart.php";
        
        xmlhttp.open('POST', url, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                
                newProductAdded = this.responseText; //returns completely formatted product row
                
                var productList = document.getElementById("cartProductList");
                productList.innerHTML = productList.innerHTML + newProductAdded;
                
                if(this.responseText != "") {
                    var cc = document.getElementById(cartCount);
                    cc.innerHTML = parseInt(cc.innerHTML) + 1;

                    var ccxs = document.getElementById(cartCount_xs);
                    ccxs.innerHTML = parseInt(ccxs.innerHTML) + 1;
                }
                    
                
                //SHOW A COLLAPSING NOTIFICATION: ITEM ADDED TO CART
            }
        }
        
        xmlhttp.send("action=addItem&productID=" + productID + "&units=" + units);
    }
    
}

function deleteProduct(productID) {
    if (productID == "") {
        alert("Invalid Request!");
    } else {
        xmlhttp = new XMLHttpRequest();
        var url = "cart.php";
        
        xmlhttp.open('POST', url, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(productID).style.display = "None";
                //document.getElementById(productID).outerHTML = "";
                var cc = document.getElementById(cartCount);
                cc.innerHTML = parseInt(cc.innerHTML) - 1;
            }
        }
        
        xmlhttp.send("action=removeItem&productID=" + productID);
    }
}


function incrementProductCount(productID, count) {
    if (productID == "" || count==10) { //maximum count 10 per product
        alert("Invalid Request! Product count Limit reached.");
    } else {
        xmlhttp = new XMLHttpRequest();
        var url = "cart.php";
        
        xmlhttp.open('POST', url, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var c = document.getElementById(productID + '_count');
                c.innerHTML = parseInt(c.innerHTML) + 1;
            }
        }
        
        xmlhttp.send("action=increaseItemCount&productID=" + productID);
    }    
}

function decrementProductCount(productID) {
    if (productID == "" || count==1) { //minimum count 1 per product
        alert("Invalid Request! Product count Limit reached.");
    } else {
        xmlhttp = new XMLHttpRequest();
        var url = "cart.php";
        
        xmlhttp.open('POST', url, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var c = document.getElementById(productID + '_count');
                c.innerHTML = parseInt(c.innerHTML) - 1;
            }
        }
        
        xmlhttp.send("action=decreaseItemCount&productID=" + productID);
    }        
}