window.onload = function() {
    var helpText = document.getElementById('help-text'),
        activeText = document.getElementById('active-text'),
        publishText = document.getElementById('publish-text'),
        publishedText = document.getElementById('published-text');


    helpText.onclick = helpMove;
    activeText.onclick = activeMove;
    publishText.onclick = publishMove;
    publishedText.onclick = publishedMove;
    // close.onclick = hidden;

}




var timer = null;

function helpMove() {
    var help = document.getElementById('help');
    if (help.offsetLeft == 360) {
        timer = setInterval(function() {
            if (help.offsetLeft == 0) {
                clearInterval(timer);
            } else {
                help.style.left = help.offsetLeft - 20 + 'px';
            }
        }, 1)
    } else {
        timer = setInterval(function() {
            if (help.offsetLeft == 360) {
                clearInterval(timer);
            } else {
                help.style.left = help.offsetLeft + 20 + 'px';
            }
        }, 1)
    }
}

function activeMove() {
    var active = document.getElementById('active');
    if (active.offsetLeft == 360) {
        timer = setInterval(function() {
            if (active.offsetLeft == 0) {
                clearInterval(timer);
            } else {
                active.style.left = active.offsetLeft - 20 + 'px';
            }
        }, 1)
    } else {
        timer = setInterval(function() {
            if (active.offsetLeft == 360) {
                clearInterval(timer);
            } else {
                active.style.left = active.offsetLeft + 20 + 'px';
            }
        }, 1)
    }
}

function publishMove() {
    var publish = document.getElementById('publish');
    if (publish.offsetLeft == 360) {
        timer = setInterval(function() {
            if (publish.offsetLeft == 0) {
                clearInterval(timer);
            } else {
                publish.style.left = publish.offsetLeft - 20 + 'px';
            }
        }, 1)
    } else {
        timer = setInterval(function() {
            if (publish.offsetLeft == 360) {
                clearInterval(timer);
            } else {
                publish.style.left = publish.offsetLeft + 20 + 'px';
            }
        }, 1)
    }
}

function publishedMove() {
    var published = document.getElementById('published');
    if (published.offsetLeft == 360) {
        timer = setInterval(function() {
            if (published.offsetLeft == 0) {
                clearInterval(timer);
            } else {
                published.style.left = published.offsetLeft - 20 + 'px';
            }
        }, 1)
    } else {
        timer = setInterval(function() {
            if (published.offsetLeft == 360) {
                clearInterval(timer);
            } else {
                published.style.left = published.offsetLeft + 20 + 'px';
            }
        }, 1)
    }
}




$(document).ready(function() {
    $('#books > li').click(function() {
        $('.book > div').hide();
        $(this).children('div').show();
    });

    // close
    $('.close').click(function(event){
        // $('.book > div').css("background","red");
        $('.book-info').hide();
        event.stopPropagation(); 
    });

 
   
})

// 下拉框
$('#value').click(function(){
    $('.option').css("display","block");

})
$('.option').click(function(){
    $('#value').text($(this).text());
    $('.option').css("display","none");
    alert('操作成功');
})

