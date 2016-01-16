$(document).ready(function(){
  var items = 0;
  var total = $('#totalInitial').val();

  // Check if cart is empty. Show warnings
  if($('#itemsNumber').val()==0){
    $('#checkout').prop('disabled', true);
    $('#emptycart').css('display', 'block');
  }

  // //Get Total
  // $("input[name='price']").each(function(){
  //   total += parseInt(this.value);
  // });
  // $('#total').html(total);
  //
  // $("#item").each(function(){
  //   var basePrice = parseInt($("input[name='price']").val());
  //   var items = parseInt($("#quantity").val());
  //   var gross = basePrice * items;
  //   $('#gross').html("$ " +gross);
  // });
  //
  // $("quantity").change(function(){
  //
  // });
});
