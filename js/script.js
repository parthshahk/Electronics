document.addEventListener('DOMContentLoaded', function() {

    var tabs = document.querySelectorAll('.tabs');                                      // Tabs
    var tabsInstance = M.Tabs.init(tabs, {});

    var sidenav = document.querySelectorAll('.sidenav');                                // Sidenav
    var sidenavInstance = M.Sidenav.init(sidenav, {
        inDuration: 200,
        outDuration: 200
    });

    var collapsible = document.querySelectorAll('.collapsible');                        // Collapsible
    var collapsibleInstance = M.Collapsible.init(collapsible, {});

    var modal = document.querySelectorAll('.modal');                                    // Modal
    var modalInstances = M.Modal.init(modal, {});

    var slider = document.querySelectorAll('.slider');                                  // Slider
    var sliderInstance = M.Slider.init(slider, {
        height: 400,
        duration: 500,
        interval: 10000,
        indicators: false,
    });

    var scrollspy = document.querySelectorAll('.scrollspy');                            // Scrollspy
    var scrollspy_instance = M.ScrollSpy.init(scrollspy, {          
        scrollOffset: 75,
    });

    document.getElementById("contact-form").addEventListener('submit', function(e){      // Submit Contact Form
        e.preventDefault();

        var formData = [];

        formData[0] = document.getElementById("ContactName");
        formData[1] = document.getElementById("ContactEmail");
        formData[2] = document.getElementById("ContactPhone");
        formData[3] = document.getElementById("ContactMessage");

        for(var i=0 ; i<formData.length ; i++){
            if(formData[i].value == ""){
                formData[i].classList.add("invalid");
                return;
            }else{
                formData[i].classList.remove("invalid");
                formData[i].classList.add("valid");
            }
        }

        document.getElementById("contact-submit").classList.add('disabled');
        M.toast({html:'Please Wait...'});

        var modalSuccess = document.getElementById('modal-contact-success');
        var modalFailure = document.getElementById('modal-contact-failure');
        var modalSuccessInstance = M.Modal.getInstance(modalSuccess);
        var modalFailureInstance = M.Modal.getInstance(modalFailure);

        var params = "name="+formData[0].value+"&email="+formData[1].value+"&phone="+formData[2].value+"&message="+formData[3].value+"&formName=contact";
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'handlers/user-messages.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function(){
            if(this.status == 200){
                if(this.responseText == "success"){
                    
                    modalSuccessInstance.open();
                    document.getElementById("contact-submit").classList.remove('disabled');
                    M.Toast.dismissAll();
                    document.getElementById("contact-form").reset();

                    var request = new XMLHttpRequest();
                    request.open("GET", "handlers/mailEngine.php?action=newMessage", true);
                    request.send();

                }else if(this.responseText == "failure"){

                    modalFailureInstance.open();
                    document.getElementById("contact-submit").classList.remove('disabled');
                    M.Toast.dismissAll();
                    
                }
            }
        }
        xhr.send(params);
    });

    var reviewForm = document.getElementById("review-form");                             // On review form submit
    if(reviewForm !== null){
        reviewForm.addEventListener('submit', function(e){                               
            
            e.preventDefault();

            var formData = [];

            formData[0] = document.getElementById("ReviewName");
            formData[1] = document.getElementById("ReviewEmail");
            formData[2] = document.getElementById("ReviewMessage");
            
            for(var i=0 ; i<formData.length ; i++){
                if(formData[i].value == ""){
                    formData[i].classList.add("invalid");
                    return;
                }else{
                    formData[i].classList.remove("invalid");
                    formData[i].classList.add("valid");
                }
            }

            document.getElementById("review-submit").classList.add('disabled');
            M.toast({html:'Please Wait...'});

            var modalSuccess = document.getElementById('modal-review-success');
            var modalFailure = document.getElementById('modal-review-failure');
            var modalSuccessInstance = M.Modal.getInstance(modalSuccess);
            var modalFailureInstance = M.Modal.getInstance(modalFailure);

            var params = "name="+formData[0].value+"&email="+formData[1].value+"&message="+formData[2].value+"&formName=review";
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'handlers/user-messages.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function(){
                if(this.status == 200){
                    if(this.responseText == "success"){
                        
                        modalSuccessInstance.open();
                        document.getElementById("review-submit").classList.remove('disabled');
                        M.Toast.dismissAll();
                        document.getElementById("review-form").reset();

                        var request = new XMLHttpRequest();
                        request.open("GET", "handlers/mailEngine.php?action=newReview", true);
                        request.send();

                    }else if(this.responseText == "failure"){

                        modalFailureInstance.open();
                        document.getElementById("review-submit").classList.remove('disabled');
                        M.Toast.dismissAll();
                        
                    }
                }
            }
            xhr.send(params);
        });
    }

    var textareaCounters = document.querySelectorAll('.charCounter');                   // Input Char Counters
    var textareaCountersInstance = M.CharacterCounter.init(textareaCounters,{});

    var materialboxed = document.querySelectorAll('.materialboxed');
    var materialboxedInstance = M.Materialbox.init(materialboxed, {});

});

function openSidenav(){
    var sidenav = document.getElementById("slide-out");
    var sidenavInstance = M.Sidenav.getInstance(sidenav);
    sidenavInstance.open();
}

function modifyInCart(id){
    
    var button = document.getElementById("item"+id);
    var icon = document.getElementById("icon"+id);
    var buttonText =document.getElementById("button-text");

    button.classList.remove("red");
    button.classList.add("green","z-depth-0");
    icon.classList.remove("fa-cart-plus");
    icon.classList.add("fa-check");

    if(buttonText !== null){
        buttonText.innerText = "Added";
    }

    button.removeAttribute("onclick");
}

function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    }else{
        return false;
    }
}

function notifyMe(id){
    
    var email = document.getElementById("notify-email");

    if(!validateEmail(email.value)){
        M.Toast.dismissAll();
        M.toast({html: 'Invalid Email'});
        return;
    }

    M.Toast.dismissAll();
    M.toast({html: 'Email Submitted Successfully!'});
    var xhr=new XMLHttpRequest();
    xhr.open("GET", "handlers/notify-me.php?id="+id+"&email="+email.value, true);
    xhr.send();
    email.value = " ";

}

function addToCart(id){
    var button = document.getElementById("item"+id);
    var icon = document.getElementById("icon"+id);
    var buttonText =document.getElementById("button-text");

    M.Toast.dismissAll();
    M.toast({html: 'Please Wait...'});

    button.classList.remove("red");
    button.classList.add("amber");
    icon.classList.remove("fa-cart-plus");
    icon.classList.add("fa-refresh");
    icon.classList.add("fa-spin");

    if(buttonText !== null){
        buttonText.innerText = "Working";
    }

    var request = new XMLHttpRequest();

    request.onload = function(){
        if(this.status == 200){
            button.classList.remove("amber");
            button.classList.add("green","z-depth-0");
            icon.classList.remove("fa-refresh");
            icon.classList.remove("fa-spin");
            icon.classList.add("fa-check");

            if(buttonText !== null){
                buttonText.innerText = "Added";
            }

            M.Toast.dismissAll();
            M.toast({html: 'Item Added Successfully'});

            if(this.responseText == 'success'){
                var qHolder = document.getElementById("cart-quantity");
                var q = parseInt(qHolder.innerText);
                q++;
                qHolder.innerText = q;
            }

            button.removeAttribute("onclick");
            
        }
    };
    request.open("GET", "handlers/cart.php?action=add&id="+id, true);
    request.send();
}

function removeFromCart(id){

    var card = document.getElementById("item"+id);
    var button = document.getElementById("button"+id);

    button.classList.add("disabled");

    M.Toast.dismissAll();
    M.toast({html: 'Please Wait...'});

    var request = new XMLHttpRequest();
    request.onload = function(){
        if(this.status == 200){
            if(this.responseText == 'success'){
                card.classList.add('hide');
                updateCartAmount();
                M.Toast.dismissAll();
                M.toast({html: 'Item Removed'});
            }
        }
    };
    request.open("GET", "handlers/cart.php?action=remove&id="+id, true);
    request.send();
}

function updateCartAmount(){

    document.getElementById("subtotal-preloader").classList.remove("hide");
    document.getElementById("subtotal").innerText = '';

    var request = new XMLHttpRequest();
    request.onload = function(){
        if(this.status == 200){
            document.getElementById("subtotal-preloader").classList.add("hide");
            document.getElementById("subtotal").innerText = this.responseText;
        }
    }
    request.open("GET", "handlers/cart.php?action=getAmount", true);
    request.send();
}

function quantityIncrease(id){

    document.getElementById("quantity"+id).innerHTML = '<i class="fa fa-cog fa-spin" aria-hidden="true"></i>';
    
    var request = new XMLHttpRequest();
    request.onload = function(){
        if(this.status == 200){
            updateCartAmount();
            document.getElementById("quantity"+id).innerText = this.responseText;        
        }
    }
    request.open("GET", "handlers/cart.php?action=qincrease&id="+id, true);
    request.send();
}

function quantityDecrease(id){

    document.getElementById("quantity"+id).innerHTML = '<i class="fa fa-cog fa-spin" aria-hidden="true"></i>';
    
    var request = new XMLHttpRequest();
    request.onload = function(){
        if(this.status == 200){
            updateCartAmount();
            document.getElementById("quantity"+id).innerText = this.responseText;        
        }
    }
    request.open("GET", "handlers/cart.php?action=qdecrease&id="+id, true);
    request.send();
}

function validateCart(){

    var subtotal = document.getElementById("subtotal").innerText;
    subtotal = parseInt(subtotal.substring(4));

    if(subtotal == 0){
        window.location.href = "cart.php";
    }else if(subtotal < 50){
        var modalSubtotal = document.getElementById('modal-invalid-subtotal');
        var modalSubtotalInstance = M.Modal.getInstance(modalSubtotal);
        modalSubtotalInstance.open();
    }else{
        window.location.href = "checkout.php";
    }
}

function placeOrder(){

    document.getElementById("order-form-button").classList.add("disabled");
    M.toast({html: 'Please Wait', displayLength: 10000});
}

function sendNotifications(id){
    
    var request = new XMLHttpRequest();
    request.open("GET", "handlers/mailEngine.php?action=orderPlaced&id="+id, true);
    request.send();
}