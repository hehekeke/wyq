function calendar_view(containerid,basePath) {
	var container = $(containerid);
	this.generateCalendar = function() {

		var viewsets = {
			defaultView : 'month',
			header : {
				
				left : 'month,agendaWeek,agendaDay prevYear,nextYear',
				center : 'title',
				right : ' prev,next today'
			},
			weekends : true,
			weekMode : 'liquid',
			editable : false,

			disableResizing : false,
			// event ajax
			lazyFetching : true,
			startParam : 'start',
			endParam : 'end',

			isRTL : false,
			firstDay : 1,
			monthNames : [ '一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月',
					'九月', '十月', '十一月', '十二月' ],
			monthNamesShort : [ '一月', '二月', '三月', '四月', '五月', '六月', '七月',
					'八月', '九月', '十月', '十一月', '十二月' ],
			dayNames : [ '周日', '周一', '周二', '周三', '周四', '周五', '周六'  ],
			dayNamesShort : [ '周日','周一', '周二', '周三', '周四', '周五', '周六'],
			buttonText : {
				prev : '&#9668;',
				next : '&#9658;',
				prevYear : '&lt;&lt;上一年',
				nextYear : '下一年&gt;&gt;',
				today : '今天',
				month : '月',
				week : '周',
				day : '天'
				
			},
			agenda: 'HH:mm{ - HH:mm}', 
		    '': 'HH:mm',
		    timeFormat: 'HH:mm',
		    allDayText:"全天",
		    axisFormat: 'HH:mm',
		    slotMinutes:60,
		    firstHour:6,
		    slotEventOverlap:false,
		    
			dayClick: function(date, allDay, jsEvent, view) {

		        // change the day's background color just for fun
		        //$(this).css('background-color', 'red');
		        container.fullCalendar( 'changeView', "agendaDay" );
		        container.fullCalendar( 'gotoDate', date.getFullYear(),date.getMonth(),date.getDate() );

		    },
		/*    eventMouseover:function( event, jsEvent, view ){
		    	$(".event-info").html("<a href=\""+basePath+"/index.php/jobfairmsg/calendardetail/id/"+event.id+"\">"+event.title+"</a><br/>地点："+event.addr+"<br/>开始时间："+event.start.getFullYear()+"-"+(event.start.getMonth()+1)+"-"+event.start.getDate()+"&nbsp;"+event.start.toLocaleTimeString() );
		    	//alert("jsEvent"+jsEvent.pageX+"..."+jsEvent.pageY);
		    	$(".event-info").css("left",$(jsEvent.target).offset().left+"px");
		    	$(".event-info").css("top",$(jsEvent.target).offset().top+$(jsEvent.target).height()+"px");
		    	//$(".event-info").clearQueue();
		    	$(".event-info").stop(true,true);
		    	$(".event-info").show("fast");
		    	//alert(event+"...."+jsEvent+"...."+view);
		    	
		    },*/
		    eventMouseout:function( event, jsEvent, view ){
		 
		    	if($(jsEvent.relatedTarget).attr("class")!="event-info"){
		    		$(".event-info").hide("fast");
		    	}
		    	
		    	
		    },
			events : function(start, end, callback) {	
				
				var events = [];
				var goUrl = basePath+"/mannkjob.php/jobinfo/Getjsondata";
				
				$.ajax({
				   	type: "POST",
				   	data:"start="+start.getTime()+"&end="+end.getTime()+"",
				   	url: goUrl,
				   	success: function(msg){
				  		//alert( msg );
				  		var myObject = eval('(' + msg + ')');
				  		//jm_opentimestamp":"1380816000
				  		
				  		$.each(myObject, function(idx, iteminfo) {
						
							events.push({
								id:iteminfo.cal_id,
								title : iteminfo.cal_name,
								start :new Date(iteminfo.cal_opentimestamp*1000),
								allDay: false,
								addr:iteminfo.cal_addr,
								//url : basePath+"/index.php/jobfairmsg/calendardetail/id/"+iteminfo.jm_id,
								color: '#99CC33'
								// will be parsed
							});
						});
						callback(events);
					},
					error:function(msg){
						alert("网络出现故障请重新获取");
					}
				});
				
			},
			eventColor: '#378006'
		};
		container.fullCalendar(viewsets);
	};// generateCalendar
	
	this.refetchEvents = function() {
		container.fullCalendar('refetchEvents');
	};
	
};// function calendar_view


function ShowObjProperty ( obj ) { 
	// 用来保存所有的属性名称和值 
	var props = "" ; 
	// 开始遍历 
	for ( var p in obj ){ 
		// 方法 
		if ( typeof ( obj [p]) == "function" ){ 
				//obj [p]() ; 
			props += p + " = function \t " ; 
		} else { 
			// p 为属性名称，obj[p]为对应属性的值 
			props += p + " = " + obj [ p ] + " \t " ; 
			//props += p + "  \t " ; 
		} 
	} 
	// 最后显示所有的属性 
	alert ( props ) ; 
} 