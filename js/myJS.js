//myJS.js
//Sanskar Katiyar

//AJAX functions to edit the product listings in the shopping cart
//This would make it easier for the user to edit products then and there.

function validateZIP(e){
    var pattern = /^[0-9]{6}$/;
    var s = e.value;

    if(pattern.test(s) == true){
        e.className = "form-control bg-success register";
        e.parentElement.className = "form-group has-success register";
    } else {
        e.className = "form-control bg-danger register";
        e.parentElement.className = "form-group has-error register";
    }
}

function validatePasswords(e){
    p2 = document.getElementById("pwd2");
    p1 = document.getElementById("pwd1");

    if(e===p1){
        p1.className = "form-control bg-success register";
        p1.parentElement.className = "form-group has-success register";
    }

    if(e===p2 && p2.value===p1.value){
        p2.className = "form-control bg-success register";
        p2.parentElement.className = "form-group has-success register";
        document.getElementById('registerBtn').className = "btn btn-primary btn-wide center-block";

    } else if(p2.value!=p1.value) {
        p2.className = "form-control bg-danger register";
        p2.parentElement.className = "form-group has-error register";

        document.getElementById('registerBtn').className = "btn btn-primary btn-wide center-block disabled"; 
    }

}

function validateString(field){
    //To allow other languages, only checks the length
    var len = field.value.length;
    
    if(len > 0){
        field.className = "form-control bg-success register";
        field.parentElement.className = "form-group has-success register";
        field.value = field.value.toUpperCase();

        return 1;

    } else {
        field.className = "form-control bg-danger formText register";
        field.parentElement.className = "form-group has-error register";
        
        return 0;
    }
}


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

