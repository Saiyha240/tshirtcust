$(document).ready(function(){
  setupAjax();
  var totalHolder = $('.checkout-data').find('span[id=total]');

  // Check if cart is empty. Show warnings
  if($('#itemsNumber').val()==0){
    enableCheckout(true);
    $('#emptycart').css('display', 'block');
  }

  $('#items .item').each(function(){
    var tshirtId = $(this).find('input[id=tshirt_id]').val();
    var price = $(this).find('input[id=tshirt_price]').val();
    var quantity = $(this).find('input[id=quantity]');
    var grossHolder =$(this).find('span[id=gross]');

    var gross = updateGross(price, quantity.val());
    updateView(gross, grossHolder);

    quantity.on('input', function(){
      gross = updateGross(price, quantity.val());
      updateView(gross, grossHolder);
      sendUpdatedItems(tshirtId, quantity.val());
    });
  });

  function setupAjax(){
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
  }

  function sendUpdatedItems(tshirtId, quantity){
    $.ajax({
      url: "cart/item/update",
      type: "POST",
      data: {tshirt_id: tshirtId, tshirt_quantity: quantity},
      success: function(e){
        console.log("Updated.");
      },
      error: function (xhr, ajaxOptions, thrownError) {
           console.log(xhr.status);
           console.log(xhr.responseText);
           console.log(thrownError);
       }
    });
  }

  function updateView(gross, grossHolder){
    grossHolder.text(gross);
    updateTotalGross();
    checkForInvalidPrices();
  }

  function updateGross(price, quantity){
    var mygross,
        discount = 1;

    if(quantity != ""){
      mygross = parseInt(price) * parseInt(quantity) * calculateDiscount(quantity);
    }
    else{
      mygross = price;
    }
    return mygross;
  }

  function updateTotalGross(){
    var totalGross = 0;
    $('span[id=gross]').each(function(){
        totalGross += parseInt($(this).text());
    });

    totalHolder.text(totalGross);
  }

  function checkForInvalidPrices(number){
    var hasInvalid = false;

    $('span[id=gross]').each(function(){
        if(parseInt($(this).text()) < 1){
            hasInvalid = true;
        }
    });

    if(parseInt(totalHolder.text()) < 1){
      hasInvalid = true;
    }

    enableCheckout(hasInvalid);
  }

  function enableCheckout(enabled){
      $('#checkout').prop('disabled', enabled);
  }

  function calculateDiscount(quantity){
    var discount = 1;

    if ( quantity >= 50 ) {
      discount = 0.7;
    } else if ( quantity >= 24 ) {
      discount = 0.8;
    } else if ( quantity >= 12 ) {
      discount = 0.9;
    }

    return discount;
  }
});
