
function getCurTime(isMs = false)
{
    let currentDate = new Date();
    return currentDate.getHours() + ":" + currentDate.getMinutes() + ":" + currentDate.getSeconds() + (isMs ? (":" + currentDate.getMilliseconds()) : "");
}