﻿var mac_flag=1;         //播放器版本
var mac_second=0;       //播放前预加载广告时间 1000表示1秒
var mac_width='100%';      //播放器宽度
var mac_height=515;     //播放器高度
var mac_widthpop=704;   //弹窗窗口宽度
var mac_heightpop=566;  //弹窗窗口高度
var mac_showtop=1;     //美化版播放器是否显示头部
var mac_showlist=0;     //美化版播放器是否显示列表
var mac_autofull=0;     //是否自动全屏,0否,1是
var mac_buffer="";     //缓冲广告地址
var mac_prestrain="";  //预加载提示地址
var mac_colors="000000,F6F6F6,F6F6F6,333333,666666,FFFFF,FF0000,2c2c2c,ffffff,a3a3a3,2c2c2c,adadad,adadad,48486c,fcfcfc";   //背景色，文字颜色，链接颜色，分组标题背景色，分组标题颜色，当前分组标题颜色，当前集数颜色，集数列表滚动条凸出部分的颜色，滚动条上下按钮上三角箭头的颜色，滚动条的背景颜色，滚动条空白部分的颜色，滚动条立体滚动条阴影的颜色 ，滚动条亮边的颜色，滚动条强阴影的颜色，滚动条的基本颜色
var mac_show={},mac_show_server={}; //播放器名称,服务器组地址
//缓存开始
mac_show["baidu"]="百度bdhd";mac_show["qvod"]="快播qvod";mac_show["gvod"]="迅播gvod";mac_show["cool"]="酷播cool";mac_show["youku"]="优酷视频";mac_show["56"]="我乐视频";mac_show["tudou"]="土豆视频";mac_show["ku6"]="酷6视频";mac_show["qq"]="腾讯视频";mac_show["sohu"]="搜狐视频";mac_show["joy"]="激动网";mac_show["qiyi"]="奇艺视频";mac_show["letv"]="乐视视频";mac_show["funshion"]="风行视频";mac_show["tudouhd"]="土豆(高清)";mac_show["sohuhd"]="搜狐(高清)";mac_show["ku6hd"]="酷6(高清)";mac_show["sinahd"]="新浪(高清)";mac_show["pptv"]="pptv";mac_show["swf"]="Flash文件";mac_show["flv"]="Flv文件";mac_show["ckplayer"]="CK播放器";mac_show["cmp"]="CMP4播放器";mac_show["link"]="外链数据";mac_show_server["server1"]="http://maccms.com/";
//缓存结束