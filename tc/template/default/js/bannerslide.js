$(function () {
    bannerSlide();
    function bannerSlide() {

        var $slide = $('.slide');             //ul.slide
        var $arr_slide = $('.slide li');      //ul.slide li
        var $img = $('.sel');
        var $num = $('.num'), $num_w = $num.outerWidth();
        var $arr_num = $('.num li');          //ul.num
        var $arrow = $('.arrow li');          //ul.arrow

        var img_src = [];
        var sequence = [];
        var bgColor=[];
        $arr_slide.each(function () {
            var i=$(this).index();
            var start=[],end=[];
            bgColor.push($arr_slide.eq(i).find('img').attr('data-color'));
            img_src.push($arr_slide.eq(i).find('img').get(0).src);
            start.push(img_src[i].lastIndexOf('/'));
            end.push(img_src[i].lastIndexOf('.'));
            sequence.push(img_src[i].substring(parseInt(start)+1,parseInt(end)));
            $arr_slide.eq(i).css('background',bgColor[i]);
        });



        var timer=null;
        var cur_i=0;

        //set $num position
        $num.css('margin-left',($num_w/2+450));

        timer=setInterval(autoRun,5000);

        $img.hover(function(){
            clearInterval(timer);
            //$arrow.fadeIn();
        },function(){
            timer=setInterval(autoRun,5000);
            //$arrow.fadeOut();
        });

        $('.sel,.arrow li').hover(function(){$arrow.css({'opacity':1})},function(){$arrow.css({'opacity':0})})

        $arr_num.mouseover(function () {
            changeColor($(this).index());
            cur_i=$(this).index();
        });

        $arrow.click(function(){

            var cur_img=$('.active').index();
            $(this).index()==0?cur_img=cur_img-1:cur_img=cur_img+1;
            if(cur_img==$arr_slide.length){
                cur_img=0
            }
            changeColor(cur_img);
            cur_i=cur_img;
        });


        function autoRun(){
            cur_i==$arr_slide.length-1?cur_i=0:cur_i++;
            changeColor(cur_i);
        }

        function changeColor(q){
            $arr_num.eq(q).addClass('active').siblings().removeClass('active');
            $arr_slide.eq(q).css("z-index","10").siblings().css("z-index","0");
            $arr_slide.eq(q).stop(true,false).fadeIn(1500).siblings().stop(true,false).fadeOut(1500);
            $arr_slide.eq(q).find('img').stop(true,false).animate({'opacity':1},1500);
            $arr_slide.eq(q).siblings().find('img').stop(true,false).animate({'opacity':0},1500);
        }
    }
});