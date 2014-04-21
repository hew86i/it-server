
function Ticker(){
	$('#news-container').vTicker({ 
	speed: 1200,
	pause: 6800,
	animation: 'fade',
	height: 5000,
	mousePause: false,
	showItems: 4
	});
};

// function pad(n) { return ("0" + n).slice(-2); }
Number.prototype.pad = function (len) {
    return (new Array(len+1).join("0") + this).slice(-len);
};

function printTime() {
		var now = new Date();
			// var hours = now.getHours();
			// var mins = now.getMinutes();
			// var seconds = now.getSeconds();
			// console.log(hours+":"+mins+":"+seconds);
		var time = now.getHours().pad(2) + ":"
         + now.getMinutes().pad(2) + ":"
         + now.getSeconds().pad(2);
        	// console.log(time);
         document.getElementById("now_time").textContent = time
         // $('#now_time').after(time);
		};
		

