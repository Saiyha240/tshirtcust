$(document).ready(function(){
  var items = 0;
  var total = $('#totalInitial').val();

  // Check if cart is empty. Show warnings
  if($('#itemsNumber').val()==0){
    $('#checkout').prop('disabled', true);
    $('#emptycart').css('display', 'block');
  }

  $('.item').each(function(){
    var price = $(this).find('input[id=tshirt_price]').val();
    var quantity = $(this).find('input[id=quantity]');
    var grossHolder = $(this).find('span[id=gross]');
    var gross;

    quantity.on('input', function(){
      if(quantity.val() != ""){
        gross = parseInt(price) * parseInt(quantity.val());
      }
      else{
        gross = price;
      }
      grossHolder.text(gross);
      updateTotalGross();
    });

  });

  function updateTotalGross(){
    var totalGross = 0;
    $('span[id=gross]').each(function(){
        totalGross += parseInt($(this).text());
    });

    $('.checkout-data').find('span[id=total]').text(totalGross);
  }
});
