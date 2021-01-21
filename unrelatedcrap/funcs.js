
function getCurTime(ms = false)
{
    let currentDate = new Date();
    return currentDate.getHours() + ":" + currentDate.getMinutes() + ":" + currentDate.getSeconds() + (ms ? (":" + currentDate.getMilliseconds()) : "");
}