// public/js/product.js





function init_fitting(){

	var streaming = false,
	video = document.querySelector('#video'),
	canvas = document.querySelector('#canvas'),
	startButton = document.querySelector('#startbutton'),
	timeout_counter_p = document.querySelector('#timeout_counter_p'),
	front_img = document.querySelector('#front_img'),
	side_img = document.querySelector('#side_img'),
	edit_image = document.querySelector('#edit_image'),
	isTakingFrontImage = true,
	slider_p = document.querySelector('#slider_value_p'),
	width = 320,	
	height = 0;


	// ----- slider functions ----- ///

	function convert_cm_to_inch(cm){
		var round_cm = Math.round(cm);
		var num_inches = round_cm / 2.54;
		var num_feets = num_inches / 12;
		var remaining_inches = num_inches % 12;
		var return_str = Math.floor(num_feets) + "'" + Math.floor(remaining_inches);
		console.log(return_str);
		return return_str;
	}

	$('#slider-vertical').slider({
		orientation:"vertical",
		range:"min",
		min:130,
		max:210,
		value:165,
		slide: function(event, ui){
			slider_p.innerHTML = convert_cm_to_inch(ui.value);
		}
	});

	slider_p.innerHTML = convert_cm_to_inch(165);

	


	navigator.getMedia = (navigator.getUserMedia ||
		navigator.webkitGetUserMedia || 
		navigator.mozGetUserMedia || 
		navigator.msGetUserMedia);

	navigator.getMedia({
		video:true,
		audio:false
	},
	function(stream){
		if(navigator.mozGetUserMedia){
			video.mozSrcObject = stream;
		}else{
			var vendorURL = window.URL || window.webkitURL;
			video.src = vendorURL.createObjectURL(stream);
		}
		video.play();

	},
	function(err){
		console.log("an error occured " + err);
	});

	video.addEventListener('canplay', function(ev){
		console.log("event listener");
		if(!streaming){
			height = video.videoHeight / (video.videoWidth / width);
			video.setAttribute('width', width);
			video.setAttribute('height', height);
			canvas.setAttribute('width', width);
			canvas.setAttribute('height', height);
			streaming = true;
		}
	}, false);

	startbutton.addEventListener('click', function(ev){
		takepicture();
		ev.preventDefault();
	}, false);


	front_img.addEventListener('click', function(ev){
		edit_image.setAttribute('src', front_img.getAttribute('src'));
		init_measurement();
	});

	side_img.addEventListener('click', function(ev){
		edit_image.setAttribute('src', side_img.getAttribute('src'));
	});

	


	// ----- take image functions ----- //

	function take_shot(){

		canvas.width = width;
		canvas.height = height;
		canvas.getContext('2d').drawImage(video, 0, 0, width, height);
		var data = canvas.toDataURL('image/png');
		console.log(data + "w : " + width + "  h :  " + height);
		if(isTakingFrontImage){
			isTakingFrontImage = false;
			
			front_img.setAttribute('src', data);
			startbutton.innerHTML = 'take side photo';
		}else{
			side_img.setAttribute('src', data);
		}
	}


	function timeout_counter(n){
		console.log(n);
		if(n == 0){
			timeout_counter_p.innerHTML = "smile";
			take_shot();
		}else{
			timeout_counter_p.innerHTML = n;
			setTimeout(function(){
				timeout_counter(n-1);
			}, 1000);
		}
	}


	function takepicture(){

		timeout_counter(2);
	}
}


function init_measurement(){

	console.log("init graph");

	$('#svg').remove();

	var margin = {top: -5, right: -5, bottom: -5, left: -5},
	width = 960 - margin.left - margin.right,
	height = 500 - margin.top - margin.bottom;

	
	var svg = d3.select("#measure_div").insert("svg")
	.attr("id", "svg")
	.attr("width", 600)
	.attr("height", 400);

		// top circle
		var drag_upper = d3.behavior.drag()
		.on("dragstart", dragstarted)
		.on("drag", dragged_upper)
		.on("dragend", dragended);

		function dragged_upper(d){
			d3.select(this).attr("cy", d3.event.y);
			d3.select('#upper_line').attr("y1", d3.event.y).attr("y2", d3.event.y);
		}

		svg.append("circle")
		.attr("id", "upper_cercle")
		.attr("class", "dot")
		.attr("r", 10)
		.attr("cx", 10)
		.attr("cy", 100)
		.call(drag_upper);

		svg.append("line")
		.attr("id", "upper_line")
		.attr("class", "line")
		.attr("x1", 10)
		.attr("y1", 100)
		.attr("x2", 580)
		.attr("y2", 100);

		// lower circle
		var drag_lower = d3.behavior.drag()
		.on("dragstart", dragstarted)
		.on("drag", dragged_lower)
		.on("dragend", dragended);

		function dragged_lower(d){
			d3.select(this).attr("cy", d3.event.y);
			d3.select('#lower_line').attr("y1", d3.event.y).attr("y2", d3.event.y);
		}

		svg.append("circle")
		.attr("id", "lower_cercle")
		.attr("class", "dot")
		.attr("r", 10)
		.attr("cx", 10)
		.attr("cy", 200)
		.call(drag_lower);

		svg.append("line")
		.attr("id", "lower_line")
		.attr("class", "line")
		.attr("x1", 10)
		.attr("y1", 200)
		.attr("x2", 580)
		.attr("y2", 200);

		
		// shoulder loc
		var drag_shulder = d3.behavior.drag()
		.on("dragstart", dragstarted)
		.on("drag", dragged_shulder)
		.on("dragend", dragended);

		function dragged_shulder(d){
			d3.select(this).attr("cy", d3.event.y).attr("cx", d3.event.x);
		}

		svg.append("circle")
		.attr("id", "shoulder_dot")
		.attr("class", "dot")
		.attr("r", 5)
		.attr("cx", 50)
		.attr("cy", 150)
		.call(drag_shulder);

		// bust loc
		var drag_bust = d3.behavior.drag()
		.on("dragstart", dragstarted)
		.on("drag", dragged_bust)
		.on("dragend", dragended);

		function dragged_bust(d){
			d3.select(this).attr("cy", d3.event.y).attr("cx", d3.event.x);
		}

		svg.append("circle")
		.attr("id", "bust_dot")
		.attr("class", "dot")
		.attr("r", 5)
		.attr("cx", 50)
		.attr("cy", 200)
		.call(drag_bust);

		// hip loc
		var drag_hip = d3.behavior.drag()
		.on("dragstart", dragstarted)
		.on("drag", dragged_hip)
		.on("dragend", dragended);

		function dragged_hip(d){
			d3.select(this).attr("cy", d3.event.y).attr("cx", d3.event.x);
		}

		svg.append("circle")
		.attr("id", "hip_dot")
		.attr("class", "dot")
		.attr("r", 5)
		.attr("cx", 50)
		.attr("cy", 250)
		.call(drag_hip);
		

		function dragstarted(d){
			d3.event.sourceEvent.stopPropagation();
			d3.select(this).classed("dragging", true);
		}

		function dragended(d){
			d3.select(this).classed("dragging", false);
			get_measurements();
		}


		function get_measurements(){

			var topLine = d3.select("#upper_cercle");
			console.log("top line " + topLine.attr("cy"));

			var bottomLine = d3.select("#lower_cercle");
			console.log("bottom line " + bottomLine.attr("cy"));

			var shoulderDot = d3.select("#shoulder_dot");
			console.log("shoulder dot " + shoulderDot.attr("cx") + " y " + shoulderDot.attr("cy"));

		}


	}

	$('#size').change(function(ev){

		console.log("size");
		console.log($('#size').val());
		if($('#size').val() == "sizeme"){
			

			setTimeout(function(){

				$( 'html, body' ).animate({ scrollTop: 0 }, "fast" );
				$( '#bg-black' ).css({visibility: 'visible'});
				$( '#lightBox' ).css({ opacity: 1, visibility: 'visible', top: '50px' });

				init_fitting();

			}, 10);


		}

	});

	$('#apply_button').on('click',function(){

		setTimeout(function(){

			$( 'html, body' ).animate({ scrollTop: 0 }, "fast" );
			$( '#bg-black' ).css({visibility: 'visible'});
			$( '#lightBox' ).css({ opacity: 1, visibility: 'hidden', top: '50px' });
			$( '#lightBox2' ).css({ opacity: 1, visibility: 'visible', top: '50px' });

			init_fitting();

		}, 10);

	});
	
	$('#add_to_cart_btn').on('click', function(){ 
		$( '#lightBox2' ).css({ opacity: 0, visibility: 'visible', top: '40px' });; 
		$( '#bg-black' ).css({ opacity: 0, visibility: 'visible', top: '40px' });; 

	});





