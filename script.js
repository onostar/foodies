$(document).ready(function(){
    $("#loginDiv").click(function(){
        $(".login_option").toggle();
    });
});
//display login first prompt
function loginFirst(){
    $("#loginPrompt").show();
}
// close login first prompt box
$(document).ready(function(){
    $("#closeBox").click(function(){
        $("#loginPrompt").hide();
    })
})
//display login first prompt when user cick on categories
$(document).ready(function(){
    $("#index_nav ul li").click(function(){
        loginFirst();
    })
})
//display more featured items
$(document).ready(function(){
    $("#view_more").click(function(){
        $(".featured").css("height", "auto");
        $("#view_more").hide();
        $("#show_less").show();
    })
})
//display less featured items
$(document).ready(function(){
    $("#show_less").click(function(){
        $(".featured").css("height", "250px");
        $("#view_more").show();
        $("#show_less").hide();

    })
})
//display more general items
$(document).ready(function(){
    $("#more").click(function(){
        $(".all_items").css("height", "auto");
        $("#more").hide();
        $("#less").show();
    })
})
//display less general items
$(document).ready(function(){
    $("#less").click(function(){
        $(".all_items").css("height", "250px");
        $("#more").show();
        $("#less").hide();

    })
})

//show item information
function showItems(item_id){
    window.open("item_info.php?item="+item_id, "_parent");
    return;
}

//add item to cart
/* $(document).ready(function(){
    $("#add_to_cart").click(function(){
        let cart_item_name = document.getElementById('cart_item_name').value;
        let cart_item_price = document.getElementById('cart_item_price').value;
        let cart_item_restaurant = document.getElementById('cart_item_restaurant').value;
        let customer_email = document.getElementById('customer_email').value;
        
        
        //   alert("work");
        $.ajax({
            type: "POST",
            url: "cart.php",
            data: {cart_item_name:cart_item_name, cart_item_price:cart_item_price, cart_item_restaurant:cart_item_restaurant,customer_email:customer_email},
            success: function(response){
                $(".info").html(response);
            }
        });
        /* $("#itemToDelete").focus();
        $("#itemToDelete").val(''); */
        // return false;
    // })

// }) */

//display update user details by clicking on edit address
$(document).ready(function(){
    $("#editDetails").click(function(){
        // alert('hello');
        $(".update_details").show();
        $(".profile_details").hide();
        $("#close_update").click(function(){
            $(".profile_details").show();
            $(".update_details").hide();
        })
    })
})
//display change password
$(document).ready(function(){
    $("#changePasword").click(function(){
        // alert('hello');
        $(".change_password").toggle();
       
    })
})


//multiply item on shopping cart
function getCartTotal(){
    let itemTotal = document.getElementById("itemTotal").innerText;
    let discount = document.getElementById("discount").innerText;
    let delivery = document.getElementById("delivery").innerText;
    let grandTotal = document.getElementById("grandTotal");
    grandTotal.innerText = parseInt(itemTotal) + parseInt(discount) + parseInt(delivery);
    // alert(delivery);
}
getCartTotal();

//delete item from cart
function removeCartItem(cart_id){
    window.open('remove_cart_item.php?cart_item='+cart_id, '_parent');
    return;
}

//hide suuccess message
// setTimeout()
//get total amount of items in cart
/* function cartItemTotal(){
    let totalPrice = document.querySelectorAll('.totalprice');

} */
// close error pop up box from cart
$(document).ready(function(){
    $("#close_error").click(function(){
        $(".error_box").hide();
    })
})

