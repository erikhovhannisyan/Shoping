$(function () {
    $('.pluskg').on('click', function () {

        let input = $(this).parent().parent().find('.kg');
        let inputVal = +$(this).parent().parent().find('.kg').val();
        let p = $(this).parent().parent().parent().find('.gin');
        let price = +$(this).parent().parent().parent().find('.norgin').text();
        if (price == "") {
            price = +$(this).parent().parent().parent().find('.price').text();
        }
        input.val((inputVal += 1).toFixed(1));
        p.html((inputVal * price).toFixed(1));
    });
    $('.plusg').on('click', function () {
        let input = $(this).parent().parent().find('.kg');
        let inputVal = +$(this).parent().parent().find('.kg').val();
        let p = $(this).parent().parent().parent().find('.gin');
        let price = +$(this).parent().parent().parent().find('.norgin').text();
        if (price == "") {
            price = +$(this).parent().parent().parent().find('.price').text();
        }
        input.val((inputVal += 0.1).toFixed(1));
        p.html((inputVal * price).toFixed(1));
    });
    $('.minuskg').on('click', function () {
        let input = $(this).parent().parent().find('.kg');
        let inputVal = +$(this).parent().parent().find('.kg').val();
        if (inputVal >= 1) {
            let p = $(this).parent().parent().parent().find('.gin');
            let price = +$(this).parent().parent().parent().find('.norgin').text();
            if (price == "") {
                price = +$(this).parent().parent().parent().find('.price').text();
            }
            input.val((inputVal -= 1).toFixed(1));
            p.html((inputVal * price).toFixed(1));
        }
    });
    $('.minusg').on('click', function () {
        let input = $(this).parent().parent().find('.kg');
        let inputVal = +$(this).parent().parent().find('.kg').val();
        if (inputVal > 0) {
            let p = $(this).parent().parent().parent().find('.gin');
            let price = +$(this).parent().parent().parent().find('.norgin').text();
            if (price == "") {
                price = +$(this).parent().parent().parent().find('.price').text();
            }
            input.val((inputVal -= 0.1).toFixed(1));
            p.html((inputVal * price).toFixed(1));
        }
    });

    $('.kg').on('input', function () {
        $(this).val($(this).val().replace(/[A-Za-zА-Яа-яЁё]/, ''))
    });

    $('.buy').on('click', function () {
        let buy = $(this).parent().find('.gin').text();
        console.log(buy);
    })

    $('.fa-cart-shopping').on('click', function () {
        let value = $(this).parent().parent().find('.kg').val();
        let valuegin = $(this).parent().parent().find('.gin').text();
        let id = $(this).parent().parent().find('.taqunid').text();
        let anun = $(this).parent().parent().find('.span1').text();
        let s = $(this).parent().parent().find('.mirq').attr('src');
        s = s.slice(2);
        let tesak = $(this).parent().parent().find('.deletik').text();
        tesak = tesak.slice(tesak.length - 3);
        if (tesak == '/կգ') {
            tesak = tesak.slice(tesak.length - 2)
        }

        if (anun == '') {
            anun = $(this).parent().parent().find('.span2').text();
        }
        if (value > 0) {

            window.location = 'shop.php?id=' + id + '&kg=' + value + '&gin=' + valuegin + '&anun=' + anun + '&src=' + s +'&kgorcount='+tesak;
        }
    })
    let x = 0;
    $('.a').on('click', function () {
        if (x % 2 == 0) {
            $('.zambyux').animate({
                width: '30%'
            }, 500)
        } else {
            $('.zambyux').animate({
                width: '0%'
            }, 300)
        }
        x++;
    })

})
