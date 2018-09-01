document.addEventListener('DOMContentLoaded', function() {

    var sidenav = document.querySelectorAll('.sidenav');                //  Sidenav
    var sidenavInstance = M.Sidenav.init(sidenav, {});

    var collapsible = document.querySelectorAll('.collapsible');              //  Collapsibles
    var collapsibleInstance = M.Collapsible.init(collapsible, {});

    var collapsiblePending = document.querySelectorAll('.collapsible.expandable');              //  Collapsibles
    var collapsiblePendingInstance = M.Collapsible.init(collapsiblePending, {
        accordion: false
    });

    var modals = document.querySelectorAll('.modal');                                        //Modals
    var modalInstances = M.Modal.init(modals, {});

});

function deliver(id){

    var op = document.getElementById("operator").value;
    if(op == 'none'){
        M.Toast.dismissAll();
        M.toast({html: 'Please Select Your Name First!', displayLength: 1300});
        return;
    }

    if(confirm("Are You Sure?")){

        var strip = document.getElementById("s"+id);
        strip.classList.add('hide');
        M.toast({html: 'Marked as Delivered', displayLength: 1000});

        var request = new XMLHttpRequest();
        request.open("GET", "handlers/orderOperation.php?action=deliver&id="+id+"&op="+op, true);
        request.send();

        var request2 = new XMLHttpRequest();
        request2.open("GET", "../handlers/mailEngine.php?action=orderDelivered&id="+id, true);
        request2.send();

    }
}

function cancel(id){

    var op = document.getElementById("operator").value;
    if(op == 'none'){
        M.Toast.dismissAll();
        M.toast({html: 'Please Select Your Name First!', displayLength: 1300});
        return;
    }

    if(confirm("Are You Sure?")){

        var strip = document.getElementById("s"+id);
        strip.classList.add('hide');
        M.toast({html: 'Order Canceled', displayLength: 1000});

        var request = new XMLHttpRequest();
        request.open("GET", "handlers/orderOperation.php?action=cancel&id="+id+"&op="+op, true);
        request.send();

        var request2 = new XMLHttpRequest();
        request2.open("GET", "../handlers/mailEngine.php?action=orderCanceled&id="+id, true);
        request2.send();

    }
}

function toggleReview(id){

    var request = new XMLHttpRequest();
    request.open("GET", "handlers/message.php?action=toggleReview&id="+id, true);
    request.send();

}

function deleteReview(id){

    if(confirm("Are You Sure?")){

        M.toast({html: 'Review Deleted', displayLength: 1000});
        document.getElementById("s"+id).classList.add("hide");
        var request = new XMLHttpRequest();
        request.open("GET", "handlers/message.php?action=deleteReview&id="+id, true);
        request.send();

    }
}

function deleteMessage(id){

    if(confirm("Are You Sure?")){

        M.toast({html: 'Message Deleted', displayLength: 1000});
        document.getElementById("s"+id).classList.add("hide");
        var request = new XMLHttpRequest();
        request.open("GET", "handlers/message.php?action=deleteMessage&id="+id, true);
        request.send();

    }
}

function toggleStock(id){

    var request = new XMLHttpRequest();
    request.open("GET", "handlers/product.php?action=toggleStock&id="+id, true);
    request.send();

    var request2 = new XMLHttpRequest();
    request2.open("GET", "../handlers/mailEngine.php?action=stockArrival&id="+id, true);
    request2.send();
    
}

function toggleHomepage(id){

    var request = new XMLHttpRequest();
    request.open("GET", "handlers/product.php?action=toggleHomepage&id="+id, true);
    request.send();
    
}

function toggleFeatured(id){

    var request = new XMLHttpRequest();
    request.open("GET", "handlers/product.php?action=toggleFeatured&id="+id, true);
    request.send();
    
}

function addProduct(){

    document.getElementById("addSubmit").classList.add("disabled");
    M.toast({html: "Please Wait"});

}

function editProduct(){

    document.getElementById("editSubmit").classList.add("disabled");
    M.toast({html: "Please Wait"});

}

function deleteProduct(id){

    if(confirm("This will permanently delete the product. Continue?")){
        var request = new XMLHttpRequest();
        request.open("GET", "handlers/product.php?action=deleteProduct&id="+id, true);
        request.send();
        document.getElementById("s"+id).classList.add("hide");
        M.toast({html: "Item Deleted!"});
    }

}

function hideHigherFunctions(){
    document.getElementById("navproducts").classList.add("hide");;
    document.getElementById("navreviews").classList.add("hide");;
    document.getElementById("navmessages").classList.add("hide");;
    document.getElementById("navconfig").classList.add("hide");;
}