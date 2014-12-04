/**
 * Created by Administrator on 14-9-2.
 */
// 截去串头部的空格
function ltrim(str)
{
    var i = 0;
    while(str.charAt(i) == ' '){++i;}
    return str.substring(i, str.length);
}
// 截去串尾部的空格
function rtrim(str)
{
    var i = str.length - 1;
    while(str.charAt(i) == ' '){--i};
    return str.substring(0, i+1);
}
// 截去串头尾的空格
function trim(str)
{
    return ltrim(rtrim(str));
}