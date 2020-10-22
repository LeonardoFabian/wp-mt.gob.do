// WordPress disables the use of $ in jQuery. Enable it again with this function
jQuery( function($){

    function institucionalmt_post_carousel_show_another_link(direction){
        // where carousel are
        let ul = $('#institucionalmt-post-carousel ul');
        var current = -parseInt( ul[0].style.marginLeft ) / 100;

        var new_link = current + direction;

        var links_number = ul.children('li').length;

        if(new_link >= 0 && new_link <= links_number){
            ul.animate({'margin-left': -(new_link * 100) + '%'});
        }
    }

    function institucionalmt_post_carousel_previous_link(){        
        institucionalmt_post_carousel_show_another_link(-1);
        return false;
    }

    function institucionalmt_post_carousel_next_link(){        
        institucionalmt_post_carousel_show_another_link(1);
        return false;
    }

    $(document).ready(function(){
        $('#institucionalmt-post-carousel ul').css('margin-left', 0);
        $('#institucionalmt-post-carousel ul li a.institucionalmt-carousel-prev-control').click( institucionalmt_post_carousel_previous_link );
        $('#institucionalmt-post-carousel ul li a.institucionalmt-carousel-next-control').click( institucionalmt_post_carousel_next_link );
    });


});