$(document).ready(function() {

$("a[href*='/category/']")
  .each(function()
{ 
    $(this).parents('.breadcrumbs__list__items').next('.kb_sep').remove();
    $(this).parents('.breadcrumbs__list__items').remove();
});

  $('.scrollto a').on('click', function scroll(e) {
		e.preventDefault();
		let href = $(this).attr('href');
		$('html, body').animate({
			scrollTop: $(href).offset().top
		}, {
			duration: 370,
			easing: "linear"
		});
		return false;
	});
  
  /* Popup form*/

$('.similar__box__items__btn').click(function (e) {
    e.preventDefault();
    let price = $(this).siblings(".similar__box__items__price").text();
    let titleproduct = $(this).siblings(".similar__box__items__none").text();
    $("#modaltitle").val(titleproduct);
    $("#modalprice").val(price);
    $( ".orderoneclick" ).addClass('open');
});
$('.box__sidebar__btn').click(function (e) {
    e.preventDefault();
    let title = $(this).siblings(".box__sidebar__title").text();
    $("input:hidden").val(title);
    $( ".consultation" ).addClass('open');
});

$('.cart__desc__btn').click(function (e) {
  e.preventDefault();
  $( ".productoneclick" ).addClass('open');
});

$('.rating__video--one').click(function (e) {
    e.preventDefault();
    $( ".video--one" ).addClass('open');
});

$('.rating__video--two').click(function (e) {
  e.preventDefault();
  $( ".video--two" ).addClass('open');
});

$('.popup__header_close').click(function (e) {
    e.preventDefault();
    $( ".popup" ).removeClass('open');
});

$('.popup__area').click(function (e) {
  e.preventDefault();
  $( ".popup" ).removeClass('open');
});

  $('.cart__slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.cart__sliderprev'
  });
  $('.cart__sliderprev').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    infinite: true,
    asNavFor: '.cart__slider',
    dots: false,
    arrows: false,
    focusOnSelect: true,
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 6
        }
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 6
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 5
        }
      },
      {
        breakpoint: 575,
        settings: {
          dots: false,
          slidesToShow: 4,
          centerMode: false
        }
      },
      {
        breakpoint: 424,
        settings: {
          dots: false,
          slidesToShow: 3,
          centerMode: false
        }
      },
      {
        breakpoint: 374,
        settings: {
          dots: false,
          slidesToShow: 2,
          centerMode: false
        }
      }
    ]
  });

  $('.tabs__box__tab').click(function (e) {
    e.preventDefault();
    let elem = e.target;
    let id = '1' + elem.getAttribute('id');
    $('.tabs__box__content').removeClass('tabs__box__content_active');
    $('.tabs__box__tab').removeClass('tabs__box__tab_active');
    jQuery("#"+id).addClass('tabs__box__content_active');
    let idElem = elem.getAttribute('id');
    console.log(idElem);
    jQuery("#"+idElem).addClass('tabs__box__tab_active');
  });

  /* Ajax consultation*/
  $('#consultation-send').click(function(e){
    e.preventDefault();
    x = document.getElementById('modalname').value;
    if (x === "") {
      document.getElementById('status__error').textContent = "Укажите Ваше имя";
      return false;
    }
    x = document.getElementById('modalphone').value;
    if (x === "") {
      document.getElementById('status__error').textContent = "Укажите Ваш номер телефона";
      return false;
    } else {
      let re = /^\+375[0-9]{9}$/g;
      if(!re.test(x)){
          document.getElementById('status__error').textContent = "Укажите номер телефона в формате +375ХХХХХХХХХ";
          return false;
      }
    }
    x =  document.getElementById('messages').value;
      if (x === "") {
        document.getElementById('status__error').textContent = "Вы не написали что Вас интересует";
        return false;
    }
    $('#status__error').removeClass("error");
    document.getElementById('status__error').textContent = "Отправка...";

    const formCategoryData = {
      'categoryName': $('input[name=modaltitle]').val(),
      'firstname': $('input[name=modalname]').val(),
      'phone': $('input[name=modalphone]').val(),
      'messages': $('textarea[name=letter]').val(),
    };

    $.ajax({
      url: '/wp-content/themes/radiator/consultation-send.php',
      type: "POST",
      data: formCategoryData,
      success: function() {
          $('#ajax__form').trigger('reset');
          $('#status__error').text("Ваше сообщение отправлено!");
          setTimeout(function () {
            $('#status__error').text("").addClass("error");
          }, 2000);
      },
      error: function (jqXHR) {
          $('#status__error').text(jqXHR);
      }
    });
  });
  /* Ajax order one click*/
  $('#orderoneclick-send').click(function(e){
    e.preventDefault();
    x = document.getElementById('ordermodalname').value;
    if (x === "") {
      document.getElementById('status__error').textContent = "Укажите Ваше имя";
      return false;
    }
    x = document.getElementById('ordermodalphone').value;
    if (x === "") {
      document.getElementById('status__error').textContent = "Укажите Ваш номер телефона";
      return false;
    } else {
      let re = /^\+375[0-9]{9}$/g;
      if(!re.test(x)){
          document.getElementById('status__error').textContent = "Укажите номер телефона в формате +375ХХХХХХХХХ";
          return false;
      }
    }
    x =  document.getElementById('ordermessages').value;
      if (x === "") {
        document.getElementById('status__error').textContent = "Вы не написали что Вас интересует";
        return false;
    }
    $('#status__error').removeClass("error");
    document.getElementById('status__error').textContent = "Отправка...";

    const formOrderData = {
      'productName': $('input[name=modaltitle]').val(),
      'productPrice': $('input[name=modalprice]').val(),
      'firstname': $('input[name=ordermodalname]').val(),
      'phone': $('input[name=ordermodalphone]').val(),
      'messages': $('textarea[name=orderletter]').val(),
    };

    $.ajax({
      url: '/wp-content/themes/radiator/order-send.php',
      type: "POST",
      data: formOrderData,
      success: function() {
          $('#ajax__form').trigger('reset');
          $('#status__error').text("Ваше сообщение отправлено!");
          setTimeout(function () {
            $('#status__error').text("").addClass("error");
          }, 2000);
      },
      error: function (jqXHR) {
          $('#status__error').text(jqXHR);
      }
    });
  });
  $('#product-send').click(function(e){
    e.preventDefault();
    x = document.getElementById('productmodalname').value;
    if (x === "") {
      document.getElementById('product_status__error').textContent = "Укажите Ваше имя";
      return false;
    }
    x = document.getElementById('productmodalphone').value;
    if (x === "") {
      document.getElementById('product_status__error').textContent = "Укажите Ваш номер телефона";
      return false;
    } else {
      let re = /^\+375[0-9]{9}$/g;
      if(!re.test(x)){
          document.getElementById('product_status__error').textContent = "Укажите номер телефона в формате +375ХХХХХХХХХ";
          return false;
      }
    }
    x =  document.getElementById('productmessages').value;
      if (x === "") {
        document.getElementById('product_status__error').textContent = "Вы не написали что Вас интересует";
        return false;
    }
    $('#product_status__error').removeClass("error");
    document.getElementById('product_status__error').textContent = "Отправка...";

    const formOrderData = {
      'productName': $('input[name=productmodaltitle]').val(),
      'productPrice': $('input[name=productmodalprice]').val(),
      'firstname': $('input[name=productmodalname]').val(),
      'phone': $('input[name=productmodalphone]').val(),
      'messages': $('textarea[name=productletter]').val(),
    };

    $.ajax({
      url: '/wp-content/themes/radiator/order-send.php',
      type: "POST",
      data: formOrderData,
      success: function() {
          $('#product_ajax__form').trigger('reset');
          $('#product_status__error').text("Ваше сообщение отправлено!");
          setTimeout(function () {
            $('#product_status__error').text("").addClass("error");
          }, 2000);
      },
      error: function (jqXHR) {
          $('#product_status__error').text(jqXHR);
      }
    });
  });
  $('#btn-cost').click(function(e){
    e.preventDefault();
    x = document.getElementById('typethermostat').value;
    if (x === "") {
      document.getElementById('sidebar_status__error').textContent = "Укажите тип терморегулятора";
      return false;
    }
    x = document.getElementById('firstname-cost').value;
    if (x === "") {
      document.getElementById('sidebar_status__error').textContent = "Укажите Ваше имя";
      return false;
    }
    x = document.getElementById('phone-cost').value;
    if (x === "") {
      document.getElementById('sidebar_status__error').textContent = "Укажите Ваш номер телефона";
      return false;
    } else {
      let re = /^\+375[0-9]{9}$/g;
      if(!re.test(x)){
          document.getElementById('sidebar_status__error').textContent = "Укажите номер телефона в формате +375ХХХХХХХХХ";
          return false;
      }
    }
    $('#sidebar_status__error').removeClass("error");
    document.getElementById('sidebar_status__error').textContent = "Отправка...";
    
    const CalculateCostData = {
      'typeTermostat': $('select[name=typethermostat]').val(),
      'firstname': $('input[name=firstname-cost]').val(),
      'phone': $('input[name=phone-cost]').val(),
      'social': $('select[name=social]').val(),
    };

    $.ajax({
      url: '/wp-content/themes/radiator/calculate-cost-send.php',
      type: "POST",
      data: CalculateCostData,
      success: function() {
          $('#sidebar-form').trigger('reset');
          $('#sidebar_status__error').text("Ваше сообщение отправлено!");
          setTimeout(function () {
            $('#sidebar_status__error').text("").addClass("error");
          }, 2000);
      },
      error: function (jqXHR) {
          $('#sidebar_status__error').text(jqXHR);
      }
    });
  });

  $('#review-send').click(function(e){
    e.preventDefault();
    x = document.getElementById('reviewname').value;
    if (x === "") {
      document.getElementById('review__error').textContent = "Укажите Ваше имя";
      return false;
    }
    x = document.getElementById('reviewletter').value;
    if (x === "") {
      document.getElementById('review__error').textContent = "Укажите Ваш комментарий";
      return false;
    }
    x =  document.getElementById('reviewemail').value;
    if (x === "") {
      document.getElementById('review__error').textContent = "Укажите Ваш E-mail";
      return false;
    } else {
        let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if(!re.test(x)){
            document.getElementById('review__error').textContent = "Некорректный E-mail";
            return false;
        }
    }
    $('#review__error').removeClass("error");
    document.getElementById('review__error').textContent = "Отправка...";

    
    const ReviewData = {
      'firstname': $('input[name=reviewname]').val(),
      'email': $('input[name=reviewemail]').val(),
      'letter': $('textarea[name=reviewletter]').val(),
      'action': 'salmanlateef_save_user_contact_form',
    };

    $.ajax({
      url: '/wp-admin/admin-ajax.php',
      type: "POST",
      data: ReviewData,
      success: function() {
          $('#review-form').trigger('reset');
          $('#review__error').text("Ваше сообщение отправлено!");
          setTimeout(function () {
            $('#review__error').text("").addClass("error");
          }, 2000);
      },
      error: function (jqXHR) {
          $('#review__error').text(jqXHR);
      }
    });
  });
});