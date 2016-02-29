/* now */
function now(format) {
    var d = new Date();
    if(format) {
        return d.format(format);
    } else {
        return d.format("yyyy/mm/dd HH:MM:ss");
    }
}