// const { event } = require("jquery");

$(document).ready(function(){

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    error: function(xhr){
        alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + '\nPlease Login to add to cart');
    }
});
let cartcount=document.querySelector("#cart-items-count");
let cartprice=document.querySelector("#cart-items-price");
document.querySelectorAll('.cart-span').forEach(item => {
    item.addEventListener('click', event => {
        let txt=event.target.innerText;
        price=document.getElementById("p"+event.target.id).innerText;
        if(txt==="Added"){
            $.post('/removecart/'+event.target.id, function(response){
                if(response.success)
                {
                    event.target.innerText="Add to cart";
                    cartprice.innerText=Number(cartprice.innerText)-Number(price);
                    cartcount.innerText=Number(cartcount.innerText)-1;
                }
            }, 'json');
        }
        else{
            $.post('/addtocart/'+event.target.id, function(response){
                if(response.success)
                {
                    event.target.innerText="Added";
                    cartprice.innerText=Number(price)+Number(cartprice.innerText);
                    cartcount.innerText=Number(cartcount.innerText)+1;
                }
                else{
                    console.log(response);
                }
            }, 'json');

            console.log(cartcount,cartprice);
        }
    })
  })
$('.nav-trigger').click(function(){
    $('.site-content-wrapper').toggleClass('scaled');
 })
 let chk = document.getElementById('checkout-price');
 document.querySelectorAll('.plus').forEach(item => {
    item.addEventListener('click', event => {
        $name=event.target.parentNode.parentNode.childNodes[1].innerText;
        $.post('/incCart/'+$name, function(response){
            if(response.success)
            {
                let qty=event.target.parentNode.childNodes[2];
                let price=event.target.parentNode.parentNode.childNodes[5].childNodes[0];
                price.innerText =Number(price.innerText)+(price.innerText/qty.innerText);
                qty.innerText=Number(qty.innerText)+1;
                chk.innerText=Number(chk.innerText)+(price.innerText/qty.innerText);
                cartprice.innerText=chk.innerText;
            }
        }, 'json');
        
    })
})
document.querySelectorAll('.minus').forEach(item => {
    item.addEventListener('click', event => {
        $name=event.target.parentNode.parentNode.childNodes[1].innerText;
        $.post('/decCart/'+$name, function(response){
            if(response.success)
            {
                let qty=event.target.parentNode.childNodes[2];
                if(qty.innerText==1)return;
                let price=event.target.parentNode.parentNode.childNodes[5].childNodes[0];
                price.innerText =Number(price.innerText)-(price.innerText/qty.innerText);
                qty.innerText=Number(qty.innerText)-1;
                chk.innerText=Number(chk.innerText)-(price.innerText/qty.innerText);
                cartprice.innerText=chk.innerText;
            }
        }, 'json');
    })
})
document.querySelectorAll('.remove').forEach(item => {
    item.addEventListener('click', event => {
        $name=event.target.parentNode.parentNode.childNodes[1].innerText;
        $.post('/removecart/'+$name, function(response){
            if(response.success)
            { 
                let qty=event.target.parentNode.parentNode.childNodes[3].childNodes[2].innerText;
                let price=event.target.parentNode.parentNode.childNodes[5].childNodes[0].innerText;
                chk.innerText=Number(chk.innerText)-price;
                cartprice.innerText=chk.innerText;
                cartcount.innerText=Number(cartcount.innerText)-1;
                event.target.parentNode.parentNode.style.display="none";
                if(chk.innerText==0)
                chk.parentNode.parentNode.style.display="none";    
            }
        }, 'json');
    })
})
document.querySelectorAll('.cancelorder').forEach(item => {
    item.addEventListener('click', event => {
        $name=event.target;
        console.log($name)
        console.log($name.parentNode.parentNode.querySelector('.status'));
        $.post('/cancelorder/'+$name.id, function(response){
            if(response.success)
            { 
                $name.parentNode.parentNode.querySelector('.status').innerText="cancelled";
                $name.style.display="none";
            }
        }, 'json');
    })
})
document.querySelectorAll('.dispatchorder').forEach(item => {
    item.addEventListener('click', event => {
        $name=event.target;
        console.log($name.id)
        console.log($name.parentNode.parentNode.querySelector('.status'));
        $.post('/dispatchorder/'+$name.id, function(response){
            if(response.success)
            { 
                location.reload(true);
            }
            else{}
        }, 'json');
    })
})
})

function passwordmatch(){
      
}
