$(document).ready(function(){
  var items = 0;
  var order = '{"shirts": []}';
  var orderObj = JSON.parse(order);
  var shirtObj = orderObj["shirts"];
  var totalHolder = $('.checkout-data').find('span[id=total]');
  // Check if cart is empty. Show warnings
  if($('#itemsNumber').val()==0){
    enableCheckout(true);
    $('#emptycart').css('display', 'block');
  }

  $('#items .item').each(function(){
    var parentItem = $(this);
    var tshirtId = $(this).find('input[id=tshirt_id]').val();
    var price = $(this).find('input[id=tshirt_price]').val();
    var quantity = $(this).find('input[id=quantity]');
    var grossHolder =$(this).find('span[id=gross]');
    shirtObj.push({"tshirtId": tshirtId, "price": price, "quantity": quantity.val()});

    var gross = updateGross(price, quantity.val());
    updateData(gross, grossHolder);
    console.log(JSON.stringify(orderObj));

    quantity.on('input', function(){
      gross = updateGross(price, quantity.val());

      updateData(gross, grossHolder);
      updateShirtJson(tshirtId, price, quantity.val());
      // updateFormValues(parentItem, gross);
    });
  });

  function updateFormValues(parentItem, gross){
    var priceHolder = parentItem.find('input[id=tshirt_price]');
    priceHolder.val(gross);
  }

  function updateData(gross, grossHolder){
    grossHolder.text(gross);
    updateTotalGross();
    checkForInvalidPrices();
  }

  function updateShirtJson(tshirtId, price, quantity){
    for(i=0; i<shirtObj.length;i++){
      if(tshirtId == shirtObj[i].tshirtId){
        shirtObj[i].quantity = quantity;
        console.log(JSON.stringify(orderObj));
      }
    }
  }

  function updateGross(price, quantity){
    var mygross;
    if(quantity != ""){
      mygross = parseInt(price) * parseInt(quantity);
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
});
