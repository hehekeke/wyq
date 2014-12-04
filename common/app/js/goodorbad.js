function tab1(m){
	// alert(m);
	if(m == 1){
		window.location.href = "<{$web_url}>/index.php/common/AssessmentResult/mod/huping";
	}else if(m == 2){
		window.location.href = "<{$web_url}>/index.php/common/AssessmentResult/mod/taping";
	}else{
		window.location.href = "<{$web_url}>/index.php/common/AssessmentResult/mod/leida";
	}

}

	function ajax_goodbad(flag,type){
		$.ajax({
			url:"<{$web_url}>/index.php/assessment/ajax_goodbad",
			async:false,
			type:'POST',
			data:({'flag':flag,'type':type}),
			success:function(msg){
				alert(msg);
				},
				error:function(){
					alert('网络发生错误');
					}
							})
	}
	
 function	tab2(n){
		if(n == 1){
			$("#do_good").show();
			$("#do_bad").hide();
			ajax_goodbad(0,1);
		}else if(n == 2){
			$("#do_good").hide();
			$("#do_bad").show();
			ajax_goodbad(1,1);
		}else{
			alert("非法参数");
		}
	}
	