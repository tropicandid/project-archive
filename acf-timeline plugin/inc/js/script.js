/* requries:
jquery-3.2.1.min.js
*/

jQuery(document).ready(function($) {


    // Globals
    $cards                  = $('.timeline-card'),
    $slider                 = $('#acf-carousel'),
    $number1                = $('#number-1'),
    $number2                = $('#number-2'),
    $numTimelineBlocks      = $cards.length,
    $annualData             = [],
    $values                 = [],
    $scrollBarPercent       = 0;

    $cards.each(function(){
        $datalayer = $(this).find('.card-flex-wrapper');
        $data = {};
        $data['Title']= $(this).find('.year').html();
        $data['Key']  = $(this).find('.card-flex-wrapper').data("key");
        $data["Year"] = $datalayer.data("year");
        $data["Val1"] = $datalayer.data("val-1");
        $data["Val2"] = $datalayer.data("val-2");

        $values.push($data["Val1"]);
        $values.push($data["Val2"]);

        $annualData.push($data);
    });

    $maxValue = Math.max(...$values);

    /* 
    *  TIMELINE FUNCTIONS 
    */


    // Initialize carousel
    carouselSlider = function() {
        $slider.slick({
            infinite: false,
            slidesToShow: 3,
            slidesToScroll: 3,
            placeholders: false,
            centerMode: true,
            variableWidth: true,
            initialSlide: 1,
            responsive: [
                {
                  breakpoint: 900,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                }, 
                {
                  breakpoint: 868,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                },
                {
                  breakpoint: 300,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }

            ]
        });
    }

    $slider.on('beforeChange', function(event, slick, currentSlide, nextSlide){
        $nextSlideData      = $('[data-slick-index='+nextSlide+']').find('.card-flex-wrapper'),
        $year               = $nextSlideData.data('year'),
        $key                = $nextSlideData.data('key'),
        $oldTick            = $('.tick.included.active'),
        // Convert this to class based
        $newTick            = $( '.tick-'+$key ),
        $val1               = $nextSlideData.data('val-1'),
        $val2               = $nextSlideData.data('val-2'),
        $colorChange        = $nextSlideData.data('change'),
        $tagline            = $nextSlideData.data('tagline');  

         if( $newTick.length > 1 ){
            var activeSlideData = $nextSlideData,
                tickSet         = $('.datalayer-'+$key);
                
            $newTick = $($newTick[ tickSet.index( activeSlideData ) ]);
        }

        $oldTick.toggleClass('active', false);
        $newTick.toggleClass('active', true);

        // Detect color change 
        if($colorChange == "yes") {
            $('.data-color-2').toggleClass('changOn', true);
        } else {
            $('.data-color-2').toggleClass('changOn', false); 
        }

        // Detect Tagline
        if( $tagline !== '' ) {
            $('.tagline').html($tagline);
        } else {
            $('.tagline').html('');
        }

        loopThroughNumbers($val1, $val2);
        colorChange($val1,$val2);
    });

    yearClick = function(slide, tick) {
        var newSlide = $(".card-flex-wrapper[data-key='" + slide +"']");
        var newSlideParent = newSlide.parent();

        if ( newSlide.length > 1) {
            var clicked     = $(tick).parent(),
                allSimilar  = $('.tick-'+slide),
                allSlides   = $('.datalayer-'+slide),
                index       = allSimilar.index( clicked );

            newSlideParent = $(allSlides[index]).parent();
        }

        $slider.slick('slickGoTo', newSlideParent.data('slick-index'), true);
    }

    // Construct Timeline ticks
    buildYearLine = function() {
        $yearline = $('#timeline-ticks');
        $ticks = $numTimelineBlocks * 4;

        for (var i = 0; i < $annualData.length; i++) {
            $activeClass = "";
            if( i == 1 ) {
                $activeClass = " active ";
                colorChange($annualData[i]['Val1'],$annualData[i]['Val2']);
                $number1.html( $annualData[i]['Val1'] );
                $number2.html( $annualData[i]['Val2'] );
            }
            $yearline.append('<span class=\"tick\"></span>');
            $yearline.append('<span class=\"tick\"></span>');

            $yearline.append('<span class=\"tick included tick-'+$annualData[i]['Key']+' '+ $activeClass +'\" id=\"tick-'+$annualData[i]['Key']+'\"><span class=\"tick-year\" onclick=\"yearClick( \''+$annualData[i]['Key']+'\', this )\">'+$annualData[i]['Title']+'</span></span>');
            $yearline.append('<span class=\"tick\"></span>');
        }
    }

    loopThroughNumbers = function(val1, val2){
        var time = 8,
            num1 = val1,
            num2 = val2;
      
        setTimeout(function() {

            for (var i = 1; i < 70; ++i) {
                
                (function(n) {
                    var newNum;
                    if ( n === 69 ) {
                      newNum = num1;
                    }
                    else {
                      newNum = randomNumber();
                    }
                    $number1.delay(1).queue(function(n) {
                      $number1.html( newNum );
                      n();
                    });
                }(i));

                (function(n) {
                    var newNum;
                    if ( n === 69 ) {
                      newNum = num2;
                    }
                    else {
                      newNum = randomNumber();
                    }
                    $number2.delay(1).queue(function(n) {
                      $number2.html( newNum );
                      n();
                    });
                }(i));
            }

        }, time)

        time += 100;
    }

    randomNumber = function(){
        return Math.random() * (102.1202773 - 70.227734);
    }

    colorChange = function(val1, val2) { 
        $width1 = ( val1 / $maxValue ) * 100;
        $width2 = ( val2 / $maxValue ) * 100;

        $('#data-color-1').attr('style',"width: " + $width1 + "%");
        $('#data-color-2').attr('style',"width: " + $width2 + "%");
    }

    cardClickToSlide = function() {
        $cards.each(function(){
            $(this).on('click', function(e) {
                if( !$(this).hasClass('slick-current') ){
                    e.preventDefault();

                    $currentSlide = $('.timeline-card.slick-current');

                    if( $currentSlide.data('slick-index') > $(this).data('slick-index') ) {
                        $('.slick-prev.slick-arrow').click();
                    } else {
                        $('.slick-next.slick-arrow').click();
                    }
                }
            });
        });
    }

    init = function () {
        carouselSlider();
        buildYearLine();
        cardClickToSlide();
    }

    init();
});