jQuery(document).ready(function() {
    jQuery('.sexy-bookmarks a.external').attr("target", "_blank");
    var sexyBaseHeight = jQuery('.sexy-bookmarks').height();
    var sexyFullHeight = jQuery('.sexy-bookmarks ul.socials').height();
    if (sexyFullHeight > sexyBaseHeight) {
        jQuery('.sexy-bookmarks-expand').hover(
                function() {
                    jQuery(this).animate({
                        height: sexyFullHeight + 15 + 'px'
                    }, {
                        duration: 800,
                        queue: false
                    });
                }, function() {
            jQuery(this).animate({
                height: sexyBaseHeight + 'px'
            }, {
                duration: 800,
                queue: false
            });
        });
    }
    if (jQuery('.sexy-bookmarks-center')) {
        var sexyFullWidth = jQuery('.sexy-bookmarks').width();
        var sexyBookmarkWidth = jQuery('.sexy-bookmarks:first ul.socials li').width();
        var sexyBookmarkCount = jQuery('.sexy-bookmarks:first ul.socials li').length;
        var numPerRow = Math.floor(sexyFullWidth / sexyBookmarkWidth);
        var sexyRowWidth = Math.min(numPerRow, sexyBookmarkCount) * sexyBookmarkWidth;
        var sexyLeftMargin = (sexyFullWidth - sexyRowWidth) / 2;
        jQuery('.sexy-bookmarks-center').css('margin-left', sexyLeftMargin + 'px');
    }
});