/* toggle login */
$(document).ready(function(){
    $("#loginDiv").click(function(){
        $(".login_option").toggle();
    });
});

/* toggle admin menu */
$(document).ready(function(){
    $("#nav1").click(function(){
        $("#nav1Menu").toggle();
        $("#nav2Menu").hide();
        $("#nav3Menu").hide();
        $("#nav4Menu").hide();
    });
});
$(document).ready(function(){
    $("#nav2").click(function(){
        $("#nav2Menu").toggle();
        $("#nav1Menu").hide();
        $("#nav3Menu").hide();
        $("#nav4Menu").hide();
    });
});
$(document).ready(function(){
    $("#nav3").click(function(){
        $("#nav3Menu").toggle();
        $("#nav1Menu").hide();
        $("#nav2Menu").hide();
        $("#nav4Menu").hide();
    });
});
$(document).ready(function(){
    $("#nav4").click(function(){
        $("#nav4Menu").toggle();
        $("#nav3Menu").hide();
        $("#nav1Menu").hide();
        $("#nav2Menu").hide();
    });
});


/* display create users */
$(document).ready(function(){
    $("#addUser").click(function(){
        $("#createUser").show();
        $("#dashboard").hide();
        $("#addRestaurant").hide();
        $("#addCategories").hide();
        $("#addItems").hide();
        $("#disableUsers").hide();
        $("#deleteItems").hide();
        $("#restaurantList").hide();
        $("#menuList").hide();
        $("#priceList").hide();
        $("#userList").hide();
        $("#featuredItems").hide();
        $("#customers").hide();
        $("#orderList").hide();
        $("#cancelledDeliveries").hide();

    });
});
/* display add restuarant */
$(document).ready(function(){
    $("#addStore").click(function(){
        $("#addRestaurant").show();
        $("#dashboard").hide();
        $("#createUser").hide();
        $("#addCategories").hide();
        $("#addItems").hide();
        $("#disableUsers").hide();
        $("#deleteItems").hide();
        $("#restaurantList").hide();
        $("#menuList").hide();
        $("#priceList").hide();
        $("#userList").hide();
        $("#featuredItems").hide();
        $("#customers").hide();
        $("#orderList").hide();
        $("#deliveryList").hide();
        $("#cancelledDeliveries").hide();

    });
});
/* display add categories */
$(document).ready(function(){
    $("#addCat").click(function(){
        $("#addCategories").show();
        $("#addRestaurant").hide();
        $("#dashboard").hide();
        $("#createUser").hide();
        $("#addItems").hide();
        $("#disableUsers").hide();
        $("#deleteItems").hide();
        $("#restaurantList").hide();
        $("#menuList").hide();
        $("#priceList").hide();
        $("#userList").hide();
        $("#featuredItems").hide();
        $("#customers").hide();
        $("#orderList").hide();
        $("#deliveryList").hide();
        $("#cancelledDeliveries").hide();

    });
});
/* display add items */
$(document).ready(function(){
    $("#addMenu").click(function(){
        $("#addItems").show();
        $("#addCategories").hide();
        $("#addRestaurant").hide();
        $("#dashboard").hide();
        $("#createUser").hide();
        $("#disableUsers").hide();
        $("#deleteItems").hide();
        $("#restaurantList").hide();
        $("#menuList").hide();
        $("#priceList").hide();
        $("#userList").hide();
        $("#featuredItems").hide();
        $("#customers").hide();
        $("#orderList").hide();
        $("#deliveryList").hide();
        $("#cancelledDeliveries").hide();

    });
});
/* display disableUsers */
$(document).ready(function(){
    $("#disableUser").click(function(){
        $("#disableUsers").show();
        $("#addItems").hide();
        $("#addCategories").hide();
        $("#addRestaurant").hide();
        $("#dashboard").hide();
        $("#createUser").hide();
        $("#deleteItems").hide();
        $("#restaurantList").hide();
        $("#menuList").hide();
        $("#priceList").hide();
        $("#userList").hide();
        $("#featuredItems").hide();
        $("#customers").hide();
        $("#orderList").hide();
        $("#deliveryList").hide();
        $("#cancelledDeliveries").hide();

    });
});
/* display deleteItems*/
$(document).ready(function(){
    $("#deleteItem").click(function(){
        $("#deleteItems").show();
        $("#disableUsers").hide();
        $("#addItems").hide();
        $("#addCategories").hide();
        $("#addRestaurant").hide();
        $("#dashboard").hide();
        $("#createUser").hide();
        $("#restaurantList").hide();
        $("#menuList").hide();
        $("#priceList").hide();
        $("#userList").hide();
        $("#featuredItems").hide();
        $("#customers").hide();
        $("#orderList").hide();
        $("#deliveryList").hide();
        $("#cancelledDeliveries").hide();

    });
});
/* display restaurants*/
$(document).ready(function(){
    $("#showRestaurants").click(function(){
        $("#restaurantList").show();
        $("#deleteItems").hide();
        $("#disableUsers").hide();
        $("#addItems").hide();
        $("#addCategories").hide();
        $("#addRestaurant").hide();
        $("#dashboard").show();
        $("#createUser").hide();
        $("#userSummary").hide();
        $("#menuList").hide();
        $("#priceList").hide();
        $("#userList").hide();
        $("#featuredItems").hide();
        $("#customers").hide();
        $("#orderList").hide();
        $("#deliveryList").hide();
        $("#cancelledDeliveries").hide();
        
    });
});
/* display restaurants from card2*/
$(document).ready(function(){
    $("#card2").click(function(){
        $("#restaurantList").show();
        $("#deleteItems").hide();
        $("#disableUsers").hide();
        $("#addItems").hide();
        $("#addCategories").hide();
        $("#addRestaurant").hide();
        $("#dashboard").show();
        $("#createUser").hide();
        $("#userSummary").hide();
        $("#menuList").hide();
        $("#priceList").hide();
        $("#userList").hide();
        $("#featuredItems").hide();
        $("#customers").hide();
        $("#orderList").hide();
        $("#deliveryList").hide();
        $("#cancelledDeliveries").hide();

    });
});
/* display customers from card2 for clients*/
$(document).ready(function(){
    $(".cust_cards").click(function(){
        $("#restaurantList").hide();
        $("#deleteItems").hide();
        $("#disableUsers").hide();
        $("#addItems").hide();
        $("#addCategories").hide();
        $("#addRestaurant").hide();
        $("#dashboard").show();
        $("#createUser").hide();
        $("#userSummary").hide();
        $("#menuList").hide();
        $("#priceList").hide();
        $("#userList").hide();
        $("#featuredItems").hide();
        $("#customers").show();
        $("#orderList").hide();
        $("#deliveryList").hide();
        $("#cancelledDeliveries").hide();

    });
});
/* display menu items*/
$(document).ready(function(){
    $("#showMenus").click(function(){
        $("#menuList").show();
        $("#restaurantList").hide();
        $("#deleteItems").hide();
        $("#disableUsers").hide();
        $("#addItems").hide();
        $("#addCategories").hide();
        $("#addRestaurant").hide();
        $("#dashboard").show();
        $("#createUser").hide();
        $("#userSummary").hide();
        $("#priceList").hide();
        $("#userList").hide();
        $("#featuredItems").hide();
        $("#customers").hide();
        $("#orderList").hide();
        $("#deliveryList").hide();
        $("#cancelledDeliveries").hide();

    });
});
/* display modify price*/
$(document).ready(function(){
    $("#modifyPrice").click(function(){
        $("#priceList").show();
        $("#menuList").hide();
        $("#restaurantList").hide();
        $("#deleteItems").hide();
        $("#disableUsers").hide();
        $("#addItems").hide();
        $("#addCategories").hide();
        $("#addRestaurant").hide();
        $("#dashboard").show();
        $("#createUser").hide();
        $("#userSummary").hide();
        $("#userList").hide();
        $("#featuredItems").hide();
        $("#orderList").hide();
        $("#customers").hide();
        $("#deliveryList").hide();
        $("#cancelledDeliveries").hide();

    });
});
/* display users list*/
$(document).ready(function(){
    $("#showUsers").click(function(){
        $("#userList").show();
        $("#priceList").hide();
        $("#menuList").hide();
        $("#restaurantList").hide();
        $("#deleteItems").hide();
        $("#disableUsers").hide();
        $("#addItems").hide();
        $("#addCategories").hide();
        $("#addRestaurant").hide();
        $("#dashboard").show();
        $("#createUser").hide();
        $("#userSummary").hide();
        $("#featuredItems").hide();
        $("#customers").hide();
        $("#orderList").hide();
        $("#deliveryList").hide();
        $("#cancelledDeliveries").hide();

    });
});
/* display customers list*/
$(document).ready(function(){
    $("#customerList").click(function(){
        $("#customers").show();
        $("#userList").hide();
        $("#priceList").hide();
        $("#menuList").hide();
        $("#restaurantList").hide();
        $("#deleteItems").hide();
        $("#disableUsers").hide();
        $("#addItems").hide();
        $("#addCategories").hide();
        $("#addRestaurant").hide();
        $("#dashboard").show();
        $("#createUser").hide();
        $("#userSummary").hide();
        $("#orderList").hide();
        $("#featuredItems").hide();
        $("#deliveryList").hide();
        $("#cancelledDeliveries").hide();

    });
});
/* display featured items*/
$(document).ready(function(){
    $("#featured").click(function(){
        $("#featuredItems").show();
        $("#userList").hide();
        $("#priceList").hide();
        $("#menuList").hide();
        $("#restaurantList").hide();
        $("#deleteItems").hide();
        $("#disableUsers").hide();
        $("#addItems").hide();
        $("#addCategories").hide();
        $("#addRestaurant").hide();
        $("#dashboard").hide();
        $("#createUser").hide();
        $("#userSummary").hide();
        $("#deliveryList").hide();
        $("#orderList").hide();
        $("#cancelledDeliveries").hide();

    });
});
/* display ordered items*/
$(document).ready(function(){
    $("#orders").click(function(){
        $("#orderList").show();
        $("#featuredItems").hide();
        $("#userList").hide();
        $("#priceList").hide();
        $("#menuList").hide();
        $("#restaurantList").hide();
        $("#deleteItems").hide();
        $("#disableUsers").hide();
        $("#addItems").hide();
        $("#addCategories").hide();
        $("#addRestaurant").hide();
        $("#dashboard").show();
        $("#createUser").hide();
        $("#userSummary").hide();
        $("#customers").hide();
        $("#deliveryList").hide();
        $("#cancelledDeliveries").hide();

    });
});
/* display successfully derlivered items*/
$(document).ready(function(){
    $("#deliveries").click(function(){
        $("#deliveryList").show();
        $("#orderList").hide();
        $("#featuredItems").hide();
        $("#userList").hide();
        $("#priceList").hide();
        $("#menuList").hide();
        $("#restaurantList").hide();
        $("#deleteItems").hide();
        $("#disableUsers").hide();
        $("#addItems").hide();
        $("#addCategories").hide();
        $("#addRestaurant").hide();
        $("#dashboard").hide();
        $("#createUser").hide();
        $("#userSummary").hide();
        $("#customers").hide();
        $("#cancelledDeliveries").hide();

    });
});
/* display cancelled order items*/
$(document).ready(function(){
    $("#cancelled").click(function(){
        $("#cancelledDeliveries").show();
        $("#deliveryList").hide();
        $("#orderList").hide();
        $("#featuredItems").hide();
        $("#userList").hide();
        $("#priceList").hide();
        $("#menuList").hide();
        $("#restaurantList").hide();
        $("#deleteItems").hide();
        $("#disableUsers").hide();
        $("#addItems").hide();
        $("#addCategories").hide();
        $("#addRestaurant").hide();
        $("#dashboard").hide();
        $("#createUser").hide();
        $("#userSummary").hide();
        $("#customers").hide();
    });
});
/* display featured items from card3*/
$(document).ready(function(){
    $("#card3").click(function(){
        $("#featuredItems").show();
        $("#userList").hide();
        $("#priceList").hide();
        $("#menuList").hide();
        $("#restaurantList").hide();
        $("#deleteItems").hide();
        $("#disableUsers").hide();
        $("#addItems").hide();
        $("#addCategories").hide();
        $("#addRestaurant").hide();
        $("#dashboard").hide();
        $("#createUser").hide();
        $("#userSummary").hide();
        $("#customers").hide();
        $("#orderList").hide();
        $("#deliveryList").hide();
        $("#cancelledDeliveries").hide();

    });
});
/* display declined orders on clients from card3*/
$(document).ready(function(){
    $("#card3").click(function(){
        $("#cancelledDeliveries").show();
        $("#userList").hide();
        $("#priceList").hide();
        $("#menuList").hide();
        $("#restaurantList").hide();
        $("#deleteItems").hide();
        $("#disableUsers").hide();
        $("#addItems").hide();
        $("#addCategories").hide();
        $("#addRestaurant").hide();
        $("#dashboard").hide();
        $("#createUser").hide();
        $("#userSummary").hide();
        $("#customers").hide();
        $("#orderList").hide();
        $("#deliveryList").hide();
        

    });
});
/* display order list from card1*/
$(document).ready(function(){
    $("#card1").click(function(){
        $("#orderList").show();
        $("#featuredItems").hide();
        $("#userList").hide();
        $("#priceList").hide();
        $("#menuList").hide();
        $("#restaurantList").hide();
        $("#deleteItems").hide();
        $("#disableUsers").hide();
        $("#addItems").hide();
        $("#addCategories").hide();
        $("#addRestaurant").hide();
        $("#dashboard").show();
        $("#createUser").hide();
        $("#userSummary").hide();
        $("#customers").hide();
        $("#deliveryList").hide();
        $("#cancelledDeliveries").hide();

    });
});

// create categories
 $(document).ready(function(){
    $("#add_categories").click(function(){
        let category = $("input#category").val();
        let dataString = 'category=' + category;
        //  alert(itemCategory);

        $.ajax({
            type: "POST",
            url: "add_category.php",
            data: dataString,
            success: function(response){
                $(".info").html(response);
            }
        });
        $("#category").focus();
        $("#category").val('');
        return false;
    })

})
// add menu
 /* $(document).ready(function(){
    $("#add_items").click(function(){
        let menuRestaurant = document.getElementById("menuRestaurant").value;
        let item_category = document.getElementById("item_category").value;
        let menu_item = document.getElementById("menu_item").value;
        let menu_prize = document.getElementById("menu_prize").value;
        let item_foto = document.getElementById("item_foto").value;
        // alert(item_category + menu_item + menu_prize + item_restaurant);
        $.ajax({
            type: "POST",
            url: "add_items.php",
            data: {menuRestaurant:menuRestaurant, item_category:item_category, menu_item:menu_item, menu_prize:menu_prize, item_foto:item_foto},
            success: function(response){
                $(".info").html(response);
            }
        });
        $("#menu_item").focus();
        $("#menu_item").val('');
        return false;
    })

}) */

//get item name from restaurant select to delete
$(document).ready(function(){
    $("#restaurantToDelete").on('change', function(){
        let restaurantToDelete = $(this).val();
        // alert (restaurantToDelete);
        if(restaurantToDelete){
            $.ajax({
                type: 'POST',
                url: 'get_item.php',
                data: 'restaurantToDelete='+restaurantToDelete,
                success: function(response){
                    $("#itemToDelete").html(response);
                }
            })
            return false;
        }else{
            $("#itemToDelete").html("<option value=''>Select Restaurant first</option>");
        }
    });
});
//get item name from restaurant select to add to featured
$(document).ready(function(){
    $("#featuredRestaurant").on('change', function(){
        let featuredRestaurant = $(this).val();
        // alert (featured_restaurant);
        if(featuredRestaurant){
            $.ajax({
                type: 'POST',
                url: 'get_featured.php',
                data: 'featuredRestaurant='+featuredRestaurant,
                success: function(response){
                    $("#featuredItem").html(response);
                }
            })
            return false;
        }else{
            $("#featuredItem").html("<option value=''>Select Restaurant first</option>");
        }
    });
});

//delete item
$(document).ready(function(){
    $("#delete_item").click(function(){
        let restaurantToDelete = document.getElementById('restaurantToDelete').value;
        let itemToDelete = document.getElementById('itemToDelete').value;
        
        //   alert(item + restaurant);
        $.ajax({
            type: "POST",
            url: "delete_items.php",
            data: {restaurantToDelete:restaurantToDelete, itemToDelete:itemToDelete},
            success: function(response){
                $(".info").html(response);
            }
        });
        $("#itemToDelete").focus();
        $("#itemToDelete").val('');
        return false;
    })

})

//search deliveries with date for admin
$(document).ready(function(){
    $("#search_date_admin").click(function(){
        let from_date = document.getElementById('from_date').value;
        let to_date = document.getElementById('to_date').value;
        
        //   alert(item + restaurant);
        $.ajax({
            type: "POST",
            url: "search_date_admin.php",
            data: {from_date:from_date, to_date:to_date},
            success: function(response){
                $(".new_data").html(response);
            }
        });
        /* $("#itemToDelete").focus();
        $("#itemToDelete").val(''); */
        return false;
    })

})
//search deliveries with date for users
$(document).ready(function(){
    $("#search_date").click(function(){
        let from_date = document.getElementById('from_date').value;
        let to_date = document.getElementById('to_date').value;
        
        //   alert(item + restaurant);
        $.ajax({
            type: "POST",
            url: "search_date.php",
            data: {from_date:from_date, to_date:to_date},
            success: function(response){
                $(".new_data").html(response);
            }
        });
        /* $("#itemToDelete").focus();
        $("#itemToDelete").val(''); */
        return false;
    })

})
//search cancelled orders with date for admin
$(document).ready(function(){
    $("#search_cancel_admin").click(function(){
        let from_cancel = document.getElementById('from_cancel').value;
        let to_cancel = document.getElementById('to_cancel').value;
        
        //   alert(item + restaurant);
        $.ajax({
            type: "POST",
            url: "search_cancelled_admin.php",
            data: {from_cancel:from_cancel, to_cancel:to_cancel},
            success: function(response){
                $(".cancelled_data").html(response);
            }
        });
        /* $("#itemToDelete").focus();
        $("#itemToDelete").val(''); */
        return false;
    })

})
//search cancelled orders with date
$(document).ready(function(){
    $("#search_cancel").click(function(){
        let from_cancel = document.getElementById('from_cancel').value;
        let to_cancel = document.getElementById('to_cancel').value;
        
        //   alert(item + restaurant);
        $.ajax({
            type: "POST",
            url: "search_cancelled.php",
            data: {from_cancel:from_cancel, to_cancel:to_cancel},
            success: function(response){
                $(".cancelled_data").html(response);
            }
        });
        /* $("#itemToDelete").focus();
        $("#itemToDelete").val(''); */
        return false;
    })

})

/* search restaurant */
$(document).ready(function(){
    let $rows = $('#restaurantTable tbody tr');
    $('#searchRestaurant').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $rows.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})
/* search menu */
$(document).ready(function(){
    let $row = $('#menuTable tbody tr');
    $('#searchMenus').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})
/* search price to modify */
$(document).ready(function(){
    let $row = $('#priceTable tbody tr');
    $('#searchPrice').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})

/* search user list */
$(document).ready(function(){
    let $row = $('#userTable tbody tr');
    $('#searchUsers').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})

/* search customer list */
$(document).ready(function(){
    let $row = $('#customerTable tbody tr');
    $('#searchCustomers').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})

/* search order list */
$(document).ready(function(){
    let $row = $('#orderTable tbody tr');
    $('#searchOrder').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})

/* search successful deliveries list */
$(document).ready(function(){
    let $row = $('#deliveriesTable tbody tr');
    $('#searchDeliveries').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})

/* search canceled orders list */
$(document).ready(function(){
    let $row = $('#cancelledTable tbody tr');
    $('#searchCancelled').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})

/* change price without refresh */
$(document).ready(function(){
    $("#changePrize").click(function(){
        let item_prize = document.getElementById('item_prize').value;
        let item_id = document.getElementById('item_id').value;
        $.ajax({
            type: "POST",
            url: "change_price.php",
            data: {item_prize:item_prize, item_id:item_id},
            success: function(response){
                $("#item_id").val(response);
                // $("#item_id").fade();
            }
        })
    return false;
    })
    
})
/* change price without refresh for users*/
$(document).ready(function(){
    $("#changePrizeUser").click(function(){
        let item_prize = document.getElementById('item_prize').value;
        let item_id = document.getElementById('item_id').value;
        $.ajax({
            type: "POST",
            url: "change_price.php",
            data: {item_prize:item_prize, item_id:item_id},
            success: function(response){
                $("#item_id").val(response);
                // $("#item_id").fade();
            }
        })
    return false;
    })
    
})

//add items to featured list without refresh
$(document).ready(function(){
    $("#add_feat").click(function(){
        let featuredRestaurant = document.getElementById('featuredRestaurant').value;
        let featuredItem = document.getElementById('featuredItem').value;
        // alert(featuredItem + featuredRestaurant);
        $.ajax({
            type: "POST",
            url: "add_featured.php",
            data: {featuredRestaurant:featuredRestaurant, featuredItem:featuredItem},
            success: function(response){
                $("#featuredTable").hide();
                $(".newTable").html(response);
                // $("#item_id").fade();
            }
        })
        $("#featuredItem").val('');
        return false;
    })
    
})

//create user
$(document).ready(function(){
    $("#create_user").click(function(){
        let contactPerson = document.getElementById("contactPerson").value;
        let contactPhone = document.getElementById("contactPhone").value;
        let restaurantEmail = document.getElementById("restaurantEmail").value;
        let userRestaurant = document.getElementById("userRestaurant").value;
        //alert(user_restaurant + contact_person + contact_phone + restaurant_email);
        $.ajax({
            type: "POST",
            url: "create_user.php",
            data: {contactPerson:contactPerson, contactPhone:contactPhone, restaurantEmail:restaurantEmail, userRestaurant:userRestaurant},
            success: function(reply){
                $(".info").html(reply);
            }
        })
        return false;
    })
})

/* create reataurant */
/* $(document).ready(function(){
    $("#add_restaurant").click(function(){
        let restaurantName = document.getElementById("restaurantName").value;
        let restaurantAddress = document.getElementById("restaurantAddress").value;
        let restaurantLocation = document.getElementById("restaurantLocation").value;
        let restaurantLogo = document.getElementById("restaurantLogo").value;
        //alert(user_restaurant + contact_person + contact_phone + restaurant_email);
        $.ajax({
            type: "POST",
            url: "add_restaurant.php",
            data: {restaurantName:restaurantName, restaurantAddress:restaurantAddress, restaurantLocation:restaurantLocation, restaurantLogo:restaurantLogo},
            success: function(reply){
                $(".info").html(reply);
            }
        })
        return false;
    })
})
 */

//disable user
$(document).ready(function(){
    $("#disable").click(function(){
        let user_name = document.getElementById("user_name").value;
        // alert(user_name);
        $.ajax({
            type: "POST",
            url: "disable_users.php",
            data: {user_name:user_name},
            success: function(response){
                $(".info").html(response);
            }
        })
        $("#user_name").val('');
        return false;
    })
})
//get item id to remove from featured list
function removeFeatured(id){
    window.open("remove_featured.php?remove="+id, "_parent");
    return;
}

//remove item from featured list without refreshing page


//dispense item

function dispenseItem(order_id){
    let dispense = confirm("Are you sure you want to Dispense this item?", "");
    if(dispense){
        window.open("dispense_item.php?dispense="+order_id, "_parent");
        return;
    }
    
}
//dispense item for users

function dispenseItemUser(order_id){
    let dispense = confirm("Are you sure you want to Dispense this item?", "");
    if(dispense){
        window.open("dispense_item_users.php?dispense="+order_id, "_parent");
        return;
    }
    
}
//cancel order
function cancelOrder(order_id){
    let cancel = confirm("Are you sure you want to Cancel this order?", "");
    if(cancel){
        window.open("cancel_order.php?cancel="+order_id, "_parent");
        return;
    }
    
}
//cancel order for users
function cancelOrderUser(order_id){
    let cancel = confirm("Are you sure you want to Cancel this order?", "");
    if(cancel){
        window.open("cancel_order_user.php?cancel="+order_id, "_parent");
        return;
    }
    
}

