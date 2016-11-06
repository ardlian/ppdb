$('#inp-chat').focus();
var sse;
var $container = $('#message-container');

sse = new EventSource(chatOpts.messageUrl);
sse.addEventListener('chat', function (e) {
    var data = JSON.parse(e.data);
    var msgs = data.msgs;

    $.each(msgs, function () {
        var msg = this;
        var $row;
        if (msg.self == 1) {
            $row = $(chatOpts.templateMe);
        } else {
            $row = $(chatOpts.templateYou);
            $row.find('[data-attr="name"]').text(msg.name);
        }
        $row.find('[data-attr="time"]').text(msg.time);
        $row.find('[data-attr="text"]').text(msg.text);
        $container.append($row);
    });
    if (msgs.length) {
        $container.scrollTop($container.prop("scrollHeight"));
    }
});

sse.addEventListener('unread', function (e) {
    var data = JSON.parse(e.data);
    if (data.count > 0) {
        $('#msg-notif').text(data.count);
        $('#msg-notif').attr('title', data.count + ' pesan baru');
    } else {
        $('#msg-notif').text('');
        $('#msg-notif').attr('title', '');
    }
});

sse.addEventListener('msgerror', function (e) {
    var data = JSON.parse(e.data);
    console.log(data.msg);
});

function chat() {
    var txt = $('#inp-chat').val().trim();
    if (txt != '') {
        $('#inp-chat').val('');
        $.post(chatOpts.chatUrl, {chat: txt}, function () {

        });
    }
}

function lastSeen() {
    $.post(chatOpts.lastSeenUrl);
}

$('#btn-chat').click(function () {
    chat();
});

$('#inp-chat').keydown(function (e) {
    if (e.which == 13) {
        chat();
    }
});

$('#inp-chat').on('click focus', function () {
    lastSeen();
});

$('#btn-name').click(function () {
    $.post(chatOpts.setNameUrl, {
        name: $('#inp-name').val()
    }, function (r) {
        $('#inp-name').val(r);
    });
});
